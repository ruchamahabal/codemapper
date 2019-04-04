<?php

include_once '../db_conn.php';
if(isset($_POST['cid'])){
    $query = "delete from challenges where challenge_id =".$_POST['cid'].";";
    $result = mysqli_query($conn,$query); 
    if(!$result){
        header('Location: ../../admin/manage_challenges.php?delerr=true');
    } 

    $query = "delete from challenge_questions_mapping where challenge_id =".$_POST['cid'].";";
    $result = mysqli_query($conn,$query); 
       
    if(!$result){
        header('Location: ../../admin/manage_challenges.php?delerr=true');
    }
    else{
        header('Location: ../../admin/manage_challenges.php?challengedel=true');
    }
}

?>