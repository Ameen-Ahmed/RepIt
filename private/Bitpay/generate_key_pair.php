<?php
// If you have not already done so, please run `composer.phar install`
require __DIR__.'.\vendor\autoload.php';

/**
 * Start by creating a PrivateKey object
 */
$privateKey = new \Bitpay\PrivateKey('./BitPay.pri');
// Generate a random number
$privateKey->generate();


$publicKey = new \Bitpay\PublicKey('./BitPay.pub');
/**
 * Once we have a private key, a public key is created from it.
 */
// Inject the private key into the public key
$publicKey->setPrivateKey($privateKey);

// Generate the public key
$publicKey->generate();

// NOTE: You can again do all of this with one line of code like so:
//       `$publicKey = \Bitpay\PublicKey::create('/tmp/bitpay.pub')->setPrivateKey($privateKey)->generate();`

/**
 * It's recommended that you use the EncryptedFilesystemStorage engine to persist your
 * keys. You can, of course, create your own as long as it implements the StorageInterface
 */
$storageEngine = new \Bitpay\Storage\EncryptedFilesystemStorage('YourTopSecretPassword');
$storageEngine->persist($privateKey);
$storageEngine->persist($publicKey);
?>
