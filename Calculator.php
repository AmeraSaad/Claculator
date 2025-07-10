<?php
class Calculator
{

  public function __construct(private $num1,private $num2)
  {
  }

  public function add()
  {
    return $this->num1 + $this->num2;
  }

  public function subtract()
  {
    return $this->num1 - $this->num2;
  }

  public function multiply()
  {
    return $this->num1 * $this->num2;
  }

  public function divide()
  {
    if ($this->num2 == 0) {
      throw new Exception("Cannot divide by zero");
    }
    return $this->num1 / $this->num2;
  }
}
?>