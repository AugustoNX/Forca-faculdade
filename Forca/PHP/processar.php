<?php
session_start();

if(isset($_POST['letra'])){

    $letra = strtoupper(trim($_POST['letra']));

    if(
        !in_array($letra, $_SESSION['letras_usadas']) &&
        preg_match("/^[A-Z]$/", $letra)
    ){

        $_SESSION['letras_usadas'][] = $letra;

        if(strpos($_SESSION['palavra'], $letra) === false){
            $_SESSION['tentativas']--;
        }
    }
}

header("Location: index.php");
exit;