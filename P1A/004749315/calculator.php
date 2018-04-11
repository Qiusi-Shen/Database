<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CS 143 P1A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<h1>Calculator</h1>
            <p>
                <form action="calculator.php" method="get">
                    <input type="text" name="Equation">
                    <input type="submit" value="Calculate">
                </form>
                <br/>
                <?php
                    $Equation = $_GET["Equation"];
                    $Correct_Regex = "/^(\s*-?[0-9]+(\.[0-9]+)?\s*[\/\*\+\-])*(\s*-?[0-9]+(\.[0-9]+)?\s*)$/";
                    $Wrong_Regex = "/\/\s*0(\.[0-9]+)?/";
                    $Correct_Input = preg_match($Correct_Regex, $Equation);
                    $Divided_By_Zero = preg_match($Wrong_Regex, $Equation);
                    
                    if ($Equation != null)
                    {
                        
                        if(preg_match($Correct_Regex, $Equation))
                        {
                            
                            if(preg_match($Wrong_Regex, $Equation))
                                echo "Division by zero error!";
                            else
                            {
                                $Equation = str_replace("--", "- -", $Equation);
                                $result = eval("return " . $Equation . ";");
                                echo $Equation . " = " . $result;
                            }
                        }
                        else 
                            echo "Invalid Expression!";
                    }
                ?>
            </p>
</body>
</html>