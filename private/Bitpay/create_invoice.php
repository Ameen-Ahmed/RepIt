<?php


require_once("client_configuration.php");

$buyer = new \Bitpay\Buyer();
$item = new \Bitpay\Item();
$invoice = new \Bitpay\Invoice();


function setBuyerInfo(){
  global $buyer;
  $buyerEmail = "testbuyer@mail.com";
  $buyer
      ->setEmail($buyerEmail);
}

function setItemInfo($itemCode, $itemDescription, $itemPrice){
  global $item;
  $item
      ->setCode($itemCode)
      ->setDescription($itemDescription)
      ->setPrice($itemPrice);
}

function setInvoiceInfo($buyer, $item, $orderId){
  global $invoice;
  $invoice
      ->setBuyer($buyer)
      ->setItem($item)
      ->setCurrency(new \Bitpay\Currency('USD'))
      ->setOrderId($orderId)
      ->setNotificationUrl('localhost/RepIt/store.php');
}
function buildInvoice(){
  global $invoice, $client;
  try {
      $client->createInvoice($invoice);
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
