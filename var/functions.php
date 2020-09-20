<?php	

    //require_once $_SERVER['DOCUMENT_ROOT'] . "/mails/class.phpmailer.php";
    function sendmail22($recipient,$subject,$message){
        include ('mail.php');

        $from=$sitename."<$sitemail>";
        $to=$recipient;
        
        $smtpinfo["host"]="rs12.cphost.co.za";
        $smtpinfo["port"]="465";
        $smtpinfo["auth"]=TRUE;
        $smtpinfo["username"]="$sitemail";
        $smtpinfo["password"]="Global!!!!";

        $mailmsg =$message;

        $headers = array('MIME-Version'=>'1.0rn', 'Content-Type' => 'text/html; charset=ISO-8859-1rn','From'=>$from, 'To'=>$to, 'Subject'=>$subject);

        $mail_object=& mail::factory("smtp",$smtpinfo);

        $mail=$mail_object->send($to,$headers,$mailmsg);

        if(PEAR::isError($mail)){
            return false;

        }else{
            return TRUE;
        }

    }

	function testinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    function checkstatus($status){
    	if($status==0){
    		echo "<p>Your profile is not yet active. Please, check the email address you provided when registering for the activation code and click <a href='/?section=activate'> here </a> to activate your account.</p>";
    		//exit();
            //header('Refresh:0, url=/index.php?section=activate');
    	}
    }

    function sendplainmail($recipient,$subject,$message){
        include ('mail.php');

        $from=$sitename."<$sitemail>";
        $to=$recipient;
        
        $smtpinfo["host"]="rs12.cphost.co.za";
        $smtpinfo["port"]="465";
        $smtpinfo["auth"]=TRUE;
        $smtpinfo["username"]="$sitemail";
        $smtpinfo["password"]="Global!!!!";

        $mailmsg =$message;

        $headers = array('MIME-Version'=>'1.0rn', 'Content-Type' => 'text/html; charset=ISO-8859-1rn','From'=>$from, 'To'=>$to, 'Subject'=>$subject);

        $mail_object=& mail::factory("smtp",$smtpinfo);

        $mail=$mail_object->send($to,$headers,$mailmsg);

        if(PEAR::isError($mail)){
            return false;

        }else{
            return TRUE;
        }

    }

    function sendSMS($receiver, $message,$redirect) {
        $smsUN='#';
        $smsPW='#';
        $smsSA='MLM';
        $smsDA= $receiver;
        $smsMessage=$message;
        $smsRedirect = $redirect;


        return "http://mail.etextmail.com/smsapi/send.aspx?UN=" . $smsUN . "&P=" . $smsPW . "&SA=" . $smsSA . "&DA=" . $smsDA . "&M=" . $smsMessage . "&R=" . $smsRedirect;
         
    }

    function checkMandatory($fieldname){
        if(empty($_REQUEST[$fieldname]))
        {
            return FALSE;
        }

        $trimval=trim($_REQUEST[$fieldname]);
        if(empty($trimval)){
            return FALSE;
        }
        return TRUE;
    }

    function checkMaxLength($fieldname, $length){
        if(empty($_REQUEST[$fieldname])){
            return TRUE;
        }

        if(strlen($_REQUEST[$fieldname]) > $length){
            return FALSE;
        }
        return TRUE;
    }

    function checkMinLength($fieldname, $length){
        if(empty($_REQUEST[$fieldname])){
            return FALSE;
        }

        if(strlen($_REQUEST[$fieldname]) < $length){
            return FALSE;
        }
        return TRUE;
    }

    function checkEmail($fieldname){
        return filter_var($_REQUEST[$fieldname], FILTER_VALIDATE_EMAIL)? TRUE : FALSE;
    }

    function PrepSQL($value){
        //stripslashes
        if(get_magic_quotes_gpc()){
            $value=stripslashes($value);
        }

        //quote
        $value = "'" . mysql_real_escape_string($value) . "'";

        return ($value);
    }
?>