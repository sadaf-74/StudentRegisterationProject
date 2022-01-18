<?php
//Sadaf Riazi


include_once("form.php");
print_html();
print "<a href='insert.php'>Add new Student</a>";

//if no records found in dartabase then display no records found
if (check_database()==0){
    print "</br></br>"."No records found!"."</br>";
}



//making primary connection to connect to database
//and readind all the rows in student table to return the values to the table for user display
function check_database(){   
    try{  
     $db = new PDO('mysql:host=localhost;dbname=3280db','root','');
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $print_student="<table>";
     $sql= "Select * from Student";
     $statment = $db->query($sql);
     $n_of_row =0; 
     while($row = $statment->fetch()){
        $n_of_row = $n_of_row+1;
       $print_student.="<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a href=delete.php?std=$row[0]>Delete</a><a href=update.php?std=$row[0]>Update</a></td></tr>";
     }
    }catch(PDOException $e){
        print "Couldn't connect to the database" . $e->getMessage();
      }
      print $print_student;
      return $n_of_row;

}

?>