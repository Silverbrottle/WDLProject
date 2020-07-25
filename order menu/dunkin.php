<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:http://localhost/WDLProject/Login.php");
}
?>
<html>
<head>
<h1 align="center">Dunkin Donuts</h1>
<center>
<img src="dunkin.png" width=120 height=120>
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
	<td><input type="checkbox" name="color[]" id="color" value="red">Espresso Hot Coffee</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Dunkin Hot Chocolate </td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Cappuccino</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Spied Ice Tea</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Fruit Berry Smoothie</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Classic Lemon Iced Tea</td>
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
