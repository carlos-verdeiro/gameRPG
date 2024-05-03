<?php

session_start();

function verificacaoItens($inv)
{
    if (!$inv['revista'] && !$inv['livro'] && !$inv['panela'] && $inv['faca'] && !$inv['chaveInferior'] && $inv['verificacoes'] < 3) {
        return true;
    } else {
        return false;
    }

}

if (isset($_SESSION["status"]) && $_SESSION["status"] == "iniciado") {

    include_once ('../templates/manipularInventario.php');

    $inventario = $_SESSION['inventario'];
    $_SESSION['localAtual'] == 'hall';

    if (isset($_GET['semVerificacao'])) {
        echo '<script>Você não possui verificações!</script>';
    }

    if (isset($_GET['verificacao']) && $_GET['verificacao'] == true) {

        if ($_SESSION['inventario']['verificacoes'] > 0) {
            if (isset($_SESSION['inventario']['verificacoes'])) {

                $_SESSION['inventario']['verificacoes']--;

                if (verificacaoItens($inventario)) {
                    header("Location: hall.php?resVerificacao=true");
                } else {
                    header("Location: hall.php?resVerificacao=false");
                }

            }
        } else {
            header("Location: hall.php?semVerificacao");
        }

    }

    if (isset($_GET["logout"])) {
        session_unset();
        session_destroy();
        header('Location: ../../index.php');
        exit;
    }
    if (isset($_GET["voltarMenu"])) {
        header('Location: ../../index.php');
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/jogo.css">
    <title>A Busca pelo Graal</title>
</head>

<body>
    <main id="telaPrincipal">
        <section id="section1">
            <div id="inventario">
                <?php include_once ('../templates/inventario.php') ?>
            </div>
            <div id="divMapa">
                <img src="../../assets/img/map.svg" alt="mapa" onclick="openPopup('popupMapa')">
            </div>
            <div id="configuracao">
                <img src="../../assets/img/config.svg" alt="configurações" onclick="openPopup('popupConfig')">
            </div>
        </section>
        <section id="section2">
            <div id="local">
                <h3>Cômodo atual: Hall Principal</h3>
            </div>
        </section>
        <section id="section3">
            <div id="mudarComodo">
                <div id="subComodo">
                    <h3>Mudar Cômodo</h3>
                    <a href="cozinha.php" class="button">
                        <h3>Cozinha</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                    <a href="biblioteca.php" class="button">
                        <h3>Biblioteca</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                    <a href="pSuperior.php" class="button">
                        <h3>Piso Superior</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                    <a href="pInferior.php" class="button">
                        <h3>Piso Inferior</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                </div>

            </div>
            <div id="divPergunta">
                <content>
                    <?php
                    if (isset($_GET["semVerificacao"])) {
                        echo "<span class='msgAlert'>Você não possui verificações!</span>";
                    }
                    ?>
                    <h1>Deseja verificar?</h1>
                    <p>Verificar se possui apenas os itens necessários para alcançar o tesouro secreto.</p>
                </content>
            </div>
            <div id="divSeparador">

            </div>
        </section>
        <section id="section4">
            <a href="?verificacao=true" id="verificacao" class="respostas">
                Verificar
            </a>

            <form action="" method="post" class="respostas">
                <input type="hidden" name="addItem" value="panela">
                <input type="submit" value="Pegar Panela" class="submitItem">
            </form>

        </section>
        <section id="section5">
            
        </section>
    </main>
</body>
<!--TODOS POPUS-->
<div id="popupMapa" class="popup">
    <img src="../../assets/img/exit.svg" id="closeBtnMapa " class="closeBtnPopup" onclick="closePopup('popupMapa')">
    <h2>MAPA</h2>
    <p>Aqui vai aparecer o mapa</p>
</div>

<div id="popupConfig" class="popup">
    <img src="../../assets/img/exit.svg" id="closeBtnConfig " class="closeBtnPopup" onclick="closePopup('popupConfig')">
    <h2>Configurações</h2>
    <ul id="ulConfiguracoes">
        <li><a href="?voltarMenu">Voltar para menu</a></li>
        <li><a href="?logout" id="sairJogo">Apagar jogo</a></li>
    </ul>
</div>
<script src="../../assets/js/popups.js"></script>

</html>