<?php

declare(strict_types=1);

class Utils
{
  public static function setFirstCharCase(string $input, string $casing): string
  {
    $firstChar = substr($input, 0, 1);
    $rest = substr($input, 1);
    $function = "strto$casing";
    return $function($firstChar) . $rest;
  }

  public static function delimiterToCasing(string $input, string $delimiter)
  {
    $pattern = "/({$delimiter}\w)/";
    $replacement = function ($matches) use ($delimiter) {
      $char = str_replace($delimiter, '', $matches[0]);
      return strtoUpper($char);
    };
    return preg_replace_callback($pattern, $replacement, $input);
  }

  public static function casingToDelimiter(string $input, string $delimiter)
  {
    $pattern = '/([A-Z])/';
    $replacement = function ($matches) use ($delimiter) {
      $char = strtolower($matches[0]);
      return "{$delimiter}{$char}";
    };
    return preg_replace_callback($pattern, $replacement, $input);
  }
}
