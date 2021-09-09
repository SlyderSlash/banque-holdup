<?php
    session_start();
?>
<!doctype html>
<html lang="fr">
<?php 
require_once ('./component/db/client.php');
require_once ('./component/db/noAuth.php');
require_once ('./component/security.php');
require_once ('./component/function/FunctionsClient.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['type'] === 'si'){
        $funcclient = new FunctionsClient;
        $call = $funcclient->signIn(
            $_POST['name'],
            $_POST['firstname'],
            $_POST['email'],
            $_POST['password'],
            $_POST['verifPassword'],
            $_POST['idCard'],
            $_FILE['idCard'],
            $_POST['birthDate'],
            $_POST['postalCode'],
            $_POST['town'],
            $_POST['street'],
            $_POST['numberstreet'],
            $_POST['cgv']);
    }
    else if ($_POST['type'] === 'li') {
        $funcclient=new FunctionsClient;
        $call = $funcclient->logIn(
            $_POST['email'],
            $_POST['password']
        );
    } 
    else if ($_POST['type'] === 'dev') {
        $funcclient = new FunctionsClient;
        $call = $funcclient->signIn(
            "Harness",
            "Jack",
            "jesuisunmail@croyezmoi.fr",
            "Bonjourfrom78",
            "Bonjourfrom78",
            null, null,
            "1990-02-01",
            78000,
            "Versailles",
            "Rue des mecs sur un cheval d'or",
            "99",
            "on"); 
    } 
    }
