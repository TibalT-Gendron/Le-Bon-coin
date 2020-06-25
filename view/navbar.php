

  ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="/"><span><?=APP_NAME?></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/profile-publierannonce" class="iconNav"><i class="icofont-bullhorn"></i> Poster une annonce</a></li>
          <li><a href="/rechercher" class="iconNav"><i class="icofont-search-2"></i> Rechercher</a></li>
          <li><a href="/<?=!isset($_SESSION['user'])?'compte':'profile'?>" class="iconNav"> <i class="icofont-ui-user"></i> Mon compte</a></li>
          <?php if (isset($_SESSION['user'])): ?>
          <li><a href="/deconnexion" class="iconNav"> <i class="icofont-sign-out"></i> Se deconnecter</a></li>
          <?php endif ?>
          <li><a href="/panier"class="iconNav"> <i class="icofont-cart"></i> Panier</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
