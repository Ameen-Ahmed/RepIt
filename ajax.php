<?php
require('private/Bitpay/create_invoice.php');

  setBuyerInfo();
  setItemInfo($_POST['itemCode'], $_POST['itemDescription'], $_POST['itemPrice']);
  setInvoiceInfo($buyer, $item, $_POST['orderId']);
  buildInvoice();
  echo $invoice->getId();
?>
