<?php
if ($_SESSION['success'] || $_SESSION['error']){
    if ($_SESSION['error']){
        ?>
        <div class="alert alert-danger" role="alert"><h5><?php echo $_SESSION['error']; ?></h5></div>
        <?php
        $_SESSION['error'] = null;
    }
    else if ($_SESSION['success']){
        ?> 
        <div class="alert alert-success" role="alert"><h5><?php echo $_SESSION['success']; ?></h5></div> 
        <?php
        $_SESSION['success'] = null;
    }
}