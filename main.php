<?php
if(!isset($_SESSION)) session_start();
//-------------------------------------//
$login = array(
'domis045' => '1',
'ugniuss' => 'gazik',
);
//-------------------------------------//
if($_POST['username'] != '' && $_POST['password'] != '') {
	$_SESSION['username'] = $_POST['username']; // isimenam duomenis sesijai.
	$_SESSION['password'] = $_POST['password'];
}
//-------------------------------------//
$user = strtolower($_POST['username']); // password logika
$pass = $_POST['password'];
if(!isset($login[$user]) or $login[$user] != $pass) {
	if($_SESSION['logged_in'] === true);
	else
		header("Location: index.php");	
}else
{
	$_SESSION['logged_in'] = true;
}
//---------------------------------------//

if($_SESSION['logged_in'] === false) header("Location: index.php");
?>
<html >
   <head>
      <meta charset="UTF-8">
      <title>Clean login form</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/InputBoxTemplate.css">
      <link rel="stylesheet" href="css/ProgresBar.css">
   </head>
   <body>
   <div class="wrap">
	<h1><?php echo "Sveikas, ".$_SESSION['username'];?></h1>
	<a href='index.php'><button type='submit' id='button' class='float' align='center'>Atsijungti</button></a>
	<p>
	<?php include 'main_db_list.php'; ?><hr>
	 <p style="width:80%" data-value="80">CPU</p>
        <progress max="100" value="80" class="html5">
            <!-- Browsers that support HTML5 progress element will ignore the html inside `progress` element. Whereas older browsers will ignore the `progress` element and instead render the html inside it. -->
            <div class="progress-bar">
                <span style="width: 80%">80%</span>
            </div>
        </progress>
<!-- CSS3 -->
    <p style="width:60%" data-value="60">RAM</p>
        <progress max="100" value="60" class="css3">
            <!-- Browsers that support HTML5 progress element will ignore the html inside `progress` element. Whereas older browsers will ignore the `progress` element and instead render the html inside it. -->
            <div class="progress-bar">
                <span style="width: 60%">60%</span>
            </div>
        </progress>
	</p>
	<br />
	</div>
   </body>
</html>