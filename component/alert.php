<?php
session_start();
if ($_SESSION['success'] || $_SESSION['error']){
    if ($_SESSION['error']){
        ?>
        <div class="alert alert-danger" role="alert"><h3><?php echo $_SESSION['error']; ?></h3></div>
        <?php
    }
    else if ($_SESSION['success']){
        ?> 
        <div class="alert alert-success" role="alert"><h3><?php echo $_SESSION['success']; ?></h3></div> 
        <?php
    }
}