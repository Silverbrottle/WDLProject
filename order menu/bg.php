<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:http://localhost/WDLProject/Login.php");
}
?> 
<html>
<head>
<h1 align="center">Begian Waffle</h1>
<center>
<img src="bg.jpg" width=120 height=120>
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
	<td><input type="checkbox" name="color[]" id="color" value="red">Banana Salted Caramel</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Granny apple pie cheesecake </td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Classic Maple Butter</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Belgian Chocolate Milk</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Kiki and Cream Black Valvet</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Red velvet cotton candy</td>
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
</body>
</html>
