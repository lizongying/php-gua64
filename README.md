# 六十四卦

六十四卦代替base64

## install

```
composer require lizongying/gua64
```

## example

```
use Gua\Gua64;

$gua64 = new Gua64();

$encode = $gua64::encode('hello，世界');
echo $encode . PHP_EOL;

$decode = $gua64::decode('䷯䷬䷿䷶䷸䷬䷀䷌䷌䷎䷼䷲䷰䷳䷸䷘䷔䷭䷒☯');
echo $decode . PHP_EOL;
```