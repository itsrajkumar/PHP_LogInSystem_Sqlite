<?php
session_start();

if(!$_SESSION['login'])
{
$redirect_page='Location: login.php';
    header($redirect_page);//redirect to login page to secure the welcome page without login access.
}

?>
<a style="margin:50px; float:left" href="logout.php" class="btn btn-info" role="button">Log Out</a>
<div class="wrap">
<h1 class="wp-heading-inline">All Registered Students List</h1>
<hr class="wp-header-end">

</div>

<table class="wp-list-table" id="user-table">
<thead>
<tr>
<th>ID</th>
<th>NAME</th>
<th>ADDRESS</th>
<th>EMAIL</th>
<th>MOBILE_NO</th>
<th>BANK_AC_NO</th>
<th>BANK_PASS</th>
</tr>
</thead>

<tbody>
<?php
session_start();

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
      //echo "Opened database successfully\n";
   }

   $sql ='SELECT * from STUDENTS ;';

$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){

		echo "<tr>";
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['NAME']."</td>";
		echo "<td>".$row['ADDRESS']."</td>";
		echo "<td>".$row['EMAIL']."</td>";
		echo "<td>".$row['MOBILE_NO']."</td>";
		echo "<td>".$row['BANK_AC_NO']."</td>";
		echo "<td>".$row['BANK_PASS']."</td>";

		echo "</tr>";
		
	}
	$db->close();

?>

</tbody>
</table>


<script src="<?php echo plugins_url( 'datatable.js', __FILE__ ); ?>"></script>

<script>
$(document).ready(function() {
    $('#user-table').DataTable({
	 /*columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        }*/
	});
} );
</script>
	
<!------------------------------------->