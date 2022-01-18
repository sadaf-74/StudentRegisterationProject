<?php
include_once("form.php");
print_html();


$studentId_error="";$name_error="";$department_error="";
$Isvalid=true;

//validating each data field input by user has valid info to be sent to database
//otherwise clear the input arrays and display the errors
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

    //if all the data is input correctly by user then connect to database and insert all the information taken from user to correct colums of student table
    //otherwise display the errors
    if($Isvalid){
        try{  
                $db = new PDO('mysql:host=localhost;dbname=3280db','root','');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $sql= "insert into Student values(?,?,?,?,?)";
                $statment = $db->prepare($sql);
                $statment ->execute(array($input_array['student_id'],$input_array['student_name'],$input_array['birth_date'],$input_array['gender'],$input_array['department']));
            }catch(PDOException $e){
                 print "Couldn't connect to the database" . $e->getMessage();
            }

    print "Data inserted to table successfully!"."<br/><br/>";
    print "<a href='index.php'><<< Back to the homepage</a>";
    }else{
        print_form_add($studentId_error,$name_error,$department_error,$input_array);
    }
    
}else{
    $input_array=[
        'student_id'=>'',
        'student_name'=>'',
        'birth_date'=>'',
        'gender'=>'',
        'department'=>''
        ];

        print_form_add($studentId_error,$name_error,$department_error,$input_array);
}


?>