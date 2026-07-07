<?php
// Gramathu Design - Dynamic Boutique Portal
require_once __DIR__ . '/includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Optimization -->
    <title>Gramathu Design | Bridal & Aari Work Blouse Designer</title>
    <meta name="description" content="Discover Gramathu Design in Sivagiri, Tamil Nadu. Exquisite bespoke bridal blouse stitching, stone work, Maggam work, and beautiful custom hand Aari embroidery.">
    <meta name="keywords" content="Gramathu Design, Aari Work Blouse, Bridal Blouse Stitching, Embroidery Designer Sivagiri, Wedding Blouse, Maggam Work Blouse">
    <meta name="author" content="Gramathu Design">
    
    <!-- Boutique Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 for Premium Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Google Fonts for Elegant Headings and Clean Body Text -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS Library for Scrolling Animations -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <!-- Custom Style System Sheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-bs-spy="scroll" data-bs-target="#mainNavbar" data-bs-offset="100">

    <!-- Scroll Progress Indicator -->
    <div id="scrollProgress"></div>

    <!-- Floating Gold Particles Container -->
    <div id="particles-container"></div>

    <!-- Fixed Premium Navigation Bar -->
    <nav class="navbar navbar-expand-xl navbar-dark navbar-premium fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand navbar-brand-premium" href="#home" id="brandLogo">
                <img src="assets/images/favicon.png" alt="Gramathu Design Logo" class="brand-logo-img">
                GRAMATHU <span class="brand-gold">DESIGN</span>
            </a>
            
            <button class="navbar-toggler navbar-toggler-premium" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-premium active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-premium" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-premium" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-premium" href="#why-choose-us">Why Choose Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-premium" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-premium" href="#testimonials">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-premium" href="#contact">Contact</a>
                    </li>
                </ul>
                <div class="ms-xl-3 d-flex align-items-center">
                    <a href="https://whatsapp.com/channel/0029VbDFeYJ30LKIkbZJhx0k" target="_blank" class="btn btn-gold py-2 px-4 btn-pulse" id="navCta">
                        <i class="fa-solid fa-calendar-check me-2"></i>Book Design
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="home" class="hero-section">
        <div class="hero-bg-overlay"></div>
        <!-- Floating Mandala Pattern -->
        <div class="bg-decorative-pattern pattern-hero"></div>
        
        <div class="container hero-content text-left">
            <div class="row justify-content-left">
                <div class="col-lg-10 col-xl-9">
                    <!-- Elegant Corner Ornaments framing Hero area -->
                    <div class="hero-ornament-wrapper" data-aos="zoom-in" data-aos-duration="1200">
                        <div class="hero-star-glyph"><i class="fa-solid fa-sparkles"></i></div>
                        <h1 class="hero-title" data-aos="fade-up" data-aos-delay="200">
                            Gramathu Design
                        </h1>
                        
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="400">
                            Elegance Stitched with Love,<br>
                            Adorned with Aari Magic,<br>
                            Only at Gramathu Design.
                        </p>
                        
                        <div class="hero-buttons d-flex justify-content-left gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="600">
                            <a href="https://whatsapp.com/channel/0029VbDFeYJ30LKIkbZJhx0k" target="_blank" class="btn btn-gold btn-lg btn-sweep btn-pulse">
                                <i class="fa-brands fa-whatsapp me-2"></i>Book Your Design
                            </a>
                            <a href="#contact" class="btn btn-outline-white btn-lg btn-sweep">
                                <i class="fa-solid fa-envelope me-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="about-section">
        <div class="bg-decorative-pattern pattern-1"></div>
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-image-wrapper">
                        <!-- Custom Corner Frames -->
                        <div class="corner-ornament ornament-top-left"></div>
                        <div class="corner-ornament ornament-bottom-right"></div>
                        <img src="assets/images/user_design_2.jpg" alt="South Indian Bridal Blouse embroidery detailing" class="about-img shadow-lg">
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="about-text">
                        <span class="about-title-small d-block">✦ About Section</span>
                        <h2 class="mt-2 mb-3" style="font-size: 42px; line-height: 1.25; font-family: var(--font-heading); color: var(--maroon-dark);">Handcrafted Bridal<br>Elegance Since 2023</h2>
                        <p class="about-lead" style="font-size: 20px; line-height: 1.4; color: var(--maroon-primary); font-family: var(--font-heading); font-style: italic; margin-bottom: 22px;">Bespoke Bridal Design Stitching & Aari Embroidery Studio</p>
                        <div class="section-divider mb-4" style="width: 80px; height: 3px; background: var(--gold-primary); border-radius: 2px;"></div>
                        <p>Welcome to <strong>Gramathu Design</strong>, where custom sewing traditions meet modern luxury. Based in Sivagiri, Tamil Nadu, we specialize in high-end women's designer blouses with a special focus on bridal wear and festive collections.</p>
                        <p>Our pride lies in our exquisite, hand-crafted Aari and Maggam embroidery. Every bead, stone, and gold thread is hand-selected and stitched onto premium silk and velvet backdrops by skilled local artisans, ensuring a unique masterpiece that speaks to your personality.</p>
                        
                        <div class="about-features row g-3 mt-4">
                            <div class="col-sm-6">
                                <div class="about-feature-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Premium Custom Tailoring</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="about-feature-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Authentic Hand Aari Work</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="about-feature-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Bridal Styling Consultation</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="about-feature-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Perfect Fitted Finishing</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section id="services" class="section-dark">
        <!-- Floating Mandala Pattern -->
        <div class="bg-decorative-pattern pattern-services"></div>
        
        <div class="container">
            <div class="section-header text-center">
                <span class="text-gold fw-bold tracking-wide uppercase small-title d-block mb-2">✦ Our Expertise</span>
                <h2 data-aos="fade-up">Our Premium Services</h2>
                <p data-aos="fade-up" data-aos-delay="200">From bridal back cuts to delicate sleeve highlights, we customize every pixel of your styling.</p>
            </div>
            
            <div class="row g-4">
                <!-- Service 1: Bridal Blouse Stitching -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="service-content">
                            <div class="service-icon">
                                <i class="fa-solid fa-crown"></i>
                            </div>
                            <h3>Bridal Customization</h3>
                            <p>Luxurious bridal blouses custom-tailored using heavy gold threads, gemstones, and unique patterns that coordinate with your wedding silk saree.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Service 2: Aari Embroidery -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="service-content">
                            <div class="service-icon">
                                <i class="fa-solid fa-wand-magic-sparkles"></i>
                            </div>
                            <h3>Aari Embroidery</h3>
                            <p>Intricate needlework loops made manually by master craftsmen, including flowers, birds, creepers, and geometric neck board outlines.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Service 3: Maggam & Zardozi -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card">
                        <div class="service-content">
                            <div class="service-icon">
                                <i class="fa-solid fa-gem"></i>
                            </div>
                            <h3>Maggam & Zardozi</h3>
                            <p>Heavy traditional copper and metallic wire embroideries paired with pearls, stones, and glass work for rich wedding receptions.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Service 4: Designer Lehengas -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card">
                        <div class="service-content">
                            <div class="service-icon">
                                <i class="fa-solid fa-scissors"></i>
                            </div>
                            <h3>Festive Collections</h3>
                            <p>Tailored lehenga blouses, designer crop tops, and grand cholis featuring elegant cutouts and back strings for festive celebrations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US SECTION -->
    <section id="why-choose-us" class="why-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="text-gold fw-bold tracking-wide uppercase small-title d-block mb-2">✦ Why Gramathu Design</span>
                <h2 data-aos="fade-up">Our Design Philosophy</h2>
                <p data-aos="fade-up" data-aos-delay="200">Why hundreds of brides trust us with their wedding wardrobe stitchings.</p>
            </div>
            
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fa-solid fa-percent"></i>
                        </div>
                        <h3>100% Handcrafted</h3>
                        <p>No machinery duplicates. Every bead, stone, and thread is sewn by hand by seasoned craftsmen with decades of Aari and Maggam embroidery experience.</p>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <h3>Bespoke Artistry</h3>
                        <p>Tailored strictly to your measurements. We draft individual sketches of the patterns on fabric before starting execution for unmatched accuracy.</p>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fa-solid fa-gem"></i>
                        </div>
                        <h3>Bridal Specialists</h3>
                        <p>Specialized bridal consultation. We analyze your saree texture, colors, and jewelry styling to recommend neck cut-outs and sleeve lengths that elevate your bridal look.</p>
                    </div>
                </div>
                <!-- Feature 4 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fa-solid fa-ruler-combined"></i>
                        </div>
                        <h3>Perfect Fit Guarantee</h3>
                        <p>We prioritize correct measurement techniques and trial adjustments. If a design needs weaks, our post-stitching service guarantees a custom fit for you.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section id="gallery" class="gallery-section">
        <div class="bg-decorative-pattern pattern-2"></div>
        <div class="container">
            <div class="section-header text-center">
                <span class="text-gold fw-bold tracking-wide uppercase small-title d-block mb-2">✦ Portfolio</span>
                <h2 data-aos="fade-up">Our Elegant Showcase</h2>
                <p data-aos="fade-up" data-aos-delay="200">Take a visual tour of our finest bespoke creations and intricate embroidery designs.</p>
            </div>

            <!-- Interactive Category Filters -->
            <div class="gallery-filters text-center mb-5" data-aos="fade-up" data-aos-delay="300">
                <button class="btn gallery-filter-btn active" data-filter="all">All Designs</button>
                <button class="btn gallery-filter-btn" data-filter="bridal">Bridal Wear</button>
                <button class="btn gallery-filter-btn" data-filter="aari">Aari Embroidery</button>
                <button class="btn gallery-filter-btn" data-filter="maggam">Maggam & Zardozi</button>
                <button class="btn gallery-filter-btn" data-filter="festive">Festive Special</button>
            </div>
            
            <div class="gallery-grid">
                <?php
                // Fetch active items from the database
                try {
                    $gal_stmt = $pdo->query("SELECT * FROM gallery WHERE status = 1 ORDER BY created_at DESC");
                    $gallery_items = $gal_stmt->fetchAll();
                } catch (PDOException $e) {
                    $gallery_items = [];
                }

                if (!empty($gallery_items)):
                    $index = 0;
                    foreach ($gallery_items as $item):
                        $title_lower = strtolower($item['title']);
                        $desc_lower = strtolower($item['description']);
                        
                        $cats = ['all'];
                        $badge_name = 'Aari Work'; // Default fallback badge name
                        
                        if (strpos($title_lower, 'bridal') !== false || strpos($title_lower, 'wedding') !== false || strpos($title_lower, 'marriage') !== false || strpos($desc_lower, 'bridal') !== false || strpos($desc_lower, 'wedding') !== false || strpos($desc_lower, 'marriage') !== false) {
                            $cats[] = 'bridal';
                            $badge_name = 'Bridal Wear';
                        }
                        if (strpos($title_lower, 'aari') !== false || strpos($desc_lower, 'aari') !== false || strpos($title_lower, 'embroidery') !== false || strpos($desc_lower, 'embroidery') !== false) {
                            $cats[] = 'aari';
                            if ($badge_name === 'Aari Work') {
                                $badge_name = 'Aari Work';
                            }
                        }
                        if (strpos($title_lower, 'maggam') !== false || strpos($title_lower, 'zardozi') !== false || strpos($desc_lower, 'maggam') !== false || strpos($desc_lower, 'zardozi') !== false) {
                            $cats[] = 'maggam';
                            $badge_name = 'Maggam & Zardozi';
                        }
                        if (strpos($title_lower, 'festive') !== false || strpos($title_lower, 'lehenga') !== false || strpos($desc_lower, 'festive') !== false || strpos($desc_lower, 'lehenga') !== false || strpos($title_lower, 'crop') !== false || strpos($title_lower, 'saree') !== false) {
                            $cats[] = 'festive';
                            $badge_name = 'Festive Special';
                        }
                        
                        // Fallback if no specific category matches
                        if (count($cats) === 1) {
                            $cats[] = 'aari';
                        }
                        
                        $cat_classes = implode(' ', array_map(function($c) { return 'cat-' . $c; }, $cats));
                        $delay = (($index % 4) + 1) * 100;
                        $index++;
                ?>
                        <div class="gallery-item <?php echo $cat_classes; ?>" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <img src="uploads/gallery/<?php echo htmlspecialchars($item['image_name']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" loading="lazy">
                            <span class="gallery-badge"><?php echo htmlspecialchars($badge_name); ?></span>
                            <div class="gallery-hover-overlay">
                                <span class="overlay-badge"><?php echo htmlspecialchars($badge_name); ?></span>
                                <h4><?php echo htmlspecialchars($item['title']); ?></h4>
                                <p><?php echo htmlspecialchars($item['description']); ?></p>
                                <div class="gallery-btn-zoom">
                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                </div>
                            </div>
                        </div>
                <?php 
                    endforeach;
                else: 
                ?>
                    <!-- Empty State Fallback -->
                    <div class="col-12 text-center py-5 text-warning w-100" style="grid-column: 1 / -1;">
                        <p class="fs-5 mb-0 text-muted">
                            <i class="fa-solid fa-image fa-2x d-block mb-3 text-warning"></i>
                            No Gallery Images Available.
                        </p>
                    </div>
                <?php 
                endif; 
                ?>
            </div>
        </div>
    </section>

    <!-- PREMIUM LUXURY LIGHTBOX MODAL -->
    <div class="luxury-lightbox" id="luxuryLightbox">
        <div class="lightbox-backdrop"></div>
        
        <!-- Top controls bar -->
        <div class="lightbox-top-bar">
            <div class="lightbox-counter" id="lightboxCounter">1 / 12</div>
            <button class="lightbox-close-btn" id="luxuryLightboxClose" aria-label="Close gallery">&times;</button>
        </div>

        <div class="lightbox-main-wrapper">
            <!-- Left Pane: Image area -->
            <div class="lightbox-image-pane">
                <!-- Navigation Arrows -->
                <button class="lightbox-arrow arrow-left" id="lightboxPrev" aria-label="Previous image">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                
                <div class="lightbox-img-viewport" id="lightboxImgViewport">
                    <img src="" alt="Premium Design Showcase" id="lightboxMainImg" class="lightbox-img">
                </div>
                
                <button class="lightbox-arrow arrow-right" id="lightboxNext" aria-label="Next image">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>

            <!-- Right Pane: Details area -->
            <div class="lightbox-details-pane">
                <div class="details-content">
                    <span class="details-badge" id="lightboxDetailBadge">Bridal Wear</span>
                    <h3 class="details-title" id="lightboxDetailTitle">Red Silk Bridal Blouse</h3>
                    
                    <div class="details-divider">
                        <svg viewBox="0 0 100 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 5 H40 L45 2 L50 8 L55 2 L60 5 H100" stroke="var(--gold-primary)" stroke-width="0.8" fill="none"/>
                        </svg>
                    </div>
                    
                    <p class="details-desc" id="lightboxDetailDesc">
                        Exquisite hand-stitched bridal blouse featuring premium Aari embroidery, zardozi needlework, and beautiful gold stone embellishments.
                    </p>
                </div>
                
                <!-- Action Buttons inside details pane -->
                <div class="details-actions">
                    <!-- <a href="tel:6369468700" class="btn-action btn-action-phone">
                        <i class="fa-solid fa-phone"></i> <span>Call Now</span>
                    </a> -->
                    <a href="https://wa.me/916369468700?text=I%27m%20interested%20in%20one%20of%20your%20gallery%20designs!" target="_blank" class="btn-action btn-action-wa">
                        <i class="fa-brands fa-whatsapp"></i> <span>WhatsApp</span>
                    </a>
                    <a href="#contact" class="btn-action btn-action-visit" id="lightboxVisitStore">
                        <i class="fa-solid fa-location-dot"></i> <span>Visit Our Store</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom: Related Gallery Thumbnails -->
        <div class="lightbox-thumbnails-wrapper">
            <div class="lightbox-thumbnails" id="lightboxThumbnailsTrack">
                <!-- Thumbnail items will be dynamically injected by JS -->
            </div>
        </div>
    </div>

    <!-- TESTIMONIAL SECTION -->
    <section id="testimonials" class="reviews-section">
        <!-- Floating Floral and Embroidery Motifs -->
        <div class="luxury-decorations">
            <div class="decor-motif motif-top-left" data-aos="fade-down-right">
                <svg viewBox="0 0 100 100" fill="none" stroke="currentColor">
                    <path d="M50 10 C50 10, 40 35, 10 50 C40 65, 50 90, 50 90 C50 90, 60 65, 90 50 C60 35, 50 10, 50 10 Z" stroke-width="1"/>
                    <circle cx="50" cy="50" r="12" stroke-width="1"/>
                    <path d="M50 0 V100 M0 50 H100" stroke-width="0.5" stroke-dasharray="2 2"/>
                </svg>
            </div>
            <div class="decor-motif motif-bottom-right" data-aos="fade-up-left">
                <svg viewBox="0 0 100 100" fill="none" stroke="currentColor">
                    <path d="M50 10 C50 10, 40 35, 10 50 C40 65, 50 90, 50 90 C50 90, 60 65, 90 50 C60 35, 50 10, 50 10 Z" stroke-width="1"/>
                    <circle cx="50" cy="50" r="12" stroke-width="1"/>
                    <path d="M50 0 V100 M0 50 H100" stroke-width="0.5" stroke-dasharray="2 2"/>
                </svg>
            </div>
            <!-- Sparkles -->
            <div class="sparkle sparkle-1">✦</div>
            <div class="sparkle sparkle-2">✦</div>
            <div class="sparkle sparkle-3">✦</div>
            <div class="sparkle sparkle-4">✦</div>
        </div>

        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <div class="reviews-badge-wrapper mb-3">
                    <span class="reviews-badge">
                        <i class="fa-solid fa-star gold-star animate-pulse"></i> Creating Beautiful Blouse Designs for Every Occasion
                    </span>
                </div>
                <h2 class="reviews-title mt-2">Every Stitch Tells a Beautiful Story</h2>
                <div class="luxury-divider mb-4">
                    <div class="divider-line"></div>
                    <div class="divider-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C12 2 9 8 3 12C9 16 12 22 12 22C12 22 15 16 21 12C15 8 12 2 12 2Z" stroke="var(--gold-primary)" stroke-width="1.5" fill="none"/>
                            <circle cx="12" cy="12" r="3" fill="var(--gold-primary)"/>
                        </svg>
                    </div>
                    <div class="divider-line"></div>
                </div>
                <p class="reviews-subtitle mx-auto">
                    Discover why brides and fashion lovers trust Gramathu Design for elegant blouse stitching, handcrafted Aari embroidery, and exceptional customer service.
                </p>
                
                <!-- Average Rating Block -->
                <!-- <div class="rating-summary-box mt-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="rating-stars mb-1">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h3 class="rating-value mb-0">4.9 <span>Average Rating</span></h3>
                    <p class="rating-count mb-0">Based on 250+ Happy Customers</p>
                </div> -->
            </div>

            <!-- Testimonial Carousel -->
            <div class="reviews-carousel-wrapper mt-5" data-aos="fade-up" data-aos-delay="200">
                <div class="carousel-container">
                    <div class="carousel-track">
                        <!-- Review Card 1 -->
                        <div class="carousel-slide">
                            <div class="review-card">
                                <div class="card-glass-glow"></div>
                                <i class="fa-solid fa-quote-right quote-icon"></i>
                                <div class="review-header">
                                    <div class="client-avatar-wrapper">
                                        <img src="assets/images/customer_priya.png" alt="Priya Raman" class="client-img">
                                        <div class="verified-badge">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                    </div>
                                    <div class="client-meta">
                                        <h4 class="client-name">Priya Raman</h4>
                                        <p class="client-loc">Chennai • Verified Bride</p>
                                        <div class="card-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <p class="review-text">"Gramathu Design stitched my bridal blouse with the most intricate gold Aari work. The fit was absolutely perfect, and the customer service was exceptional!"</p>
                                </div>
                                <div class="review-footer">
                                    <span class="review-date"><i class="fa-regular fa-calendar me-1"></i> June 15, 2026</span>
                                </div>
                            </div>
                        </div>

                        <!-- Review Card 2 -->
                        <div class="carousel-slide">
                            <div class="review-card">
                                <div class="card-glass-glow"></div>
                                <i class="fa-solid fa-quote-right quote-icon"></i>
                                <div class="review-header">
                                    <div class="client-avatar-wrapper">
                                        <img src="assets/images/customer_divya.png" alt="Divya Krishnan" class="client-img">
                                        <div class="verified-badge">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                    </div>
                                    <div class="client-meta">
                                        <h4 class="client-name">Divya Krishnan</h4>
                                        <p class="client-loc">Coimbatore • Bridal Client</p>
                                        <div class="card-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <p class="review-text">"I am amazed by the attention to detail. The peacock motif on my silk saree blouse was hand-embroidered to perfection. Truly premium craftsmanship!"</p>
                                </div>
                                <div class="review-footer">
                                    <span class="review-date"><i class="fa-regular fa-calendar me-1"></i> May 28, 2026</span>
                                </div>
                            </div>
                        </div>

                        <!-- Review Card 3 -->
                        <div class="carousel-slide">
                            <div class="review-card">
                                <div class="card-glass-glow"></div>
                                <i class="fa-solid fa-quote-right quote-icon"></i>
                                <div class="review-header">
                                    <div class="client-avatar-wrapper">
                                        <img src="assets/images/customer_priya.png" alt="Karthika Devi" class="client-img">
                                        <div class="verified-badge">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                    </div>
                                    <div class="client-meta">
                                        <h4 class="client-name">Karthika Devi</h4>
                                        <p class="client-loc">Sivagiri • Verified Bride</p>
                                        <div class="card-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <p class="review-text">"The stitching quality is outstanding. My bridal blouse looked absolutely beautiful. The gold work matched my wedding saree perfectly!"</p>
                                </div>
                                <div class="review-footer">
                                    <span class="review-date"><i class="fa-regular fa-calendar me-1"></i> April 12, 2026</span>
                                </div>
                            </div>
                        </div>

                        <!-- Review Card 4 -->
                        <div class="carousel-slide">
                            <div class="review-card">
                                <div class="card-glass-glow"></div>
                                <i class="fa-solid fa-quote-right quote-icon"></i>
                                <div class="review-header">
                                    <div class="client-avatar-wrapper">
                                        <img src="assets/images/customer_divya.png" alt="Ragavi Priya" class="client-img">
                                        <div class="verified-badge">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                    </div>
                                    <div class="client-meta">
                                        <h4 class="client-name">Ragavi Priya</h4>
                                        <p class="client-loc">Sivagiri • Festive Client</p>
                                        <div class="card-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <p class="review-text">"Perfect fitting and amazing Aari work. I got so many compliments on Pongal for the custom design they made. Thank you so much!"</p>
                                </div>
                                <div class="review-footer">
                                    <span class="review-date"><i class="fa-regular fa-calendar me-1"></i> January 18, 2026</span>
                                </div>
                            </div>
                        </div>

                        <!-- Review Card 5 -->
                        <div class="carousel-slide">
                            <div class="review-card">
                                <div class="card-glass-glow"></div>
                                <i class="fa-solid fa-quote-right quote-icon"></i>
                                <div class="review-header">
                                    <div class="client-avatar-wrapper">
                                        <img src="assets/images/customer_priya.png" alt="Aishwarya Anand" class="client-img">
                                        <div class="verified-badge">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                    </div>
                                    <div class="client-meta">
                                        <h4 class="client-name">Aishwarya Anand</h4>
                                        <p class="client-loc">Madurai • Bridal Client</p>
                                        <div class="card-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <p class="review-text">"Highly recommended for bridal and festive collections. Their attention to detail on sleeve Aari embroidery is next level!"</p>
                                </div>
                                <div class="review-footer">
                                    <span class="review-date"><i class="fa-regular fa-calendar me-1"></i> March 5, 2026</span>
                                </div>
                            </div>
                        </div>

                        <!-- Review Card 6 -->
                        <div class="carousel-slide">
                            <div class="review-card">
                                <div class="card-glass-glow"></div>
                                <i class="fa-solid fa-quote-right quote-icon"></i>
                                <div class="review-header">
                                    <div class="client-avatar-wrapper">
                                        <img src="assets/images/customer_divya.png" alt="Meera Nair" class="client-img">
                                        <div class="verified-badge">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                    </div>
                                    <div class="client-meta">
                                        <h4 class="client-name">Meera Nair</h4>
                                        <p class="client-loc">Bangalore • Verified Customer</p>
                                        <div class="card-stars">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <p class="review-text">"The rose gold stone work on my reception blouse was a showstopper. They understood exactly what I wanted and delivered it ahead of schedule!"</p>
                                </div>
                                <div class="review-footer">
                                    <span class="review-date"><i class="fa-regular fa-calendar me-1"></i> June 30, 2026</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-nav-btn prev-btn" aria-label="Previous review">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="carousel-nav-btn next-btn" aria-label="Next review">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

                <!-- Carousel Indicators -->
                <div class="carousel-dots-container"></div>
            </div>

            <!-- TRUST SECTION (STATISTICS) -->
            <!-- <div class="trust-stats-section mt-5 pt-4">
                <div class="row g-4 justify-content-center">
                    <!-- Stat Card 1 --
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="stat-card">
                            <div class="stat-icon-wrapper">
                                <i class="fa-solid fa-users-line"></i>
                            </div>
                            <h3 class="stat-value"><span class="counter-num" data-target="250">0</span>+</h3>
                            <p class="stat-label">Happy Customers</p>
                        </div>
                    </div>
                    <!-- Stat Card 2 --
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="stat-card">
                            <div class="stat-icon-wrapper">
                                <i class="fa-solid fa-scissors"></i>
                            </div>
                            <h3 class="stat-value"><span class="counter-num" data-target="500">0</span>+</h3>
                            <p class="stat-label">Designer Blouses Stitched</p>
                        </div>
                    </div>
                    <!-- Stat Card 3 --
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="stat-card">
                            <div class="stat-icon-wrapper">
                                <i class="fa-solid fa-gem"></i>
                            </div>
                            <h3 class="stat-value"><span class="counter-num" data-target="150">0</span>+</h3>
                            <p class="stat-label">Bridal Collections</p>
                        </div>
                    </div>
                    <!-- Stat Card 4 --
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
                        <div class="stat-card">
                            <div class="stat-icon-wrapper">
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <h3 class="stat-value"><span class="counter-num" data-target="5">0</span>+</h3>
                            <p class="stat-label">Years of Craftsmanship</p>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- BOTTOM CALL TO ACTION -->
            <div class="reviews-cta-banner mt-5" data-aos="zoom-in">
                <div class="cta-banner-pattern"></div>
                <div class="row align-items-center justify-content-between p-4 p-md-5 relative-content">
                    <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0">
                        <h3 class="cta-heading mb-3">Your Dream Blouse Starts Here</h3>
                        <p class="cta-desc mb-0">Let Gramathu Design create a masterpiece designed exclusively for your special occasion.</p>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="cta-actions">
                            <a href="https://whatsapp.com/channel/0029VbDFeYJ30LKIkbZJhx0k" target="_blank" class="btn btn-gold py-3 px-4 btn-pulse me-md-2 mb-2 mb-md-0">
                                <i class="fa-solid fa-calendar-check me-2"></i>Book Your Design
                            </a>
                            <a href="#contact" class="btn btn-outline-white py-3 px-4 mb-2 mb-md-0">
                                <i class="fa-solid fa-envelope me-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="contact-section">
        <div class="bg-decorative-pattern pattern-3"></div>
        <div class="container">
            <div class="section-header">
                <h2 data-aos="fade-up">Get In Touch</h2>
                <p data-aos="fade-up" data-aos-delay="200">Let us stitch your dream blouse. Contact us today or visit our boutique.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <h3 class="mb-4">Contact Gramathu Design</h3>
                    
                    <!-- Phone Card -->
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Call Us</h4>
                            <p><a href="tel:6369468700" class="text-muted">6369468700</a></p>
                        </div>
                    </div>
                    
                    <!-- Email Card -->
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Email Us</h4>
                            <p><a href="mailto:ksragavarthini@gmail.com" class="text-muted">ksragavarthini@gmail.com</a></p>
                        </div>
                    </div>
                    
                    <!-- Location Card -->
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Boutique Location</h4>
                            <p class="text-muted">Sivagiri, Tamil Nadu, India</p>
                        </div>
                    </div>
                    
                    <!-- WhatsApp Chat Button -->
                    <div class="mt-4">
                        <a href="https://whatsapp.com/channel/0029VbDFeYJ30LKIkbZJhx0k" target="_blank" class="btn btn-whatsapp btn-lg" id="whatsappChatBtn">
                            <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="map-container">
                        <!-- Embedded Google Maps centering on Sivagiri -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3913.6267866380674!2d77.78918231535787!3d11.122606555122176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba968853b0e352b%3A0xe543efee4b3faeb4!2sSivagiri%2C%20Tamil%20Nadu%20638109!5e0!3m2!1sen!2sin!4v1680000000000!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="footer-brand">Gramathu Design</div>
                    <p class="mb-4">Elegance stitched with love. High-quality boutique crafting fine designer blouses, bridal collections, and exquisite hand Aari embroidery.</p>
                    <div class="footer-socials">
                        <a href="https://www.instagram.com/gramathu_design?igsh=eWRmbWp3MXdpbjl6" target="_blank" class="social-icon-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://facebook.com" target="_blank" class="social-icon-btn" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://whatsapp.com/channel/0029VbDFeYJ30LKIkbZJhx0k" target="_blank" class="social-icon-btn" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 offset-lg-1">
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#services">Our Services</a></li>
                        <li><a href="#gallery">Design Showcase</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h4 class="footer-title">Boutique Details</h4>
                    <ul class="footer-links text-white-50">
                        <li class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-location-dot text-white"></i> Sivagiri, Tamil Nadu
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-phone text-white"></i> 6369468700
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-envelope text-white"></i> ksragavarthini@gmail.com
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="mb-0">&copy; 2026 Gramathu Design. All Rights Reserved. Crafted with love & premium quality.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to Top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Bootstrap 5 Bundle JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Library JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
    <!-- Custom Script -->
    <script src="js/script.js"></script>
</body>
</html>
