<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="calculator.css" />
  <title>My Calculator</title>
</head>

<body class="backgroundbody">
  <h1>Simple Calculator</h1>
  <div class="container">
    <div class="left">
      <img class="calculatorpic" src="calculatorpic.png" alt="this is a calculator picture">
    </div>
    <div class="right">
      <form class=calculatorform name="input" action="index.php" method="get">
        <p class="number1">Please input number1:</p>
        
        <div class=text1>
          <input type="text" name="text1" />
        </div>
        <p class="number2">Please input number2:</p>
        <div class=text2>
          <input type="text" name="text2" />
        </div>

        <p class=selectinfo>Please select a method:</p>

        <div class=add>
          <input type="radio" id="Add" name="sign" value="1" checked>
          <label class="Add">Add</label>
        </div>

        <div class=subtraction>
          <input type="radio" id="Subtraction" name="sign" value="2">
          <label class="Subtraction">Subtraction</label>
        </div>

        <div class=multiplication>
          <input type="radio" id="Multiplication" name="sign" value="3">
          <label class="Multiplication">Multiplication</label>
        </div>

        <div class=division>
          <input type="radio" id="Division" name="sign" value="4">
          <label class="Division">Division</label>
        </div>

        <input type="submit" value="Submit" />
      </form>
      <?php
      if (isset($_GET["text1"]) && isset($_GET["text2"]) && isset($_GET["text1"])) {
        $text1 = $_GET["text1"];
        $text2 = $_GET["text2"];
        $sign = $_GET["sign"];
        $header = '';
        $msg = '';
        $ans = '';
        if (is_numeric($text1) && is_numeric($text2)) {
          $header =  'calculated:';
          if ($sign == 1) {
            $msg = "The add result is: ";
            $ans = $text1 + $text2;
          }
          if ($sign == 2) {
            $msg = "The subtraction result is: ";
            $ans = $text1 - $text2;
          }
          if ($sign == 3) {
            $msg = "The multiplication result is: ";
            $ans =  $text1 * $text2;
          }
          if ($sign == 4) {
            if ($text2 == 0) {
              $msg = 'Dividend cannot be 0';
            } else {
              $msg = "The division result is: ";
              $ans = $text1 / $text2;
            }
          }
        } else {
          $header = 'Please fill all the fields. Please be sure to input float values.';
        }

      ?>
      <div class="result">
        <h4><?php echo $header ?></h4>
        <p><?php echo $msg ?></p>
        <p><?php echo $ans ?></p>
      </div>
      <?php }
      ?>

    </div>
  </div>





</body>

</html>