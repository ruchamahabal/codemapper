<?php
    // session_start();
    error_reporting( E_ALL );
    include_once '../db_conn.php';
    if(isset($_POST['submitQ'])){
      insert_challenge($conn);
    }
    function insert_challenge($conn)
    {
        extract($_POST);
        $challenge_time = (int)$challenge_time*60;
        $sql = "insert into challenges(title,time_in_seconds,compilation_calls) values('$challenge_title','$challenge_time','$challenge_compilation_calls');";
        $success=mysqli_query($conn,$sql);
        if(!$success){
            echo mysqli_error($conn);
        }
        $challenge_id =  mysqli_insert_id($conn);
        $count = 1;
        if(!empty($_POST['question_list'])){
            // Loop to store and display values of individual checked checkbox.
            foreach($_POST['question_list'] as $selected){
               $sql1 = "insert into challenge_questions_mapping values(".(int)$challenge_id.",".(int)$selected.",".(int)$count.");";
               $success=mysqli_query($conn,$sql1);
               if(!$success){
                    header("Location: ../../admin/manage_challenge.php?insert_err=true");
                    echo mysqli_error($conn);
               }
               else{
                    header("Location: ../../admin/manage_challenges.php?insert_success=true");
               }
               $count = $count + 1;
            }
        }
    }
 ?>
