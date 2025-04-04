<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedIn']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="front/css/general.css"/>
    <link rel="stylesheet" href="front/style.css"/>
    <link rel="stylesheet" href="front/css/queries.css"/>

    
    <title>GFI Guidance Office</title>
  </head>
  <body>
    <!-- NAVIGATION -->
    <header class="header-section">
  <a href="#">
    <span class="logo">GFI Guidance office</span>
  </a>
  <nav class="main-nav">
    <ul class="main-nav-list">
      <li><a class="main-nav-link" href="#services">Services</a></li>
      <li><a class="main-nav-link" href="#aot">Areas of Treatment</a></li>      
      <li><a class="main-nav-link" href="#faq">FAQ</a></li>
      <li><a class="main-nav-link" href="#contact">Contact</a></li>
      <?php if ($isLoggedIn): ?>       
        <li><a class="main-nav-link nav-cta" href="/patient/patient.php">Profile</a></li>
        

      <?php else: ?>
        <li><a class="main-nav-link nav-cta" href="login.php">Login</a></li>
        
      <?php endif; ?>
    </ul>
  </nav>

  <button class="btn-mobile-nav">
    <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
    <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
  </button>
</header>

    <main>
      <!-- HERO SECTION -->
      <section class="hero-section">
        <div class="hero-container">
          <div class="hero-text-box">
            <h1 class="heading-primary">
              A place that offers growth and Guidance services
            </h1>
            <p class="hero-description">
              Our GFI guidance office offers mental health therapeutic services 
              aimed at helping students find relief, motivation, and courage. 
              We take a calm, proactive approach to helping you achieve your therapeutic goals.
            </p>
            <a href="#contact" class="btn btn--full margin-right-sm mobile-btn"
              >Start treatment now</a
            >
            <a href="#services" class="btn btn--outline mobile-btn"
              >Learn more &darr;</a
            >
            <div class="quote">
              <blockquote>
                <em>
                  — “You cannot discover new oceans unless you have the courage
                  to lose sight of the shore."
                </em>
              </blockquote>
            </div>
          </div>
          <div class="hero-img-box">
            <img
              src="GFI.jpeg"
              class="hero-img"
              alt="Picture"
            />0
          </div>
        </div>
      </section>

      <!-- SERVICES SECTION -->
      <section class="services-section" id="services">
        <div class="container">
          <span class="subheading">Services</span>
          <h2 class="heading-secondary">GFI Guidance office is Here to Help</h2>
        </div>

        <div class="container grid grid--2-cols grid--center-v">
          <!-- STEP 01 -->
          <div class="step-text-box">
            <p class="step-number">01</p>
            <h3 class="heading-tertiary">Counseling Services</h3>
            <p class="step-description">
              We offer a confidential and compassionate space where you can freely express yourself. 
              Our counselors are experienced in addressing a wide range of issues, including stress management, 
              anxiety, academic performance concerns, relationship issues, and more.
              
            </p>
          </div>
          <div class="step-img-box">
            <img
              src="assets/img/counseling.webp"
              class="step-img"
              alt=""
            />
          </div>
        </div>

        <div class="container grid grid--2-cols grid--center-v">
          <!-- STEP 02 -->
          <div class="step-img-box">
            <img
              src="assets/img/clinical.webp"
              class="step-img"
              alt=""
            />
          </div>
          <div class="step-text-box">
            <p class="step-number">02</p>
            <h3 class="heading-tertiary">Follow-up Service</h3>
            <p class="step-description">
              At our Guidance office, we offer a supportive and open-minded space to 
              help you strengthen your skills and knowledge as a social worker. 
              Together, we will work towards enhancing your skill set and addressing 
              any challenging areas you may encounter.
              
            </p>
          </div>
        </div>

        <div class="container grid grid--2-cols grid--center-v">
          
          <div class="step-text-box">
            <p class="step-number">03</p>
            <h3 class="heading-tertiary">
              Orientation Service
            </h3>
            <p class="step-description">
              Through our Orientation Service, we aim to provide a welcoming and supportive 
              environment to help you settle into our school community seamlessly. 
              Whether you're a newcomer or transitioning to a higher class, we are here to 
              assist you in navigating this exciting journey and ensuring a smooth transition.
              <br>
              <br>
              Join us for the Orientation Service and let us help you thrive in your new school environment! 
              
            </p>
          </div>
          <div class="step-img-box">
            <img
              src="assets/img/consultation.webp"
              class="step-img"
              alt=""
            />
          </div>
        </div>

        <div class="container grid grid--2-cols grid--center-v">
          
          <div class="step-img-box">
            <img
              src=""
              class="step-img"
              alt=""
            />
          </div>
          <div class="step-text-box">
            <p class="step-number">04</p>
            <h3 class="heading-tertiary">Career Guidance And Placements Services</h3>
            <p class="step-description">
              Our career guidance and placement services are tailored to help 
              you navigate your professional journey with confidence and clarity. 
              Whether you are a student exploring career options or a graduate
              seeking employment opportunities, our dedicated team is here to assist you.
              
            </p>
          </div>
        </div>

        <div class="container grid grid--2-cols grid--center-v">
          
          <div class="step-text-box">
            <p class="step-number">5</p>
            <h3 class="heading-tertiary">
              Testing Service
            </h3>
            <p class="step-description">
              Our testing service is administered by experienced professionals 
              who are dedicated to providing accurate assessments and meaningful guidance. 
              Whether you are a student, professional, or individual seeking personal growth, 
              our testing service offers valuable insights to support your journey. 
              
            </p>
          </div>
          <div class="step-img-box">
            <img
              src=""
              class="step-img"
              alt=""
            />
          </div>
        </div>

      </section>

      

      <!-- OWNER SECTION -->
     
    </main>

    <!-- FOOTER SECTION -->
    <footer class="footer" id="contact">
      <div class="container grid grid--footer">
        <div class="logo-col">
          <p class="subheading">Contact us</p>
          <span class="footer-logo">GFI Guidance office</span>
          <address class="contacts">
            <p>
              <a class="footer-link" href="mailto:gfiguidaceoffice@gmail.com"
                >gfiguidanceoffice@gmail.com</a
              >
            </p>
          </address>

          <ul class="social-links">
   
          </ul>

          <p class="copyright">
            Copyright &copy; <span class="year">2024</span> by GFI Guidance Office
            All rights reserved.
          </p>
        </div>
      </div>
    </footer>

    <script src="script.js"></script>

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule=""
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"
    ></script>

    <script
      defer
      src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"
    ></script>
    
  </body>
</html>
