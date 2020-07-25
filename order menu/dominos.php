<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:http://localhost/WDLProject/Login.php");
}
?>
<html>
<head>
<h1 align="center">Dominos</h1>
<center>
<img src="dominos.png" width=120 height=120>
<body>

<center>
<b>MENU</b>

<fieldset><legend>
<b>VEG</b></legend>

<form action="third.php" method="post">
<table>
	<tr>
		<th>ITEM</th>
		<th>PRICE</th>
	</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">MARGHERITA</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">PEPPER PANEER</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">MEXICAN GREEN WAVE</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">DELUXE VEGGIE</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">VEG EXTRAVAGANZA</td>
	<td>500
</tr>

</table>
 	</fieldset>
 </form>

<fieldset><legend>
<b>NON-VEG</b></legend>
<table>
	<tr>
		<th>ITEM</th>
		<th>PRICE</th>
	</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">PEPPER BARBECUE CHICKEN</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">CHICKEN GOLDEN DELIGHT</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">CHICKEN DOMINATOR</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">INDI CHICKEN TIKKA</td>
	<td>500
</tr>
<tr>
	<td><input type="checkbox" name="color[]" id="color" value="red">CHICKEN FIESTA</td>
	<td>500

</tr>
<td>

  </td></tr></fieldset>	
</table>

</form>
<input type="submit" value="PLACE ORDER" >

</center>
</body>
</html>
