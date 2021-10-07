<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once('./component/head.php'); ?>
    <link href="./assets/styles/connexion.css" rel="stylesheet">
  </head>

<body  class="clientpath ">
    <?php 
        require_once('./component/alert.php');
        require_once('./component/header/headerConnected.php');

        /* if (isset($_SESSION['token'])){
            require_once('./component/header/headerConnected.php');
        }else{
        require_once('./component/header/headerNotConnected.php'); 
        //import de header_not_connected.php contenant le header non connecté
        } */
    ?>
    
    <main class='container py-5 mt-5 '>
        <!-- formulaire de virement -->
        <section class="row mx-1 mt-5 mt-md-1" id="newTransaction">
            <h2 class='col-12 text-center transactionEntry'>Nouveau virement</h2>
            <form class="col-12" id="transactionForm" method='post' >
                <div class="row">
                    <div class="col-xl-6 px-md-5">
                        <!-- saisie de la demande -->
                        <div class="row d-flex flex-column transactionEntry">

                            <!-- choix du bénéficiaire -->
                            <div class="col-12 p-0">
                                <label for="chooseBeneficiary" class="mt-5 mb-4 p-0 fs-4">Choisir le bénéficiaire</label>
                                <select name="beneficiaries" id="chooseBeneficiary" class='mb-2 form-select fw-light'>
                                    <option value="">Merci de choisir votre bénéficiaire</option>
                                    <option value="bidon">iban bidon pour test</option>
                                </select>
                            </div>

                            <!-- accès à l'ajout de bénéficiaires -->
                            <button class='btn col-auto ms-auto mb-5' id="goToAddBeneficiary">+ ajouter un bénéficiaire</button>

                            <!-- montant de la transaction -->
                            <div class="col-md-9 mt-3 p-0 ms-auto">
                                <div class="input-group p-0 mb-4">
                                    <span class="input-group-text border-end-0 bg-transparent">Saisir un montant :</span>
                                    <input type="number" required name="amount" id="transactionAmount" placeholder="350,50" class="border-start-0 border-end-0 form-control text-center">
                                    <span class="input-group-text border-start-0 bg-transparent">€</span>
                                </div>
                            </div>
                            <!-- accès à la confirmation de transaction -->
                            <a class='btn col-auto ms-auto mb-4 px-5' id="goToConfirmTransation">Valider</a>
                        </div> 

                    </div>
                    <div class="col-xl-6 px-md-5 d-none" id="confirmTransaction">
                        <!-- demande de confirmation de virement -->
                        <div class="row d-flex justify-content-around ">
                            <h3 class="mt-5 mb-4">Confirmation du virement</h3>
                            <p class="text-center mb-5 fw-light">Confirmez-vous le virement d'un montant de <span id="showTransactionAmount">xx</span> € vers le compte <span id="beneficiaryAccount">xxxxxxxxxxx</span> ?</p>
                            <button class="btn col-3" type="submit" id="validTransaction">oui</button>
                            <a href='./virement.php' class="btn col-3" id="abortTransaction">non</a>
                        </div>
                    </div>
                </div>
                

                    
                
            </form>  
        </section>

        <!-- confirmation de virement réalisé -->
        <!-- <section class="row mb-5  mx-1" id="transfertConfirmed">
            <h3 class="mb-5">Virement effectué</h3>
            <p class="text-center mb-5 fw-light">Le virement d'un montant de <span class="showTransactionAmount">xx</span> € vers le compte <span class="beneficiaryAccount">xxxxxxxxxxx</span> a bien été réalisé.</p>
        </section> -->

        <!-- ajouter un bénéficiaire -->
        <section class="row mx-1 d-none mt-5 mt-md-1" id="addBeneficiary">
            <h3 class="border-bottom border-dark col-12 col-md-6 p-0 mb-5">Ajouter un bénéficiaire</h3>
            <form method='POST' class=' col-12' id="addBenefForm">
                <div class="p-0 row">
                    <label for="iban" class="p-0 mb-3">Saisir IBAN / BBAN</label>

                    <!-- saisie nouveau bénéficiaire -->
                    <div class="p-0 " style="position:relative"> 
                        <input type="text" required name="iban" id="newIban" placeholder="FR17645890944845795812" class="border-0 form-control bg-light mb-4" style="border-radius: 10px 45px 45px 10px">
                        <a class=" btn px-md-5" id="addIbanBtn" style="position:absolute; top:0; right:0;">Ajouter</a>
                    </div>
                </div>

                <!-- confirmation nouveau bénéficiaire -->
                <div class="p-0 row d-flex justify-content-around pt-5 fw-light d-none d-md-block opacity" id="confirmNewIban">
                    <p class="p-0">Êtes-vous sûr de vouloir ajouter le compte suivant ?</p>
                    <p class="text-center mb-4" id='showNewIban' >xxxxxxxxxxxxxxxxxxxxxx</p>
                    <p class="text-center mb-4">Confirmez-vous l'ajout du compte ?</p>
                    <button class="btn col-3" type="submit" >oui</button>
                    <a href='./virement.php' class="btn col-3" id="abortNewBeneficiary">non</a>
                </div>
            </form>
        </section>

        <!-- confirmation d'ajout de bénéficiaire -->
        <!-- <section class="row mx-1 " id="beneficiaryAdded">
            <h3 class="mb-5">Bénéficiaire ajouté</h3>
            <p class="mb-5 fw-light">Félicitations, le compte <span class="showNewIban">xxxxxxxxxxxxxxxxxxxxxx</span> a bien été ajouté.</p>
            <p class="mb-5 fw-light">Les virements vers ce bénéficiaire sont désormais possibles.</p>
        </section> -->

    </main>
<!-- Load footer-->
<?php 
    require_once('./component/footer.php');
?>
<script src="./component/script/virement.js"></script>
</body>
</html>