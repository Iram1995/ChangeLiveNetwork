<table class="tables compact display" style="font-size: 1.4em;">
      <thead>
            <th style="width: 5%;">SN</th><th>Filename</th><th>File Size</th><th>Action</th>
      </thead>
      <tbody>
      <?php
            $sn=1;
            foreach ($files as $file) {
                  # code...
                  $file2=pathinfo($file, PATHINFO_FILENAME);
                  
                  ?>
                        <tr><td><?php echo $sn;?></td><td><?php echo $file2;?></td><td><?php echo number_format((filesize($file))/1048576,4) . "MB";?></td><td><a class='download' href="/<?php echo $file;?>">Download</a></td></tr>
                  <?php
                  $sn=$sn+1;
            }
      ?>
      </tbody>
</table>
<p style="text-align: center;margin-top: 12px;">To download backup to external drive, right click on the link and select 'Save Link As...' option.</p>