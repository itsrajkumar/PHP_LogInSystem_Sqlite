<?php
session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
          class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('database.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql ='SELECT * from ADMIN where Username="'.$_POST["usr_name"].'";';


   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      $id=$row['ID'];
      $username=$row["EMAIL"];
      $password=$row['PASSWORD'];
  }
    if ($username!=""){
        if ($password==$_POST["pwd"]){
           $_SESSION["login"]=$username;
           header('Location: info.php');    
        }else{
          
          echo "Wrong Password";
        }
      }else{
       echo "User not exist, please register to continue!";
      }
   //echo "Operation done successfully\n";
   $db->close();
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2>ADMIN PANEL</h2>
  <form method="post" action="#">
    <div class="form-group">
      <label>Username:</label>
      <input type="text" class="form-control" name="usr_name" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="password" class="form-control" name="pwd" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
