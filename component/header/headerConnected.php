<!-- Début du header_connected  -->
    <header>
       <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand m-0" href="index.php" title="Retour à l'accueil">
            <img class="logo" src="./assets/img/logo-white-without-text.png" alt="Logo de la banque Hold up">
          </a>
          <span class="header_title d-flex flex-column flex-grow-1 align-content-start">
            <h1 class="mb-0 text-white">Banque</h1>
            <h1 class="mb-0 text-white">Hold'up</h1>
          </span>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <figure>
                <img src="./assets/img/user-icon.png">
              </figure>
            </span>
          </button>

          <!-- menu overlay -->
          <div class="collapse navbar-collapse flex-grow-0" id="navbarText">
            <button class="navbar-toggler expanded d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <figure>
                  <img src="./assets/img/cross.png">
                </figure>
              </span> 
            </button>
            <figure class="logo-expand d-lg-none">
              <img src="./assets/img/logo-gradient-opacity.png">
            </figure>
            <ul class="navbar-nav d-flex pt-5 align-items-end p-lg-0 justify-content-lg-end fixed-top w-100 h-100">
              <h6 class="text-white text-decoration-underline d-lg-none pt-3 pe-3">Mon compte</h6>
              <li class="nav-item d-lg-none">
                <a class="nav-link fw-light pe-4" href="#" title="Historique du compte">Historique</a>
              </li>
              <h6 class="text-white text-decoration-underline d-lg-none pt-3 pe-3">Virements</h6>
              <li class="nav-item d-lg-none">
                <a class="nav-link fw-light pe-4" href="#" title="Mes virements">Mes virements</a>
              </li> 
              <li class="nav-item d-lg-none">
                <a class="nav-link fw-light pe-4" href="#" title="Ajouter bénéficiaires">Ajouter des bénéficiaires</a>
              </li>
              <h6 class="text-white text-decoration-underline d-lg-none pt-3 pe-3">Profil</h6>
              <li class="nav-item d-lg-none">
                <a class="nav-link fw-light pe-4" href="#" title="Modifier coordonnées">Modifier mes coordonnées</a>
              </li> 
              <li class="nav-item d-lg-none">
                <a class="nav-link fw-light pe-4" href="../../deleteAccount.php" title="Cloturer le compte">Cloturer mon compte</a>
              </li> 
              <li class="nav-item d-lg-none">
                <a class="nav-link fw-light pe-4" href="#" title="Contacter conseiller">Contacter mon conseiller</a>
              </li>                 
              <li class="nav-item d-lg-none">
                <a class="nav-link fw-light pe-4" href="#" title="../../CGU.php">Conditions générales</a>
              </li>              
              <li class="nav-item border border-white rounded align-self-end px-4 mt-4 me-4">
                <a class="nav-link text-white fw-light" href="../../deconnexion.php" title="Déconnexion">Déconnexion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</header>