<?php
function get_server_memory_usage(){
 
	$free = shell_exec('free');
	$free = (string)trim($free);
	$free_arr = explode("\n", $free);
	$mem = explode(" ", $free_arr[1]);
	$mem = array_filter($mem);
	$mem = array_merge($mem);
	$memory_usage = $mem[2]/$mem[1]*100;
 
	return $memory_usage;
}

function get_server_cpu_usage(){

    $load = sys_getloadavg();
    return $load[0];

}
function getSystemMemInfo() 
{       
    $data = explode("\n", file_get_contents("/proc/meminfo"));
    $meminfo = array();
    foreach ($data as $line) {
    	list($key, $val) = explode(":", $line);
    	$meminfo[$key] = trim($val);
    }
    return $meminfo;
}

function getStats()
{
echo "<p>";
Procentai(RAM,substr(get_server_memory_usage(), 0, -13));
echo "</p>";
echo "<p>";
Procentai(CPU,get_server_cpu_usage());
echo "</p>";
}
// Reikia dar pritaikyti.
function ProgressBar()
{
echo"<div id='progress' style='width:500px;border:1px solid #ccc;'></div>";
echo"<div id='information' style='width'></div>";

$total = 10;
// Loop through process
for($i=1; $i<=$total; $i++){
    // Calculate the percentation
    $percent = intval($i/$total * 100)."%";
    
    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$i.' row(s) processed.";
    </script>'; 
    
// This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64); 
    
// Send output to browser immediately
    flush(); 
    
// Sleep one second so we can see the delay
    sleep(1);
} 
// Tell user that the process is completed
//echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
}
function Procentai($text, $precentage)
{
echo"<div id='progress' style='width:500px;border:1px solid #ccc;'></div>";
echo"<div id='information' style='width'></div>";

$total = 10;
// Loop through process
    // Calculate the percentation
    $percent = intval($precentage)."%";
    
    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$text.' : '.$precentage.' %";
    </script>'; 
    
// This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64); 
    
// Send output to browser immediately
    flush(); 
    
// Sleep one second so we can see the delay
    sleep(1);

// Tell user that the process is completed
//echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
}

?>