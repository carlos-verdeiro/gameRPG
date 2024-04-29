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

    $status = $_SESSION['status'];
    $inventario = $_SESSION['inventario'];
    $_SESSION['localAtual'] == 'hall';

    if (isset($_GET['verificacao']) && $_GET['verificacao'] == true) {

        if (isset($_SESSION['inventario']['verificacoes'])) {

            $_SESSION['inventario']['verificacoes'] += 1;

            if (verificacaoItens($inventario)) {
                header("Location: hall.php?resVerificacao=true");
            } else {
                header("Location: hall.php?resVerificacao=false");
            }

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
                <ul>
                    <?php

                    if (isset($inventario)) {
                        if ($inventario['revista']) {
                            echo '<li><img src="../../assets/img/inventario/revistaPossui.svg" class="possui" alt="Possui Revista" title="Possui Revista"></li>';
                        } else {
                            echo '<li><img src="../../assets/img/inventario/revistaNaoPossui.svg" class="naoPossui" alt="Não Possui Revista" title="Não Possui Revista"></li>';
                        }
                        if ($inventario['livro']) {
                            echo '<li><img src="../../assets/img/inventario/livroPossui.svg" class="possui" alt="Possui Livro" title="Possui Livro"></li>';
                        } else {
                            echo '<li><img src="../../assets/img/inventario/livroNaoPossui.svg" class="naoPossui" alt="Não Possui Livro" title="Não Possui Livro"></li>';
                        }

                        if ($inventario['panela']) {
                            echo '<li><img src="../../assets/img/inventario/panelaPossui.svg" class="possui" alt="Possui Panela" title="Possui Panela"></li>';
                        } else {
                            echo '<li><img src="../../assets/img/inventario/panelaNaoPossui.svg" class="naoPossui" alt="Não Possui Panela" title="Não Possui Panela"></li>';
                        }

                        if ($inventario['faca']) {
                            echo '<li><img src="../../assets/img/inventario/facaPossui.svg" class="possui" alt="Possui Faca" title="Possui Faca"></li>';
                        } else {
                            echo '<li><img src="../../assets/img/inventario/facaNaoPossui.svg" class="naoPossui" alt="Não Possui Faca" title="Não Possui Faca"></li>';
                        }

                        if ($inventario['chaveInferior']) {
                            echo '<li><img src="../../assets/img/inventario/chavePossui.svg" class="possui" alt="Possui Chave Inferior" title="Possui Chave Inferior"></li>';
                        } else {
                            echo '<li><img src="../../assets/img/inventario/chaveNaoPossui.svg" class="naoPossui" alt="Não Possui Chave Inferior" title="Não Possui Chave Inferior"></li>';
                        }

                        echo '<li class="verificacao">Verificações: ' . $inventario['verificacoes'] . '</li>';

                    }

                    ?>
                </ul>
            </div>
            <div id="divMapa">
                <img src="../../assets/img/map.svg" alt="mapa" onclick="openPopup('popupMapa')">
            </div>
        </section>
        <section id="section2">
            <div id="local">
                <h3>Cômodo atual: Hall Principal</h3>
            </div>
        </section>
        <section id="section3">
            <div id="mudarComodo">
                <button class="button" onclick="openPopup('popupComodo')">
                    Mudar cômodo
                    <div class="arrow">
                        << </div>
                </button>

            </div>
            <div id="divPergunta">
                <content>
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
        </section>
        <section id="section5">
            <div id="configuracao" onclick="openPopup('popupConfig')">
                <img src="../../assets/img/config.svg" alt="configurações">
            </div>
            </div>
            <div id="tempoJogo">
                <p>tempo</p>
            </div>
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

<div id="popupComodo" class="popup">
    <img src="../../assets/img/exit.svg" id="closeBtnComodo " class="closeBtnPopup" onclick="closePopup('popupComodo')">
    <h2>Cômodos</h2>
    <p>Aqui vai aparecer os cômodos possíveis</p>
</div>
<script src="../../assets/js/popups.js"></script>

</html>