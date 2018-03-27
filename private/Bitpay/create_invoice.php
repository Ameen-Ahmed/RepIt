<?php


require_once("client_configuration.php");
//protected $phone; $email; $firstName; $lastName; $address; $city; $state; $zip; $country;

$buyer = new \Bitpay\Buyer();
$item = new \Bitpay\Item();
$invoice = new \Bitpay\Invoice();

function set_buyer_info($fname, $lname, $email, $address1, $city, $state, $zip, $country){
  global $buyer;
  $buyer
      ->setFirstName($fname)
      ->setLastName($lname)
      ->setEmail($email)
      ->setAddress(array($address1))
      ->setCity($city)
      ->setState($state)
      ->setZip($zip)
      ->setCountry($country);
}

function set_item_info($itemCode, $itemDescription, $itemPrice){
  global $item;
  $item = new \Bitpay\Item();
  $item
      ->setCode($itemCode)
      ->setDescription($itemDescription)
      ->setPrice($itemPrice)
      ->setPhysical(true);
}

function sendInvoice($orderId){
  global $client;
  global $buyer;
  global $item;
  global $invoice;

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

function getRate(){
  global $client;
  $request = new \Bitpay\Client\Request();
  $request->setHost('test.bitpay.com');
  $request->setMethod(\Bitpay\Client\Request::METHOD_GET);
  $request->setPath('rates/USD');

  $response = $client->sendRequest($request);
  $data = json_decode($response->getBody(), true);
  return ($data['data']['rate']);

}

?>
