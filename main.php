<?php
require "Calculator.php";
require "validation.php";

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