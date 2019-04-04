<?php
    // session_start();
    error_reporting( E_ALL );
    include_once '../db_conn.php';
    if(isset($_POST['submitQ'])){
      update_challenge($conn);
    }
    function update_challenge($conn)
    {
        $success_array = [];
        extract($_POST);
        $challenge_time = (int)$challenge_time*60;
        $sql = "update challenges set title='$challenge_title', time_in_seconds =".$challenge_time.",compilation_calls =".$challenge_compilation_calls." where challenge_id = ".$_GET['challenge_id'].";";
        $success=mysqli_query($conn,$sql);
        if(!$success){
            array_push($success_array, 0);
        }
        else{
            array_push($success_array, 1);
        }
        $challenge_id =  $_GET['challenge_id'];
        $sql="delete from challenge_questions_mapping where challenge_id=$challenge_id";
        mysqli_query($conn, $sql);
        $count = 1;
        if(!empty($_POST['question_list'])){
            // Loop to store and display values of individual checked checkbox.
            foreach($_POST['question_list'] as $selected){
               $sql1 = "insert into challenge_questions_mapping values(".(int)$challenge_id.",".(int)$selected.",".(int)$count.");";
               $success=mysqli_query($conn,$sql1);
               if(!$success){
                array_push($success_array, 0);
                }
                else{
                    array_push($success_array, 1);
                }
               $count = $count + 1;
            }
        }
        $flag = 1;
        for($i=0;$i<sizeof($success_array);$i++){
            if ($success_array[$i]==0){
                $flag = 0;
                break;
            }
            else{
                $flag=1;
            }
        }
        if($flag==0){
            header("Location: ../../admin/manage_challenges.php?err=true");
        }
        else{
            header("Location: ../../admin/manage_challenges.php?success=true");
        }
    }
 ?>
