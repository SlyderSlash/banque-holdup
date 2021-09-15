<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require_once('./component/head.php'); ?>
</head>

<body>
  <!-- Début du header_connected  -->
  <?php 
  require_once('./component/alert.php');
  if (isset($_SESSION['token'])) {
    require_once('./component/header/headerConnected.php');
    }
  else {
    require_once('./component/header/headerBanker.php');
    } 
  ?>

  <main class="container">
    <div class="row">
      <h2 class="text-center mb-4">Vos demandes en attentes</h2>
      <section class="col-md-8 col-lg-6 d-flex flex-column w-100" id="globalSection">
        <article class=" text-center my-md-4">
          <h3>Validation des comptes</h3>
          <div class="item d-flex justify-content-center mb-4">
            <p class="my-auto me-4">Vous avez X demandes</p>
            <button type="button" class="border-0 bg-transparent" id="category" name="account_creation"><img
                src="./assets/img/leftArrow.svg" alt="Bouton de sélection"></button>
          </div>
        </article>

        <article class=" text-center my-md-4">
          <h3>Ajout des bénéficiaires</h3>
          <div class="item d-flex justify-content-center mb-4">
            <p class="my-auto me-4">Vous avez X demandes</p>
            <button type="button" class="border-0 bg-transparent" id="category" name="account_beneficiaries"><img
                src="./assets/img/leftArrow.svg" alt="Bouton de sélection"></button>
          </div>
        </article>

        <article class=" text-center my-md-4">
          <h3>Suppression des comptes</h3>
          <div class="item d-flex justify-content-center mb-4">
            <p class="my-auto me-4">Vous avez X demandes</p>
            <button type="button" class="border-0 bg-transparent" id="category" name="account_deletion"><img
                src="./assets/img/leftArrow.svg" alt="Bouton de sélection"></button>
          </div>
        </article>

      </section>

      <section id="account_creation" class="d-none">
        <article class="text-center my-4">
          <h3>Validation des comptes</h3>
          <table class="table table-borderless my-3">
            <tbody>
              <tr class="d-flex justify-content-center align-items-center">
                <td>01250</td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="document"><img
                      src="./assets/img/docButton.svg" alt="Accès pièce jointe"></button>
                </td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="validation"><img
                      src="./assets/img/checkIcon.svg" alt="Validation dossier"></button>
                </td>
              </tr>
              <tr class="d-flex justify-content-center align-items-center">
                <td>10001</td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="document"><img
                      src="./assets/img/docButton.svg" alt="Accès pièce jointe"></button>
                </td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="validation"><img
                      src="./assets/img/checkIcon.svg" alt="Validation dossier"></button>
                </td>
              </tr>
              <tr class="d-flex justify-content-center align-items-center">
                <td>10231</td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="document"><img
                      src="./assets/img/docButton.svg" alt="Accès pièce jointe"></button>
                </td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="validation"><img
                      src="./assets/img/checkIcon.svg" alt="Validation dossier"></button>
                </td>
              </tr>
            </tbody>
          </table>
        </article>
        <button type="button" class="border-0 bg-transparent" id="category" name="backToChoices"><img
            src="./assets/img/backArrow.svg" alt="Bouton de retour" data-bs-toggle="tooltip" data-bs-placement="left"
            title="Retour aux sélections" class="me-2">Retour aux sélections</button>

      </section>

      <section id="account_beneficiaries" class="d-none">
        <article class="text-center my-4">
          <h3>Ajout de bénéficiaires</h3>

          <hr class="hr_demands">
          <div class="row g-0 my-3 justify-content-center align-items-center">
            <div class="col-2">
              <span>10235</span>
            </div>
            <div class="col-8">
              <!-- ! Avec le tiret = 28 caractères -->
              <span>FR76-30006</span>
              <span>000011234567890</span>
              <span>189</span>
            </div>
            <div class="col-2">
              <button type="button" class="border-0 bg-transparent" id="validation"><img
                  src="./assets/img/checkIcon.svg" alt="Validation dossier"></button>
            </div>
          </div>
          <hr class="hr_demands">
          <div class="row g-0 my-3 justify-content-center align-items-center">
            <div class="col-2">
              <span>01235</span>
            </div>
            <div class="col-8">
              <!-- ! Avec le tiret = 28 caractères -->
              <span>FR76-30006</span>
              <span>000019253467682</span>
              <span>157</span>
            </div>
            <div class="col-2">
              <button type="button" class="border-0 bg-transparent" id="validation"><img
                  src="./assets/img/checkIcon.svg" alt="Validation dossier"></button>
            </div>
          </div>
          <hr class="hr_demands">
          <div class="row g-0 my-3 justify-content-center align-items-center">
            <div class="col-2">
              <span>03233</span>
            </div>
            <div class="col-8">
              <!-- ! Avec le tiret = 28 caractères -->
              <span>FR76-30035</span>
              <span>000025687512332</span>
              <span>235</span>
            </div>
            <div class="col-2">
              <button type="button" class="border-0 bg-transparent" id="validation"><img
                  src="./assets/img/checkIcon.svg" alt="Validation dossier"></button>
            </div>
          </div>
          <hr class="hr_demands">

        </article>
        <button type="button" class="border-0 bg-transparent" id="category" name="backToChoices"><img
            src="./assets/img/backArrow.svg" alt="Bouton de retour" data-bs-toggle="tooltip" data-bs-placement="left"
            title="Retour aux sélections" class=" me-2">Retour aux sélections</button>

      </section>

      <section id="account_deletion" class="d-none">
        <article class="text-center my-4">
          <h3>Suppression de comptes</h3>
          <table class="table table-borderless my-3">
            <tbody>
              <tr class="d-flex justify-content-center align-items-center">
                <td>01250</td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="document"><img
                      src="./assets/img/docButton.svg" alt="Accès pièce jointe"></button>
                </td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="validation"><img
                      src="./assets/img/checkIcon.svg" alt="Validation dossier"></button>
                </td>
              </tr>
              <tr class="d-flex justify-content-center align-items-center">
                <td>10001</td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="document"><img
                      src="./assets/img/docButton.svg" alt="Accès pièce jointe"></button>
                </td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="validation"><img
                      src="./assets/img/checkIcon.svg" alt="Validation dossier"></button>
                </td>
              </tr>
              <tr class="d-flex justify-content-center align-items-center">
                <td>10231</td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="document"><img
                      src="./assets/img/docButton.svg" alt="Accès pièce jointe"></button>
                </td>
                <td>
                  <button type="button" class="border-0 bg-transparent" id="validation"><img
                      src="./assets/img/checkIcon.svg" alt="Validation dossier"></button>
                </td>
              </tr>
            </tbody>
          </table>
        </article>
        <button type="button" class="border-0 bg-transparent" id="category" name="backToChoices"><img
            src="./assets/img/backArrow.svg" alt="Bouton de retour" data-bs-toggle="tooltip" data-bs-placement="left"
            title="Retour aux sélections" class="me-2">Retour aux sélections</button>

      </section>

    </div>
  </main>

  <?php require_once('./component/footer.php'); ?>
<script src="./component/script/bankerNavigation.js"></script>

</body>

</html>