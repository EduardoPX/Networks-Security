<?php
  require_once "dbconf.php";

  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $conn = pg_connect($conString);

  if($conn) {
      $query = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

      $result = pg_query($conn, $query);

      $row = pg_fetch_array($result);

      if($result) {
        header("location: ./index.html");
      } else {
        header("location: ./cadastro.html");
      }

      pg_close();
  }
?>