<?php
  require_once "verifica_sessao.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>XSS Stored</title>
  
  <!-- <script>showContents();</script>  -->
</head>

<body>
  <header>
    <h1>XSS Stored</h1>
  </header>
  <!-- sql injection -->
  <section>
    <a href="./sqlinjection.html">SQL Injection</a>
  </section>

  <!-- xss stored -->
  <section>
      <a href="./xssStoredPage.php">XSS Stored</a>
  </section>

  <section id="xss-stored" class="attack">
    <form action="./xssStored.php" method="POST">
      <label for="name">Insira um comentário</label>
      <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
      <input type="textarea" placeholder="digite seu comentário" name="comentario" onkeyup="showContents(this.value)">
      <button type="submit">Adicionar</button>
    </form>

    <p id="xss-stored-content">
           
    </p>
  </section>
  <script> 
    window.onload = function() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("xss-stored-content").innerHTML = this.responseText;
        }
      }

      xmlhttp.open("GET", "./xssStored.php", true);
      xmlhttp.send();
    }
    
    </script>
</body>

</html>