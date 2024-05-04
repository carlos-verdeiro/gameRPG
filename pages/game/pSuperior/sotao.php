<?php

session_start();

if (isset($_SESSION["status"]) && $_SESSION["status"] == "iniciado") {

    if (isset($_SESSION['inventario'])) {

        $itens = $_SESSION['inventario'];

        $itemAleatorio = array_rand($itens);
        while ($itemAleatorio == 'verificacoes') {
            $itemAleatorio = array_rand($itens);
        }
        $_SESSION['inventario'][$itemAleatorio] = false;
    }

    $_SESSION['inventario']['verificacoes']++;

    $inventario = $_SESSION['inventario'];
    $_SESSION['localAtual'] = 'pSuperior/sotao';

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

}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/jogo.css">
    <title>A Busca pelo Graal - Sótao</title>
</head>

<body>
    <main class="telaPrincipal" id="sotao">
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
                <h3>Cômodo atual: Sótao</h3>
            </div>
        </section>
        <section id="section3">
            <div id="mudarComodo">
                <div id="subComodo">
                    <h3>Mudar Cômodo</h3>
                    <a href="corredor2.php" class="button">
                        <h3>Corredor 2</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                </div>
            </div>
            <div id="divPergunta">
                <content>
                    <h1>Sótao</h1>
                    <?php
                    echo'<p>Você ganhou uma verificação, mas pode ter perdido algum item do seu inventario!</p>';

                    ?>
                </content>
            </div>
            <div id="divDica">
                <div id="dica">

                    <h2>Dica</h2>

                    <h4>No sótao você ganha uma verificação, mas pode perde um item aleatório</h4>

                </div>
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