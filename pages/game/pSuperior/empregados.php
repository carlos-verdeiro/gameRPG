<?php

session_start();

if (isset($_SESSION["status"]) && $_SESSION["status"] == "iniciado") {

    include_once ('../../templates/manipularInventario.php');

    $inventario = $_SESSION['inventario'];
    $_SESSION['localAtual'] = 'pSuperior/empregados';

    //pergunta----------
    if (isset($_POST['resposta']) && isset($_POST['indicePergunta'])) {
        $indice_pergunta = $_POST['indicePergunta'];
        $respondido = true;
    } else {
        $indice_pergunta = rand(0, 49);
        $respondido = false;
    }

    $caminho_arquivo = '../../../assets\perguntas.json';

    $json_data = file_get_contents($caminho_arquivo);

    $perguntas = json_decode($json_data, true);

    if ($perguntas === null) {
        die("Erro ao decodificar o JSON.");
    }

    if (isset($perguntas[$indice_pergunta])) {

        $perguntaCompleta = $perguntas[$indice_pergunta];

        $id = $perguntaCompleta['id'];
        $pergunta = $perguntaCompleta['pergunta'];
        $respostas = $perguntaCompleta['respostas'];
        shuffle($respostas);
        $correta = $perguntaCompleta['correta'];

    }
    //pergunta----------

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
    <title>A Busca pelo Graal - Empregados</title>
</head>

<body>
    <main class="telaPrincipal" id="empregados">
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
                <h3>Cômodo atual: Empregados</h3>
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
                    <?php

                    echo '<h1>Chave Inferior</h1>';
                    echo '<p>Deseja pegar a chave inferior?</p>';

                    ?>
                </content>
            </div>
            <div id="divDica">

            </div>
        </section>
        <section id="section4">

            <form action="" method="post" class="respostas">
                <input type="hidden" name="addItem" value="chaveInferior">
                <input type="submit" value="Pegar Chave Inferior" class="submitItem">
            </form>

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