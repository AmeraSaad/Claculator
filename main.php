<?php
require_once "Calculator.php";

function validateOp()
{
  $allowed = ['+', '-', '*', '/'];
  while (true) {
    $op = readline("Enter an operator (+, -, *, /): ");
    if (strtolower($op) === 'exit') {
      exit("goodbye\n");
    }
    if (in_array($op, $allowed)) {
      return $op;
    } else {
      echo "Error: Invalid operator. Use +, -, *, or / only.\n";
    }
  }
}

function validateNum(string $label)
{
  while (true) {
    $input = readline("Enter $label number: ");
    if (strtolower($input) === 'exit') {
      exit("goodbye\n");
    }
    if (is_numeric($input)) {
      return $input;
    } else {
      echo "Error: Input must be a valid number \n";
    }
  }
}

function runCalculator() {
  echo "==============================\n";
  echo "Welcome to my Calculator\n";
  echo "Type 'exit' anytime to quit.\n";
  echo "==============================\n\n";
  while (true){
    try{
      $num1 = validateNum("first");
      $num2 = validateNum("second");
      $op = validateOp();
      
      $calc = new Calculator($num1, $num2);
  
      switch ($op) {
        case '+':
          $result = $calc->add();
          break;
        case '-':
          $result = $calc->subtract();
          break;
        case '*':
          $result = $calc->multiply();
          break;
        case '/':
          $result = $calc->divide();
          break;
        default:
          throw new Exception("unknown operator");
      }
      if (is_float($result)) {
        $formatted = number_format($result, 3);
        echo "Result: $formatted\n";
      } else {
        echo "Result= " . $result . "\n";
      }
      $continue = readline("Do you want to perform another calculation? (y/n): ");
      if (strtolower($continue) !== 'y') {
        break;
      }
    }catch (Exception $e) {
      echo "Error: " . $e->getMessage() . "\n";
    }
  }
  echo "goodbye\n";
  echo "==============================\n";
}
runCalculator();
?>