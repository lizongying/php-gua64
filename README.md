# 六十四卦编码

六十四卦编码，php实现。
如：“hello，世界”会编码为“䷯䷬䷿䷶䷸䷬䷀䷌䷌䷎䷼䷲䷰䷳䷸䷘䷔䷭䷒〇”。

## all language

* [golang](https://github.com/lizongying/go-gua64)
* [js](https://github.com/lizongying/js-gua64)
* [java](https://github.com/lizongying/java-gua64)
* [php-gua64](https://github.com/lizongying/php-gua64)
* [python](https://github.com/lizongying/pygua64)

## install

```
composer require lizongying/gua64 dev-main
```

## test

```
cd tests
php example.php
```

## example

```
<?php
require_once 'vendor/autoload.php';

use Gua\Gua64;

$gua64 = new Gua64();

$encode = $gua64::encode('hello，世界');
echo $encode . PHP_EOL;

$decode = $gua64::decode('䷯䷬䷿䷶䷸䷬䷀䷌䷌䷎䷼䷲䷰䷳䷸䷘䷔䷭䷒☯');
echo $decode . PHP_EOL;
```