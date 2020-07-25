<!doctype html>
<html>
<?php
$p="";
$error="";
session_start();
if(isset($_POST['reg1']))
{
	$id = $_POST['cid'];
	$name = $_POST['cname'];
	$password = $_POST['cpass'];
	$address = $_POST['cadd'];
	$phno = $_POST['cphno'];
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "test";
	//create connection
	$conn=new mysqli($host, $dbUsername, $dbPassword, $dbname);
	if (mysqli_connect_error()) {
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else{
		$query="INSERT INTO customer (cust_id,cust_name,cust_password,cust_add,cust_phone) VALUES ('$id','$name','$password','$address',$phno)";
		if(mysqli_query($conn,$query))
		{
			$p="Registered";
		}
		else{
			$p="Error Occured";
		}
	}
} 
if(isset($_POST['reg2'])){
	$id = $_POST['rid'];
	$name = $_POST['rname'];
	$password = $_POST['rpass'];
	$address = $_POST['radd'];
	$phno = $_POST['rphno'];
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "test";
		//create connection
		$conn=new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if (mysqli_connect_error()) {
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}
		else {
			$query="INSERT INTO restaurant (rest_id,rest_name,rest_password,rest_add,rest_phone) VALUES ('$id','$name','$password','$address',$phno)";
			if(mysqli_query($conn,$query))
			{
				$p="Registered";
			}
			else{
				$p="Error Occured";
			}
		}
	
}
if(isset($_POST['reg3']))
{
	$id = $_POST['did'];
	$name = $_POST['dname'];
	$password = $_POST['dpass'];
	$address = $_POST['dadd'];
	$phno = $_POST['dphno'];
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "test";
    //create connection
    $conn=new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
    else {
     $query="INSERT INTO delivery (del_id,del_name,del_password,del_add,del_phone) VALUES ('$id','$name','$password','$address',$phno)";
     if(mysqli_query($conn,$query))
     {
        $p="Registered";
     }
     else{
         $p="Error Occured";
     }
    }
}
if(isset($_POST["reg4"]))
{
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'test');
	$id=$_POST['cid'];	
    $pass=$_POST['cpass'];
	$s="SELECT * from customer where cust_id='$id' && cust_password='$pass'"; 
	$result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    $rows=mysqli_fetch_assoc($result);
	if($num==1){
        $_SESSION['cid'] = $id;
		$c_nm = $rows["cust_name"];
		$c_add=$rows["cust_add"];
		$c_phno=$rows["cust_phone"];
		$_SESSION['name'] = $c_nm;
		$_SESSION['address'] = $c_add;
		$_SESSION['phno'] = $c_phno;
        $_SESSION['status']="Active";
		header('location:http://localhost/WDLProject/cdashboard.php');
    }else
    {	
		$error="Username/Password Invalid";
    }
}
if(isset($_POST["reg5"]))
{
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'test');
	$id=$_POST['rid'];	
    $pass=$_POST['rpass'];
	$s="SELECT rest_id,rest_name,rest_add,rest_phone from restaurant where rest_id='$id' && rest_password='$pass'"; 
	$result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    $rows=mysqli_fetch_assoc($result);
	if($num==1){
        $_SESSION['rid'] = $id;
		$c_nm = $rows["rest_name"];
		$c_add=$rows["rest_add"];
		$c_phno=$rows["rest_phone"];
		$_SESSION['name'] = $c_nm;    
		$_SESSION['address'] = $c_add;
		$_SESSION['phno'] = $c_phno;
        $_SESSION['status']="Active";
		header('location:http://localhost/WDLProject/rdashboard.php');
    }else
    {  
		$error="Username/Password Invalid";
    }
}
if(isset($_POST["reg6"]))
{
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'test');
	$id=$_POST['did'];	
    $pass=$_POST['dpass'];
	$s="SELECT del_id,del_name from delivery where del_id='$id' && del_password='$pass'"; 
	$result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    $rows=mysqli_fetch_assoc($result);
	if($num==1){
        $_SESSION['did'] = $id;
        $c_nm = $rows["del_name"];
        $_SESSION['name'] = $c_nm;        
        $_SESSION['status']="Active";
		header('location:http://localhost/WDLProject/ddashboard.php');
    }else
    {  
		$error="Username/Password Invalid";
    }
}
if(isset($_POST["reg7"]))
{
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'test');
	$id=$_POST['aid'];	
    $pass=$_POST['apass'];
	$s="SELECT a_id,a_name from admin where a_id='$id' && a_password='$pass'"; 
	$result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    $rows=mysqli_fetch_assoc($result);
	if($num==1){
        $_SESSION['aid'] = $id;
		$c_nm = $rows["a_name"];
		$_SESSION['name'] = $c_nm;   
        $_SESSION['status']="Active";
		header('location:http://localhost/WDLProject/adashboard.php');
    }else
    {  
		$error="Username/Password Invalid";
    }
}
?>
	<head>
	<title>Login or Register</title>
	<meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="/WDLProject/css/logincss.css">
	<script>
		function checkval()
		{
			var x=document.getElementById("ci");
			if(x.length < 5 || x.length > 5){ 
				alert("ID should be 5 numbers only");
				return false;
			}
		}
	</script>
	<body>
		<div class="w3-margin-left w3-margin-top">
		<button class="w3-button w3-myfont4 w3-yellow" onclick="window.location.href='main.html'">Home</button>
		</div>
		<br>
		<div class="container1 grad1 w3-border">
			<center>
				<br>
				<img src="/WDLProject/res/Logo.png" width="150" height="100">
				<br>
				<div class="w3-myfont1"><b>Registration</b></div>
				<p>Select any one of the option from below to proceed<br>
				</p>
				<div class="fontcolor w3-center">
					<p style="font-size:x-small;">*Note that the password should have one numeric and a special character along with the alphabet characters</p>
					<p id="a" style="font-size:medium;"><?php echo $p; ?></p>
				</div>
				<br>
				<div class="w3-container">
				  <div class="w3-row">
				    <a href="javascript:void(0)" onclick="openTab(event, 'Customer');">
				      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Customer</div>
				    </a>
				    <a href="javascript:void(0)" onclick="openTab(event, 'Restaurant');">
				      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Restaurant</div>
				    </a>
				    <a href="javascript:void(0)" onclick="openTab(event, 'DeliveryAgent');">
				      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">DAgent</div>
				    </a>
				</div>

				  <div id="Customer" class="w3-container w3-orange tabArea1" style="display:none">
				    <center>
				    	<div class="w3-myfont4 w3-fontcol">
						<h2>Customer</h2>
						<form name="Custreg" onsubmit="return checkval();" method="POST" action="#">
			 				<table>
								<tr>
									<th align="left">USER ID:</th>
									<td><input type="text" id="ci" name="cid" placeholder="Start with 'C', like C001" required></td>
								</tr>
								<tr>
									<th align="left">USER-NAME:</th>
									<td><input type="text" id name="cname" placeholder="Enter your full name" required></td>
								</tr>
								<tr>
									<th align="left">PASSWORD:</th>
									<td><input type="Password" name="cpass" placeholder="Enter password" required></td>
								</tr>
								<tr>
									<th align="left">ADDRESS:</th>
									<td><input type="text" name="cadd" placeholder="Enter address" required></td>
								</tr>
								<tr>
									<th align="left">PHONE NO:</th>
									<td><input type="number" name="cphno" placeholder="Enter phone no" required></td>
								</tr>
								<tr align="center">
									<td colspan="2"><button class="button" style="vertical-align:middle" name="reg1"><span>Log in </span></button></td>
								</tr>
							</table>
						</form>
						</div>
					</center>
				  </div>

				  <div id="Restaurant" class="w3-container w3-orange tabArea1" style="display:none">
				    <center>
				    	<div class="w3-myfont4 w3-fontcol">
						<h2>Restaurant</h2>
						<form name="Restreg" onsubmit="return checkval();" method="POST" action="#"> 
			 				<table>
								<tr>
									<th align="left">RESTAURANT ID:</th>
									<td><input type="text" name="rid" placeholder="Start with 'R', like R001" required></td>
								</tr>
								<tr>
									<th align="left">RESTAURANT-NAME:</th>
									<td><input type="text" name="rname" placeholder="Enter your full name" required></td>
								</tr>
								<tr>
									<th align="left">PASSWORD:</th>
									<td><input type="Password" name="rpass" placeholder="Enter password" required></td>
								</tr>
								<tr>
									<th align="left">ADDRESS:</th>
									<td><input type="text" name="radd" placeholder="Enter address" required></td>
								</tr>
								<tr>
									<th align="left">PHONE NO:</th>
									<td><input type="number" name="rphno" placeholder="Enter phone no" required></td>
								</tr>
								<tr align="center">
									<td colspan="2"><button class="button" style="vertical-align:middle" name="reg2"><span>Log in </span></button></td>
								</tr>
							</table>
						</form>
					</div>
					</center> 
				  </div>

				  <div id="DeliveryAgent" class="w3-container w3-orange tabArea1" style="display:none">
				    <center>
				    	<div class="w3-fontcol w3-myfont4">
						<h2>Delivery Agent</h2>
						<form name="Delreg" onsubmit="return checkval();" method="POST" action="#">
			 				<table>
								<tr>
									<th align="left">DA ID:</th>
									<td><input type="text" name="did" placeholder="Start with 'D', like D001" required></td>
								</tr>
								<tr>
									<th align="left">DA-NAME:</th>
									<td><input type="text" name="dname" placeholder="Enter your full name" required></td>
								</tr>
								<tr>
									<th align="left">PASSWORD:</th>
									<td><input type="Password" name="dpass" placeholder="Enter password" required></td>
								</tr>
								<tr>
									<th align="left">ADDRESS:</th>
									<td><input type="text" name="dadd" placeholder="Enter address" required></td>
								</tr>
								<tr>
									<th align="left">PHONE NO:</th>
									<td><input type="number" name="dphno" placeholder="Enter phone no" required></td>
								</tr>
								<tr align="center">
									<td colspan="2"><button class="button" style="vertical-align:middle" name="reg3"><span>Log in </span></button></td>
								</tr>
							</table>
						</form>
					</div>
					</center>
				  </div>
				 </div>
				 <script>
					function openTab(evt, userName) {
					  var i, x, tablinks;
					  x = document.getElementsByClassName("tabArea1");
					  document.getElementById("a").innerHTML="";
					  for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					  }
					  tablinks = document.getElementsByClassName("tablink");
					  for (i = 0; i < x.length; i++) {
						tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
					  }
					  document.getElementById(userName).style.display = "block";
					  evt.currentTarget.firstElementChild.className += " w3-border-red";
					}
					</script>
			</center>
		</div>
		<div class="container2 grad1 w3-border w3-display-position" style="top:89px;right:150px">
				<center>
				<br><br>
				<i class="fa fa-users" style="font-size:80px;"></i>
				<br>
				<div class="w3-myfont1"><b>LogIn</b></div>
				<p>Choose the option from below to proceed</p>
				<p id="b" style="font-size:medium;color:red;"><?php echo $error; ?></p>
				<br>
				<div class="w3-container">
				  <div class="w3-row">
				    <a href="javascript:void(0)" onclick="openUser(event, 'Cust');">
				      <div class="w3-quarter tabA w3-bottombar w3-hover-light-grey w3-padding">Customer</div>
				    </a>
				    <a href="javascript:void(0)" onclick="openUser(event, 'Rest');">
				      <div class="w3-quarter tabA w3-bottombar w3-hover-light-grey w3-padding">Restaurant</div>
				    </a>
				    <a href="javascript:void(0)" onclick="openUser(event, 'DeliveryA');">
				      <div class="w3-quarter tabA w3-bottombar w3-hover-light-grey w3-padding">DAgent</div>
				    </a>
				    <a href="javascript:void(0)" onclick="openUser(event, 'Admin');">
				      <div class="w3-quarter tabA w3-bottombar w3-hover-light-grey w3-padding">Admin</div>
				    </a>
				  </div>

				  <div id="Cust" class="w3-container w3-orange u1" style="display:none">
				    <center>
				    	<div class="w3-myfont4 w3-fontcol">
						<h2>Customer</h2>
						<form action="#" method="POST">
			 				<table>
								<tr>
									<th align="left">USER ID:</th>
									<td><input type="text" name="cid" required></td>
								</tr>
								<tr>
									<th align="left">PASSWORD:</th>
									<td><input type="Password" name="cpass" required></td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr align="center">
									<td colspan="2"><button class="button" style="vertical-align:middle" name="reg4"><span>Log in </span></button></td>
								</tr>
							</table>
						</form>
						</div>
						<br><br><br>
					</center>
				  </div>

				  <div id="Rest" class="w3-container w3-orange u1" style="display:none">
				    <center>
				    	<div class="w3-myfont4 w3-fontcol">
						<h2>Restaurant</h2>
						<form action="#" method="POST">
			 				<table>
								<tr>
									<th align="left" class="w3-myfont4">RESTAURANT ID:</th>
									<td><input type="text" name="rid" required></td>
								</tr>
								<tr>
									<th align="left">PASSWORD:</th>
									<td><input type="Password" name="rpass" required></td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr align="center">
									<td colspan="2"><button class="button" style="vertical-align:middle" name="reg5"><span>Log in </span></button></td>
								</tr>
							</table>
						</form>
					</div>
						<br><br><br>
					</center> 
				  </div>

				  <div id="DeliveryA" class="w3-container w3-orange u1" style="display:none">
				    <center>
				    	<div class="w3-fontcol w3-myfont4">
						<h2>Delivery Agent</h2>
						<form action="#" method="POST">
			 				<table>
								<tr>
									<th align="left">DA ID:</th>
									<td><input type="text" name="did" required></td>
								</tr>
								<tr>
									<th align="left">PASSWORD:</th>
									<td><input type="Password" name="dpass" required></td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr align="center">
									<td colspan="2"><button class="button" style="vertical-align:middle" name="reg6"><span>Log in </span></button></td>
								</tr>
							</table>
						</form>
					</div>
						<br><br><br>	
					</center>
				  </div>

				  <div id="Admin" class="w3-container w3-orange u1" style="display:none">
				    <center>
				    	<div class="w3-myfont4 w3-fontcol">
						<h2>Admin</h2>
						<form action="#" method="POST">
			 				<table>
								<tr>
									<th align="left">ADMIN ID:</th>
									<td><input type="text" name="aid" required></td>
								</tr>
								<tr>
									<th align="left">PASSWORD:</th>
									<td><input type="password" name="apass"></td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr>
									<td>    </td>
								</tr>
								<tr align="center">
									<td colspan="2"><button class="button" style="vertical-align:middle" name="reg7"><span>Log in </span></button></td>
								</tr>
							</table>
						</form>
					</div>
						<br><br><br>	
					</center>
				  </div>
				</div>

				<script>
				function openUser(evt, usName) {
				  var i, x, tablinks;
				  x = document.getElementsByClassName("u1");
				  document.getElementById("b").innerHTML="";
				  for (i = 0; i < x.length; i++) {
				    x[i].style.display = "none";
				  }
				  tablinks = document.getElementsByClassName("tabA");
				  for (i = 0; i < x.length; i++) {
				    tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
				  }
				  document.getElementById(usName).style.display = "block";
				  evt.currentTarget.firstElementChild.className += " w3-border-red";
				}
				</script>
			</center>
		</div>
		<br>
		<div class="footer grad2"><div class="w3-fontcol">Copyright &copy by ARS</div></div>
   		</div>
	</body>
</html>