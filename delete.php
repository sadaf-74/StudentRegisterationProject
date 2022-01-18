<?php
include_once("form.php");
print_html();

//deleting student from db based on the student ID selected
//catch error if program cannot connect to db
try{  
    $db = new PDO('mysql:host=localhost;dbname=3280db','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id=$_GET['std'];
    $sql= "delete from Student where StdID=$id";
    $db->exec($sql);

    print "Record deleted successfully!"."<br/><br/>";
    print "<a href='index.php'><<< Back to the homepage</a>";
}catch(PDOException $e){
     print "Couldn't connect to the database" . $e->getMessage();
}

?>