?>
  <head>
    <?php require_once('./component/head.php'); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet"> 
    <link href="./assets/styles/connexion.css" rel="stylesheet">
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
    <main class="container py-5 mt-5">
    <form method="post" ><button class="btn  me-5 ms-5" type="submit" name="type" value="dev"  id="lgbtnSubmit">DevMode</button></form>
    <!-- section de connexion -->
        <section class="row text-center" id="logIn">
            <h1 >Se connecter</h1>
            <div class="d-md-flex justify-content-center">
                    <p class="pe-md-2 mb-0 ">Nouveau client ?</p>
                    <a href="#" type="button" class="ps-md-2" name²="signinBtn"id="signinBtn">S'inscrire</a>
            </div>
            <div class="col-12">
                <!--  illustration + formulaire -->
                <div class="row d-flex  justify-content-between align-items-center">
                    <!-- illustration -->
                    <div class="col-6 d-none d-md-flex text-end justify-content-center" >
                        <img src="./assets/img/connexion-illustration.svg" alt="" class="">
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
                            <label for="password" >Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-transparent" ><i class="bi bi-lock"></i></span>
                                <input type="password" required name="password"id="lgpassword" placeholder="Votre mot de passe" class="border-start-0 form-control">
                            </div>
                        </div>
                        <!-- se souvenir de moi -->
                        <div class="form-check  mb-3 align-self-center">
                            <input class="form-check-input" type="checkbox" value=""name="rememberMe" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                        </div>
                        <!-- mot de passe oublié -->
                        <a href="#" class=" mb-4 align-self-center">Mot de passe oublié ?</a>
                        <!-- bouton sumit -->
                        <button class="btn  me-5 ms-5" type="submit" name="type" value="li"  id="lgbtnSubmit">Se connecter</button>
    
                    </form>
                </div>
    
    
            </div>
        </section>
    
    
    <!-- section d'inscription -->
        <section class="row text-center d-none" id="signin">
            <h1>Demande d'inscription</h1>
            <div class="col-12">
    
                <!-- ROW formulaire -->
                <form enctype="multipart/form-data" method="POST" class="row mt-5" id="signInForm">

                    
                    <!-- partie 1 : identité -->
                    <div id="identity" class="col-12 col-lg-4 text-sm-start d-flex flex-column  align-items-stretch ps-5 pe-5  d-lg-flex d-none">
                        <h2 class="border-bottom mb-5">Identité</h2>
    
                        <!-- name -->
                        <div class="text-start mb-3">
                            <label for="name">Nom</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-transparent" ><i class="bi bi-person"></i></span>
                                <input type="text" name="name" id="name" placeholder="Votre nom" class="border-start-0 form-control pt-2 pb-2" required>
                            </div>
                        </div>
    
                        <!-- firstname -->
                        <div class="text-start mb-3">
                            <label for="firstName">Prénom</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-transparent" ><i class="bi bi-person"></i></span>
                                <input type="text" name="firstname" id="firstName" placeholder="Votre prénom" class="border-start-0 form-control" required>
                            </div>
                        </div>
    
                        <!-- birthdate + gender -->
                        <div class=" row">
                            <!-- birthdate -->
                            <div class="text-start mb-3 col-sm-6">
                                <label for="birthdate" class="d-flex d-lg-none d-xl-flex ">Date de naissance</label>
                                <label for="birthdate" class="d-none d-lg-flex d-xl-none">Naissance</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-transparent " ><i class="bi bi-calendar3"></i></span>
                                    <input type="date" name="birthDate" id="birthdate" class="border-start-0 form-control p-0 text-center" required>
                                </div>
                            </div>
                            <!-- gender -->
                            <div class="text-start mb-3 col-sm-6 ">
                                <label for="gender">Genre</label>
                                <select class="form-select" name="gender" id="gender" aria-label="Gender selection" required>
                                    <option selected value="" class="form-select">Genre</option>
                                    <option value="man" class="form-select">Homme</option>
                                    <option value="woman" class="form-select">Femme</option>
                                </select>   
                            </div>
                                    
                        </div>
    
                        <!-- Pièce d'identité -->
                        <div class="mb-3 mt-3 d-flex flex-column align-items-stretch">
                            <button type="button" id="iD" class="inputFile">Pièce d'identité</button>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                            <input class="form-control d-none" name="idCard" type="file" id="idCard" accept="image/png, image/jpeg, image/jpg, .pdf" required>
                            <div class="opt mt-1 text-center">formats acceptés : *.jpg, *.jpeg, *.png, *.pdf</div>
                            <div id="selectedFile" class="mt-2 text-center">
    
                            </div>
                        </div>
    
                        <!-- bouton d-none en desktop -->
                        <button type="button" class="btn d-lg-none ps-5 pe-5 bg" id="identityBtn">Poursuivez vers la dernière étape</button>
    
                    </div>
    
    
                    <!-- partie 2 : domiciliation -->
                    <div id="adress" class="col-12 col-lg-4 text-sm-start d-flex flex-column align-items-stretch ps-5 pe-5 d-lg-flex d-none ">
                        <h2 class="border-bottom mb-5">Domiciliation</h2>
    
                        <!-- num. + rue -->
                        <div class=" row ">
                            <!-- Num. -->
                            <div class=" col-3 text-start mb-3">
                                <label for="num">Num.</label>
                                <input type="number" id="num" name='numberstreet' class="form-control p-2">
                            </div>
                            
                            <!-- Rue -->
                            <div class="text-start mb-3 col-9">
                                <label for="street">Rue</label>
                                <input type="text" name="street" id="street" class="form-control p-2" required>
                            </div>
    
                        </div>
                        <!-- Complément d'adresse -->
                        <div class="text-start mb-3">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <label for="cplmt">Complément d'adresse</label>
                                <div class="fw-light text-secondary opt">Optionnel</div>
                            </div>
                            
                            <input type="text" id="cplmt" class="form-control p-2">
                        </div>
                        <!-- CP + ville -->
                        <div class="row">
                            <!-- CP. -->
                            <div class="text-start mb-3 col-6 col-md-6" >
                                <label for="cp">Code postal</label>
                                <input type="number" name="postalCode" id="cp" class="form-control p-2" required>
                            </div>
                            
                            <!-- Ville -->
                            <div class="text-start mb-3 col-6 col-md-6">
                                <label for="town">Ville</label>
                                <input type="text" name="town" id="town" class="form-control p-2" required>
                            </div>
    
                        </div>
    
                    </div>
    
                    <!-- partie 3 : identification -->
                    <div id="identification" class="col-12 col-lg-4 text-sm-start d-flex d-lg-flex flex-column align-items-stretch ps-5 pe-5">
                        <h2 class="border-bottom mb-5">Identification</h2>
    
                        <!-- email -->
                        <div class="text-start mb-3">
                            <label for="emailId">Email</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-transparent" ><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" id="emailId" placeholder="Votre e-mail" class="border-start-0 form-control" required>
                            </div>
                        </div>
                        <!-- password -->
                        <div class="text-start mb-3">
                            <label for="passwordId">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-transparent" ><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" id="passwordId" placeholder="Votre mot de passe" class="border-start-0 form-control" required>
                            </div>
                        </div>
                        <!-- password verif -->
                        <div class="text-start mb-3">
                            <label for="passwordCheck">Vérification du mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0 bg-transparent" ><i class="bi bi-lock"></i></span>
                                <input type="password" name="verifPassword" id="passwordCheck" placeholder="Répétez votre mot de passe" class="border-start-0 form-control" required>
                            </div>
                        </div>
                        
                        <!-- bouton d-none en desktop -->
                        <button type="button" class="btn d-lg-none ps-5 pe-5 bg" id="identificationBtn">Poursuivre l'inscription</button>
    
                    </div>
    
                    <!-- valider les CGV -->
                    <div id="cgv" class="col-12 form-check mt-2 d-none d-lg-flex justify-content-center ">
                        <input class="form-check-input me-3" name="cgv" type="checkbox" id="cgvbox"  required>
                        <label class="form-check-label" for="cgvbox">Valider les C.G.V.</label>
                    </div>
                    <!-- bouton sumit -->
                    <div id="submit" class="col-12 mt-4  d-none d-lg-flex justify-content-center">
                        <button class="btn ps-5 pe-5" type="submit" name="type" value="si" id="validReq">Finaliser la demande</button>
    
                    </div>
    
                </form>
    
    
    
            </div>
        </section>
    
    
    </main>
    <script src="component/script/login.js"></script>
    <script src="component/script/connexion.js"></script>
    <?php 
    require_once('./component/footer.php');
    echo 'this is your token : ';
    var_dump($_SESSION['token']);
    var_dump($_SESSION['idclient']);
    ?>
  </body>
</html>