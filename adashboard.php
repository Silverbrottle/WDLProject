<?php
session_start();
$id=$_SESSION['aid'];
$name=$_SESSION['name'];
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
        height: 1845px;
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
        height: 1700px;
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
                <button class="tablinks" onclick="openCity(event, 'Manage')">Manage accounts</button>
                <button class="tablinks" onclick="openCity(event, 'Ord')">Orders</button>
            </div>

            <div id="Account" class="tabcontent">
                <br>
                <div class="w3-container w3-round-xlarge w3-white w3-margin-left w3-margin-right">
                    <div class="w3-padding-left w3-padding-top w3-myfont2">
                        <h1><u>YOUR ACCOUNT</u></h1><br>
                        ID:<?php echo $id; ?><br>
                        Name:<?php echo $name; ?><br>
                    </div>
                </div>
                <br>
                <div class="w3-container w3-round-xlarge w3-white w3-margin-left w3-margin-right">
                    <p>Do you want to change your password(Click 'Yes' to continue):
                    <button class="button" onclick="window.location.href='/WDLProject/pwdchanger.php'">Yes</button>
                    </p>
                </div>
            </div>

            <div id="Manage" class="tabcontent">
                <br>
                <div class="w3-container w3-round-xlarge w3-white w3-margin-left w3-margin-right">
                    <div class="w3-padding-left w3-padding-top w3-myfont2">
                        <h1><u>Pending requests(DELETE)</u></h1><br>
                        <?php
                            $c=	mysqli_connect("localhost","root","");
                            // echo "Connection to the server was successful!";
                            $dbase_name="test";
                            mysqli_select_db($c,$dbase_name);
                            // echo "<br>Database is selected";
                            $query="SELECT * FROM `deluser`";
                            $data=mysqli_query($c,$query);
                            print "<table border cellpadding=12>";
                            print "<tr bgcolor=yellow>";
                            print "<th bgcolor=yellow>ID</th>";
                            print "</tr>";
                            while ( $info = mysqli_fetch_assoc($data) )
                            {   
                                print "<tr>";
                                print "<td>" .$info['ID']."</td>";
                                print "</tr>";
                            }
                            print "</table>";
                        ?>
                    </div>
                    <br>
                    <div class="w3-container w3-round-xlarge w3-white w3-margin-left w3-margin-right">
                        <?php
                        $cout="";
                        ?>
                        <br>
                        <p><?php echo $cout;?></p>
                        <br>
                        <form method="POST" action="#" >
                            Enter the ID:<input type="text" name="DEL">
                            <button class="button" name="one">Customer</button>
                            <button class="button" name="two">Restaurant</button>
                            <button class="button" name="three">Delivery Agent</button>
                        </form>
                        <br>
                        <?php
                        if(isset($_POST['one'])){
                            $c=	mysqli_connect("localhost","root","");
                            // echo "Connection to the server was successful!";
                            $dbase_name="test";
                            mysqli_select_db($c,$dbase_name);
                            $i=$_POST['DEL'];
                            // echo "<br>Database is selected";
                            $query2="DELETE from order where cust_id='$i'";
                            mysqli_query($c,$query2);
                            $query3="DELETE from customer where cust_id='$i'";
                            if(mysqli_query($c,$query3))
                            {
                                $cout="User account has been deleted";
                            }
                            else{
                                $cout="Error";
                            }
                        }
                        if(isset($_POST['two'])){
                            $c=	mysqli_connect("localhost","root","");
                            // echo "Connection to the server was successful!";
                            $dbase_name="test";
                            mysqli_select_db($c,$dbase_name);
                            // echo "<br>Database is selected";
                        }
                        if(isset($_POST['three'])){
                            $c=	mysqli_connect("localhost","root","");
                            // echo "Connection to the server was successful!";
                            $dbase_name="test";
                            mysqli_select_db($c,$dbase_name);
                            // echo "<br>Database is selected";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="Ord" class="tabcontent">
                <div class="w3-container w3-round-xlarge w3-white w3-margin-left w3-margin-right">
                    <h3>Orders</h3>
                    <?php
                        $c=	mysqli_connect("localhost","root","");
                        // echo "Connection to the server was successful!";
                        $dbase_name="test";
                        mysqli_select_db($c,$dbase_name);
                        // echo "<br>Database is selected";
                        $query="SELECT * FROM `order`";
                        $data=mysqli_query($c,$query);
                        print "<table border cellpadding=12>";
                        print "<tr bgcolor=yellow>";
                        print "<th bgcolor=yellow>OrderID</th>";
                        print "<th bgcolor=yellow>Item</th>";
                        print "<th bgcolor=yellow>Status</th>";
                        print "<th bgcolor=yellow>Mode of payment</th>";
                        print "<th bgcolor=yellow>Cost</th>";
                        print "<th bgcolor=yellow>CustID</th>";
                        print "<th bgcolor=yellow>DAgentID</th>";
                        print "<th bgcolor=yellow>RestID</th>";
                        print "</tr>";
                        while ( $info = mysqli_fetch_assoc($data) )
                        {   
                            print "<tr>";
                            print "<td>" .$info['ord_id']."</td>";
                            print "<td>" .$info['ord_name']."</td>";
                            print "<td>" .$info['ord_status']."</td>";
                            print "<td>" .$info['ord_mode']."</td>";
                            print "<td>" .$info['ord_pay']."</td>";
                            print "<td>" .$info['cust_id']."</td>";
                            print "<td>" .$info['del_id']."</td>";
                            print "<td>" .$info['rest-id']."</td>";
                            print "</tr>";
                        }
                            print "</table>";
                        ?>
                        <br>
                        <h3>Customers</h3>
                        <?php
                        $c=	mysqli_connect("localhost","root","");
                        // echo "Connection to the server was successful!";
                        $dbase_name="test";
                        mysqli_select_db($c,$dbase_name);
                        // echo "<br>Database is selected";
                        $query="SELECT * FROM `customer`";
                        $data=mysqli_query($c,$query);
                        print "<table border cellpadding=12>";
                        print "<tr bgcolor=cyan>";
                        print "<th bgcolor=cyan>CID</th>";
                        print "<th bgcolor=cyan>Name</th>";
                        print "<th bgcolor=cyan>Address</th>";
                        print "<th bgcolor=cyan>Password</th>";
                        print "<th bgcolor=cyan>Phone Number</th>";
                        print "</tr>";
                        while ( $info = mysqli_fetch_assoc($data) )
                        {   
                            print "<tr>";
                            print "<td>" .$info['cust_id']."</td>";
                            print "<td>" .$info['cust_name']."</td>";
                            print "<td>" .$info['cust_add']."</td>";
                            print "<td>" .$info['cust_password']."</td>";
                            print "<td>" .$info['cust_phone']."</td>";
                            print "</tr>";
                        }
                            print "</table>";
                        ?>
                        <br>
                        <h3>Restaurants</h3>
                        <?php
                        $c=	mysqli_connect("localhost","root","");
                        // echo "Connection to the server was successful!";
                        $dbase_name="test";
                        mysqli_select_db($c,$dbase_name);
                        // echo "<br>Database is selected";
                        $query="SELECT * FROM `restaurant`";
                        $data=mysqli_query($c,$query);
                        print "<table border cellpadding=12>";
                        print "<tr bgcolor=lime>";
                        print "<th bgcolor=lime>RID</th>";
                        print "<th bgcolor=lime>Name</th>";
                        print "<th bgcolor=lime>Address</th>";
                        print "<th bgcolor=lime>Password</th>";
                        print "<th bgcolor=lime>Phone Number</th>";
                        print "</tr>";
                        while ( $info = mysqli_fetch_assoc($data) )
                        {   
                            print "<tr>";
                            print "<td>" .$info['rest_id']."</td>";
                            print "<td>" .$info['rest_name']."</td>";
                            print "<td>" .$info['rest_add']."</td>";
                            print "<td>" .$info['rest_password']."</td>";
                            print "<td>" .$info['rest_phone']."</td>";
                            print "</tr>";
                        }
                            print "</table>";
                        ?>
                        <br>
                        <h3>Delivery Agents</h3>
                        <?php
                        $c=	mysqli_connect("localhost","root","");
                        // echo "Connection to the server was successful!";
                        $dbase_name="test";
                        mysqli_select_db($c,$dbase_name);
                        // echo "<br>Database is selected";
                        $query="SELECT * FROM `delivery`";
                        $data=mysqli_query($c,$query);
                        print "<table border cellpadding=12>";
                        print "<tr bgcolor=pink>";
                        print "<th bgcolor=pink>DA ID</th>";
                        print "<th bgcolor=pink>Name</th>";
                        print "<th bgcolor=pink>Address</th>";
                        print "<th bgcolor=pink>Password</th>";
                        print "<th bgcolor=pink>Phone Number</th>";
                        print "</tr>";
                        while ( $info = mysqli_fetch_assoc($data) )
                        {   
                            print "<tr>";
                            print "<td>" .$info['del_id']."</td>";
                            print "<td>" .$info['del_name']."</td>";
                            print "<td>" .$info['del_add']."</td>";
                            print "<td>" .$info['del_password']."</td>";
                            print "<td>" .$info['del_phone']."</td>";
                            print "</tr>";
                        }
                            print "</table>";
                        ?>
                        <br>
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