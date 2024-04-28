<?php

session_start();

function verificacaoItens($inv){
    
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
            }else {
                header("Location: hall.php?resVerificacao=false");
            }
            
        }
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
                            echo '<li class="possui">Revista</li>';
                        } else {
                            echo '<li class="naoPossui">Revista</li>';
                        }

                        if ($inventario['livro']) {
                            echo '<li class="possui">Livro</li>';
                        } else {
                            echo '<li class="naoPossui">Livro</li>';
                        }

                        if ($inventario['panela']) {
                            echo '<li class="possui">Panela</li>';
                        } else {
                            echo '<li class="naoPossui">Panela</li>';
                        }

                        if ($inventario['faca']) {
                            echo '<li class="possui">Faca</li>';
                        } else {
                            echo '<li class="naoPossui">Faca</li>';
                        }

                        if ($inventario['chaveInferior']) {
                            echo '<li class="possui">Chave inferior</li>';
                        } else {
                            echo '<li class="naoPossui">Chave inferior</li>';
                        }

                        echo '<li class="verificacao">Verificações: ' . $inventario['verificacoes'] . '</li>';

                    }

                    ?>
                </ul>
            </div>
            <div id="divMapa">
                <p>Mapa</p>
            </div>
        </section>
        <section id="section2">
            <div id="local">
                <p>Local atual: Hall Principal</p>
            </div>
        </section>
        <section id="section3">
            <div id="mudarComodo">
                <button class="button">
                    Mudar cômodo
                    <div class="arrow">
                        << </div>
                </button>

            </div>
            <div id="divPergunta">
                <h1>Deseja verificar?</h1>
                <p>Verificação se possui apenas os itens necessários para alcançar o tesouro secreto.</p>
            </div>
            <div id="divSeparador">

            </div>
        </section>
        <section id="section4">
            <a href="hall.php?verificacao=true" id="verificacao" class="respostas">
                Verificar
            </a>
        </section>
        <section id="section5">
            <div id="configuracao">
                configuração
            </div>
            <div id="tempoJogo">
                <p>tempo</p>
            </div>
        </section>
    </main>
</body>

</html>