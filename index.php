<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php require_once('./component/head.php'); 
    //import de head.php contenant les frames de base
    ?>
    
  </head>
  <body class="notclient" id="homepage">
    <?php require_once('./component/header/headerHome.php'); 
    //import de header-home.php contenant le header spécifique à la page home
    ?>
     <!-- TODO : Diminuer la largeur du bloc pour créer un espacement entre le texte de gauche et de droite : Doublon, la todo, c'était d'enlever l'espacement du haut sur mobile : DONE -->
    <main class="mt-sm-5 mx-md-5 mx-lg-auto d-flex flex-column align-items-center flex-lg-row">
      <section class="px-4 p-sm-4 p-xxl-5 p-lg-5 px-lg-5 mx-lg-5">
        <h2 class="fs-1">Nonne vides quid sit</h2>
        <p class="fw-light my-lg-5">No! Hoc non credant? Gus habet cameras ubique placet. Audire te! Non, omnia novit, <strong>omnia simul.</strong>
          Ubi eras hodie? In Lab! Et vos nolite cogitare suus possible ut Tyrus de cigarette <strong>elevaverunt CAPSA</strong> vestris.</p>
        <p class="fw-light my-lg-5">Tu nunc coci ejus. Tu autem cocus Lab et probavimus liceat <strong>mihi sine causa</strong> est nunc coci interficere. Reputo it! Suus egregie. Ut antecedat. 
          Quod si putas me posse facere, ergo ante. <a href="#" class="link">Pone aute in caput !</a></p>
        <p class="fw-light my-lg-5">Ludum mutavit. Verbum est ex. Et ... sunt occidat. Videtur quod est super <strong>indamissible</strong> oppidum. Quis transfretavit tu iratus es contudit cranium cum dolor apparatus. Qui curis!</p>
      </section>
      <!-- TODO : Diminuer la largeur du bloc pour créer un espacement entre le texte de gauche et de droite :DONE -->
      <section class="p-4 d-flex flex-column align-items-center">
        <figure class="mx-auto">
          <img src="assets/img/homepage-illustration.svg" class="w-100">
          <!-- TODO : Voir si illustration disponible en SVG : DONE -->
        </figure>
        <p class="fw-light text-center">Sum expectantes. Ego hodie expectantes. Expectantes, et misit unum de pueris Gus interficere. Et suus vos. Nescio quis, qui est <strong>bonus usus liberi</strong> ad Isai?  </p>
        <button class="btn inscription text-white px-5 py-3 fw-light">Je m'inscris</button>
      </section>
    </main>
    <!-- Réduire espace entre le header et le mainbody -->

    <?php require_once('./component/footer.php'); 
    //import de footer.php contenant le footer ainsi que le JS BootStrap
    ?>
  </body>
</html>