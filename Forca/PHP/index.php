<?php
session_start();

if (!isset($_SESSION['palavra'])) {

    $palavras = [
        "COMPUTADOR",
        "PROGRAMACAO",
        "ALGORITMO",
        "INTERNET",
        "FACULDADE",
        "DESENVOLVIMENTO",
        "SISTEMA",
        "BANCO",
        "SOFTWARE",
        "HARDWARE"
    ];

    $_SESSION['palavra'] = $palavras[array_rand($palavras)];
    $_SESSION['tentativas'] = 6;
    $_SESSION['letras_usadas'] = [];
}

$palavra = $_SESSION['palavra'];
$tentativas = $_SESSION['tentativas'];
$letrasUsadas = $_SESSION['letras_usadas'];

$palavraOculta = "";

foreach(str_split($palavra) as $letra){

    if(in_array($letra, $letrasUsadas)){
        $palavraOculta .= $letra . " ";
    }else{
        $palavraOculta .= "_ ";
    }
}

$venceu = true;

foreach(str_split($palavra) as $letra){
    if(!in_array($letra, $letrasUsadas)){
        $venceu = false;
        break;
    }
}

$perdeu = $tentativas <= 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jogo da Forca</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Jogo da Forca</h1>

    <h2><?php echo $palavraOculta; ?></h2>

    <p>
        Tentativas restantes:
        <strong><?php echo $tentativas; ?></strong>
    </p>

    <p>
        Letras utilizadas:
        <?php echo implode(", ", $letrasUsadas); ?>
    </p>

    <?php if(!$venceu && !$perdeu): ?>

        <form action="processar.php" method="POST">

            <input
                type="text"
                name="letra"
                maxlength="1"
                required
                autofocus
            >

            <button type="submit">
                Tentar
            </button>

        </form>

    <?php endif; ?>

    <?php if($venceu): ?>

        <div class="mensagem venceu">
            Você venceu!
        </div>

        <a href="reiniciar.php">
            <button>Novo Jogo</button>
        </a>

    <?php endif; ?>

    <?php if($perdeu): ?>

        <div class="mensagem perdeu">
            Você perdeu!
            <br>
            Palavra: <?php echo $palavra; ?>
        </div>

        <a href="reiniciar.php">
            <button>Novo Jogo</button>
        </a>

    <?php endif; ?>

</div>

</body>
</html>