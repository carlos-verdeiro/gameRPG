<?php

if (isset($_POST["addItem"]) && $_POST["addItem"] != null) {
    $item = $_POST["addItem"];
    switch ($item) {
        case 'revista':
            $_SESSION['inventario']['revista'] = true;
            break;
        case 'livro':
            $_SESSION['inventario']['livro'] = true;
            break;
        case 'panela':
            $_SESSION['inventario']['panela'] = true;
            break;
        case 'faca':
            $_SESSION['inventario']['faca'] = true;
            break;
        case 'chaveInferior':
            $_SESSION['inventario']['chaveInferior'] = true;
            break;
        case 'chaveSecreta':
            $_SESSION['inventario']['chaveSecreta'] = true;
            break;
    }
}

if (isset($_POST["rmItem"]) && $_POST["rmItem"] != null) {
    $item = $_POST["rmItem"];
    switch ($item) {
        case 'revista':
            $_SESSION['inventario']['revista'] = false;
            break;
        case 'livro':
            $_SESSION['inventario']['livro'] = false;
            break;
        case 'panela':
            $_SESSION['inventario']['panela'] = false;
            break;
        case 'faca':
            $_SESSION['inventario']['faca'] = false;
            break;
        case 'chaveInferior':
            $_SESSION['inventario']['chaveInferior'] = false;
            break;
        case 'chaveSecreta':
            $_SESSION['inventario']['chaveSecreta'] = false;
            break;
    }
}

?>