
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hidden d-none">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(file/img/slide/slide-1.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown">Bienvenue sur <span><?=APP_NAME?></span></h2>
                <p class="animated fadeInUp">Découvrez nos annonces de particuliers et professionnels partout en France. Annonce Gratuite. Pour Les Particuliers. Pour Les Professionnels. Catégories: Immobilier, Auto - Moto, Emploi, Animaux,Services..</p>
                <a href="" class="btn-get-started animated fadeInUp">Déposer une annonce</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(file/img/slide/slide-2.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown"><?=APP_NAME?> <span>Annonces gratuites </span></h2>
                <p class="animated fadeInUp">Découvrez nos annonces gratuites de particuliers et pros : faites de bonnes affaires d'achat, vente et déposez votre annonce gratuite ...</p>
                <a href="" class="btn-get-started animated fadeInUp">En Savoir Plus</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(file/img/slide/slide-3.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown">PME <span> Service 100% gratuit</span></h2>
                <p class="animated fadeInUp">Publier ou consulter des petites annonces sur <?=APP_NAME?> est 100% gratuit. Aucun paiement ne vous sera jamais demandé, ni avant ni après. C'est le seul site du secteur à audience massive totalement gratuit, y compris pour les professionnels.</p>
                <a href="" class="btn-get-started animated fadeInUp">Publier une annonce </a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured d-none">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="icon-box">
              <i class="icofont-computer"></i>
              <h3><a href="">Gratuit et Modifiable</a></h3>
              <p>" Chez nous, la gratuité c'est un état d'esprit. Déposer une petite annonce sur notre site internet, c'est gratuit et vous n'avez aucun frais superflus pour la corriger ou ajouter des photos."</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="icofont-image"></i>
              <h3><a href="">Votre fidélité est récompensée</a></h3>
              <p>" À chaque dépôt d'annonce gratuite, vous gagnez des points bonus. Avec ces points, vous bénéficiez d'options de visibilité pour vos annonces."</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="icofont-tasks-alt"></i>
              <h3><a href="">Votre profil est unique</a></h3>
              <p>" Vous pouvez personnaliser votre page vendeur. Vous créez un avatar à votre image, vous obtenez des badges permettant de mieux illustrer votre profil (adresse vérifiée)."</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Section -->
    <!-- ======= Categorie Section ======= -->
    <section id="services" class="services d-none">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Quelques catégories...</h2>
        </div>
        <div class="owl-carousel owl-theme">
        <?php foreach ($data->body['categories'] as $row): ?>
          <div class="">
            <a href="/annonces?categorie=<?=$row['categorie_id']?>" class="d-flex" style="padding: 20px 20px;text-align: center;margin:10px;flex-direction: column;justify-content: center;align-items: center;">
              <div style="font-size: 20px;border-radius: 50%;background: #ff6e14;height: 50px;width: 50px;margin-bottom:10px;color: white;display: flex;justify-content: center;align-items: center;"><i class="icofont-<?=$row['icon']?>"></i></div>
              <h5> <?=$row['name']?> </h5>
            </a>
          </div>
        <?php endforeach ?>

        </div>

      </div>
    </section><!-- End Services Section -->

   

    <!-- ======= Clieategorients Section ======= -->
    <section class="annonces">
      <div class="section-title" data-aos="fade-up">
          <h2>Bienvenue sur <?=APP_NAME?></h2>
        </div>
      <div class="container">
        <span class="text-bold text-info mb-3 text-big text-bold" style="font-size: 30px"><i class="icofont-horn"></i> Annonces</span>
      <div class="myHeader">
        
        <form class="d-flex w-100 " method="post">
          <select type="text" placeholder="" name="categorie"  class="form-control w-25" value="" required="">
          <option value="all">Toute les categories</option>
          <?php foreach ($data->body['categories'] as $row): ?>
            <option <?=(isset($_POST['categorie']) && $_POST['categorie']==$row['categorie_id'])?"selected":""?> value="<?=$row['categorie_id']?>"><?=$row['name']?></option>
          <?php endforeach ?>
        </select>
        <select type="text" placeholder="" name="ville"  class="form-control w-25" value="" required="">
          <option value="all">Toutes les villes</option>
          <?php foreach ($data->body['ville'] as $row): ?>
            <option <?=(isset($_POST['ville']) && $_POST['ville']==$row['ville_id'])?"selected":""?> value="<?=$row['ville_id']?>"><?=$row['name']?></option>
          <?php endforeach ?>
        </select>
        <input type="text" name="prixmin" min="0" value="<?=(isset($_POST['prixmin']))?$_POST['prixmin']:'0'?>" class="form-control" style="max-width: 100px" value="0" required>
        <input type="text" name="prixmax" min="50000" value="<?=(isset($_POST['prixmax']))?$_POST['prixmax']:'50000'?>" class="form-control w-10" style="max-width: 100px" value="50000" required>
        <input type="text" name="q" class="form-control" placeholder="Rechercher...." value="<?=(isset($_POST['q']))?$_POST['q']:''?>">
        <input type="submit"  value="Filter" name="rechercher" class="btn btn-warning">
        </form>
      </div>
      <div class="row py-2">
            <?php foreach ($data->body['Annonces'] as $row): ?>
              <?php $photo=(array)json_decode($row['photos']) ?>
              <div class="col-md-6">
                <div class="card" style="width:400px;margin: 20px">
                  <img class="card-img-top" src="/file/img/<?=!empty($photo[1])?$photo[1]:"nopostephoto.jpg"?>" alt="Card image">
                  <div class="card-body">
                    
                    <div class="d-flex text-white justify-content-between ">
                      <h4 class="card-title text-primary"><?=$row['title']?></h4>
                    <h4 class="card-title text-info"><?=number_format($row['prix']). "E"?></h4>
                    </div>
                    <div class="d-flex text-white justify-content-between ">
                      <div class="py-2 text-danger"><?=$row['name']?></div>
                      <div class="py-2 text-muted"><?=$row['date_created']?></div>
                    </div>
                    <p class="card-text"><?=$row['description']?></p>
                    <a href="/annonce-<?=$row['annonce_id']?>" class="btn btn-primary">Detail de l'annonce</a>
                    <a href="/annonce-<?=$row['annonce_id']?>" class="btn btn-primary">Detail de l'annonce</a>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
      </div>
    </section>

    
   

  </main><!-- End #main -->
