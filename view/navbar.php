 <!-- ======= Top Bar ======= 
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="/"><span><?=APP_NAME?></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/poster-annonces" class="iconNav"><i class="icofont-bullhorn"></i> Poster une annonce</a></li>
          <li><a href="/rechercher" class="iconNav"><i class="icofont-search-2"></i> Rechercher</a></li>
          <li><a href="/compte" class="iconNav"> <i class="icofont-ui-user"></i> Mon compte</a></li>
          <?php if (isset($_SESSION['user'])): ?>
          <li><a href="/deconnexion" class="iconNav"> <i class="icofont-sign-out"></i> Se deconnecter</a></li>
          <?php endif ?>
          <li><a href="/panier"class="iconNav"> <i class="icofont-cart"></i> Panier</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
