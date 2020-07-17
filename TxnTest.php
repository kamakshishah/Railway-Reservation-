<?php
	session_start();
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	$train = $_SESSION["from"];
	$count = $_SESSION["count"];
	$price = $_SESSION["Ticket"]
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "train";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name= $_POST['Name'];
$email= $_POST['Age'];
$usern= $_POST['Gender'];
$pass= $_POST['Aadhar'];
$sql = "INSERT INTO `Passengers` (`Name`, `Age`, `Gender`, `Aadhar_no`) VALUES ('$name','$email', '$usern', '$pass')";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
}
mysqli_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php" method="GET">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST002"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>STATION::*</label></td>
					<td><label><?php echo $train ?></label></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>No. Of Passengers ::*</label></td>
					<td><label><?php echo $count ?>
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>Amount*</label></td>
					<td><label><?php echo $price ?></label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
</body>
</html>
