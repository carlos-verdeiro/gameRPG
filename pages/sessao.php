<?php

session_start();

if (isset($_SESSION['status']) && isset($_GET['continuar'])) {

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
        'faca' => true,
        'chaveInferior' => false,
        'chaveSecreta' => false,
        'verificacoes' => 3
    ];
    $_SESSION['localAtual'] = 'hall';

    header("Location: game/hall.php");
    exit;
}