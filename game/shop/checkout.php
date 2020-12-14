<?php

	session_start();

	if ((!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['id'])))
	{
		header('Location: ../../index.html');
		exit();
	}

	require_once "../../res/connect.php";

	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
  $_SESSION['zakup'] = false;
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
    <title>Płatność | TOKAGO</title>
    <link rel="icon" type="image/png" href="../../res/photo/logo.png">
    <link rel="stylesheet" type="text/css" href="../../res/css/shop.css"/>

</head>
<body>

<!-- JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AbG5c5Gd_wKdtCEZGXXOAiPXg4NzBKqLTGSqvEvbZc1L6Mwanhuk90VRpfg_DYQNkLGT-QPQTwq4Hylv&currency=PLN"></script>
<div class="container">
    <h1>Monety o wartości <?php echo $_POST['price']; ?> zł</h1>
    <div class="money">
        <div id="paypal-button-container"></div>
    </div>
</div>

    <!-- Add the checkout buttons, set up the order and approve the order -->
    <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $_POST['price']; ?>'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            <?php
            $_SESSION['zakupmonet'] = true;
            ?>
            localStorage.setItem("txn_id", details.id);
            localStorage.setItem("payment_status", details.status);
            localStorage.setItem("payment_amount", details.purchase_units[0].amount.value);
            localStorage.setItem("payment_currency", details.purchase_units[0].amount.currency_code);
            localStorage.setItem("payer_email", details.payer.email_address);
            window.location.replace('review.php');
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
<a href="addcoins.php" class="back">Powrót</a>
</body>
</html>