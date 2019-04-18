<?php

// Include the SDK using the Composer autoloader
date_default_timezone_set('Europe/Paris');
require 'vendor/autoload.php';

use Aws\Exception\AwsException;

$s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'eu-west-3',
        'endpoint' => 'http://minio:9000',
        'use_path_style_endpoint' => true,
        'credentials' => [
                'key'    => 'minio',
                'secret' => 'minio123',
            ],
]);

/////////////////////////////////////////////////////

try {
    // Get the object.
    $result = $s3->getObject([
      'Bucket'               => 'images',
      'Key'                  => '7-4933682d78127129569ecb57d5c738bc.png',
      'ResponseContentType'  => 'image/png',
    ]);

    // Display the object in the browser.
    header("Content-Type: {$result['ContentType']}");
    echo $result['Body'];
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}


// Download the contents of the object.
$retrive = $s3->getObject([
]);



$s3->createBucket([
'Bucket' => 'testbucket'
]);


// Send a PutObject request and get the result object.
$insert = $s3->putObject([
     'Bucket' => 'testbucket',
     'Key'    => 'testkey',
     'Body'   => 'Hello from Minio!!'
]);

// Download the contents of the object.
$retrive = $s3->getObject([
     'Bucket' => 'testbucket',
     'Key'    => 'testkey',
     'SaveAs' => 'testkey_local'
]);

// Print the body of the result by indexing into the result object.
echo $retrive['Body'];
