
<!DOCTYPE html>
<html>
<head>
        <title>Basic Calculator</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"><link rel="stylesheet" href="style.css">

</head>
<body class="align">
	  <div class="grid">

        <form method="post" class="form login"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label>Enter expression:</label>
                <input type="text" name="expression" required><br><br>
                <input type="submit" name="submit" value="Calculate">
        </form>
    </div>
        <?php
                if(isset($_POST['submit'])){
                        $expression = $_POST['expression'];

                        if(preg_match("/[A-Za-z`]+/", $expression)){
                                echo "Error: Invalid input";
                        }
                        else{
                                $result = eval("return ".$expression.";");
                                if($result === false){
                                        echo "Error: Invalid expression";
                                }
                                else{
                                        echo "Result: ".$result;
                                }
                        }
                }
        ?>
</body>
</html>
