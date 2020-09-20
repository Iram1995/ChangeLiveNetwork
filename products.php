<?php
///////////////////////////////////////////////////////////////////////////////

//Database credentials
define("HOST", "localhost");     // The host you want to connect to.
define("USER", "root");    // The database username. 
define("PASSWORD", "");    // The database password. 
define("DATABASE", "changeslives");    // The database name.


//Connect with database
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

$system_mode = 'test'; // set 'test' for sandbox and 'live' for real payments.
$paypal_seller = 'businesshandlers@yahoo.com'; //Your PayPal account email address
$hi = "hello";

$payment_return_success = 'http://localhost/paypal_integration/payment_success.php'; //after payment, user will be redirected in this page, change with your own url
$payment_return_cancel = 'http://localhost/paypal_integration/payment_cancel.php'; //if payment cancelled, user will be redirected in this page, change with your own url

if ($system_mode == 'test') {
	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
	$enable_sandbox = true; 
} else {
	$paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
}

 ?>
<html>
<head>
<title>Products</title>
</head>

<body>
<h1>Products <?php echo $hi;?></h1>
<?php
	//Fetch products from db in most secured way.							
    $prep_stmt = "SELECT * FROM paypal_products";
    $stmt = $mysqli->prepare($prep_stmt);
    if ($stmt) {
        $stmt->execute();
        $stmt->store_result();
		$stmt->bind_result($id, $name, $price);
		if ($stmt->num_rows >= 1) { 
			while ($stmt->fetch()) {
			 echo 'Product Name: '.$name;
			 echo '<br>';
			 echo 'Price: '.'$'.$price.'';

			}
		} else {echo 'No Products in DB';}
		$stmt->close();
	}
?>
	<form action="<?php echo $paypal_url; ?>" method="post">
				<!-- Get paypal email address from core_config.php -->
				<input type="hidden" name="business" value="<?php echo $paypal_seller; ?>">
				
				<input type="hidden" name="cmd" value="_xclick">
				
				<!-- Specify product details -->
				<input type="hidden" name="item_name" value="<?php echo $name; ?>">
				<input type="hidden" name="item_number" value="<?php echo $id; ?>">
				<input type="hidden" name="amount" value="<?php echo $price; ?>">
				<input type="hidden" name="currency_code" value="USD">
        
				<!-- Return URLs -->
				<input type='hidden' name='cancel_return' value='<? echo $payment_return_success; ?>'>
				<input type='hidden' name='return' value='<? echo $payment_return_cancel; ?>'>
				
				<!-- IPN Url -->
				<input type='hidden' name='notify_url' value='http://localhost/paypal_integration/paypal_ipn.php'>
				
				<!-- Submit Button -->
				<input type="submit" value="Buy Now!" name="submit">
			</form>
	</body>
</html>