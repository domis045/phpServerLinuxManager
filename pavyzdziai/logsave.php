<?php

	// suteikti privilegijas skaityti si aplankala.
	//sudo chown -R www-data:www-data servers
    echo $_POST['id'];
    $filestring = file_get_contents("/servers/samp1/server_log.txt");
    $filearray = explode("\n", $filestring);

    while (list($var, $val) = each($filearray)) {
        ++$var;
        $val = trim($val);
        print "$val<br />";
    }
?>