<?php

    $host="localhost"; // Host name
    $username="root"; // Mysql username
    $password=""; // Mysql password
    $db_name="questbook"; // Database name
    $tbl_name="users"; // Table name

    // Connect to server and select database.
    mysql_connect("$host", "$username", "$password")or die("cannot connect");
    mysql_select_db("$db_name")or die("cannot select DB");

    // username and password sent from form
    $myusername=$_POST['myusername'];
    $mypassword=$_POST['mypassword'];

    

    $sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
    $result=mysql_query($sql);

    // Mysql_num_row is counting table row
    $count=mysql_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count==1){

    
    session_start();
    $_SESSION["myusername"] = $_POST['myusername'];
    header("location:guestbook.php");
    }
    else {
    echo "Wrong Username or Password";
    }
?>