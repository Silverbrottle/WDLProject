<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:http://localhost/WDLProject/Login.php");
}
?>
<html>
<head>
<h1 align="center">Bakin Robbins</h1>
<center>
<img src="bk.png" width=120 height=120>
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
</body>
</html>
