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
          console.log(details)
            //window.location.replace('review.php');
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>

</body>
</html>