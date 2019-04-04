<?php
    session_start();
    include_once 'db_conn.php';
    if(isset($_POST['scr'])){
      score_display($conn);
    }
    function score_display($conn)
    {
      $_SESSION['user_score'] = (int)$_POST['scr'];
      $_SESSION['challenge_score'] = (int)$_POST['total_score'];
      $_SESSION['time'] = (int)$_POST['time'];
      $_SESSION['total_time'] = (int)$_POST['total_time'];
      $_SESSION['compilationCalls'] = (int)$_POST['compile'];
      $_SESSION['total_compilation_calls'] = (int)$_POST['total_calls'];
      $_SESSION['challenge_id'] = (int)$_POST['challenge_id'];
      $_SESSION['hidden_passed'] = (int)$_POST['hiddenTestcasesPassed'];
      $_SESSION['total_hidden_testcases'] = (int)$_POST['total_hidden_testcases'];
      $sql = "insert into user_scores values(".$_SESSION['u_id'].",".$_SESSION['user_score'].",".$_SESSION['challenge_score'].",".$_SESSION['time'].",".$_SESSION['total_time'].",".$_SESSION['compilationCalls'].",".$_SESSION['total_compilation_calls'].",".$_SESSION['hidden_passed'].",".$_SESSION['total_hidden_testcases'].",".$_SESSION['challenge_id'].");";
      if (mysqli_query($conn, $sql)) {
         echo "New record created successfully";
       } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
 ?>
