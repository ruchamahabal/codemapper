<?php
    // session_start();
    error_reporting( E_ALL );
    include_once '../db_conn.php';
    if(isset($_POST['question'])){
      insert_question($conn);
    }
    function insert_question($conn)
    {
      $success_array = [];
      $insertion_errors = [];
      $question = $_POST['question'];
      $initialCode = $_POST['initialCode'];
      $functionName = $_POST['functionName'];
      $sql = "insert into questions(question,initial_code,function_name) values('$question','$initialCode','$functionName');";
      if (mysqli_query($conn, $sql)) {
        array_push($success_array, 1);
        $id = mysqli_insert_id($conn);
      } else {
            array_push($success_array, 0);
            array_push($insertion_errors, "Error while inserting question:".mysqli_error($conn));
      }
      if(isset($_POST['sampleTestcases']))
      {
          for($i = 0; $i < sizeof($_POST['sampleTestcases']); $i++ )
          {
              $testcase = $_POST['sampleTestcases'][$i];
              $sql = "insert into sample_test_cases(st_id, input, output, qid) values(".($i+1).",'".$testcase[0]."','".$testcase[1]."',".$id.");";
              if (mysqli_query($conn, $sql)) {
                array_push($success_array, 1);
              } else {
                array_push($success_array, 0);
                array_push($insertion_errors, "Error while inserting sample testcase:".($i+1).":".mysqli_error($conn));
              }
          }
      }
          $i = 0;
          if(isset($_POST['sampleTestcases'])){
            for($i = 0; $i < sizeof($_POST['sampleTestcases']); $i++ )
            {
                $testcase = $_POST['sampleTestcases'][$i];
                $input_func_call = "print(".$_POST['functionName']."(".$testcase[0]."))";
                $sql = "insert into testcase(tc_no, input, input_function_call, expected_output, qid, difficulty_level, type) values(".($i+1).",'".$testcase[0]."','".$input_func_call."','".$testcase[1]."',".$id.",".$testcase[2].",'sample');";
                if (mysqli_query($conn, $sql)) {
                  array_push($success_array, 1);
                } else {
                  array_push($success_array, 0);
                  array_push($insertion_errors, "Error while inserting sample testcase:".($i+1).":".mysqli_error($conn));
                }
            }
          }
          if(isset($_POST['hiddenTestcases'])){
            $count = $i+1;
            for($j = 0; $j < sizeof($_POST['hiddenTestcases']); $j++ )
            {
                $testcase = $_POST['hiddenTestcases'][$j];
                $input_func_call = "print(".$_POST['functionName']."(".$testcase[0]."))";
                $sql = "insert into testcase(tc_no, input, input_function_call, expected_output, qid, difficulty_level, type) values(".$count.",'".$testcase[0]."','".$input_func_call."','".$testcase[1]."',".$id.",".$testcase[2].",'hidden');";
                if (mysqli_query($conn, $sql)) {
                  array_push($success_array, 1);
                } else {
                  array_push($success_array, 0);
                  array_push($insertion_errors, "Error while inserting hidden testcase:".$count.":".mysqli_error($conn));
                }
                $count++;
            }
          }
      $message = array();
      //check if any insertion query is failed
      $flag = 1;
      for($k = 0; $k < sizeof($success_array); $k++)
      {
        if($success_array[$k] == 0){
          $flag = 0;
          break;
        }
      }
      //if yes then return errors else return success
      if($flag == 0){
        $error_string = "";
        for ($k = 0; $k < sizeof($insertion_errors); $k++)
        {
          $error_string = $error_string.$insertion_errors[$k]."<br>";
        }
        $message['msg'] = $error_string;
        $message['type'] = 'danger';
      }
      else{
        $message['msg'] = "Question added successfully!";
        $message['type'] = 'success';
      }
      $result = json_encode($message);
      echo $result;
    }
 ?>
