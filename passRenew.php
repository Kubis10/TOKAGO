<?php
    require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zmiana hasła | TOKAGO</title>
        <link rel="icon" type="image/png" href="photo/logo.png">
        <style>
        body{
              margin: 0;
              padding: 0;
              font-family: sans-serif;
              background: #34495e;
              color: white;
            }
            .box{
              width: 300px;
              padding: 40px;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%,-50%);
              background: #191919;
              text-align: center;
            }
            .box h1{
              color: white;
              text-transform: uppercase;
              font-weight: 500;
            }
            .box input[type = "text"],.box input[type = "password"]{
              border:0;
              background: none;
              display: block;
              margin: 20px auto;
              text-align: center;
              border: 2px solid #3498db;
              padding: 14px 10px;
              width: 200px;
              outline: none;
              color: white;
              border-radius: 24px;
              transition: 0.25s;
            }
            .box input[type = "text"]:focus,.box input[type = "password"]:focus{
              width: 280px;
              border-color: #2ecc71;
            }
            .box input[type = "submit"]{
              border:0;
              background: none;
              display: block;
              margin: 20px auto;
              text-align: center;
              border: 2px solid #2ecc71;
              padding: 14px 40px;
              outline: none;
              color: white;
              border-radius: 24px;
              transition: 0.25s;
              cursor: pointer;
            }
            .box input[type = "submit"]:hover{
              background: #2ecc71;
            }
        </style>
    </head>
    <body>
        <?php
            if (isset($_GET['hash']) && !empty($_GET['hash'])){

                $hash = $polaczenie->real_escape_string($_GET['hash']);
                $check = $polaczenie->query("SELECT hash FROM uzytkownicy WHERE hash='$hash'");

                if ($check->num_rows > 0) {
                    echo '<form class="box" method="post">
                    <h1>Reset hasła</h1>
                    <input type="text" id="user" name="uname" placeholder="Podaj nazwę użytkownika" required>
                    <input type="password" id="pass1" name="pass1" placeholder="Podaj nowe hasło" required>
                    <input type="password" id="pass2" name="pass2" placeholder="Powtórz nowe hasło" required>
                    <input type="submit" id="submit" onclick="chPass()" value="Zmień hasło"></input>
                    </form>';
                } else {
                    echo 'Adres URL jest nie poprawny';
                }

            } else {
                echo 'No data';
            }     

        ?>

        <script type="text/javascript">
            function chPass(){
                let user = document.getElementById("user").value;
                let p1 = document.getElementById("pass1").value;
                let p2 = document.getElementById("pass2").value;

                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  alert(this.responseText);
                  window.location.href = "zalform.php";
                }
                xhttp.open("POST", "passRenewXO.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(`uname=${user}&pass1=${p1}&pass2=${p2}`);
            }
        </script>
    </body>
</html>