<?php

require __DIR__.'.\vendor\autoload.php';

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
  $token->setToken('9SzYbNETDvRTShxNN3kEvti3iGsjVD7nkZa5UfMuNw44'); // UPDATE THIS VALUE
  $client->setToken($token);


?>
