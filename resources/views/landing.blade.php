<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dompetin</title>
    <link rel="stylesheet" href="{{ asset('css/landing_page.css') }}" />
  </head>
  <body>
    <header>
      <div class="logo"><img src="{{ asset('images/dompetin_logo.png') }}" alt="Dompetin" width="150px" height="100px"></div>
      <nav>
        
      </nav>
      <div class="cta-buttons">
        <a href="{{ route('register') }}" class="sign-up">Sign Up</a>
        <a href="{{ route('login') }}" class="log-in">Log In</a>
      </div>
    </header>

    <section class="hero">
      <div class="hero-text">
        <h1>We Manage <span>Your Money</span> For You</h1>
        <p>
          Yearly access to all products with a huge discount. Grab all current
          products and all updates for one.
        </p>
        <a href="#" class="btn">Get Start</a>
      </div>
      <div class="hero-image">
        <img src="{{ asset('images/Uang.png') }}" alt="Uang" />
      </div>
    </section>

    <section class="about-section" id="about">
      <img src="{{ asset('images/Money.png') }}" alt="Money" />
      <div class="about-text">
        <h2>Why Choose Our Money Management Platform?</h2>
        <p>
          Our platform is designed to help you organize, track, and optimize
          your financial resources effectively. With intuitive tools and
          personalized insights, you can achieve your financial goals faster and
          smarter.
        </p>
        <p>
          Join thousands of satisfied users who trust us to manage their money
          efficiently. Start your journey to financial success today!
        </p>
      </div>
    </section>

    <section class="faq-section" id="faq">
      <h2>Frequently Asked Questions</h2>
      <div class="faq">
        <h3>What is this platform about?</h3>
        <p>
          This platform helps you manage your financial resources efficiently
          and achieve your financial goals.
        </p>
      </div>
      <div class="faq">
        <h3>How secure is my data?</h3>
        <p>
          Your data is encrypted and securely stored. We prioritize your privacy
          and security.
        </p>
      </div>
      <div class="faq">
        <h3>What features are included?</h3>
        <p>
          We offer budgeting tools, financial insights, and resource tracking to
          make your money management easier.
        </p>
      </div>
    </section>

    <script>
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
          }
        });
      });

      const heroSection = document.querySelector(".hero");
      const aboutSection = document.querySelector(".about-section");
      const faqSection = document.querySelector(".faq-section");

      observer.observe(heroSection);
      observer.observe(aboutSection);
      observer.observe(faqSection);
    </script>
  </body>
</html>
