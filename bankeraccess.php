<!-- TODO
- [ ] Ajout sur les formulaires des name 

- [ ] Pensez au required ( pour le confort mais ne pas le considerer comme une sécurité)
- [ ] Créer une balise main avec l'id et la class du body
-->
<!doctype html>
<html lang="fr">
<?php
//require_once(); DB
//require_once(); Security
//require_once(); function/loginBanker
if($_SERVER['REQUEST_METHOD']=='POST'){
    $db = DB::connect();
    if(!$db || !$email || $password){
        //Code pour afficher une erreur
    }else{
        if(Functions::loginBanker($db,
            $_POST['email'],
            $_POST['password']))
            {
                //Code success = > to connected
            }else{
                //retourner un message d'erreur 
            }
    }
}

?>

  <head>
    <?php require_once('./component/head.php');?>
  </head>
  
  <body class="clientpath">  
  <?php require_once('./component/header/headerNotConnected.php'); ?>
    <!-- Contenu à enlever  -->
    <main id="banque-connexion" class="container py-5 mt-5">
      <section class="row text-center" id="logIn">
            <h1>Accès Interne</h1>
            <div class="col-12">
                <!--  illustration + formulaire -->
                <div class="row d-flex  justify-content-between align-items-center">
                    <!-- illustration -->
                    <div class="col-6 d-none d-md-flex text-end justify-content-center" >
                        <img src="./assets/img/banker.svg" alt="" class="">
                    </div>
                    <!-- formulaire -->
                    <form action="formokay.php" id="logInForm" method="POST" class="col-12 col-md-6 text-sm-start d-flex flex-column  align-items-md-stretch ps-5 pe-5">
                        <!-- email -->
                        <div class="text-start mb-3 ">
                            <label for="email" >Email</label>
                            <div class="input-group ">
                                <span class="input-group-text border-end-0 bg-transparent" ><i class="bi bi-envelope"></i></span>
                                <input type="email" required id="lgemail" name="email" placeholder="Votre e-mail" class="border-start-0 form-control ">
                            </div>
                        </div>
                        <!-- password -->
                        <div class="text-start mb-3">
                            <label for="inputPassword" class="form-label">Votre mot de passe</label>
            <div class="input-group">
              <span class="input-group-text border-end-0 bg-transparent" id="password-addon">@</span>
              <input required type="password" name="bankerPassword" class="form-control border-start-0" id="inputPassword" placeholder="Votre mot de passe">
            </div> 
          </div>
          <div class="mx-auto w-100">
            <button type="button" class="btn w-100">Se connecter</button>
          </div>
        </form>
        </div>
        </section>

    </main> 
    <script src="component/script/login.js"></script>
    <?php require_once('./component/footer.php'); ?>
  </body>
        
</html> 