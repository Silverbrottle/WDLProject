<?php
session_start();
$f=$_SESSION['feedack'];
if($_SESSION['status']!="Active")
{
    header("location:http://localhost/WDLProject/main.html");
}    
?>
<html> 
    <head>
        <title>
            Welcome!
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
                    <div class="w3-xxlarge w3-myfont1">Thank You!<br></div>
                    <p><?php echo $f;?>
                    <div class="w3-xlarge w3-myfont1">Press Home to go back</div>
                </p>
                <button class="button1 w3-myfont4" style="width: 40%;height: 10%;" type="button" onclick="window.location.href = 'main.html';"><span>Home</span></button>
                <br><br><br>
            </div>
        </center>
    </body>
</html>
