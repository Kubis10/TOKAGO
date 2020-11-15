<?php
    require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Zmiana hasła</title>
    </head>
    <body>
        <p>Zmiana hasła</p>

        <?php 

            if (isset($_GET['hash']) && !empty($_GET['hash'])){

                $hash = $polaczenie->real_escape_string($_GET['hash']);
                $check = $polaczenie->query("SELECT hash FROM uzytkownicy WHERE hash='$hash'");

                if ($check->num_rows > 0) {
                    echo '<form>
                    <input type="text" id="user" name="uname" placeholder="Podaj nazwę użytkownika" required>
                    <input type="password" id="pass1" name="pass1" placeholder="Podaj nowe hasło" required>
                    <input type="password" id="pass2" name="pass2" placeholder="Powtórz nowe hasło" required>
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
            let form = document.querySelector('form');
            form.addEventListener('submit', e => {
                e.preventDefault();
            });

            let user = document.getElementById("user").value;
            let p1 = document.getElementById("pass1").value;
            let p2 = document.getElementById("pass2").value;

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            };
            xhttp.open("POST", "passRenewXO.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`uname=${user}&pass1=${p1}&pass2=${p2}`);
        </script>
    </body>
</html>