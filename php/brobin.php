<?php
session_start();
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
        height: 650px;
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
        height: 650px;
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
                <button class="tablinks" onclick="openCity(event, 'Account')">Account</button>
                <button class="tablinks" onclick="openCity(event, 'Placeyourorder')" id="defaultOpen">Place your order</button>
                <button class="tablinks" onclick="openCity(event, 'PreviousOrders')">Previous Orders</button>
            </div>

            <div id="Account" class="tabcontent">
                <h3>YOUR ACCOUNT</h3><br>
                ID:<?php echo $_SESSION['cid']; ?><br>
                Name:<?php echo $_SESSION['name']; ?><br>
                Address:<?php echo $_SESSION['address']; ?><br>
                Phone:<?php echo $_SESSION['phno']; ?><br>
            </div>

            <div id="Placeyourorder" class="tabcontent" style="background-color:lightgreen;">
                
<h1 align="center">Bakin Robbins</h1>
<center>
<img src="/WDLProject/res/bk.png" width=120 height=120>
<body>

<center>
<b>MENU</b>

<fieldset>

<form action="third.php" method="post">
<table>
	<tr>
		<th>ITEM</th>
		<th>PRICE</th>
	</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Black Currant</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Blueberry Chessecake</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Gold Medal Ribbon</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Mint Milk Chocolate</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Roasted Coffee Creme</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Belgian Bliss</td>
	<td>500
</tr>

</table>
 	</fieldset>
 </form>
  </td></tr></fieldset>	
</table>

</form>
<input type="submit" value="PLACE ORDER" >

</center>
</div>

            <div id="PreviousOrders" class="tabcontent">
                <h3>Tokyo</h3>
                <p>Tokyo is the capital of Japan.</p>
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
