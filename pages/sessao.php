<?php

session_start();

if (isset($_SESSION['status'])) {

    $status = $_SESSION['status'];
    $localAtual = $_SESSION['localAtual'];


    header("Location: game/{$localAtual}.php");
    exit;
} else {
    $_SESSION['status'] = 'iniciado';
    $_SESSION['inventario'] = [
        'revista' => false,
        'livro' => false,
        'panela' => false,
        'faca' => false,
        'chaveInferior' => false,
        'verificacoes' => 0
    ];
    $_SESSION['localAtual'] = 'hall';

    header("Location: game/hall.php");
    exit;
}
?>