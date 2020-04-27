<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase
{
  public function testSetFirstCharCaseToUpper(): void
  {
    $this->assertEquals(
      'TestCase',
      Utils::setFirstCharCase('testCase', 'upper')
    );
  }

  public function testSetFirstCharCaseToLower(): void
  {
    $this->assertEquals(
      'testCase',
      Utils::setFirstCharCase('TestCase', 'lower')
    );
  }

  public function testDelimiterToCasing(): void
  {
    $this->assertEquals(
      'testCase',
      Utils::delimiterToCasing('test-case', '-')
    );
  }

  public function testCasingToDelimiter(): void
  {
    $this->assertEquals(
      'test-case',
      Utils::casingToDelimiter('testCase', '-')
    );
  }
}
