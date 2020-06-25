<main id="main">

    <!-- ======= Login Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-md-offset-3 col-md-6">
            <form action="" method="POST">
              <h1>Connexion</h1>
              <?php if (isset($data->error) && $data->error): ?>
                <div class="alert alert-danger">
                <?=$data->errormsg?>
              </div>
              <?php endif ?>
              <div class="form-group">
                
              <label>Identifiant</label>
                <input type="text" placeholder="Entrer votre email" name="username" required class="form-control">
              </div>
              <div class="form-group">
               <label>Mot de passe </label>
                <input type="password" placeholder="Mot de passe" name="password" required class="form-control">
              </div>
               <input type="submit" value="Se connecter" name="login" class="btn btn-warning btn-block d-block"> 
               
            </form>
            <div class="p-2 text-center">Creer un compte <a href="/inscription">ICI</a> </div>
          </div>
      </div>
    </section><!-- End Login Section -->
  </main><!-- End #main -->
