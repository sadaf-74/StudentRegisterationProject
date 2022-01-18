<?php
include_once("form.php");
print_html();


$studentId_error="";$name_error="";$department_error="";
$Isvalid=true;

//validating each data field input by user to be updated has valid info to be sent to database
//otherwise clear the input arrays and display the errors and do not update database
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $input_array=array(
    'student_id'=>$_POST['student_id'],
    'student_name'=>$_POST['student_name'],
    'birth_date'=>$_POST['birth_date'],
    'gender'=>'',
    'department'=>$_POST['department']
    );

    if(isset($_POST['gender'])){
        $input_array['gender'] = $_POST['gender'];
    }

    
    if ((empty($_POST["student_id"])) || (!filter_var($_POST["student_id"], FILTER_VALIDATE_INT))) {
    $studentId_error = " * Student ID must be integer and is required";
    $Isvalid=false;
    }

    
    if ((empty($_POST['student_name']))) {
        $name_error = " * Student name is required";
        $Isvalid=false;
    }

    //if the user inout is valid then connect to database and update the information entered by user based on student id
    //database is updated with new information for the selected student id
    if($Isvalid){
        try{  
                $db = new PDO('mysql:host=localhost;dbname=3280db','root','');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "update Student SET SName = ?, BirthDate = ?,Gender = ?,Department = ? where StdID = ?";
                $statment = $db->prepare($sql);
                $statment ->execute(array($input_array['student_name'],$input_array['birth_date'],$input_array['gender'],$input_array['department'],$input_array['student_id']));
            }catch(PDOException $e){
                 print "Couldn't connect to the database" . $e->getMessage();
            }

    print "Record updated successfully!"."<br/><br/>";
    print "<a href='index.php'><<< Back to the homepage</a>";
    }else{
        print_form_update($studentId_error,$name_error,$department_error,$input_array);
    }
    
}else{
    try{  
        $db = new PDO('mysql:host=localhost;dbname=3280db','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id=$_GET['std'];
        $sql = "select * from Student where StdID = $id";
        $statment = $db->query($sql);
        $input_array = $statment->fetch();
    }catch(PDOException $e){
         print "Couldn't connect to the database" . $e->getMessage();
    }
        print_form_update($studentId_error,$name_error,$department_error,$input_array);
}


?>