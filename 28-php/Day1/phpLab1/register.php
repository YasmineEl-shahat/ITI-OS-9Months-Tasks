<!-- sudo /opt/lampp/xampp start -->
<html lang="en">
    <head>
        <style>
            .center{
                display:flex;
                flex-direction:center;
                justify-content:center;
            }
        </style>
    </head>
    <body>
        <div class="container center">
            <div>

        <?php

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            echo "Thanks,";
            echo $_POST["gender"] == "male"? "Mr. ":"Miss. " ;
            echo $_POST["fname"]." ".$_POST["lname"];
            echo "<br/><br/><br/>please review your info<br/>";
            foreach ($_POST as $k=>$value){
                
                echo "<br/><span> {$k}:</span>";
                if($k == "skills"){
                    
                    foreach($value as $v ){

                        echo "<span> {$v}   </span>";
                    }
            
                }
                else  echo "<span> {$value} </span>";
            
            }
        ?>
            </div>
        </div>
    </body>
</html>