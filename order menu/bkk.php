<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:http://localhost/WDLProject/Login.php");
}
?>
<html>
<head>
<h1 align="center">Burger KIng</h1>
<center>
<img src="BKK.png" width=120 height=120>
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
	<td><input type="checkbox" name="color[]" id="color" value="red">Paneer King Burger</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Chicken Whopper Bugger </td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Chicken chilli Cheese  Burger</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Crispy Chicken</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Chilli Cheese Burger</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">Grill Chicken</td>
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
