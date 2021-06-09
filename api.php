<?php

header('Content-Type: text/html; charset=utf-8');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['valor']) && isset($_POST['nome']) && isset($_POST['hora'])){
            $hora = str_replace("-", "/", $_POST['hora']);
            file_put_contents("files/" . $_POST['nome'] . "/valor.txt", $_POST['valor']);
            file_put_contents("files/" . $_POST['nome'] . "/hora.txt", $hora);
            file_put_contents("files/" . $_POST['nome'] . "/log.txt", $hora.';'.$_POST['valor'].PHP_EOL, FILE_APPEND);
    
        }
    }
    
    else
    if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['nome'])){
            echo file_get_contents("files/" . $_GET['nome'] . "/valor.txt");
        }else{
            http_response_code(403);
            echo "faltam parametros no GET";
        }
    }else{
        http_response_code(403);
        echo "metodo nao permitido";
    }
?>
