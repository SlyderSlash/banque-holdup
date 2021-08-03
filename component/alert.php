<?php

if($_SESSION['error']){
    echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error']."</div>";
} elseif($_SESSION['success']) {
    echo "<div class='alert alert-success' role='alert'>".$_SESSION['success']."</div>";
}