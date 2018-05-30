
<?php
include('data.php');
session_start();
    
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
               
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
     // echo "Opened database successfully\n";
   }

   $sql ="INSERT INTO STUDENTS (ID,NAME,ADDRESS,EMAIL,MOBILE_NO,BANK_AC_NO,BANK_PASS)"."\n"."VALUES ('".$_GET["add"]."', '".$_POST["Name"]."', '".$_POST["address"]."', '".$_POST["userEmail"]."', '".$_POST["contact"]."', '".$_POST["bankno"]."', '".$_POST["bankpass"]."');";



   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Successeful Registration!\n";
   }
   $db->close();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2>REGISTRATION FORM!</h2>
  <form role="form" method="post" action="registration.php?add=<?php echo uniqid()?>"  onSubmit="return formValidation();">
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control"   name="Name" id="name" placeholder="Enter your Name">
    </div>
    <div class="form-group">
      <label>ADDRESS:</label>
      <input type="text" class="form-control" name="address" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label >Email:</label>
      <input type="email" class="form-control"  name="userEmail" id="email" placeholder="Enter email">
    </div>
	<div class="form-group">
      <label >MOBILE_NO:</label>
      <input type="text" class="form-control"  name="contact" id="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label >BANK_AC_NO:</label>
      <input type="text" class="form-control" name="bankno" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">BANK_PASS:</label>
      <input type="password" class="form-control" name="bankpass" placeholder="Enter password">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<a style="margin:50px;" href="login.php" class="btn btn-info" role="button">See all registrations</a>

</body>
</html>
<script type="text/javascript">  
function formValidation()
{
var uName=document.frmRegistration.Name;
var email=document.frmRegistration.userEmail;
var uContact=document.frmRegistration.contact;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var phoneno = /^\d{10}$/;
if(!email.value.match(mailformat))
{
alert("You have entered an invalid email address!");
document.frmRegistration.userEmail.focus();
return false;
}
else
{
if(!uContact.value.match(phoneno))
{
alert("You have entered an invalid Contact !");
return false;
}
else
{

}
}
}
</script>
