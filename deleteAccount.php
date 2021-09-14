<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
//BACK : A FAIRE APRES LA CREATION DES PAGES COMPTE EN BANQUE ET BANQUIER
<?php

//require_once(); DB
//require_once(); Security
//require_once(); function/DeleteClientRequest
if($_SERVER['REQUEST_METHOD']=='POST'){
    $db = DB::connect();
    $idclient = DB::connect(); //A changer : Je ne sais pas encore ou est ce qu'on récupère l'idClient.
    if(!$db || !$idclient){
        //Code pour afficher une erreur
    }else{
        if(Functions::deleteClientRequest($db,
            $idclient,
            $_POST['titulaire'],
            $_FILES['lettreResiliation']))
            {
                //Code success = > to connected
            }else{
                //retourner un message d'erreur 
            }
    }
}

?>
<head>
    <?php require_once('./component/head.php'); ?>
</head>

<body class="clientpath">
<?php 
    if(isset($_SESSION['token'])){
        require_once('./component/header/headerConnected.php');
    }else{
        header('Location: ./index.php');
    }
?>
    <main class="container mt-5">
        <div class="row-cols-sm-auto d-flex justify-content-end d-md-none">
            <button class="btn rounded-pill bg-danger text-white my-3" type="button">Je reste</button>
        </div>
        
<div class="row">
    <div class="col-md-12 d-flex flex-row justify-content-center justify-content-md-between">
    <div class="col-md-5">
        <div class="d-flex justify-content-center">
            <h2 class="text-center my-3 mt-md-5 w-75">Vous souhaitez nous quitter ?</h2>
        </div>
        <section class="d-flex justify-content-center h-75 delete-bg">
            <form action="formokay.php" method="POST" class="d-flex flex-column align-items-center justify-content-center my-3">
                <div class="mb-3 d-flex flex-column align-items-center">
                    <label for="titulaire" class="form-label">Titulaire du compte</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0 bg-white" ><i class="bi bi-person"></i></span>
                        <input type="text" name="titulaire" class="form-control bg-white" id="titulaire" value="<?php echo $variable ?>" readonly>
                    </div>
                </div>
                <div class="my-3 d-flex flex-column align-items-center">
                    <p>Demande manuscrite signée</p>
                    <label class="btn border-danger rounded-pill bg-light text-danger px-5" for="lettreResiliation">
                    <input id="lettreResiliation" name="lettreResiliation" type="file" accept="image/png, image/jpeg, image/jpg, .pdf" class="visually-hidden" required>
                    Sélectionner la pièce
                    </label>
                </div>
                <button class="btn rounded-pill bg-danger text-white my-5 px-3 w-100" type="submit" id="resilier">Au revoir</button>
            </form>
        </section>            
    </div>

    <div class="d-none col-md-5 d-md-flex flex-column h-75">
        <h2 class="text-center mb-3 mt-md-5">Pourquoi vous devriez rester!</h2>
        <section class="d-flex flex-column justify-content-center">
            <p class="mb-5 text-justify">
                No! Hoc non credant? Gus habet cameras ubique placet. 
                Audire te! Non, omnia noit, omnia simul. Ubi eras hodie ? 
                In Lab! Et vos nolite cogitare suus 'possible ut Tyrus de cigarette elevaverunt CAPSA vestris.
            </p>
            <p class="mb-5 text-justify">
                Tu nunc coci ejus. Tu autem cocus Lab et probavimus liceat mihi sine causa est nunc coci interficere. 
                Reputo it! Suus egregie. Ut antecedat. Quod si putas me posse facere, ergo ante. 
                Pone aute in caput !
            </p>
            <p class="text-justify">
                Ludum mutavit. Verbum est ex. Et ... sunt occidat. Videtur quod est super indamissible oppidum. 
                Quis transfretavit tu iratus es
            </p>
            <div class="row-cols-sm-auto d-md-flex justify-content-end d-none me-1 mt-1">
                <button class="btn rounded-pill bg-danger text-white mb-5" type="button">Je reste</button>
            </div>
        </section>
    </div>
    </div>
</div>

    </main>
<!-- END of main content -->
    
    <!-- Load footer-->
    <?php require_once('./component/footer.php'); ?>
     
</body>
</html>