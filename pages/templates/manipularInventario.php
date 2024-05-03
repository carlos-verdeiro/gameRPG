<?php
    session_start();

    if (isset($_POST["addItem"]) && $_POST["addItem"] != null) {
        $item = $_POST["addItem"];
        switch ($item) {
            case 'revista':
                $_SESSION['inventario'] ['revista'] == true;
            break;
            case 'livro':
                $_SESSION['livro'] ['revista'] == true;
            break;
            case 'panela':
                $_SESSION['panela'] ['revista'] == true;
            break;
            case 'faca':
                $_SESSION['faca'] ['revista'] == true;
            break;
            case 'chaveInf':
                $_SESSION['chaveInf'] ['revista'] == true;
            break;
            
            default:
                # code...
                break;
        }
    }
?>