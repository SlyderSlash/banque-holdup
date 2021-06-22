<!-- TODO
- [ ] Ajout sur les formulaires des name 
- [ ] Pensez au required ( pour le confort mais ne pas le considerer comme une sécurité)
- [ ] Créer une balise main avec l'id et la class du body
-->
<!doctype html>
<html lang="fr">
  <head>
    <?php require_once('./component/head.php');?>
  </head>
  
  <body>  
  <?php require_once('./component/header/headerNotConnected.php'); ?>
    <!-- Contenu à enlever  -->
    <main id="banque-connexion" class="mx-auto"> 
  
      <h1 class="mb-5">Accès interne</h1>
      <div class="d-flex flex-column flex-md-row justify-content-center">

        <figure class="me-2 d-flex justify-content-center">
          <img src="assets/img/connexionpage.png" alt="illustration de la page de connexion banquier ">
        </figure>

        <form class="d-flex flex-column justify-content-center mx-3 px-3">
          <div class="mb-3">

            <!-- EMAIL INPUT -->
            <label for="inputEmail" class="form-label">Email</label>
            <div class="input-group mb-3">
              <span class="input-group-text border-end-0 bg-transparent" id="email-addon">@</span>
              <input required  type="email" name="bankerEmail" class="form-control border-start-0" id="inputEmail" aria-describedby="emailHelp" placeholder="Votre e-mail">
            </div>
            
            <!-- PASSWORD INPUT -->
            <label for="inputPassword" class="form-label">Votre mot de passe</label>
            <div class="input-group">
              <span class="input-group-text border-end-0 bg-transparent" id="password-addon">@</span>
              <input required type="password" name="bankerPassword" class="form-control border-start-0" id="inputPassword" placeholder="Votre mot de passe">
            </div> 
          </div> oublie pas de git add, puis commit avant de push :)
          <div class="mx-auto w-100">
            <button type="button" class="btn w-100">Se connecter</button>
          </div>
        </form>

      </div>
    </main> 
  <?php require_once('./component/footer.php'); ?>
  </body>
        
</html> 