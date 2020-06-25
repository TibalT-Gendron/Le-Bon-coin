<main id="main">

    <!-- ======= Login Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-md-offset-3 col-md-6">
            <form action="" method="POST">
              <h1>Inscription</h1>
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
                <input type="text" placeholder="Entrer un email" name="username" required class="form-control">
              </div>
              <div class="form-group">
               <label>Mot de passe </label>
                <input type="password" placeholder="Mot de passe" name="password" required class="form-control">
              </div>
              <div class="form-group">
               <label>Confirmer le mot de passe </label>
                <input type="password" placeholder="Mot de passe" name="passwordC" required class="form-control">
              </div>
               <input type="submit" value="S'inscrire" name="register" class="btn btn-warning btn-block d-block"> 
               
            </form>
            <div class="p-2 text-center">Se connecter ici <a href="/compte">ICI</a> </div>
          </div>
      </div>
    </section><!-- End Login Section -->
  </main><!-- End #main -->
