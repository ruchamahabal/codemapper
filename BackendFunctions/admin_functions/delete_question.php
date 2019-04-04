<?php

include_once '../db_conn.php';
if(isset($_POST['qid'])){
    $query = "delete from sample_test_cases where qid =".$_POST['qid'].";";
    $result = mysqli_query($conn,$query); 
    if(!$result){
        header('Location: ../../admin/manage_questions.php?err=true');
    } 

    $query = "delete from testcases where qid =".$_POST['qid'].";";
    $result = mysqli_query($conn,$query); 
    if(!$result){
        header('Location:../../admin/manage_questions.php?err=true');
    }

    $query = "delete from questions where qid =".$_POST['qid'].";";
    $result = mysqli_query($conn,$query); 
       
    if(!$result){
        header('Location: ../../admin/manage_questions.php?err=true');
    }
    else{
        header('Location: ../../admin/manage_questions.php?questiondel=true');
    }
}

?>