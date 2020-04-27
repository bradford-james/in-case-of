<?php

declare(strict_types=1);
require 'utils.php';

class CaseTranslationProcessor
{
  public function process(string $inputCase, string $outputCase, string $input): string
  {
    switch ("$inputCase => $outputCase") {
        // --------------------
        //   camelCase
        // -------------------
      case "camelCase => PascalCase":
        return Utils::setFirstCharCase($input, 'upper');

      case "camelCase => kebab-case":
        return Utils::casingToDelimiter($input, '-');

      case "camelCase => snake_case":
        return Utils::casingToDelimiter($input, '_');

      case "camelCase => UPPER_SNAKE_CASE":
        return strtoupper(Utils::casingToDelimiter($input, '_'));

        // --------------------
        //   PascalCase
        // -------------------
      case "PascalCase => camelCase":
        return Utils::setFirstCharCase($input, 'lower');

      case "PascalCase => kebab-case":
        $caseAdjusted = Utils::setFirstCharCase($input, 'lower');
        return Utils::casingToDelimiter($caseAdjusted, '-');

      case "PascalCase => snake_case":
        $caseAdjusted = Utils::setFirstCharCase($input, 'lower');
        return Utils::casingToDelimiter($caseAdjusted, '_');

      case "PascalCase => UPPER_SNAKE_CASE":
        $caseAdjusted = Utils::setFirstCharCase($input, 'lower');
        return strtoupper(Utils::casingToDelimiter($caseAdjusted, '_'));

        // --------------------
        //   kebab-case
        // -------------------
      case "kebab-case => camelCase":
        return Utils::delimiterToCasing($input, '-');

      case "kebab-case => PascalCase":
        $delimited = Utils::delimiterToCasing($input, '-');
        return Utils::setFirstCharCase($delimited, 'upper');

      case "kebab-case => snake_case":
        return str_replace('-', '_', $input);

      case "kebab-case => UPPER_SNAKE_CASE":
        return str_replace('-', '_', strtoupper($input));

        // --------------------
        //   snake_case
        // -------------------
      case "snake_case => camelCase":
        return Utils::delimiterToCasing($input, '_');

      case "snake_case => PascalCase":
        $delimited = Utils::delimiterToCasing($input, '_');
        return Utils::setFirstCharCase($delimited, 'upper');

      case "snake_case => kebab-case":
        return str_replace('_', '-', $input);

      case "snake_case => UPPER_SNAKE_CASE":
        return strtoupper($input);

        // --------------------
        //   UPPER_SNAKE_CASE
        // -------------------
      case "UPPER_SNAKE_CASE => camelCase":
        return Utils::delimiterToCasing(strtolower($input), '_');

      case "UPPER_SNAKE_CASE => PascalCase":
        $delimited = Utils::delimiterToCasing(strtolower($input), '_');
        return Utils::setFirstCharCase($delimited, 'upper');

      case "UPPER_SNAKE_CASE => kebab-case":
        return str_replace('_', '-', strtolower($input));

      case "UPPER_SNAKE_CASE => snake_case":
        return strtolower($input);
    }
  }
}
