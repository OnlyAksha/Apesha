<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apeksha | Premium Content Creator</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #ff4d8d;
      --primary-dark: #e63975;
      --secondary: #9c27b0;
      --dark: #121212;
      --darker: #0a0a0a;
      --light: #f8f8f8;
      --gray: #888;
      --glass: rgba(255, 255, 255, 0.05);
      --glass-border: rgba(255, 255, 255, 0.1);
      --shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--darker);
      color: var(--light);
      line-height: 1.6;
      overflow-x: hidden;
      scroll-behavior: smooth;
    }

    h1, h2, h3 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      line-height: 1.2;
    }

    a {
      color: inherit;
      text-decoration: none;
      transition: var(--transition);
    }

    img {
      max-width: 100%;
      display: block;
    }

    .container {
      width: 100%;
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    .btn {
      display: inline-block;
      padding: 1rem 2.5rem;
      border-radius: 50px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      cursor: pointer;
      transition: var(--transition);
      border: none;
    }

    .btn-primary {
      background: linear-gradient(45deg, var(--primary), var(--secondary));
      color: white;
      box-shadow: var(--shadow);
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(255, 77, 141, 0.4);
    }

    .section {
      padding: 6rem 0;
      position: relative;
    }

    .section-title {
      font-size: 3rem;
      margin-bottom: 3rem;
      text-align: center;
      position: relative;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      border-radius: 2px;
    }

    /* Header */
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      padding: 1.5rem 0;
      transition: var(--transition);
    }

    header.scrolled {
      background-color: rgba(10, 10, 10, 0.95);
      backdrop-filter: blur(10px);
      padding: 1rem 0;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    }

    .header-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--primary);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .logo-icon {
      color: var(--secondary);
    }

    .nav-links {
      display: flex;
      gap: 2rem;
    }

    .nav-link {
      position: relative;
      font-weight: 600;
      font-size: 1rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--primary);
      transition: var(--transition);
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
    }

    /* Hero Section */
    .hero {
      height: 100vh;
      min-height: 800px;
      display: flex;
      align-items: center;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, rgba(18, 18, 18, 0.9), rgba(156, 39, 176, 0.3));
      z-index: 1;
    }

    .hero-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 800px;
    }

    .hero-title {
      font-size: 5rem;
      margin-bottom: 1.5rem;
      line-height: 1.1;
      text-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    }

    .hero-subtitle {
      font-size: 1.5rem;
      margin-bottom: 2.5rem;
      opacity: 0.9;
    }

    .hero-cta {
      display: flex;
      gap: 1.5rem;
      margin-top: 3rem;
    }

    .btn-secondary {
      background: transparent;
      color: white;
      border: 2px solid var(--light);
    }

    .btn-secondary:hover {
      background: var(--light);
      color: var(--dark);
    }

    .social-proof {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-top: 3rem;
    }

    .social-proof-images {
      display: flex;
    }

    .social-proof-img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border: 2px solid var(--darker);
      margin-left: -15px;
    }

    .social-proof-img:first-child {
      margin-left: 0;
    }

    .social-proof-text {
      font-size: 0.9rem;
    }

    .social-proof-text strong {
      color: var(--primary);
    }

    /* About Section */
    .about {
      background-color: var(--dark);
    }

    .about-container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
      align-items: center;
    }

    .about-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: var(--shadow);
      position: relative;
    }

    .about-img::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, rgba(255, 77, 141, 0.3), rgba(156, 39, 176, 0.3));
    }

    .about-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .about-content h2 {
      font-size: 2.5rem;
      margin-bottom: 1.5rem;
      text-align: left;
    }

    .about-content h2::after {
      left: 0;
      transform: none;
    }

    .about-content p {
      margin-bottom: 1.5rem;
      font-size: 1.1rem;
    }

    .stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
      margin-top: 2rem;
    }

    .stat-item {
      background: var(--glass);
      border: 1px solid var(--glass-border);
      backdrop-filter: blur(10px);
      padding: 1.5rem;
      border-radius: 10px;
      text-align: center;
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 0.5rem;
    }

    .stat-label {
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      opacity: 0.8;
    }

    /* Gallery Section */
    .gallery {
      background-color: var(--darker);
    }

    .gallery-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1.5rem;
    }

    .gallery-item {
      position: relative;
      border-radius: 15px;
      overflow: hidden;
      aspect-ratio: 3/4;
      transition: var(--transition);
    }

    .gallery-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .gallery-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: var(--transition);
    }

    .gallery-item:hover .gallery-img {
      transform: scale(1.1);
    }

    .gallery-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 1.5rem;
      background: linear-gradient(0deg, rgba(0, 0, 0, 0.8), transparent);
      opacity: 0;
      transition: var(--transition);
    }

    .gallery-item:hover .gallery-overlay {
      opacity: 1;
    }

    .gallery-title {
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
    }

    .gallery-category {
      font-size: 0.9rem;
      color: var(--primary);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    /* Pricing Section */
    .pricing {
      background-color: var(--dark);
    }

    .pricing-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2rem;
    }

    .pricing-card {
      background: var(--glass);
      border: 1px solid var(--glass-border);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 2.5rem;
      text-align: center;
      transition: var(--transition);
    }

    .pricing-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    .pricing-card.popular {
      border: 1px solid var(--primary);
      position: relative;
    }

    .popular-badge {
      position: absolute;
      top: -15px;
      right: 20px;
      background: var(--primary);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .pricing-title {
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    .pricing-price {
      font-size: 3rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1.5rem;
    }

    .pricing-features {
      list-style: none;
      margin-bottom: 2rem;
    }

    .pricing-features li {
      padding: 0.7rem 0;
      border-bottom: 1px solid var(--glass-border);
    }

    .pricing-features li:last-child {
      border-bottom: none;
    }

    /* Testimonials */
    .testimonials .section-title {
      margin-bottom: 5rem;
    }

    .testimonials-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2rem;
    }

    .testimonial-card {
      background: var(--glass);
      border: 1px solid var(--glass-border);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 2rem;
      transition: var(--transition);
    }

    .testimonial-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .testimonial-text {
      font-style: italic;
      margin-bottom: 1.5rem;
      position: relative;
    }

    .testimonial-text::before {
      content: '"';
      font-size: 4rem;
      position: absolute;
      top: -20px;
      left: -15px;
      opacity: 0.1;
      font-family: serif;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .author-img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }

    .author-info h4 {
      font-size: 1.1rem;
      margin-bottom: 0.2rem;
    }

    .author-info p {
      font-size: 0.9rem;
      opacity: 0.7;
    }

    /* CTA Section */
    .cta {
      background: linear-gradient(45deg, var(--primary), var(--secondary));
      text-align: center;
      padding: 8rem 0;
    }

    .cta-title {
      font-size: 3.5rem;
      margin-bottom: 1.5rem;
      color: white;
    }

    .cta-subtitle {
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto 3rem;
      opacity: 0.9;
    }

    /* Footer */
    footer {
      background-color: var(--darker);
      padding: 5rem 0 2rem;
    }

    .footer-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 3rem;
      margin-bottom: 3rem;
    }

    .footer-col h3 {
      font-size: 1.3rem;
      margin-bottom: 1.5rem;
      position: relative;
      display: inline-block;
    }

    .footer-col h3::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 0;
      width: 40px;
      height: 3px;
      background: var(--primary);
    }

    .footer-links {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 0.8rem;
    }

    .footer-links a:hover {
      color: var(--primary);
      padding-left: 5px;
    }

    .social-links {
      display: flex;
      gap: 1rem;
      margin-top: 1.5rem;
    }

    .social-link {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: var(--glass);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
    }

    .social-link:hover {
      background: var(--primary);
      transform: translateY(-5px);
    }

    .copyright {
      text-align: center;
      padding-top: 2rem;
      border-top: 1px solid var(--glass-border);
      font-size: 0.9rem;
      opacity: 0.7;
    }

    /* Mobile Styles */
    @media (max-width: 992px) {
      .about-container,
      .pricing-container,
      .testimonials-container,
      .footer-container {
        grid-template-columns: 1fr;
      }

      .about-img {
        order: -1;
        max-width: 500px;
        margin: 0 auto;
      }

      .hero-title {
        font-size: 3.5rem;
      }

      .section-title {
        font-size: 2.5rem;
      }

      .cta-title {
        font-size: 2.5rem;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 0 1.5rem;
      }

      .nav-links {
        display: none;
      }

      .mobile-menu-btn {
        display: block;
      }

      .hero-title {
        font-size: 2.8rem;
      }

      .hero-subtitle {
        font-size: 1.2rem;
      }

      .hero-cta {
        flex-direction: column;
        gap: 1rem;
      }

      .section {
        padding: 4rem 0;
      }

      .section-title {
        font-size: 2rem;
      }

      .gallery-container {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header id="header">
    <div class="container header-container">
      <a href="#" class="logo">
        <span class="logo-icon">✧</span>
        <span>Apeksha</span>
      </a>
      <nav class="nav-links">
        <a href="#home" class="nav-link">Home</a>
        <a href="#about" class="nav-link">About</a>
        <a href="#gallery" class="nav-link">Gallery</a>
        <a href="#pricing" class="nav-link">Pricing</a>
        <a href="#contact" class="nav-link">Contact</a>
      </nav>
      <button class="mobile-menu-btn">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <img src="https://images.unsplash.com/photo-1604004555489-723a93d6ce74?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Séduxa posing elegantly" class="hero-bg">
    <div class="container">
      <div class="hero-content">
        <h1 class="hero-title">Unlock Exclusive Content</h1>
        <p class="hero-subtitle">Join my world for premium photoshoots, behind-the-scenes, and intimate moments you won't find anywhere else.</p>
        <div class="hero-cta">
          <a href="#pricing" class="btn btn-primary">Subscribe Now</a>
          <a href="#gallery" class="btn btn-secondary">View Gallery</a>
        </div>
        <div class="social-proof">
          <div class="social-proof-images">
            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Fan" class="social-proof-img">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Fan" class="social-proof-img">
            <img src="https://randomuser.me/api/portraits/women/90.jpg" alt="Fan" class="social-proof-img">
          </div>
          <div class="social-proof-text">
            Join <strong>95+</strong> fans
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="section about" id="about">
    <div class="container about-container">
      <div class="about-content">
        <h2 class="section-title">About Me</h2>
        <p>Hey there! I'm Apeksha, a passionate content creator specializing in artistic and sensual photography. My mission is to create a space where beauty, confidence, and self-expression come together.</p>
        <p>With a background in fine arts and fashion, I bring a unique perspective to my content, blending aesthetic appeal with authentic melding.</p>
        <div class="stats">
          <div class="stat-item">
            <div class="stat-number">95+</div>
            <div class="stat-label">Fans</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">355+</div>
            <div class="stat-label">Posts</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">100%</div>
            <div class="stat-label">Bliss</div>
          </div>
        </div>
      </div>
      <div class="about-img">
        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1020&q=80" alt="Séduxa portrait">
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="section gallery" id="gallery">
    <div class="container">
      <h2 class="section-title">Featured Content</h2>
      <div class="gallery-container">
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Séduxa photoshoot" class="gallery-img">
          <div class="gallery-overlay">
            <h3 class="gallery-title">Midnight Muse</h3>
            <p class="gallery-category">Boudoir</p>
          </div>
        </div>
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1549060279-7e168fcee0c2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Séduxa photoshoot" class="gallery-img">
          <div class="gallery-overlay">
            <h3 class="gallery-title">Golden Hour</h3>
            <p class="gallery-category">Outdoor</p>
          </div>
        </div>
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Séduxa photoshoot" class="gallery-img">
          <div class="gallery-overlay">
            <h3 class="gallery-title">Silk & Lace</h3>
            <p class="gallery-category">Lingerie</p>
          </div>
        </div>
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1534447677768-be436bb09401?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1194&q=80" alt="Séduxa photoshoot" class="gallery-img">
          <div class="gallery-overlay">
            <h3 class="gallery-title">Black & White</h3>
            <p class="gallery-category">Artistic</p>
          </div>
        </div>
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Séduxa photoshoot" class="gallery-img">
          <div class="gallery-overlay">
            <h3 class="gallery-title">Poolside</h3>
            <p class="gallery-category">Swimwear</p>
          </div>
        </div>
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Séduxa photoshoot" class="gallery-img">
          <div class="gallery-overlay">
            <h3 class="gallery-title">Bedroom Eyes</h3>
            <p class="gallery-category">Intimate</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section class="section pricing" id="pricing">
    <div class="container">
      <h2 class="section-title">Membership Plans</h2>
      <div class="pricing-container">
        <div class="pricing-card">
          <h3 class="pricing-title">Basic</h3>
          <div class="pricing-price">₹599<span>/month</span></div>
          <ul class="pricing-features">
            <li>Access to all public posts</li>
            <li>Weekly content updates</li>
            <li>Direct messaging</li>
            <li>Limited PPV content</li>
          </ul>
          <a href="./paydetail.php" class="btn btn-primary">Choose Plan</a>
        </div>
        <div class="pricing-card popular">
          <div class="popular-badge">Most Popular</div>
          <h3 class="pricing-title">Premium</h3>
          <div class="pricing-price">₹999<span>/month</span></div>
          <ul class="pricing-features">
            <li>All Basic benefits</li>
            <li>Daily exclusive content</li>
            <li>Full PPV access</li>
            <li>Custom content discounts</li>
            <li>Priority messaging</li>
          </ul>
          <a href="./paydetail1.php" class="btn btn-primary">Choose Plan</a>
        </div>
        <div class="pricing-card">
          <h3 class="pricing-title">VIP</h3>
          <div class="pricing-price">₹1999<span>/one time</span></div>
          <ul class="pricing-features">
            <li>All Premium benefits</li>
            <li>Exclusive VIP content</li>
            <li>Weekly custom content</li>
            <li>Video call opportunities</li>
            <li>Personalized experience</li>
          </ul>
          <a href="./paydetail2.php" class="btn btn-primary">Choose Plan</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="section testimonials">
    <div class="container">
      <h2 class="section-title">What My Fans Say</h2>
      <div class="testimonials-container">
        <div class="testimonial-card">
          <p class="testimonial-text">Apeksha content creators is absolutely stunning. The artistic quality combined with her authentic personality makes this subscription worth every penny.</p>
          <div class="testimonial-author">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Fan" class="author-img">
            <div class="author-info">
              <h4>James R.</h4>
              <p>Subscriber for 1 year</p>
            </div>
          </div>
        </div>
        <div class="testimonial-card">
          <p class="testimonial-text">I've never seen such high-quality content before. Séduxa's attention to detail and engagement with fans is unmatched.</p>
          <div class="testimonial-author">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Fan" class="author-img">
            <div class="author-info">
              <h4>Sarah L.</h4>
              <p>Subscriber for 8 months</p>
            </div>
          </div>
        </div>
        <div class="testimonial-card">
          <p class="testimonial-text">The best decision I've made! Apeksha's content is classy, sexy, and always leaves me wanting more. 10/10 would recommend.</p>
          <div class="testimonial-author">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Fan" class="author-img">
            <div class="author-info">
              <h4>Michael T.</h4>
              <p>Subscriber for 2 years</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section cta">
    <div class="container">
      <h2 class="cta-title">Ready for an Exclusive Experience?</h2>
      <p class="cta-subtitle">Join thousands of satisfied fans and get instant access to all my premium content.</p>
      <a href="#pricing" class="btn btn-primary">Subscribe Now</a>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-container">
        <div class="footer-col">
          <h3>Apeksha</h3>
          <p>Premium content creator specializing in artistic and sensual photography that celebrates confidence and beauty.</p>
          <div class="social-links">
            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-link"><i class="fab fa-onlyfans"></i></a>
            <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>
        <div class="footer-col">
          <h3>Quick Links</h3>
          <ul class="footer-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h3>Content</h3>
          <ul class="footer-links">
            <li><a href="#">Boudoir</a></li>
            <li><a href="#">Lingerie</a></li>
            <li><a href="#">Swimwear</a></li>
            <li><a href="#">Artistic</a></li>
            <li><a href="#">Behind the Scenes</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h3>Contact</h3>
          <ul class="footer-links">
            <li><a href="mailto:Support@oxgen.com">Support@oxgen.com</a></li>
            <li><a href="#">DM Fans</a></li>
            <li><a href="#">Custom Requests</a></li>
            <li><a href="#">Collaborations</a></li>
          </ul>
        </div>
      </div>
      <div class="copyright">
        &copy; 2023 Séduxa Content. All rights reserved. | Designed with ❤️ by Séduxa
      </div>
    </div>
  </footer>

  <script>
    // Header scroll effect
    window.addEventListener('scroll', function() {
      const header = document.getElementById('header');
      if (window.scrollY > 100) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Mobile menu toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');

    mobileMenuBtn.addEventListener('click', function() {
      navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 100,
            behavior: 'smooth'
          });
        }
      });
    });
</script>