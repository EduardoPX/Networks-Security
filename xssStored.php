<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
  require_once "dbconf.php";
  require_once "verifica_sessao.php";

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comentario = $_POST["comentario"];
    $idUser = $_POST["id"];

    $conn = pg_connect($conString);
    if($conn) {
        $query = "INSERT INTO comentario (conteudo, id_user) VALUES ('$comentario', $idUser)";

        $result = pg_query($conn, $query);
      
        pg_close();

        header("location: ./xssStoredPage.php");
    }
  }

  if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $conn = pg_connect($conString);

    if($conn) {
      $query = "SELECT * FROM comentario";

      $result = pg_query($conn, $query);
        
      if($result) {
        while($row = pg_fetch_array($result)) {      
            echo $row['conteudo'];
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