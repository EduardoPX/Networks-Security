<?php
    ini_set('display_erros', 1);
    ini_set('display_startup_erros', 1);
    ini_set('html_errors', 1);
    set_error_handler("var_dump");
    error_reporting(E_ALL);

    require_once "dbconf.php";
        
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];

        $conn = pg_connect($conString);
        if($conn) {
            $query = "SELECT * FROM usuario WHERE nome='$nome' AND senha='$senha'";

            $result = pg_query($conn, $query);
            
            pg_close();

            $rows = pg_fetch_array($result);

            if($rows > 0) {
                session_start();
                ob_start();
                $_SESSION['id'] = $rows['user_id'];
                $_SESSION['nome'] = $nome;
                $_SESSION['senha'] = $senha;
                header("Location: ./inicio.php");
            }

            else {
                unset($_SESSION['id']);
                unset($_SESSION['nome']);
                unset($_SESSION['senha']);
                header("Location: ./");
            }
        }
    }
?>