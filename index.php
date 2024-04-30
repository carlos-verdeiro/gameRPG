<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>A Busca pelo Graal</title>
</head>

<body>
    <main class="telaInicial">
        <h1 id="titulo">A Busca pelo Graal</h1>
        <section class="sectionOpcoes">
            <?php
            session_start();
            if (isset($_SESSION["status"]) && $_SESSION["status"] == "iniciado") {
                echo'<a href="pages/sessao.php?continuar" class="opcoes">Continuar Jogo</a>';
                echo'<a href="pages/sessao.php" class="opcoes">Novo Jogo</a>';
            }else{
                echo'<a href="pages/sessao.php" class="opcoes">Novo Jogo</a>';
            }
            ?>
            <a href="pages/config.php" class="opcoes">Configurações</a>
            <a href="pages/creditos.php" class="opcoes">Créditos</a>
        </section>
    </main>
</body>

</html>

https://prod.liveshare.vsengsaas.visualstudio.com/join?F4E47009898D9F3928F1CC4D2BEEE9238FB5