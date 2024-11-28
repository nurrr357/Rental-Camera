<?php
session_start();

$timeout_duration = 10;

if (isset($_SESSION['start_time'])) {
    $duration = time() - $_SESSION['start_time'];

    if ($duration > $timeout_duration) {
        session_unset();     
        session_destroy();   
        $name = '';          
        $email = '';
        header('Location: index.php');        
    } else {
        $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    }
} else {
    $_SESSION['start_time'] = time();
    $name = ''; 
    $email = ''; 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email_address'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- 
    - primary meta tags
  -->
    <title>Mavers | Rental Camera</title>

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml" />

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style.css" />

    <!-- 
    - preload images
  -->
    <link rel="preload" as="image" href="./assets/images/pattern-2.svg" />
    <link rel="preload" as="image" href="./assets/images/pattern-3.svg" />
</head>

<body id="top">
    <!-- 
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">
            <a href="#" class="logo">
                <img src="./assets/images/mavers.svg" width="119" height="37" alt="Wren logo" />
            </a>

            <nav class="navbar" data-navbar>
                <div class="navbar-top">
                    <a href="#" class="logo">
                        <img src="./assets/images/logo.svg" width="119" height="37" alt="Wren logo" />
                    </a>

                    <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                        <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                    </button>
                </div>

                <ul class="navbar-list">
                    <li>
                        <a href="#home" class="navbar-link hover-1" data-nav-toggler>Home</a>
                    </li>

                    <li>
                        <a href="#topics" class="navbar-link hover-1" data-nav-toggler>Top Seller</a>
                    </li>

                    <li>
                        <a href="#featured" class="navbar-link hover-1" data-nav-toggler>Service</a>
                    </li>

                    <li>
                        <a href="#Contack" class="navbar-link hover-1" data-nav-toggler>Contack</a>
                    </li>
                </ul>
            </nav>
            <div class="row" style="display: flex; gap: 10px">
                <a href="#" class="sign-up-button">Sign In</a>
                <a href="#" class="btn btn-primary" style="padding-top: 10px">Sign Up</a>
            </div>

            <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>
        </div>
    </header>

    <main>
        <article>
            <!-- 
        - #HERO
      -->

            <section class="hero" id="home" aria-label="home">
                <div class="container">
                    <div class="hero-content">
                        <p class="hero-subtitle">Malang Version</p>

                        <h1 class="headline headline-1 section-title">
                            Mav<span class="span">ers</span>
                        </h1>

                        <p class="hero-text">
                            Discover the latest gear for all your photography and
                            videography needs. From professional shoots to personal
                            projects, we offer a wide range of cameras, lenses, and
                            accessories to capture every moment perfectly. Explore our
                            collection and find the ideal equipment for your creative
                            vision.
                        </p>
                    </div>

                    <div class="hero-banner">
                        <img src="./assets/images/foto.png" width="300" height="400" alt="Wimage" class="w-100" />

                        <img src="./assets/images/pattern-2.svg" width="27" height="26" alt="shape" class="shape shape-1" />

                        <img src="./assets/images/pattern-3.svg" width="27" height="26" alt="shape" class="shape shape-2" />
                    </div>

                    <img src="./assets/images/shadow-1.svg" width="500" height="800" alt="" class="hero-bg hero-bg-1" />

                    <img src="./assets/images/shadow-2.svg" width="500" height="500" alt="" class="hero-bg hero-bg-2" />
                </div>
            </section>

            <!-- 
        - #TOP SELLER
      -->

            <section class="topics" id="topics" aria-labelledby="topic-label">
                <div class="container">
                    <div class="card topic-card">
                        <div class="card-content">
                            <h2 class="headline headline-2 section-title card-title" id="topic-label">
                                Our Best Sellers
                            </h2>

                            <p class="card-text">
                                Don't miss out on our most popular cameras, explore the best
                                gear trusted by professionals and enthusiasts alike!
                            </p>

                            <div class="btn-group">
                                <button class="btn-icon" aria-label="previous" data-slider-prev>
                                    <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                                </button>

                                <button class="btn-icon" aria-label="next" data-slider-next>
                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </button>
                            </div>
                        </div>

                        <div class="slider" data-slider>
                            <ul class="slider-list" data-slider-container>
                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618">
                                            <img src="./assets/images/1.jpg" width="507" height="618" loading="lazy" alt="Sport" class="img-cover" />
                                        </figure>

                                        <div class="slider-content">
                                            <span class="slider-title">DSLR</span>

                                            <p class="slider-subtitle">Mirorless</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618">
                                            <img src="./assets/images/2.jpg" width="507" height="618" loading="lazy" alt="Travel" class="img-cover" />
                                        </figure>

                                        <div class="slider-content">
                                            <span class="slider-title">Sony</span>

                                            <p class="slider-subtitle">70-200mm</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618">
                                            <img src="./assets/images/3.jpg" width="507" height="618" loading="lazy" alt="Design" class="img-cover" />
                                        </figure>

                                        <div class="slider-content">
                                            <span class="slider-title">Stabilizer</span>

                                            <p class="slider-subtitle">E-Katalog</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618">
                                            <img src="./assets/images/7.jpg" width="507" height="618" loading="lazy" alt="Movie" class="img-cover" />
                                        </figure>

                                        <div class="slider-content">
                                            <span class="slider-title">Nikon</span>

                                            <p class="slider-subtitle">D850 DSLR</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618">
                                            <img src="./assets/images/8.jpg" width="507" height="618" loading="lazy" alt="Lifestyle" class="img-cover" />
                                        </figure>

                                        <div class="slider-content">
                                            <span class="slider-title">Canon</span>

                                            <p class="slider-subtitle">EOS 90D</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 
        - #Service 
      -->

            <section class="section feature" aria-label="feature" id="featured">
                <div class="container">
                    <h2 class="headline headline-2 section-title">
                        <span class="span">Why Choose Mavers?</span>
                    </h2>

                    <p class="section-text">
                        Not only do we offer equipment rentals, <br />but Mavers also
                        provides a variety of services
                    </p>

                    <ul class="feature-list">
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903">
                                    <img src="./assets/images/ila.jpg" width="1602" height="903" loading="lazy" alt="Self-observation is the first step of inner unfolding" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Travel</a>

                                            <a href="#" class="span hover-2">#Lifestyle</a>
                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Outdoor Photo Shoot Ideas
                                        </a>
                                    </h3>

                                    <p class="section-text" style="margin: 10px 0px 0px 0px; text-align: justify">
                                        Discover creative outdoor photo shoot ideas to make your
                                        photography stand out. Perfect for travelers, lifestyle
                                        bloggers, and anyone looking to capture stunning moments
                                        in unique settings!
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903">
                                    <img src="./assets/images/kecak.jpg" width="1602" height="903" loading="lazy" alt="Self-observation is the first step of inner unfolding" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Event</a>

                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Creative Event Photography
                                        </a>
                                    </h3>

                                    <p class="section-text" style="margin: 10px 0px 0px 0px; text-align: justify">
                                        Capture the magic of your special moments with our
                                        Creative Event Photography services, where we blend
                                        artistic vision with professional expertise to tell your
                                        unique story through stunning images!
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903">
                                    <img src="./assets/images/4.jpg" width="1602" height="903" loading="lazy" alt="Self-observation is the first step of inner unfolding" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>

                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            All Your Gear in One Place!
                                        </a>
                                    </h3>

                                    <p class="section-text" style="margin: 10px 0px 25px 0px; text-align: justify">
                                        Find everything you need for your photography journey,
                                        from cameras to accessories, all in one convenient
                                        location!
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903">
                                    <img src="./assets/images/6.jpg" width="1602" height="903" loading="lazy" alt="Self-observation is the first step of inner unfolding" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>

                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Unique Videography
                                        </a>
                                    </h3>

                                    <p class="section-text" style="margin: 10px 0px 0px 0px; text-align: justify">
                                        Transform your events into captivating stories with our
                                        Cinematic Videography, featuring dynamic shots and
                                        professional editing!
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903">
                                    <img src="./assets/images/5.jpg" width="1602" height="903" loading="lazy" alt="Self-observation is the first step of inner unfolding" class="img-cover" />
                                </figure>

                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>

                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                                            <span class="span">6 mins read</span>
                                        </div>
                                    </div>

                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Videotron LED Screen
                                        </a>
                                    </h3>

                                    <p class="section-text" style="margin: 10px 0px 25px 0px; text-align: justify">
                                        Enhance your events with our high-quality videotron
                                        rentals, offering vibrant visuals to captivate your
                                        audience!
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <img src="./assets/images/shadow-3.svg" width="500" height="1500" loading="lazy" alt="" class="feature-bg" />
            </section>

            <!-- 
        - #POPULAR TAGS
      -->

            <section class="tags" aria-labelledby="tag-label">
                <div class="container" style="margin-bottom: 80px">
                    <h2 class="headline headline-2 section-title" id="tag-label">
                        <span class="span">Popular Tags</span>
                    </h2>

                    <p class="section-text">Most searched keywords</p>

                    <ul class="grid-list">
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag1.png" width="32" height="32" loading="lazy" alt="Travel" />

                                <p class="btn-text">Travel</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag2.png" width="32" height="32" loading="lazy" alt="Culture" />

                                <p class="btn-text">Culture</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag3.png" width="32" height="32" loading="lazy" alt="Lifestyle" />

                                <p class="btn-text">Lifestyle</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag4.png" width="32" height="32" loading="lazy" alt="Fashion" />

                                <p class="btn-text">Fashion</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag5.png" width="32" height="32" loading="lazy" alt="Food" />

                                <p class="btn-text">Food</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag6.png" width="32" height="32" loading="lazy" alt="Space" />

                                <p class="btn-text">Space</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag7.png" width="32" height="32" loading="lazy" alt="Animal" />

                                <p class="btn-text">Animal</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag8.png" width="32" height="32" loading="lazy" alt="Minimal" />

                                <p class="btn-text">Minimal</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag9.png" width="32" height="32" loading="lazy" alt="Interior" />

                                <p class="btn-text">Interior</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag10.png" width="32" height="32" loading="lazy" alt="Plant" />

                                <p class="btn-text">Plant</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag11.png" width="32" height="32" loading="lazy" alt="Nature" />

                                <p class="btn-text">Nature</p>
                            </button>
                        </li>

                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag12.png" width="32" height="32" loading="lazy" alt="Business" />

                                <p class="btn-text">Business</p>
                            </button>
                        </li>
                    </ul>
                </div>
            </section>
        </article>
    </main>

    <!-- 
    - #FOOTER
  -->

    <footer id="Contack">
        <div class="container">
            <div class="card footer">
                <div class="section footer-top">
                    <div class="footer-brand">
                        <a href="#" class="logo">
                            <img src="./assets/images/mavers.svg" width="119" height="37" loading="lazy" alt="Mavers logo" />
                        </a>

                        <p class="footer-text">
                            Find the perfect camera and gear for your next project. Book Now
                            and experience hassle-free rentals with SnapRent!
                        </p>

                        <p class="footer-list-title">Address</p>

                        <address class="footer-text address">
                            Robyong, Pakisjajar, Kec. Pakis, Kabupaten Malang, Jawa Timur
                            65154
                        </address>
                    </div>

                    <div class="footer-list">
                        <p class="footer-list-title">Categories</p>

                        <ul>
                            <li>
                                <a href="#" class="footer-link hover-2">Camera</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Lens</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Gear</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Wedding</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Photo Shoot</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Outdorshoot</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Indorshoot</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Cinematic</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Event</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Rental</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">Maintenance</a>
                            </li>

                            <li>
                                <a href="#" class="footer-link hover-2">cinematography</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer-list">
                        <p class="footer-list-title">Ready to Get Started?</p>

                        <p class="footer-text">
                            Sign up to receive exclusive camera rental deals, tips, and the
                            latest gear reviews directly in your inbox!
                        </p>

                        <form action="" method="post">
                            <div class="input-wrapper">
                                <input href="javascript:void(0)" type="text" name="name" placeholder="Your name" required class="input-field" autocomplete="off" value="<?php echo htmlspecialchars($name); ?>" />

                                <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
                            </div>

                            <div class="input-wrapper">
                                <input href="javascript:void(0)" type="email" name="email_address" placeholder="Emaill address" required class="input-field" autocomplete="off" value="<?php echo htmlspecialchars($email); ?>" />

                                <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
                            </div>
                            <div class="row" style="display: flex">
                                <button id="Subscribe" href="javascript:void(0)" class="btn btn-primary" type="submit" style="margin-right: 3px; cursor: pointer">
                                    <span class="span">Subscribe</span>

                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </button>


                                <a href="#" class="btn btn-green">
                                    <span class="span">Whatsapp</span>

                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="footer-bottom">
                    <p class="copyright">
                        &copy; Developed by <a href="#" class="copyright-link">Mavers</a>
                    </p>

                    <ul class="social-list">
                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-twitter"></ion-icon>

                                <span class="span">Twitter</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-linkedin"></ion-icon>

                                <span class="span">LinkedIn</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>

                                <span class="span">Instagram</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div id="snackbar"></div>

    <!-- 
    - #BACK TO TOP
  -->

    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
    </a>

    <!-- 
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>