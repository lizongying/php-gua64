<?php
require_once '../src/Gua64.php';

use Gua\Gua64;

$gua64 = new Gua64();

$encode = $gua64::encode('hello，世界');
echo $encode . PHP_EOL;

$decode = $gua64::decode('䷯䷬䷿䷶䷸䷬䷀䷌䷌䷎䷼䷲䷰䷳䷸䷘䷔䷭䷒〇');
echo $decode . PHP_EOL;

$verify = $gua64::verify('䷯䷬䷿䷶䷸䷬䷀䷌䷌䷎䷼䷲䷰䷳䷸䷘䷔䷭䷒〇');
var_dump($verify);
