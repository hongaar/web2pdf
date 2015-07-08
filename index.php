<?php

if (!isset($_GET['url'])) die('No URL specified');
if (!isset($_GET['filename'])) die('No filename specified');

require_once 'vendor/autoload.php';

$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
$filename = $string = preg_replace('/[^ \w]+/', '', $_GET['filename']);

file_put_contents('log/requests.log', PHP_EOL . date('c') . ' - ' . $url . ' - ' . $filename, FILE_APPEND);

$root = $_SERVER['DOCUMENT_ROOT'] . str_replace('/index.php', '', $_SERVER['PHP_SELF']);

$bin = (PHP_INT_SIZE === 8) ?
    '/vendor/bin/wkhtmltopdf-amd64' :
    '/vendor/bin/wkhtmltopdf-i386';

$snappy = new \Knp\Snappy\Pdf($root . $bin);

$snappy->setOption('print-media-type', true);
$snappy->setOption('disable-javascript', true);
$snappy->setOption('lowquality', false);

// Use $snappy->getOptions() to see all possible options
// @see http://wkhtmltopdf.org/usage/wkhtmltopdf.txt
// d($snappy->getOptions());exit;

header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename='" . $filename . ".pdf'");

file_put_contents('log/requests.log', ' - OK', FILE_APPEND);

echo $snappy->getOutput($url);