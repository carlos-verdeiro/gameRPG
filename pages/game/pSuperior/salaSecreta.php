<?php

session_start();

function verificacaoItens($inv)
{
    if (!$inv['revista'] && !$inv['livro'] && !$inv['panela'] && $inv['faca'] && !$inv['chaveInferior'] && $inv['verificacoes'] == 3) {
        return true;
    } else {
        return false;
    }

}

if (isset($_SESSION["status"]) && $_SESSION["status"] == "iniciado") {

    include_once ('../../templates/manipularInventario.php');

    $inventario = $_SESSION['inventario'];
    $_SESSION['localAtual'] = 'pSuperior/salaSecreta';

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
    <title>A Busca pelo Graal - Sala secreta</title>
</head>

<body>
    <main class="telaPrincipal" id="salaSecreta">
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
                <h3>Cômodo atual: Sala Secreta</h3>
            </div>
        </section>
        <section id="section3">
            <div id="mudarComodo">
                <?php

                if (!$_SESSION['inventario']['chaveSecreta']) {
                    echo '<div id="subComodo">
                    <h3>Mudar Cômodo</h3>
                    <a href="corredor2.php" class="button">
                        <h3>Corredor 2</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                </div>';
                }
                ?>
            </div>
            <div id="divPergunta">
                <content>

                    <?php

                    if (!$_SESSION['inventario']['chaveSecreta']) {
                        echo '<h1>Sala Secreta</h1>';
                        echo '<p>Você não possui a chave secreta!</p>';
                    } else {
                        if (verificacaoItens($inventario)) {
                            echo '<h1>PARABÉNS!</h1>';
                            echo '<p>Você alcançou o tesouro!</p>';
                        } else {
                            echo '<h1>Você morreu!</h1>';
                            echo '<p>Deseja recomeçar?</p>';
                        }
                    }
                    ?>

                </content>
            </div>
            <div id="divDica">

            </div>
        </section>
        <section id="section4">
            <?php

            if (!$_SESSION['inventario']['chaveSecreta']) {
                echo '<form action="corredor2.php" method="post" class="respostas">
                        <input type="submit" value="Retornar" class="submitItem">
                    </form>';
            } else {

                echo '<form action="../../../index.php" method="post" class="respostas">
                        <input type="submit" value="Voltar ao menu principal" class="submitItem">
                    </form>';
            }
            ?>



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

<?php

if ($_SESSION['inventario']['chaveSecreta']) {
    $_SESSION['status'] = 'finalizado';
}

?>