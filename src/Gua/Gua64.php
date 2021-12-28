<?php

namespace Gua;

class Gua64
{
  const gua = '䷁䷖䷇䷓䷏䷢䷬䷋' .
  '䷎䷳䷦䷴䷽䷷䷞䷠' .
  '䷆䷃䷜䷺䷧䷿䷮䷅' .
  '䷭䷑䷯䷸䷟䷱䷛䷫' .
  '䷗䷚䷂䷩䷲䷔䷐䷘' .
  '䷣䷕䷾䷤䷶䷝䷰䷌' .
  '䷒䷨䷻䷼䷵䷥䷹䷉' .
  '䷊䷙䷄䷈䷡䷍䷪䷀';

  static array $gua64dict = [];


  function __construct()
  {
    for ($i = 0; $i < 64; $i++) {
      self::$gua64dict[substr(self::gua, $i * 3, 3)] = $i;
    }
  }

  public static function encode(string $str): string
  {
    $encoded = [];
    $len = strlen($str);
    for ($i = 0; $i < $len; $i = $i + 3) {
      $encoded[] = substr(self::gua, (ord($str[$i]) >> 2) * 3, 3);
      if ($i + 3 <= $len) {
        $encoded[] = substr(self::gua, ((ord($str[$i]) & 0x3) << 4 | (ord($str[$i + 1]) >> 4)) * 3, 3);
        $encoded[] = substr(self::gua, ((ord($str[$i + 1]) & 0xf) << 2 | (ord($str[$i + 2]) >> 6)) * 3, 3);
        $encoded[] = substr(self::gua, (ord($str[$i + 2]) & 0x3f) * 3, 3);
        continue;
      }
      if ($i + 2 === $len) {
        $encoded[] = substr(self::gua, ((ord($str[$i]) & 0x3) << 4 | (ord($str[$i + 1]) >> 4)) * 3, 3);
        $encoded[] = substr(self::gua, ((ord($str[$i + 1]) & 0xf) << 2) * 3, 3);
        $encoded[] = '☯';
        continue;
      }
      if ($i + 1 === $len) {
        $encoded[] = substr(self::gua, ((ord($str[$i]) & 0x3) << 4) * 3, 3);
        $encoded[] = '☯';
        $encoded[] = '☯';
      }
    }
    return join('', $encoded);
  }


  public static function decode(string $str): string
  {
    $b = [];
    $len = strlen($str);
    for ($i = 0; $i < $len; $i += 3) {
      $b[] = array_key_exists(substr($str, $i, 3), self::$gua64dict) ? self::$gua64dict[substr($str, $i, 3)] : 0;
    }
    $encoded = [];
    for ($i = 0; $i < count($b); $i += 4) {
      $encoded[] = ($b[$i] & 0x3f) << 2 | ($b[$i + 1] >> 4 & 0x3);
      $one = ($b[$i + 1] & 0xf) << 4 | ($b[$i + 2] >> 2 & 0xf);
      if ($one !== 0) {
        $encoded[] = $one;
      }
      $two = ($b[$i + 2] & 0x3) << 6 | ($b[$i + 3] & 0x3f);
      if ($two !== 0) {
        $encoded[] = $two;
      }
    }
    $output = '';
    foreach ($encoded as $v) {
      $output .= chr($v);
    }
    return $output;
  }


}