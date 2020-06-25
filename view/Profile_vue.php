<?php //var_dump($data->user['user_picture']);die; ?>
  <!-- ======= Hero Section ======= -->

  <main id="main">

    <!-- ======= Section ======= -->
    <section class="profile">
      <div class="container py-4">
      <div class="myHeader2">
        <a href="/profile-viewprofile" class="<?=(!isset($GLOBALS["typeof"]) OR (isset($GLOBALS["typeof"]) && $GLOBALS["typeof"]=="viewprofile"))?"active":""?>"><i class="icofont-user"></i> Mon profile</a>
        <a href="/profile-mesannonces" class="<?=(isset($GLOBALS["typeof"]) && $GLOBALS["typeof"]=="mesannonces")?"active":""?>"><i class="icofont-horn"></i> Mes annonces</a>
        <a href="/profile-publierannonce" class="<?=(isset($GLOBALS["typeof"]) && $GLOBALS["typeof"]=="publierannonce")?"active":""?>"><i class="icofont-horn"></i> Publier une annonce</a>
        <a href="/profile-chat" class="<?=(isset($GLOBALS["typeof"]) && $GLOBALS["typeof"]=="chat")?"active":""?>"><i class="icofont-horn"></i> Mes chat</a>
      </div>

      <div class="py-3">
        <!-- ======= Section profile ======= -->
        <?php if (!isset($GLOBALS["typeof"]) OR (isset($GLOBALS["typeof"]) && $GLOBALS["typeof"]=="viewprofile")): ?>
          <div class="myHeader" style="background: transparent;">
            <div class="rounded-circle" style="width: 100px;height: 100px;background: url(/file/img/<?=!empty($data->user['user_picture'])?$data->user['user_picture']:"nophoto.jpg"?>);background-position: center;background-size: contain;" alt="Cinque Terre"></div>
            <span >Informations personnelles</span>
            <button class="btn btn-info" id="modifierProfile">Modifier</button>
           
          </div>
           <form action="" method="POST" class="px-3" id="profileform" enctype="multipart/form-data">
              <?php if (isset($data->error) && $data->error): ?>
                <div class="alert alert-danger">
                <?=$data->errormsg?>
              </div>
              <?php endif ?>
              <?php if (isset($data->success) && $data->success): ?>
                <div class="alert alert-success">
                <?=$data->successmsg?>
              </div>
              <?php endif ?>
              <div class="form-group">
              <label>Email</label>
                <input type="text" value="<?=$_SESSION['user']['user_email']?>" class="form-control" value="" readonly="" disabled="">
              </div>
              <div class="form-group">
              <label>Nom</label>
                <input type="text" placeholder="" name="nom"  class="form-control" value="<?=$data->user['user_lastname']?>" readonly="">
              </div>
              <div class="form-group">
              <label>Prenom</label>
                <input type="text" placeholder="" name="prenom"  class="form-control" value="<?=$data->user['user_name']?>" readonly="">
              </div>
              <div class="form-group">
              <label>Photo*selectionner pour changer la photo*</label>
                <input type="file"  name="photo"  class="form-control"  readonly="">
              </div>
              <div class="form-group">
              <label>Ville</label>
                <select type="text" placeholder="" name="ville"  class="form-control" value="" readonly="">
                  <option value="">Selectionner votre ville</option>
                  <?php foreach ($data->ville as $row): ?>
                    <option <?=$row['ville_id']==$data->user['user_country']?"selected":""?> value="<?=$row['ville_id']?>"><?=$row['name']?></option>
                  <?php endforeach ?>
                </select>
              </div>
               <input type="submit" value="Sauvegarder" name="saveprofile" class="btn btn-warning btn-block d-block" style="display:none!important"> 
               
            </form>
        <?php endif ?>
        <!-- ======= Section mes annonces ======= -->
        <?php if (isset($GLOBALS["typeof"]) && $GLOBALS["typeof"]=="publierannonce"): ?>
          <form action="" method="POST" class="px-3" enctype="multipart/form-data">
              <?php if (isset($data->error) && $data->error): ?>
                <div class="alert alert-danger">
                <?=$data->errormsg?>
              </div>
              <?php endif ?>
              <?php if (isset($data->success) && $data->success): ?>
                <div class="alert alert-success">
                <?=$data->successmsg?>
              </div>
              <?php endif ?>
              <div class="form-group">
              <label>Prix</label>
                <input type="number" name="prix" value="0" class="form-control" value="" required>
              </div>
              <div class="form-group">
              <label>Titre</label>
                <input type="text" placeholder="" name="titre"  class="form-control" required="">
              </div>
              <div class="form-group">
              <label>Description</label>
                <textarea  name="description"  class="form-control" value="" required></textarea>
              </div>
              <div class="form-group">
              <label>Tags *Separer les tags par une virgule(,)*</label>
                <input type="text" placeholder="" name="tag"  maxlength="200" class="form-control" required="">
              </div>
              <div class="form-group">
              <label>Photo de presentation</label>
                <input type="file"  name="photo1"  class="form-control">
              </div>
              <div class="form-group">
              <label>Autre photo 1</label>
                <input type="file"  name="photo2"  class="form-control" >
              </div>
              <div class="form-group">
              <label>Autre photo 2</label>
                <input type="file"  name="photo3"  class="form-control" >
              </div>

              <div class="form-group">
              <label>Ville</label>
                <select type="text" placeholder="" name="ville"  class="form-control" value="" required="">
                  <option value="">Selectionner la ville</option>
                  <?php foreach ($data->ville as $row): ?>
                    <option value="<?=$row['ville_id']?>"><?=$row['name']?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
              <label>Categories</label>
                <select type="text" placeholder="" name="categorie"  class="form-control" value="" required="">
                  <option value="">Selectionner la categorie</option>
                  <?php foreach ($data->categories as $row): ?>
                    <option value="<?=$row['categorie_id']?>"><?=$row['name']?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
              <label>Statut</label>
                <select  name="etat"  class="form-control" required>
                  <option value="">Statut de l'annonce</option>
                  <option value="0">Inactive</option>
                  <option value="1">Active</option>
                  
                </select>
              </div>
               <input type="submit" value="Ajouter" name="publierannonce" class="btn btn-primary btn-block d-block"> 
               
            </form>
        <?php endif ?>
        <?php if (isset($GLOBALS["typeof"]) && $GLOBALS["typeof"]=="mesannonces"): ?>
          <div class="row">
            <?php foreach ($data->annonces as $row): ?>
              <?php $photo=(array)json_decode($row['photos']) ?>
              <div class="col-md-4">
                <div class="card" style="width:400px">
                  <img class="card-img-top" src="/file/img/<?=!empty($photo[1])?$photo[1]:"nopostephoto.jpg"?>" alt="Card image">
                  <div class="card-body">
                    
                    <div class="d-flex text-white justify-content-between ">
                      <h4 class="card-title text-primary"><?=$row['title']?></h4>
                    <h4 class="card-title text-info"><?=number_format($row['prix']). "E"?></h4>
                    </div>
                    <div class="d-flex text-white justify-content-between ">
                      <div class="py-2 text-danger"><?=$row['catname']?></div>
                      <div class="py-2 text-muted"><?=$row['date_created']?></div>
                    </div>
                    <p class="card-text"><?=$row['description']?></p>
                    <a href="/profile-modifierannonce-<?=$row['annonce_id']?>" class="btn btn-primary">Modifier</a>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        <?php endif ?>
      </div>
      </div>
    </section>

    
   

  </main><!-- End #main -->
