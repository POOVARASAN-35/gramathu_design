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
                        <h2 class="mt-2 mb-3" style="font-size: 42px; line-height: 1.25; font-family: var(--font-heading); color: var(--maroon-dark);">Handcrafted Bridal<br>Elegance Since 2018</h2>
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
                        <p>We prioritize correct measurement techniques and trial adjustments. If a design needs tweaks, our post-stitching service guarantees a custom fit for you.</p>
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

    <!-- LIGHTBOX MODAL -->
    <div class="lightbox-modal" id="lightboxModal">
        <div class="lightbox-content">
            <span class="lightbox-close" id="lightboxClose">&times;</span>
            <img src="" alt="Enlarged Blouse Design" id="lightboxImg">
            <div class="lightbox-caption" id="lightboxCaption"></div>
        </div>
    </div>

    <!-- TESTIMONIAL SECTION -->
    <section id="testimonials" class="section-dark">
        <div class="container">
            <div class="section-header">
                <h2 data-aos="fade-up">Client Reviews</h2>
                <p data-aos="fade-up" data-aos-delay="200">Hear what our beautiful brides and festive clients say about our fit and design.</p>
            </div>
            
            <div class="row g-4">
                <!-- Testimonial 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <i class="fa-solid fa-quote-right quote-icon"></i>
                        <div>
                            <div class="stars-wrapper">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="testimonial-text">"The stitching quality is outstanding. My bridal blouse looked absolutely beautiful. The gold work matched my wedding saree perfectly!"</p>
                        </div>
                        <div class="client-info">
                            <div class="client-avatar">K</div>
                            <div class="client-details">
                                <h4>Karthika Devi</h4>
                                <p>Sivagiri bride</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <i class="fa-solid fa-quote-right quote-icon"></i>
                        <div>
                            <div class="stars-wrapper">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="testimonial-text">"Perfect fitting and amazing Aari work. I got so many compliments on Pongal for the custom design they made. Thank you so much!"</p>
                        </div>
                        <div class="client-info">
                            <div class="client-avatar">R</div>
                            <div class="client-details">
                                <h4>Ragavi Priya</h4>
                                <p>Festive Wear Client</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <i class="fa-solid fa-quote-right quote-icon"></i>
                        <div>
                            <div class="stars-wrapper">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="testimonial-text">"Highly recommended for bridal and festive collections. Their attention to detail on sleeve Aari embroidery is next level!"</p>
                        </div>
                        <div class="client-info">
                            <div class="client-avatar">A</div>
                            <div class="client-details">
                                <h4>Aishwarya Anand</h4>
                                <p>Bridal Client</p>
                            </div>
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
