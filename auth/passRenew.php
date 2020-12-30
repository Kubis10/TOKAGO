<?php
    require_once "../res/connect.php";
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zmiana hasła | TOKAGO</title>
        <link rel="icon" type="image/png" href="../res/photo/logo.png">
        <link rel="stylesheet" href="../res/css/main.css">
        </style>
    </head>
    <body>
        <?php
            if (isset($_GET['hash']) && !empty($_GET['hash'])){

                $hash = $polaczenie->real_escape_string($_GET['hash']);
                $check = $polaczenie->query("SELECT hash FROM uzytkownicy WHERE hash='$hash'");

                if ($check->num_rows > 0) {
                    echo '<form class="box" method="post" id="form">
                    <h1>Reset hasła</h1>
                    <input type="text" id="user" name="email" placeholder="Podaj adres email" required>
                    <input type="password" id="pass1" name="pass1" placeholder="Podaj nowe hasło" required>
                    <input type="password" id="pass2" name="pass2" placeholder="Powtórz nowe hasło" required>
                    <div id="error"></div>
                    <input type="submit" id="submit" value="Zmień hasło"></input>
                    </form>';
                } else {
                    echo 'Adres URL jest nie poprawny';
                }

            } else {
                echo 'No data';
            }     

        ?>

        <script type="text/javascript">

            let form;
            form = document.getElementById("form");
            form.addEventListener("submit", function (e){
                e.preventDefault();
                chPass();
            });

            function chPass(){
                let user = document.getElementById("user").value;
                let p1 = document.getElementById("pass1").value;
                let p2 = document.getElementById("pass2").value;
                let msg = document.getElementById("error");

                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            let respond = JSON.parse(this.responseText);
                            msg.innerHTML = respond.text;
                        }                      
                    }
                    xhttp.open("POST", "passRenewXO.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send(`email=${user}&pass1=${p1}&pass2=${p2}`);
                }
        </script>
    </body>
</html>