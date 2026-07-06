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

    // 6. Lightbox for Gallery
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('lightboxModal');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxClose = document.getElementById('lightboxClose');
    const lightboxCaption = document.getElementById('lightboxCaption');

    if (lightbox && lightboxImg && lightboxClose) {
        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                const img = item.querySelector('img');
                const title = item.querySelector('h4');
                const subtitle = item.querySelector('p');
                
                if (img) {
                    lightboxImg.src = img.src;
                    lightboxCaption.innerText = title ? `${title.innerText} - ${subtitle ? subtitle.innerText : ''}` : '';
                    lightbox.style.display = 'flex';
                    document.body.style.overflow = 'hidden'; // stop page scrolling
                }
            });
        });

        // Close functions
        const closeLightbox = () => {
            lightbox.style.display = 'none';
            document.body.style.overflow = 'auto'; // restore scroll
        };

        lightboxClose.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
        
        // Escape key close
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && lightbox.style.display === 'flex') {
                closeLightbox();
            }
        });
    }
});
