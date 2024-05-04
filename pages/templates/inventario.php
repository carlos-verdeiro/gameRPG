<ul>
    <?php

    if (isset($inventario)) {
        if ($inventario['revista']) {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/revistaPossui.svg" class="possui" alt="Possui Revista" title="Possui Revista"></li>';
        } else {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/revistaNaoPossui.svg" class="naoPossui" alt="Não Possui Revista" title="Não Possui Revista"></li>';
        }
        if ($inventario['livro']) {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/livroPossui.svg" class="possui" alt="Possui Livro" title="Possui Livro"></li>';
        } else {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/livroNaoPossui.svg" class="naoPossui" alt="Não Possui Livro" title="Não Possui Livro"></li>';
        }

        if ($inventario['panela']) {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/panelaPossui.svg" class="possui" alt="Possui Panela" title="Possui Panela"></li>';
        } else {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/panelaNaoPossui.svg" class="naoPossui" alt="Não Possui Panela" title="Não Possui Panela"></li>';
        }

        if ($inventario['faca']) {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/facaPossui.svg" class="possui" alt="Possui Faca" title="Possui Faca"></li>';
        } else {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/facaNaoPossui.svg" class="naoPossui" alt="Não Possui Faca" title="Não Possui Faca"></li>';
        }

        if ($inventario['chaveInferior']) {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/chaveInferiorPossui.svg" class="possui" alt="Possui Chave Inferior" title="Possui Chave Inferior"></li>';
        } else {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/chaveInferiorNaoPossui.svg" class="naoPossui" alt="Não Possui Chave Inferior" title="Não Possui Chave Inferior"></li>';
        }

        if ($inventario['chaveSecreta']) {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/chaveSecretaPossui.svg" class="possui" alt="Possui Chave Secreta" title="Possui Chave Secreta"></li>';
        } else {
            echo '<li><img src="' . $pathImagens . 'assets/img/inventario/chaveSecretaNaoPossui.svg" class="naoPossui" alt="Não Possui Chave Secreta" title="Não Possui Chave Secreta"></li>';
        }

        echo '<li class="verificacao">Verificações: ' . $inventario['verificacoes'] . '</li>';

    }

    ?>
</ul>