<?php

require __DIR__.'.\private\Bitpay\vendor\autoload.php';

  $storageEngine = new \Bitpay\Storage\EncryptedFilesystemStorage('YourTopSecretPassword'); // Password may need to be updated if you changed it
  $privateKey    = $storageEngine->load('./private/Bitpay/BitPay.pri');
  $publicKey     = $storageEngine->load('./private/Bitpay/BitPay.pub');
  $client        = new \Bitpay\Client\Client();
  $network       = new \Bitpay\Network\Testnet();
  $adapter       = new \Bitpay\Client\Adapter\CurlAdapter();
  $client->setPrivateKey($privateKey);
  $client->setPublicKey($publicKey);
  $client->setNetwork($network);
  $client->setAdapter($adapter);
  $token = new \Bitpay\Token();
  $token->setToken('8vbMUpm2okpususquMwJe4fmxXJbv1j95XfzEewh69YW'); // UPDATE THIS VALUE
  $client->setToken($token);


      // echo "<script> bitpay.setApiUrlPrefix('https://test.bitpay.com');";
      // echo "bitpay.showInvoice('$invoice_id');";
      // echo "</script>";
      // $pending_payment = true;
      // $pending_id = $invoice_id;
      // if($check_status){
      //   $check_status = false;
      //   echo "<script>console.log('Ayyyyyyy');</script>";
      // }
      echo $client->getInvoice($_POST['check'])->getStatus();
      //echo $invoice_id;
      //$t = $invoice_ret[0]->getInvoice('MvsnA6S3Zik5EiyBhBBPu3');
      //$status = $t->getStatus();
      //echo $status;

?>
