<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('database.db');
      }
   }
   $db = new MyDB();
   if(!$db){
	   $filename = 'database.db';

      echo $db->lastErrorMsg();
   } else {
      //echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      CREATE TABLE IF NOT EXISTS STUDENTS
      (ID      NOT NULL,
      NAME           TEXT    NOT NULL,
      ADDRESS        CHAR(50),
	  EMAIL          TEXT    NOT NULL,
	  MOBILE_NO  	 TEXT    NOT NULL,
      BANK_AC_NO     TEXT    NOT NULL,
      BANK_PASS		 TEXT);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      //echo "Table created successfully\n";
   }
   
   $sqlAdmin =<<<EOF
      CREATE TABLE IF NOT EXISTS ADMIN
      (ID      NOT NULL,
      USERNAME           TEXT    NOT NULL,
	  EMAIL          TEXT    NOT NULL,
      PASSWORD		 TEXT);
EOF;
$ret1 = $db->exec($sqlAdmin);
   if(!$ret1){
      echo $db->lastErrorMsg();
   } else {
      //echo "Table created successfully\n";
   }
$sqlAdminIn =<<<EOF
      INSERT INTO ADMIN (ID, USERNAME, EMAIL,PASSWORD)
		VALUES ('1', 'administrator', 'admin@gmail.com','admin@123')
EOF;
   
		
   
	$ret2 = $db->exec($sqlAdminIn);
   if(!$ret2){
      echo $db->lastErrorMsg();
   } else {
      //echo "Table created successfully\n";
   }
   
   
   
   $db->close();
?>