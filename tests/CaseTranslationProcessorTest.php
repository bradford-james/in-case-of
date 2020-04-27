<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CaseTranslationProcessorTest extends TestCase
{
  /**
   * @dataProvider cases
   */
  public function testProcessor($inputCase, $outputCase, $inputStr, $outputStr): void
  {
    $processor = new CaseTranslationProcessor;
    $this->assertEquals(
      $outputStr,
      $processor->process($inputCase, $outputCase, $inputStr)
    );
  }

  public function cases()
  {
    return [
      'camelCase to PascalCase' => ['camelCase', 'PascalCase', 'testCase', 'TestCase'],
      'camelCase to kebab-case' => ['camelCase', 'kebab-case', 'testCase', 'test-case'],
      'camelCase to snake_case' => ['camelCase', 'snake_case', 'testCase', 'test_case'],
      'camelCase to UPPER_SNAKE_CASE' => ['camelCase', 'UPPER_SNAKE_CASE', 'testCase', 'TEST_CASE'],
      'PascalCase to camelCase' => ['PascalCase', 'camelCase', 'TestCase', 'testCase'],
      'PascalCase to kebab-case' => ['PascalCase', 'kebab-case', 'TestCase', 'test-case'],
      'PascalCase to snake_case' => ['PascalCase', 'snake_case', 'TestCase', 'test_case'],
      'PascalCase to UPPER_SNAKE_CASE' => ['PascalCase', 'UPPER_SNAKE_CASE', 'TestCase', 'TEST_CASE'],
      'kebab-case to camelCase' => ['kebab-case', 'camelCase', 'test-case', 'testCase'],
      'kebab-case to PascalCase' => ['kebab-case', 'PascalCase', 'test-case', 'TestCase'],
      'kebab-case to snake_case' => ['kebab-case', 'snake_case', 'test-case', 'test_case'],
      'kebab-case to UPPER_SNAKE_CASE' => ['kebab-case', 'UPPER_SNAKE_CASE', 'test-case', 'TEST_CASE'],
      'snake_case to camelCase' => ['snake_case', 'camelCase', 'test_case', 'testCase'],
      'snake_case to PascalCase' => ['snake_case', 'PascalCase', 'test_case', 'TestCase'],
      'snake_case to kebab-case' => ['snake_case', 'kebab-case', 'test_case', 'test-case'],
      'snake_case to UPPER_SNAKE_CASE' => ['snake_case', 'UPPER_SNAKE_CASE', 'test_case', 'TEST_CASE'],
      'UPPER_SNAKE_CASE to camelCase' => ['UPPER_SNAKE_CASE', 'camelCase', 'TEST_CASE', 'testCase'],
      'UPPER_SNAKE_CASE to PascalCase' => ['UPPER_SNAKE_CASE', 'PascalCase', 'TEST_CASE', 'TestCase'],
      'UPPER_SNAKE_CASE to kebab-case' => ['UPPER_SNAKE_CASE', 'kebab-case', 'TEST_CASE', 'test-case'],
      'UPPER_SNAKE_CASE to snake_case' => ['UPPER_SNAKE_CASE', 'snake_case', 'TEST_CASE', 'test_case']
    ];
  }
}
