<?php
//function to contain header for the HTML code and display title of the page
function print_html(){
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Database Project</title>
    </head>   
<?php
}

//function to display the form for adding  a student
function print_form_Add($studentId_error,$name_error,$department_error,$input_array){
?>
<fieldset >
<legend>Enter the information of the students</legend>
    <form method="post" action="<?php print ($_SERVER["PHP_SELF"]);?>">  
            Student ID      
            <input type="text" name="student_id" value="<?php print $input_array["student_id"]; ?>">
            <span class="error"><?php print $studentId_error;?></span>
            <br><br>
            Name
            <input type="text" name="student_name" value="<?php print $input_array["student_name"]; ?>">
            <span class="error"><?php print $name_error;?></span>
            <br><br>
            Birth Date
            <input type="date" name="birth_date">
            <span class="error">
            <br><br>
            Gender
            <br><br>
            <input type="radio" name="gender" value="F">Female
            <br><br>
            <input type="radio" name="gender" value="M">Male
            <br><br>
            <input type="radio" name="gender" value="X">Other
            <br><br>
            <span class="error">
                Department      
            <select name="department" id="department">
            <option value="CSIS">CSIS</option>
            <option value="ART">ART</option>
            <option value="MATH">MATH</option>
            <option value="PHYS">PHYS</option></select>
            <span class="error"> <?php print $department_error;?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">  
        </form>
    </fieldset>
<?php
    print "<a href='index.php'><<< Back to the homepage</a>";
}


//function to display the form for updating student
function print_form_update($studentId_error,$name_error,$department_error,$input_array){
    ?>
    <fieldset >
    <legend>Enter the information of the students</legend>
        <form method="post" action="<?php print ($_SERVER["PHP_SELF"]);?>">  
            Student ID      
            <input type="text" name="student_id" value="<?php print $input_array["StdID"]; ?>">
            <span class="error"><?php print $studentId_error;?></span>
            <br><br>
            Name
            <input type="text" name="student_name" value="<?php print $input_array["SName"]; ?>">
            <span class="error"><?php print $name_error;?></span>
            <br><br>
            Birth Date
            <input type="date" name="birth_date" value="<?php print $input_array["BirthDate"]; ?>">
            <span class="error">
            <br><br>
            Gender
            <br><br>
            <input type="radio" name="gender" value="F">Female
            <br><br>
            <input type="radio" name="gender" value="M">Male
            <br><br>
            <input type="radio" name="gender" value="X">Other
            <br><br>
            <span class="error">
                Department      
            <select name="department" id="department">
            <option value="CSIS">CSIS</option>
            <option value="ART">ART</option>
            <option value="MATH">MATH</option>
            <option value="PHYS">PHYS</option></select>
            <span class="error"> <?php print $department_error;?></span>
            <br><br>
            <input type="submit" name="submit" value="Update">  
    
    </form>
    </fieldset>
    <?php
    print "<a href='index.php'><<< Back to the homepage</a>";
    
    }


?>