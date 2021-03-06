<?php
session_start();
$id=$_SESSION['rid'];
$name=$_SESSION['name'];
$add=$_SESSION['address'];
$phno=$_SESSION['phno'];
if($_SESSION['status']!="Active")
{
    header("location:http://localhost/WDLProject/Login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="/WDLProject/css/dash.css">	
    <style>
        * {box-sizing: border-box}
        .tab {
        float: left;
        border: 1px solid #ccc;
        background:peachpuff;
        width: 20%;
        height: 600px;
        border-radius: 15px;
        }
        .tab button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 15px;
        font-size: 17px;
        }
        .tab button:hover {
        background-color: #ddd;
        }
        .tab button.active {
        background-color: #ccc;
        border-radius: 15px;
        }
        .tabcontent {
        float: left;
        padding: 0px 12px;
        border: 1px solid #ccc;
        border-radius: 15px;
        width: 70%;
        border-left: none;
        height: 600px;
        }
        .card {
              box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
              transition: 0.3s;
              width: 30%;
              border-radius: 5px;
              background: linear-gradient(180deg,white,yellow);
            }
            
        .card:hover {
              box-shadow: 0 16px 16px 0 rgba(0,0,0,0.2);
        }
            
        img {
            border-radius: 5px 5px 0 0;
        }
            
        .container {
            padding: 2px 16px;
        }
    </style>
</head>
<body>
<div>
    <img class="w3-left float" src="/WDLProject/res/logo.png" width="150px" height="100px">
    <b><div class="w3-myfont1 fontcol w3-left">FoodWorld<sup>&copy</sup></div></b><br>
    <div class="logbtn_area w3-right">
        <b>Welcome, <?php echo $_SESSION['name']; ?></b><br>
        <button class="w3-button w3-white w3-border" onclick="window.location.href='http://localhost/WDLProject/php/logout.php'"><font color="red">LOGOUT</font></a></button>
    </div>
</div>
<br><br><br><br><br>
<div class="w3-margin-left w3-container">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Account')" id="defaultOpen">Account</button>
                <button class="tablinks" onclick="openCity(event, 'yourorder')">Your order</button>
            </div>

            <div id="Account" class="tabcontent">
                <br>
                <div class="w3-container w3-round-xlarge w3-white w3-margin-left w3-margin-right">
                    <div class="w3-padding-left w3-padding-top w3-myfont2">
                        <h1><u>YOUR ACCOUNT</u></h1><br>
                        ID:<?php echo $id; ?><br>
                        Name:<?php echo $name; ?><br>
                        Address:<?php echo $add; ?><br>
                        Phone:<?php echo $phno; ?><br><br>
                    </div>
                </div>
                <br>
                <div class="w3-container w3-round-xlarge w3-white w3-margin-left w3-margin-right">
                    <p>Do you want to change your password(Click 'Yes' to continue):
                    <button class="button" onclick="window.location.href='/WDLProject/pwdchanger.php'">Yes</button>
                    </p>
                </div>
                <br>
                <div class="w3-container w3-round-xlarge w3-white w3-margin-left w3-margin-right">
                    <p>Do you want to delete your account(Click 'Yes' to continue):
                    <button class="button" onclick="window.location.href='/WDLProject/accdel.php'">Yes</button>
                    </p>
                </div>
            </div>

            <div id="yourorder" class="tabcontent">
                <div class="w3-center w3-container w3-round-xlarge w3-white w3-margin-left w3-margin-right">
                    <br>
                    <?php
                            $c=	mysqli_connect("localhost","root","");
                            // echo "Connection to the server was successful!";
                            $dbase_name="test";
                            mysqli_select_db($c,$dbase_name);
                            // echo "<br>Database is selected";
                            $query="SELECT * FROM `order` where rest_id='$id'";
                            $data=mysqli_query($c,$query);
                            print "<table border cellpadding=12>";
                            print "<tr bgcolor=yellow>";
                            print "<th bgcolor=yellow>OrderID</th>";
                            print "<th bgcolor=yellow>Item</th>";
                            print "<th bgcolor=yellow>Status</th>";
                            print "<th bgcolor=yellow>Mode of payment</th>";
                            print "<th bgcolor=yellow>Cost</th>";
                            print "</tr>";
                            while ($info = mysqli_fetch_assoc($data))
                            {   
                                print "<tr>";
                                print "<td>" .$info['ord_id']."</td>";
                                print "<td>" .$info['ord_name']."</td>";
                                print "<td>" .$info['ord_status']."</td>";
                                print "<td>" .$info['ord_mode']."</td>";
                                print "<td>" .$info['ord_pay']."</td>";
                                print "</tr>";
                            }
                                print "</table>";
                        ?>
                        <br><br>
                </div>
            </div>

        <script>
            function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
</div>
<br><br><br><br>
<div class="footer w3-bottom">
    <div class="w3-container">Copyright &copy by ARS</div>        
</div>
</body>
</html>