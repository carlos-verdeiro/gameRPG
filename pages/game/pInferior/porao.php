<?php

session_start();

if (isset($_SESSION["status"]) && $_SESSION["status"] == "iniciado") {
    
    include_once ('../../templates/manipularInventario.php');

    $inventario = $_SESSION['inventario'];
    $_SESSION['localAtual'] = 'pinferior/porao';

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
} else {
    header('Location: ../../../index.php');
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/jogo.css">
    <title>A Busca pelo Graal - Porão</title>
</head>

<body>
    <main class="telaPrincipal" id="porao">
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
                <h3>Cômodo atual: Porão</h3>
            </div>
        </section>
        <section id="section3">
            <div id="mudarComodo">
                <div id="subComodo">
                    <h3>Mudar Cômodo</h3>
                    <a href="../pInferior.php" class="button">
                        <h3>Escada Inferior</h3>
                        <div class="arrow">
                            << </div>
                    </a>
                </div>
            </div>
            <div id="divPergunta">
                <content>
                    <?php
                    if ($respondido) {
                        if ($_POST['resposta'] == $correta) {
                            $_SESSION['inventario']['verificacoes']++;
                            header('location: ../pInferior.php');

                        } else {
                            $_SESSION['inventario']['verificacoes']--;
                            header('location: ../pInferior.php');
                        }
                    } else {
                        echo '<h1>Pergunta</h1>';
                        echo '<p>' . $pergunta . '</p>';
                    }

                    ?>
                </content>
            </div>
            <div id="divDica">
                <div id="dica">

                    <h2>Dica</h2>

                    <h3>Resposta:</h3>
                    <h4>Correta +1 verificação e retorna</h4>
                    <h4>Incorreta -1 verificação e Retorna</h4>

                </div>
            </div>
        </section>
        <section id="section4">
            <?php
            echo '
                    
                    <form action="" method="post" class="respostas">
                        <input type="hidden" name="indicePergunta" value="' . $indice_pergunta . '">
                        <input type="hidden" name="resposta" value="' . $respostas[0] . '">
                        <input type="submit" value="' . $respostas[0] . '" class="submitItem">
                    </form>
    
                    <form action="" method="post" class="respostas">
                        <input type="hidden" name="indicePergunta" value="' . $indice_pergunta . '">
                        <input type="hidden" name="resposta" value="' . $respostas[1] . '">
                        <input type="submit" value="' . $respostas[1] . '" class="submitItem">
                    </form>
    
                    <form action="" method="post" class="respostas">
                        <input type="hidden" name="indicePergunta" value="' . $indice_pergunta . '">
                        <input type="hidden" name="resposta" value="' . $respostas[2] . '">
                        <input type="submit" value="' . $respostas[2] . '" class="submitItem">
                    </form>
                    
                    ';

            ?>

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