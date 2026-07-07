document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize AOS (Animate On Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-out-quad',
            once: true,
            offset: 100
        });
    }

    // 2. Generate Floating Gold Particles
    const particlesContainer = document.getElementById('particles-container');
    if (particlesContainer) {
        const particleCount = 25;
        for (let i = 0; i < particleCount; i++) {
            createParticle(particlesContainer);
        }
    }

    function createParticle(container) {
        const particle = document.createElement('div');
        particle.classList.add('gold-particle');
        
        // Random size (between 3px and 6px)
        const size = Math.random() * 3 + 3;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Random starting horizontal position
        particle.style.left = `${Math.random() * 100}vw`;
        
        // Random delay and duration
        const duration = Math.random() * 8 + 12; // 12s - 20s
        const delay = Math.random() * 10; // 0s - 10s
        particle.style.animationDuration = `${duration}s`;
        particle.style.animationDelay = `-${delay}s`; // negative delay to start immediately
        
        // Random horizontal drift
        const drift = Math.random() * 50 - 25; // -25px to 25px
        particle.style.setProperty('--drift', `${drift}px`);
        
        container.appendChild(particle);
        
        // Re-generate particles when animation ends to prevent memory leakage
        particle.addEventListener('animationiteration', () => {
            particle.style.left = `${Math.random() * 100}vw`;
        });
    }

    // 3. Navbar scroll effect & Scroll progress indicator
    const navbar = document.querySelector('.navbar-premium');
    const scrollProgress = document.getElementById('scrollProgress');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }

        if (scrollProgress) {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = height > 0 ? (winScroll / height) * 100 : 0;
            scrollProgress.style.width = scrolled + "%";
        }
    });

    // 4. Smooth scrolling & nav-link active state tracking
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link-premium');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.scrollY >= (sectionTop - 180)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });

    // Collapse mobile menu when a nav-link is clicked
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const bsCollapse = typeof bootstrap !== 'undefined' ? new bootstrap.Collapse(navbarCollapse, { toggle: false }) : null;
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (navbarCollapse.classList.contains('show') && bsCollapse) {
                bsCollapse.hide();
            }
        });
    });

    // 5. Back to Top Button
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                backToTopBtn.classList.add('active');
            } else {
                backToTopBtn.classList.remove('active');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // 5.5. Interactive Category Filtering for Portfolio Gallery
    const filterBtns = document.querySelectorAll('.gallery-filter-btn');
    const galleryGridItems = document.querySelectorAll('.gallery-item');

    if (filterBtns.length > 0 && galleryGridItems.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update active state on filter buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.getAttribute('data-filter');

                galleryGridItems.forEach(item => {
                    // Set smooth transitions
                    item.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
                    
                    if (filter === 'all' || item.classList.contains(`cat-${filter}`)) {
                        // Show item
                        item.style.display = 'block';
                        // Force a reflow to trigger transition
                        item.offsetHeight;
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    } else {
                        // Hide item
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.85)';
                        // Wait for transition to end before setting display none
                        const onTransitionEnd = (e) => {
                            if (e.propertyName === 'opacity') {
                                if (item.style.opacity === '0') {
                                    item.style.display = 'none';
                                }
                                item.removeEventListener('transitionend', onTransitionEnd);
                            }
                        };
                        item.addEventListener('transitionend', onTransitionEnd);
                    }
                });
            });
        });
    }

    // 6. Premium Luxury Gallery Lightbox
    const luxuryLightbox = document.getElementById('luxuryLightbox');
    const lightboxMainImg = document.getElementById('lightboxMainImg');
    const lightboxImgViewport = document.getElementById('lightboxImgViewport');
    const lightboxCloseBtn = document.getElementById('luxuryLightboxClose');
    const lightboxPrev = document.getElementById('lightboxPrev');
    const lightboxNext = document.getElementById('lightboxNext');
    const lightboxCounter = document.getElementById('lightboxCounter');
    const lightboxDetailBadge = document.getElementById('lightboxDetailBadge');
    const lightboxDetailTitle = document.getElementById('lightboxDetailTitle');
    const lightboxDetailDesc = document.getElementById('lightboxDetailDesc');
    const lightboxThumbnailsTrack = document.getElementById('lightboxThumbnailsTrack');
    const lightboxVisitStore = document.getElementById('lightboxVisitStore');

    let visibleItems = [];
    let currentDeckIndex = 0;
    
    // Zooming & Panning State Variables
    let zoomScale = 1;
    let panX = 0;
    let panY = 0;
    let isPanning = false;
    let startPanX = 0;
    let startPanY = 0;

    const getVisibleGalleryItems = () => {
        // Collect visible gallery items (respects active filtering)
        return Array.from(document.querySelectorAll('.gallery-item')).filter(item => {
            return window.getComputedStyle(item).display !== 'none';
        });
    };

    const applyTransform = (noTransition = false) => {
        if (!lightboxMainImg) return;
        if (noTransition) {
            lightboxMainImg.classList.add('no-transition');
        } else {
            lightboxMainImg.classList.remove('no-transition');
        }
        lightboxMainImg.style.transform = `translate(${panX}px, ${panY}px) scale(${zoomScale})`;
    };

    const resetZoom = () => {
        zoomScale = 1;
        panX = 0;
        panY = 0;
        applyTransform(true);
    };

    const generateThumbnails = () => {
        if (!lightboxThumbnailsTrack) return;
        lightboxThumbnailsTrack.innerHTML = '';
        
        visibleItems.forEach((item, index) => {
            const img = item.querySelector('img');
            if (!img) return;
            
            const thumb = document.createElement('div');
            thumb.classList.add('thumb-item');
            if (index === currentDeckIndex) thumb.classList.add('active');
            
            const thumbImg = document.createElement('img');
            thumbImg.src = img.src;
            thumbImg.alt = `Thumbnail ${index + 1}`;
            
            thumb.appendChild(thumbImg);
            
            thumb.addEventListener('click', () => {
                currentDeckIndex = index;
                showImage(currentDeckIndex);
            });
            
            lightboxThumbnailsTrack.appendChild(thumb);
        });
    };

    const showImage = (index) => {
        resetZoom();
        
        if (index < 0 || index >= visibleItems.length) return;
        
        const item = visibleItems[index];
        const img = item.querySelector('img');
        const title = item.querySelector('h4');
        const desc = item.querySelector('p');
        const badge = item.querySelector('.overlay-badge') || item.querySelector('.gallery-badge');
        
        if (!img || !lightboxMainImg) return;

        // Apply a brief fade transition between images
        lightboxMainImg.style.opacity = '0';
        lightboxMainImg.style.transform = 'translate(0px, 0px) scale(0.96)';
        
        setTimeout(() => {
            lightboxMainImg.src = img.src;
            if (lightboxDetailTitle) lightboxDetailTitle.innerText = title ? title.innerText : 'Bespoke Blouse Design';
            if (lightboxDetailDesc) lightboxDetailDesc.innerText = desc ? desc.innerText : 'Premium handcrafted blouse stitching and delicate embroidery.';
            if (lightboxDetailBadge) lightboxDetailBadge.innerText = badge ? badge.innerText : 'Exclusive';
            if (lightboxCounter) lightboxCounter.innerText = `${index + 1} / ${visibleItems.length}`;
            
            // Populate WhatsApp dynamic URL
            const waBtn = document.querySelector('.btn-action-wa');
            if (waBtn && title) {
                const message = encodeURIComponent(`Hi Gramathu Design! I am viewing your gallery and love this design: "${title.innerText}". Can we discuss the custom stitching details?`);
                waBtn.href = `https://wa.me/916369468700?text=${message}`;
            }

            // Update active state in related thumbnail strip
            const thumbs = lightboxThumbnailsTrack ? lightboxThumbnailsTrack.querySelectorAll('.thumb-item') : [];
            thumbs.forEach((t, i) => {
                if (i === index) {
                    t.classList.add('active');
                    t.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                } else {
                    t.classList.remove('active');
                }
            });

            lightboxMainImg.style.opacity = '1';
            lightboxMainImg.style.transform = 'translate(0px, 0px) scale(1)';
        }, 150);
    };

    const openLightbox = (clickedItem) => {
        visibleItems = getVisibleGalleryItems();
        const index = visibleItems.indexOf(clickedItem);
        if (index === -1) return;
        
        currentDeckIndex = index;
        
        if (luxuryLightbox) {
            luxuryLightbox.classList.add('open-active');
            document.body.style.overflow = 'hidden'; // Lock body scroll
        }
        
        generateThumbnails();
        showImage(currentDeckIndex);
    };

    const closeLightbox = () => {
        if (luxuryLightbox) {
            luxuryLightbox.classList.remove('open-active');
            document.body.style.overflow = 'auto'; // Unlock body scroll
            resetZoom();
        }
    };

    // Attach click listeners to all gallery items
    const setupGalleryClickListeners = () => {
        const galleryItemsList = document.querySelectorAll('.gallery-item');
        galleryItemsList.forEach(item => {
            // Find zoom button or full overlay to open lightbox
            item.addEventListener('click', (e) => {
                // If it is filtered out, do not trigger
                if (window.getComputedStyle(item).display === 'none') return;
                openLightbox(item);
            });
        });
    };

    if (luxuryLightbox) {
        setupGalleryClickListeners();

        // Close event
        if (lightboxCloseBtn) {
            lightboxCloseBtn.addEventListener('click', closeLightbox);
        }

        // Close on background click
        const backdrop = luxuryLightbox.querySelector('.lightbox-backdrop');
        if (backdrop) {
            backdrop.addEventListener('click', closeLightbox);
        }

        // Navigation actions
        if (lightboxNext) {
            lightboxNext.addEventListener('click', (e) => {
                e.stopPropagation();
                if (currentDeckIndex >= visibleItems.length - 1) {
                    currentDeckIndex = 0; // wrap around to first
                } else {
                    currentDeckIndex++;
                }
                showImage(currentDeckIndex);
            });
        }

        if (lightboxPrev) {
            lightboxPrev.addEventListener('click', (e) => {
                e.stopPropagation();
                if (currentDeckIndex <= 0) {
                    currentDeckIndex = visibleItems.length - 1; // wrap around to last
                } else {
                    currentDeckIndex--;
                }
                showImage(currentDeckIndex);
            });
        }

        // Keyboard actions
        document.addEventListener('keydown', (e) => {
            if (!luxuryLightbox.classList.contains('open-active')) return;
            
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowRight') {
                if (currentDeckIndex >= visibleItems.length - 1) {
                    currentDeckIndex = 0;
                } else {
                    currentDeckIndex++;
                }
                showImage(currentDeckIndex);
            } else if (e.key === 'ArrowLeft') {
                if (currentDeckIndex <= 0) {
                    currentDeckIndex = visibleItems.length - 1;
                } else {
                    currentDeckIndex--;
                }
                showImage(currentDeckIndex);
            }
        });

        // Double Click Zoom
        if (lightboxImgViewport && lightboxMainImg) {
            lightboxImgViewport.addEventListener('dblclick', (e) => {
                e.preventDefault();
                if (zoomScale === 1) {
                    zoomScale = 2;
                    // Center pan on double-clicked area
                    const rect = lightboxImgViewport.getBoundingClientRect();
                    const clickX = e.clientX - rect.left - rect.width / 2;
                    const clickY = e.clientY - rect.top - rect.height / 2;
                    panX = -clickX * 0.5;
                    panY = -clickY * 0.5;
                } else {
                    resetZoom();
                }
                applyTransform();
            });

            // Mouse Wheel Zoom
            lightboxImgViewport.addEventListener('wheel', (e) => {
                e.preventDefault();
                const zoomFactor = 0.1;
                const oldScale = zoomScale;
                
                if (e.deltaY < 0) {
                    // Zoom In
                    zoomScale = Math.min(3, zoomScale + zoomFactor);
                } else {
                    // Zoom Out
                    zoomScale = Math.max(1, zoomScale - zoomFactor);
                }

                // Adjust pan when zooming to keep focal point
                if (zoomScale === 1) {
                    panX = 0;
                    panY = 0;
                } else {
                    // adjust offsets based on scale
                    const rect = lightboxImgViewport.getBoundingClientRect();
                    const mouseX = e.clientX - rect.left - rect.width / 2;
                    const mouseY = e.clientY - rect.top - rect.height / 2;
                    panX -= mouseX * (zoomScale - oldScale) * 0.5;
                    panY -= mouseY * (zoomScale - oldScale) * 0.5;
                }

                applyTransform();
            }, { passive: false });

            // Drag and Pan Controls
            lightboxImgViewport.addEventListener('mousedown', (e) => {
                if (zoomScale <= 1) return;
                e.preventDefault();
                isPanning = true;
                lightboxImgViewport.classList.add('dragging');
                startPanX = e.clientX - panX;
                startPanY = e.clientY - panY;
            });

            window.addEventListener('mousemove', (e) => {
                if (!isPanning) return;
                panX = e.clientX - startPanX;
                panY = e.clientY - startPanY;
                applyTransform(true); // immediate dragging with no transition
            });

            window.addEventListener('mouseup', () => {
                if (isPanning) {
                    isPanning = false;
                    lightboxImgViewport.classList.remove('dragging');
                }
            });

            lightboxImgViewport.addEventListener('mouseleave', () => {
                if (isPanning) {
                    isPanning = false;
                    lightboxImgViewport.classList.remove('dragging');
                }
            });
        }

        // Swipe Gestures on Mobile
        let startSwipeX = 0;
        let startSwipeY = 0;
        let isSwiping = false;

        const imagePane = luxuryLightbox.querySelector('.lightbox-image-pane');
        if (imagePane) {
            imagePane.addEventListener('touchstart', (e) => {
                if (zoomScale > 1) return; // disable swiping when zoomed in
                startSwipeX = e.touches[0].clientX;
                startSwipeY = e.touches[0].clientY;
                isSwiping = true;
            }, { passive: true });

            imagePane.addEventListener('touchend', (e) => {
                if (!isSwiping || zoomScale > 1) return;
                isSwiping = false;
                const endSwipeX = e.changedTouches[0].clientX;
                const endSwipeY = e.changedTouches[0].clientY;
                
                const diffSwipeX = startSwipeX - endSwipeX;
                const diffSwipeY = startSwipeY - endSwipeY;
                
                // Ensure swipe is mostly horizontal
                if (Math.abs(diffSwipeX) > 60 && Math.abs(diffSwipeY) < 40) {
                    if (diffSwipeX > 0) {
                        // Swipe left = Next
                        if (currentDeckIndex >= visibleItems.length - 1) {
                            currentDeckIndex = 0;
                        } else {
                            currentDeckIndex++;
                        }
                    } else {
                        // Swipe right = Prev
                        if (currentDeckIndex <= 0) {
                            currentDeckIndex = visibleItems.length - 1;
                        } else {
                            currentDeckIndex--;
                        }
                    }
                    showImage(currentDeckIndex);
                }
            }, { passive: true });
        }

        // Anchor Visit Store to Contact section mapping
        if (lightboxVisitStore) {
            lightboxVisitStore.addEventListener('click', () => {
                closeLightbox();
            });
        }
    }

    // 7. Premium Luxury Reviews Carousel
    const carouselWrapper = document.querySelector('.reviews-carousel-wrapper');
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(document.querySelectorAll('.carousel-slide'));
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const dotsContainer = document.querySelector('.carousel-dots-container');

    if (carouselWrapper && track && slides.length > 0) {
        let currentIndex = 0;
        let visibleSlides = 3;
        let slideInterval;

        const updateVisibleSlides = () => {
            if (window.innerWidth >= 1200) {
                visibleSlides = 3;
            } else if (window.innerWidth >= 768) {
                visibleSlides = 2;
            } else {
                visibleSlides = 1;
            }
        };

        const getMaxIndex = () => {
            return Math.max(0, slides.length - visibleSlides);
        };

        const createDots = () => {
            if (!dotsContainer) return;
            dotsContainer.innerHTML = '';
            const maxIndex = getMaxIndex();
            for (let i = 0; i <= maxIndex; i++) {
                const dot = document.createElement('div');
                dot.classList.add('carousel-dot');
                if (i === currentIndex) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    currentIndex = i;
                    updateCarousel();
                    resetTimer();
                });
                dotsContainer.appendChild(dot);
            }
        };

        const updateDots = () => {
            const dots = dotsContainer ? dotsContainer.querySelectorAll('.carousel-dot') : [];
            dots.forEach((dot, idx) => {
                if (idx === currentIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        };

        const updateCarousel = () => {
            const maxIndex = getMaxIndex();
            if (currentIndex > maxIndex) currentIndex = maxIndex;
            
            const slideWidthPercentage = 100 / visibleSlides;
            const translateAmount = -currentIndex * slideWidthPercentage;
            track.style.transform = `translateX(${translateAmount}%)`;
            updateDots();
        };

        const nextSlide = () => {
            const maxIndex = getMaxIndex();
            if (currentIndex >= maxIndex) {
                currentIndex = 0; // Infinite wrap-around to start
            } else {
                currentIndex++;
            }
            updateCarousel();
        };

        const prevSlide = () => {
            const maxIndex = getMaxIndex();
            if (currentIndex <= 0) {
                currentIndex = maxIndex; // Infinite wrap-around to end
            } else {
                currentIndex--;
            }
            updateCarousel();
        };

        const startTimer = () => {
            slideInterval = setInterval(nextSlide, 5000);
        };

        const stopTimer = () => {
            clearInterval(slideInterval);
        };

        const resetTimer = () => {
            stopTimer();
            startTimer();
        };

        // Navigation actions
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetTimer();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetTimer();
            });
        }

        // Hover pause
        carouselWrapper.addEventListener('mouseenter', stopTimer);
        carouselWrapper.addEventListener('mouseleave', startTimer);

        // Mobile Swipe Support
        let startX = 0;
        let isSwiping = false;

        carouselWrapper.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isSwiping = true;
            stopTimer();
        }, { passive: true });

        carouselWrapper.addEventListener('touchmove', (e) => {
            if (!isSwiping) return;
            const currentX = e.touches[0].clientX;
            const diffX = startX - currentX;
            if (Math.abs(diffX) > 10) {
                // Prevent vertical scroll if horizontal swipe is intended
            }
        }, { passive: true });

        carouselWrapper.addEventListener('touchend', (e) => {
            if (!isSwiping) return;
            isSwiping = false;
            const endX = e.changedTouches[0].clientX;
            const diffX = startX - endX;
            if (diffX > 50) {
                nextSlide();
            } else if (diffX < -50) {
                prevSlide();
            }
            startTimer();
        }, { passive: true });

        // Responsiveness layout watch
        window.addEventListener('resize', () => {
            const prevVisible = visibleSlides;
            updateVisibleSlides();
            if (prevVisible !== visibleSlides) {
                createDots();
                updateCarousel();
            }
        });

        // Initialize Slider
        updateVisibleSlides();
        createDots();
        updateCarousel();
        startTimer();
    }

    // 8. Animated Stats Counter using IntersectionObserver
    const counters = document.querySelectorAll('.counter-num');
    if (counters.length > 0) {
        const countUp = (el) => {
            const target = parseInt(el.getAttribute('data-target'), 10);
            const duration = 2000; // 2 seconds animation duration
            const startTime = performance.now();

            const updateCount = (now) => {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Ease out quad
                const ease = progress * (2 - progress);
                const current = Math.floor(ease * target);
                
                el.innerText = current;

                if (progress < 1) {
                    requestAnimationFrame(updateCount);
                } else {
                    el.innerText = target;
                }
            };
            requestAnimationFrame(updateCount);
        };

        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    countUp(el);
                    observer.unobserve(el); // only animate once
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        });

        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    }
});
