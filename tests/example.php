<?php
require_once '../src/Gua/Gua64.php';

use Gua\Gua64;

$gua64 = new Gua64();

$encode = $gua64::encode('hello，世界');
echo $encode . PHP_EOL;

$decode = $gua64::decode('䷯䷬䷿䷶䷸䷬䷀䷌䷌䷎䷼䷲䷰䷳䷸䷘䷔䷭䷒☯');
echo $decode . PHP_EOL;
