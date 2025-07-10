<?php
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