<?php

    $con = new mysqli("localhost", "channymm_ddu", "channymm_dd", "channymm_dd");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    else{
        // variables
        // echo "DB IS ConnectED!";
        $sitename = "Change Lives Network";
        $sitedec = "Helping Entrepreneurs business ideas";
        $sitemail = "info@changelivesnetwork.com";
        $websitelink = "www.changelivesnetwork.com";
    } 
        
    
?>