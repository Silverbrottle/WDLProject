<html>
<head>
        <title>
            Feedback
        </title>
        <link rel="stylesheet" href="/WDLProject/css/style.css">
        <style type="text/css">
            .conmarg{
                    margin-left: 25%;
                    margin-right: 25%;
                    border-radius: 15px;
            }
            .button1{
                display: inline-block;
                border-radius: 15px;
                background-color: #f4511e;
                border: none;
                color: #FFFFFF;	
                font-size: 19px;
                width: 100px;
                transition: all 0.5s;
                cursor: pointer;
                height: 30px;
            }	
            .button1 span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
            }
            .button1 span:after {
                content: '\00bb';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }
            .button1:hover span {
                padding-right: 20px;
            }	
            .button1:hover span:after {
                opacity: 1;
                right: 0;
            }
            img{
               height: 100px;
               width: 150px; 
            }
        </style>
    </head>
    <body style="background: linear-gradient(135deg,white,yellow,orange,red,maroon,black);">
        <center>
            <br><br><br><br><br><br><br>
            
            <div class="w3-container conmarg w3-white w3-round">
            
                <p>
                    <br>
                    <img src="/WDLProject/res/Logo.png" alt="FoodWorld"> 
                    <br>
                    <div class="w3-xxxlarge w3-myfont1"><b>FoodWorld<sup>&copy</sup></b><br></div>
                    <div class="w3-xxlarge w3-myfont1">Feedback form<br></div>
                    <div class="w3-xlarge w3-myfont1">Click enter to continue<br><br></div>
                </p>
                <form action="#" method="POST">
                <table>
                    <tr>
                        <td><p>Comment:</p></td>
                        <td><input type="text" name="comm"></td>
                    </tr>
                </table>
                <br><br>
                <button class="button1 w3-myfont4" style="width: 30%;height: 10%;" type="button" onclick="window.location.href = 'thanku.php';"><span>Click after the above step</span></button></form>
                <br><br><br>
                <?php
                session_start();
                $v="";
                $commen=$_POST['comm'];
                $c=	mysqli_connect("localhost","root","");
                // echo "Connection to the server was successful!";
                $dbase_name="test";
                mysqli_select_db($c,$dbase_name);
                $query="INSERT into feedback (comments) VALUES ('$commen')";
                    if(mysqli_query($c,$query))
                    {
                        $v="Feedback entry successful";
                        $_SESSION['feedack']=$v;
                        $_SESSION['status']="Active";
                    }
                    else{
                        $v="Error";
                        $_SESSION['feedack']=$v;
                        $_SESSION['status']="Active";
                    }
                ?>
            </div>
        </center>
    </body>
</html>