<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
  
  require_once "dbconf.php";
  require_once "verifica_sessao.php";

  if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $nome = $_GET["name"];

    $conn = pg_connect($conString);
    if($conn) {
        $query = "SELECT * FROM usuario WHERE nome='".$nome."'";

        $result = pg_query($conn, $query);
          
        if($result) {
          while($row = pg_fetch_array($result)) {
              echo "<p><b>ID: </b>" . $row['user_id'] . "</p>";
              echo "<p><b>Nome: </b>" . $row['nome'] . "</p>";
              echo "<p><b>Email: </b>" . $row['email'] . "</p>";
              echo "<p><b>Senha: </b>" . $row['senha'] . "</p>";
              echo "<br>";
          }
        } else {
          echo "Nada encontrado";
        }

        pg_close();
    }
  }
  ?>
</body>
</html>