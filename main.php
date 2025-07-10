<?php
require_once "Calculator.php";

function validateOp(string $op): string
{
  $allowed = ['+', '-', '*', '/'];

  if (!in_array($op, $allowed)) {
    throw new Exception("Invalid operator. Use +, -, *, or / only.");
  }

  return $op;
}

function validateNum(string $input)
{
  if (!is_numeric($input)) {
    throw new Exception("Input must be a valid number \n");
  }
  return $input;
}


function runCalculator() {
  echo "==============================\n";
  echo "Welcome to my Calculator\n";
  echo "==============================\n\n";
  while (true){
    try{
      $input1 = readline("Enter first number: ");
      $num1 = validateNum($input1);
    
      $input2 = readline("Enter second number: ");
      $num2 = validateNum($input2);
    
      $inputOp = readline("Enter an operator (+, -, *, /): ");
      $op = validateOp($inputOp);
    
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
        echo $result . "\n";
      }
      $continue = readline("Do you want to perform another calculation? (y/n): ");
      if (strtolower($continue) !== 'y') {
        break;
      }
    }catch (Exception $e) {
      echo "Error: " . $e->getMessage() . "\n";
      runCalculator();
      return;
    }
  }
  echo "goodbye\n";
  echo "==============================\n";
}
runCalculator();
?>