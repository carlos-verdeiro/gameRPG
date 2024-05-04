<?php

session_start();

if (isset($_SESSION["status"]) && $_SESSION["status"] == "iniciado") {

    $inventario = $_SESSION['inventario'];
    $_SESSION['localAtual'] = 'pSuperior/corredor2';

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
    <title>A Busca pelo Graal - Corredor superior 2</title>
</head>

<body>
    <main class="telaPrincipal" id="corredor2">
        <section id="section1">
            <div id="inventario">
                <?php $pathImagens = '../../../';
                include_once ('../../templates/inventario.php') ?>
            </div>
            <div id="divMapa">
                <img src="../../../assets/img/map.svg" alt="mapa" onclick="openPopup('popupMapa')">
            </div>
            <div id="configuracao">
                <img src="../../../assets/img/config.svg" alt="configurações" onclick="openPopup('popupConfig')">
            </div>
        </section>
        <section id="section2">
            <div id="local">
                <h3>Cômodo atual: Corredor Superior 2</h3>
            </div>
        </section>
        <section id="section3">
            <div id="mudarComodo">
                <div id="subComodo">
                    <h3>Mudar Cômodo</h3>
                    <a href="../pSuperior.php" class="button">
                        <h3>Corredor 1</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                    <a href="empregados.php" class="button">
                        <h3>Sala empregados</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                    <a href="sotao.php" class="button">
                        <h3>Sótao</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                    <a href="salaSecreta.php" class="button">
                        <h3>Sala Secreta</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                </div>
            </div>
            <div id="divPergunta">
                <content>
                    <h1>Corredor 2</h1>
                    <p>Selecione para onde deseja ir</p>
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
<div id="popupMapa" class="popup">
    <img src="../../../assets/img/exit.svg" id="closeBtnMapa " class="closeBtnPopup" onclick="closePopup('popupMapa')">
    <h2>MAPA</h2>
    <p>Aqui vai aparecer o mapa</p>
</div>

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