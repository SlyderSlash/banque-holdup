<?php
echo 'hello all';
var_dump($_POST);
var_dump($_FILES);
var_dump(preg_match_all('/[a-zA-Z1-9]/', $_POST['password']));
?>