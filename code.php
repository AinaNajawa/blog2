<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: indexx.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: indexx.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $firstdate = mysqli_real_escape_string($con, $_POST['firstdate']);
    $lastdate = mysqli_real_escape_string($con, $_POST['lastdate']);

    $query = "UPDATE students SET fullname='$fullname', phonenumber='$phonenumber', firstdate='$firstdate', lastdate='$lastdate' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: indexx.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: indexx.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $firstdate = mysqli_real_escape_string($con, $_POST['firstdate']);
    $lastdate = mysqli_real_escape_string($con, $_POST['lastdate']);

    $query = "INSERT INTO students (fullname,phonenumber,firstdate,lastdate ) VALUES ('$fullname','$phonenumber','$firstdate','$lastdate')";

    $query_run = mysqli_query($con, $query);
    if($query_run)      
    {                   

        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>