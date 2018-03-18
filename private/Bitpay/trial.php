<?php
/*
 * Requirements:
 *   - Basic PHP Knowledge
 *   - Private and Public keys from 001.php
 *   - Account on https://test.bitpay.com
 *   - Pairing code
 */
require_once('generate_key_pair.php');
require __DIR__.'.\vendor\autoload.php';

/**
 * To load up keys that you have previously saved, you need to use the same
 * storage engine. You also need to tell it the location of the key you want
 * to load.
 */
$storageEngine = new \Bitpay\Storage\EncryptedFilesystemStorage('YourTopSecretPassword');
$privateKey    = $storageEngine->load('./BitPay.pri');
$publicKey     = $storageEngine->load('./BitPay.pub');
$sin = \Bitpay\SinKey::create()->setPublicKey($publicKey)->generate();

   $client = new \Bitpay\Client\Client();
   $network = new \Bitpay\Network\Testnet();
   $adapter = new \Bitpay\Client\Adapter\CurlAdapter();
   $client->setPrivateKey($privateKey);
   $client->setPublicKey($publicKey);
   $client->setNetwork($network);
   $client->setAdapter($adapter);

   try {
       $token = $client->createToken(
               array(
                   'facade' => 'merchant',
                   'label' => 'RepIt',
                   'id' => (string) $sin,
               )
       );
       $pairingCode = $token->getPairingCode();
       $createdToken = $token->getToken();
       //$this->ci->dashboard->addSettings('bit_token', $createdToken);
       echo "Pairing Code: " .$pairingCode;
       echo "\nToken Obtained: " .$createdToken;
   } catch (\Exception $e) {
     echo "Exception occured: " . $e->getMessage().PHP_EOL;

     echo "Pairing failed. Please check whether you're trying to pair a production pairing code on test.".PHP_EOL;
     $request  = $client->getRequest();
     $response = $client->getResponse();
     /**
      * You can use the entire request/response to help figure out what went
      * wrong, but for right now, we will just var_dump them.
      */
     echo (string) $request.PHP_EOL.PHP_EOL.PHP_EOL;
     echo (string) $response.PHP_EOL.PHP_EOL;
     /**
      * NOTE: The `(string)` is include so that the objects are converted to a
      *       user friendly string.
      */

     exit(1);
   }
?>
