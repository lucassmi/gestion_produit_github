<?php

date_default_timezone_set('Europe/Paris');
require 'vendor/autoload.php';

use Aws\Exception\AwsException;

$bucket_name = 'images';
$s3 = new Aws\S3\S3Client([
      'version' => 'latest',
      'region'  => 'eu-west-3',
      'endpoint' => 'http://192.168.99.100:31675',
      'use_path_style_endpoint' => true,
      'credentials' => [
             'key'    => 'minio',
             'secret' => 'minio123',
	],
]);

function createBucket($bucketName) {
	global $s3;
	try {
		return $s3->createBucket([
			'Bucket' => $bucketName
		]);
	} catch (Exception $e) {
		return $bucketName;
	}
}

function putObject($bucketName, $key, $body) {
	global $s3;
	return $s3->putObject([
		'Bucket' => $bucketName,
		'Key'    => $key,
		'Body'   => $body
	]);
}

function getObject($bucketName, $key) {
	global $s3;
	return $s3->getObject([
		'Bucket' => $bucketName,
		'Key'    => $key
	]);
}

function deleteObject($bucketName, $key) {
	global $s3;
	return $s3->deleteObject([
		'Bucket' => $bucketName,
		'Key'    => $key
	]);
}

try {
	$s3->createBucket([
		'Bucket' => $bucket_name
	]);
} catch (Exception $e) {
	return Null;
}

?>
