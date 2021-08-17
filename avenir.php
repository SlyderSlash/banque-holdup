<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php require_once('./component/head.php'); 
    //import de head.php contenant les frames de base
    ?>
    
  </head>
  <body class="notclient" id="homepage">
    <?php 
    if (isset($_SESSION['token'])) {
      require_once('./component/header/headerConnected.php');
    }
    else {
      require_once('./component/header/headerHome.php');
    } 
    ?>
     <!-- TODO : Diminuer la largeur du bloc pour créer un espacement entre le texte de gauche et de droite : Doublon, la todo, c'était d'enlever l'espacement du haut sur mobile : DONE -->
    <main class="mt-sm-5 mx-md-5 mx-lg-auto d-flex flex-column align-items-center flex-lg-row">
      <section class="px-4 p-sm-4 p-xxl-5 p-lg-5 px-lg-5 mx-lg-5">
        <h2 class="fs-1">Fonctionnalité à venir</h2>
        <p class="fw-light my-lg-5">Oh non cette fonctionnalité n'as pas encore était faite... Nous avions un dev ... mais il es parti : <strong>" acheter un paquet de clope menthol"</strong> et n'est jamais revenu... <strong>c'est indamissible</strong></p>
        <p class="fw-light my-lg-5"> Nous rejetons toute insinuation de copie du script des Simpsons pour le père de Nelson<strong> Je vous jure on savais pas qu'il avais dit ça !</strong> tellement qu'on viens de le citer ... 
          . Bref vous pouvez toujours voir nos superbes CGU : <a href="/CGU.php" class="link">Condition générales usante</a></p>
        <p class="fw-light my-lg-5">Fumer tue, pour votre santé... buvez plutôt du café :D</p>
      </section>
      <!-- TODO : Diminuer la largeur du bloc pour créer un espacement entre le texte de gauche et de droite :DONE -->
      <section class="p-4 d-flex flex-column align-items-center">
        <figure class="mx-auto">
          <img src="assets/img/homepage-illustration.svg" class="w-100">
          <!-- TODO : Voir si illustration disponible en SVG : DONE -->
        </figure>
        <p class="fw-light text-center">Si toi aussi tu veux faire caca marron, avoir un swag de ouf et surtout  <strong>épuiser t'as cafetière</strong> </p>
        <a href="/connexion.php"><button class="btn inscription text-white px-5 py-3 fw-light">Inscrit toi</button></a>
      </section>
    </main>
    <!-- Réduire espace entre le header et le mainbody -->

    <?php require_once('./component/footer.php'); 
    //import de footer.php contenant le footer ainsi que le JS BootStrap
    ?>
  </body>
</html>