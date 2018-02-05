<?php
session_start();
if(!isset($_SESSION)) session_start();
//------------------------------//
$_SESSION['logged_in'] = false;
$_SESSION['username'] = '';
$_SESSION['password'] = '';
//-----------------------------//
//include 'config/db.php';
//include 'config/db_close.php';
 ?>
 <!DOCTYPE html>
<html >
   <head>
      <meta charset="UTF-8">
      <title>Clean login form</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/InputBoxTemplate.css">
   </head>
   <body>
      <div class="login">
         <div class="heading">
            <h2>Prisijungimas</h2>
            <form action="main.php" method="post">
               <div class="input-group input-group-lg">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" name="username" class="form-control" placeholder="Vartotojo vardas">
               </div>
               <div class="input-group input-group-lg">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Slaptažodis">
               </div>
               <button type="submit" class="float">Login</button>
            </form>
         </div>
      </div>
   </body>
</html>