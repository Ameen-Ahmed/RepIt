<?php


require_once("client_configuration.php");




function sendInvoice($orderId, $itemCode, $itemDescription, $itemPrice){
  global $client;
  $buyer = new \Bitpay\Buyer();
  $item = new \Bitpay\Item();
  $invoice = new \Bitpay\Invoice();

  $buyerEmail = "testbuyer@mail.com";
  $buyer
      ->setEmail($buyerEmail);

  $item
      ->setCode($itemCode)
      ->setDescription($itemDescription)
      ->setPrice($itemPrice);

  $invoice
      ->setBuyer($buyer)
      ->setItem($item)
      ->setCurrency(new \Bitpay\Currency('USD'))
      ->setOrderId($orderId)
      ->setNotificationUrl('localhost/RepIt/shopping_cart.php');

  try {
      $client->createInvoice($invoice);
      return $invoice;
  } catch (\Exception $e) {
      $request  = $client->getRequest();
      $response = $client->getResponse();
      echo "<pre>";
      echo (string) $request.PHP_EOL.PHP_EOL.PHP_EOL;
      echo (string) $response.PHP_EOL.PHP_EOL;
      exit(1); // We do not want to continue if something went wrong
  }
}
  //setBuyerInfo();
  // setItemInfo("test", "test", '99');
  // setInvoiceInfo($buyer, $item, "0043");
  // buildInvoice();
  // echo 'Success! Created invoice "' . $invoice->getId() . '". See ' . $invoice->getUrl() . PHP_EOL;
?>
