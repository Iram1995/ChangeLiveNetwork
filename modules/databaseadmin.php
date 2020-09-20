<?php

    //session_start();
    $section=isset($_GET['section'])?$_GET['section']:'';

    if($section=='backup'){
    	echo "<h2>Backup Database</h2>";
    	
		
    	if(isset($_POST['submit'])){
    		$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result))
			{
				$tables[] = $row[0];
			}
			
			//cycle through
			foreach($tables as $table)
			{
				$result = mysql_query('SELECT * FROM '.$table);
				$num_fields = mysql_num_fields($result);
				
				//$return.= 'DROP TABLE '.$table.';';
				$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
				$return.= "\n\n".$row2[1].";\n\n";
				
				for ($i = 0; $i < $num_fields; $i++) 
				{
					while($row = mysql_fetch_row($result))
					{
						$return.= 'INSERT INTO '.$table.' VALUES(';
						for($j=0; $j < $num_fields; $j++) 
						{
							$row[$j] = addslashes($row[$j]);
							$row[$j] = ereg_replace("\n","\\n",$row[$j]);
							if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
							if ($j < ($num_fields-1)) { $return.= ','; }
						}
						$return.= ");\n";
					}
				}
				$return.="\n\n\n";
			}
			
			//save file
			$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
			fwrite($handle,$return);
			fclose($handle);

			/*$sql="INSERT INTO mlmbackups(backupdate, filename) VALUES (CURDATE(), '$return')";
			$result=mysql_query($sql) or die(mysql_error());

			if($result){
				

			}*/

			echo "<h3 style='color:green; padding:15px;'>Database Successfully Backed Up";
			include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/displaybackups.php";

			?>
    			

    			<form class="registrationform" action="/admin/?section=backup" method="post">
    				<div class="control-group">
    					<div class="control double">
    						<input type="submit" name="submit" value="Backup Database">
    					</div>
    				</div>	
    			</form>
    		<?php

    	}else{

    		$directory=$_SERVER['DOCUMENT_ROOT'] . "/admin/";
    		$files=glob($directory . "*.sql");

    		include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/displaybackups.php";
    		
    		?>
    			<form class="registrationform" action="/admin/?section=backup" method="post">
    				<div class="control-group">
    					<div class="control double">
    						<input type="submit" name="submit" value="Backup Database">
    					</div>
    				</div>	
    			</form>
    		<?php
    	}
		
    }

   
?>
                        
                
