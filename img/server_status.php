<?php
function serverStatus($command, $dir, $exe, $name)
{
if($ssh = ssh2_connect('188.165.30.94', 22)) {
    if(ssh2_auth_password($ssh, 'root', 'SY2xPSKI')) {
        $stream = ssh2_exec($ssh, './test.sh '.$command.' '.$dir.' '.$exe.' '.$name);
        stream_set_blocking($stream, true);
        $data = '';
        while($buffer = fread($stream, 4096)) {
            $data .= $buffer;
        }
        fclose($stream);
	$data = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data);
        $validate = '1';
	if($data == $validate)
		return "<img src='img/on.jpg'/>";
	else return "<img src='img/off.jpg'/>"; 
    }
}
}
function serverLogs($id, $game)
{
$dir = "/servers/";
$file = "";
switch($game){
	case "samp":
		$file .= $dir;
		$file .= "samp".$id."/server_log.txt";
		break;
}
$filestring = file_get_contents($file);
if ( '' == file_get_contents( $file ))
{
	print "log failas nerastas! ".$file;
}  
print $filestring;

}

function serverControl($command, $dir, $exe, $name)
{
if($ssh = ssh2_connect('188.165.30.94', 22)) {
    if(ssh2_auth_password($ssh, 'root', 'SY2xPSKI')) {
        $stream = ssh2_exec($ssh, './test.sh '.$command.' '.$dir.' '.$exe.' '.$name);
        stream_set_blocking($stream, true);
        $data = '';
        while($buffer = fread($stream, 4096)) {
            $data .= $buffer;
        }
        fclose($stream);
	$data = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data);
	print $data;
    }
}
}

?>