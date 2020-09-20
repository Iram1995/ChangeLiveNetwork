<?php   
    //echo "Hello";
    //echo md5('admin');
    ini_set("display_errors", 0);
    //error_reporting(E_ALL);
    date_default_timezone_set('Africa/Johannesburg');
    session_start();

    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/var/functions.php";
    
    //include $_SERVER['DOCUMENT_ROOT'] . "/scripts/arraylist.php";

    if(!isset($_SESSION['logged'])){
        header('Location: /login.php?');
    }else{
        $userid=$_SESSION['userid'];
        $username=$_SESSION['username'];
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";

    if($userStatus == "0"){
        echo "<h2 class='alert alert-danger' style='text-align:center;'>Your Account Has Been Blocked!</h2>";
        //include $_SERVER['DOCUMENT_ROOT'] . "/includes/loginform.inc.php";
        header('Refresh: 5;url=/login.php');
    }

?>

<?php

	// bitcoin/altcoin payment box; open source
	
	// Change path to your files
	// --------------------------------------
	DEFINE("CRYPTOBOX_PHP_FILES_PATH", "lib/");        	// path to directory with files: cryptobox.class.php / cryptobox.callback.php / cryptobox.newpayment.php; 
												// cryptobox.newpayment.php will be automatically call through ajax/php two times - payment received/confirmed
	DEFINE("CRYPTOBOX_IMG_FILES_PATH", "images/");	// path to directory with coin image files (directory 'images' by default)
	DEFINE("CRYPTOBOX_JS_FILES_PATH", "js/");			// path to directory with files: ajax.min.js/support.min.js
	
	
	// Change values below
	// --------------------------------------
	DEFINE("CRYPTOBOX_LANGUAGE_HTMLID", "alang");	// any value; customize - language selection list html id; change it to any other - for example 'aa';	default 'alang'
	DEFINE("CRYPTOBOX_COINS_HTMLID", "acoin");		// any value;  customize - coins selection list html id; change it to any other - for example 'bb';	default 'acoin'
	DEFINE("CRYPTOBOX_PREFIX_HTMLID", "acrypto_");	// any value; prefix for all html elements; change it to any other - for example 'cc';	default 'acrypto_'
	
	
	// Open Source Bitcoin Payment Library
	// ---------------------------------------------------------------
	require_once(CRYPTOBOX_PHP_FILES_PATH . "cryptobox.class.php" );

	
	
	/*********************************************************/
	/****  PAYMENT BOX CONFIGURATION VARIABLES  ****/
	/*********************************************************/
	
	// IMPORTANT: Please read description of options here - https://gourl.io/api-php.html#options
	
	$userID 				= "";			 // place your registered userID or md5(userID) here (user1, user7, uo43DC, etc).
									// You can use php $_SESSION["userABC"] for store userID, amount, etc
									// You don't need to use userID for unregistered website visitors - $userID = "";
									// if userID is empty, system will autogenerate userID and save it in cookies
	$userFormat		= "COOKIE";		// save userID in cookies (or you can use IPADDRESS, SESSION, MANUAL)
	$orderID			= "activate";	    	// invoice number - 000383
	$amountUSD		= 41;			// invoice amount - 2.21 USD; or you can use - $amountUSD = convert_currency_live("EUR", "USD", 22.37); // convert 22.37EUR to USD
	
	$period			= "NOEXPIRY";	// one time payment, not expiry
	$def_language	= "en";			// default Language in payment box
	$def_coin			= "bitcoin";		// default Coin in payment box
	
	
	// List of coins that you accept for payments
	//$coins = array('bitcoin', 'bitcoincash', 'bitcoinsv', 'litecoin', 'dogecoin', 'dash', 'speedcoin', 'reddcoin', 'potcoin', 'feathercoin', 'vertcoin', 'peercoin', 'monetaryunit', 'universalcurrency');
	$coins = array('bitcoin');  // for example, accept payments in bitcoin, bitcoincash, litecoin, dash, speedcoin 
	
	// Create record for each your coin - https://gourl.io/editrecord/coin_boxes/0 ; and get free gourl keys
	// It is not bitcoin wallet private keys! Place GoUrl Public/Private keys below for all coins which you accept
	
			 
	// Demo Keys; for tests	(example - 5 coins)
	$all_keys = array(	"bitcoin"   => array("public_key" => "25654AAo79c3Bitcoin77BTCPUBqwIefT1j9fqqMwUtMI0huVL",  
										    "private_key" => "25654AAo79c3Bitcoin77BTCPRV0JG7w3jg0Tc5Pfi34U8o5JE")); 
										    // Demo keys!		   
	
	// Re-test - all gourl public/private keys
	$def_coin = strtolower($def_coin);
	if (!in_array($def_coin, $coins)) $coins[] = $def_coin;  
	foreach($coins as $v)
	{
		if (!isset($all_keys[$v]["public_key"]) || !isset($all_keys[$v]["private_key"])) die("Please add your public/private keys for '$v' in \$all_keys variable");
		elseif (!strpos($all_keys[$v]["public_key"], "PUB"))  die("Invalid public key for '$v' in \$all_keys variable");
		elseif (!strpos($all_keys[$v]["private_key"], "PRV")) die("Invalid private key for '$v' in \$all_keys variable");
		elseif (strpos(CRYPTOBOX_PRIVATE_KEYS, $all_keys[$v]["private_key"]) === false) 
				die("Please add your private key for '$v' in variable \$cryptobox_private_keys, file /lib/cryptobox.config.php.");
	}
	
	
	// Current selected coin by user
	$coinName = cryptobox_selcoin($coins, $def_coin);
	
	
	// Current Coin public/private keys
	$public_key  = $all_keys[$coinName]["public_key"];
	$private_key = $all_keys[$coinName]["private_key"];
	
	
	
	/** PAYMENT BOX **/
	$options = array(
	    "public_key"  	=> $public_key,	// your public key from gourl.io
	    "private_key" 	=> $private_key,	// your private key from gourl.io
	    "webdev_key"  	=> "", 			// optional, gourl affiliate key
	    "orderID"     	=> $orderID, 		// order id or product name
	    "userID"      		=> $userID, 		// unique identifier for every user
	    "userFormat"  	=> $userFormat, 	// save userID in COOKIE, IPADDRESS, SESSION  or MANUAL
	    "amount"   	  	=> 0,			// product price in btc/bch/bsv/ltc/doge/etc OR setup price in USD below
	    "amountUSD"   	=> $amountUSD,	// we use product price in USD
	    "period"      		=> $period, 		// payment valid period
	    "language"	  	=> $def_language  // text on EN - english, FR - french, etc
	);
	
	// Initialise Payment Class
	$box = new Cryptobox ($options);
	
	// coin name
	$coinName = $box->coin_name();

	// php code end :)
	// ---------------------

?>
        	
     

<?php
 	include 'user-style/activate.php';
?>
