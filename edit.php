<?php
   if(!isset($_SESSION)) session_start();
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
   //-----[Prisijungimo patikrinimas]------//
   //-----[Kalbos patikrinimas]------//
   if($_POST['kalba'] !=''){$_SESSION['kalba'] = $_POST['kalba'];}
   //-----[Mysql]------//
   require_once 'config/db.php';
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   $conn->set_charset('utf8');
   if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }
   $sql = "SELECT id, port, Pavadinimas FROM ".$_SESSION['kalba'];
    $result = mysqli_query($conn, $sql);
   //-----------------------//
   ?>
<?php require'img/server_status.php'; ?>
<html >
   <head>
      <meta charset="UTF-8">
      <title>Clean login form</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/InputBoxTemplate.css">
      <link rel="stylesheet" href="flags/flags.css">
   </head>
   <body>
      <div class="wrap">
         <h1>
            <ul id="top">
               <li><?php echo "Sveikas, ".$_SESSION['username'];?></li>
               <li><?php echo "Žaidimas: ".$_SESSION['kalba'];?><?php echo" <img src='img/".$_SESSION['kalba'].".jpg' border='0'/>"?></li>
            </ul>
         </h1>
	<a href='index.php'><button type='submit' id='button' class='float' align='center'>Atsijungti</button></a>
         <p>
         <table id="id" class="id" >
            <tr>
               <th>PORT:</th>
               <th>Pavadinimas</th>
	       <th>Statusas</th>
               <th>Valdymas</th>
            </tr>
            <?php if(mysqli_num_rows($result) > 0) {
               while($row = mysqli_fetch_assoc($result)) {
               	echo "<tr><th>".$row["port"]."</th><th>".$row["Pavadinimas"]."</th><th>".serverStatus(status, a, a, strtolower($_SESSION['kalba']).+$row["id"])."</th><th><form action='startServer.php' method='post'><button type='submit' id='button' name='id' value='".$row["id"]."' class='float'>Paleisti</button></form><form action='stopServer.php' method='post'><button type='submit' id='button' name='id' value='".$row["id"]."' class='float'>Išjungti</button></form><form action='log.php' method='post'><button type='submit' name='log_id' value='".$row["id"]."' id='button' class='float'>Logai</button></form></th></tr>";
               }
               	} else echo "Duomenu bazė tuščia!"; 
               ?>
         </table>
		 <button type='submit' id='button' class='float'>Pridėti</button> <button type='submit' id='button' class='float'>Ištrinti</button> <a href="main.php"><button type='submit' id='button' class='float'>Keisti žaidimą</button></a>
         </p>
         <br />
      </div>
   </body>
</html>