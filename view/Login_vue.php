<main id="main">

    <!-- ======= Login Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-md-offset-3 col-md-6">
            <form action="" method="POST">
              <h1>Connexion</h1>
              <label> <br> Nom d'utilisateur </br></label>
                <input type="text" name="Entrer le nom d'utilisateur" placeholder="username" required>

               <label> <br>Mot de passe </br></label>
                <input type="text" name="Entrer le mot de passe" placeholder="password" required>

               <input type="submit" value="Login"> 
               <?php 
                if (isset($_GET['erreur'])) {
                  $err = $_GET['erreur'];
                  if ($err==1 || $err==2) 
                    echo "utilisateur ou mot de passe incorrect";
                }
                 ?>
            </form>



          </div>
      </div>
    </section><!-- End Login Section -->
  </main><!-- End #main -->
