<?php
require_once('private/initialize.php');


$page_title = 'Store';
?>
<?php
echo "<pre>";
 require('private/Bitpay/create_invoice.php');?>

<?php include_once('private/shared/header.php');?>

<body class="homepage">
    <div id="page-wrapper">
        <!-- Header -->
        <div id="header-wrapper" class="wrapper">
            <div id="header">
                <!-- Nav -->
                <?php include_once('private/shared/navigation.php');?>

                <!-- Highlights -->
                <div class="wrapper style3">
                    <div class="title">Store</div>
                    <div id="highlights" class="container">
                        <div class="row 150%">
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/ArianaGrandeShirt.jpg" alt="" /></a>
                                    <h3><a href="#">Ariana Grande Sweater</a></h3>
                                    <h5>Price:</h5>
                                    <ul class="actions">
                                        <li><a href="#" class="button style1">Pay Now</a></li>
                                    </ul>
                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/travis-scott-jacket.jpg" alt="" /></a>
                                    <h3><a href="#">Travis $cott Rodeo Bomber Jacket</a></h3>
                                    <h5>Price:</h5>
                                    <button class="button style1" onClick="openInvoice()">Pay Now</button>
                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/XO-Weeknd-TSHIRT.jpg" alt="" /></a>
                                    <h3><a href="#">XO Weeknd T-shirt</a></h3>
                                    <h5>Price:</h5>
                                    <ul class="actions">
                                        <li><a href="#" class="button style1">Pay Now</a></li>
                                    </ul>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <?php require_once('private/shared/footer.php');?>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://bitpay.com/bitpay.js" type="text/javascript"> </script>
<script>
  function openInvoice() {
    var network = "testnet"
    if (network == "testnet")
      bitpay.setApiUrlPrefix("https://test.bitpay.com")
    else
      bitpay.setApiUrlPrefix("https://bitpay.com")
    <?php
      setItemInfo('itemCode', 'itemDescription', '7');
      setInvoiceInfo($buyer, $item, 'orderId');
      buildInvoice();
    ?>
    bitpay.showInvoice("<?php echo $invoice->getId();?>");
  }
</script>
</html>
