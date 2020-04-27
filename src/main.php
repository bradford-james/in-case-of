<?php

declare(strict_types=1);
require './src/processor.php';
require './src/validator';

// As API Class with run function?
function api(string $inputCase, string $outputCase, $inputArr)
{
  $outputArr = [];

  $processor = new CaseTranslationProcessor();
  foreach ($inputArr as $input) {
    // validate input as input case type, return failed w/ message?
    $output = $processor->process($inputCase, $outputCase, $input);
    // push to output list
  }
  return $outputArr;
}
