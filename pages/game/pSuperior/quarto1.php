<?php

session_start();

if (isset($_SESSION["status"]) && $_SESSION["status"] == "iniciado") {

    $inventario = $_SESSION['inventario'];
    $_SESSION['localAtual'] = 'pSuperior/quarto1';

    if (isset($_GET["logout"])) {
        session_unset();
        session_destroy();
        header('Location: ../../../index.php');
        exit;
    }
    if (isset($_GET["voltarMenu"])) {
        header('Location: ../../../index.php');
        exit;
    }
}else {
    header('Location: ../../../index.php');
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/jogo.css">
    <title>A Busca pelo Graal - Quarto 1</title>
</head>

<body>
    <main class="telaPrincipal" id="quarto1">
        <section id="section1">
            <div id="inventario">
                <?php $pathImagens = '../../../';
                include_once ('../../templates/inventario.php') ?>
            </div>
            <div id="configuracao">
                <img src="../../../assets/img/config.svg" alt="configurações" onclick="openPopup('popupConfig')">
            </div>
        </section>
        <section id="section2">
            <div id="local">
                <h3>Cômodo atual: Quarto 1</h3>
            </div>
        </section>
        <section id="section3">
            <div id="mudarComodo">
                <div id="subComodo">
                    <h3>Mudar Cômodo</h3>
                    <a href="../pSuperior.php" class="button">
                        <h3>Corredor Superior</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                </div>
            </div>
            <div id="divPergunta">
                <content>
                    <h1>Quarto 1</h1>
                    <?php
                    if (isset($_SESSION['inventario']['revista']) && $_SESSION['inventario']['revista']) {
                        echo '<p>Não há nada aqui</p>';
                    } else {
                        echo '<p>Você não possui revista</p>';
                    }
                    ?>
                </content>
            </div>
            <div id="divDica">

            </div>
        </section>
        <section id="section4">

        </section>
        <section id="section5">

        </section>
    </main>
</body>
<!--TODOS POPUS-->

<div id="popupConfig" class="popup">
    <img src="../../../assets/img/exit.svg" id="closeBtnConfig " class="closeBtnPopup"
        onclick="closePopup('popupConfig')">
    <h2>Configurações</h2>
    <ul id="ulConfiguracoes">
        <li><a href="?voltarMenu">Voltar para menu</a></li>
        <li><a href="?logout" id="sairJogo">Apagar jogo</a></li>
    </ul>
</div>
<script src="../../../assets/js/popups.js"></script>

</html>