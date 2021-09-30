<?php
    session_start();
?>
<!doctype html>
<html lang="fr">
<?php
require_once ('./component/db/banker.php');
require_once ('./component/db/noAuth.php');
require_once ('./component/security.php');
require_once ('./component/function/FunctionBanquier.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $funcbanquier=new FunctionsBanquier;
        $call = $funcbanquier->logIn(
            $_POST['email'],
            $_POST['bankerPassword']
        );
    }
?>

  <head>
    <?php require_once('./component/head.php');?>
  </head>
  
  <body class="clientpath">
  <?php 
    require_once('./component/alert.php');
    if (isset($_SESSION['token'])){
        require_once('./component/header/headerConnected.php');
    }else{
       require_once('./component/header/headerNotConnected.php'); 
       //import de header_not_connected.php contenant le header non connecté
    }
    ?>
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
                    <form id="logInForm" method="POST" class="col-12 col-md-6 text-sm-start d-flex flex-column  align-items-md-stretch ps-5 pe-5">
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
            <button type="submit" class="btn w-100">Se connecter</button>
          </div>
        </form>
        </div>
        </section>

    </main> 
    <?php require_once('./component/footer.php'); ?>
  </body>
        
</html> 
