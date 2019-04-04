<?php
  include_once 'db_conn.php';
  if (isset($_POST['rnum'])){
      fetchNext($conn);
  }
   function fetchNext($conn){
     //fetching question
     $sql = "select * from questions where qid = (select qid from challenge_questions_mapping where qno =". $_POST['rnum']." and challenge_id = ".$_POST['cid'].");";
     $result = mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);
     if($resultCheck > 0){
       $row = mysqli_fetch_assoc($result);
     }
     $qid = $row['qid'];
     //fetching sample_test_cases
     $sql = 'select st_id,input,output from sample_test_cases where qid ='.$qid.';';
     $result = mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);
     if($resultCheck>0){
       $testC = "";
       while($rowT = mysqli_fetch_assoc($result)){
         $testC = $testC."<p><b>Input</b> : ".$rowT['input']."&nbsp;&nbsp;<b>Output</b> : ".$rowT['output']."</p>\n";
       }
     }
     $row['sample_testcases'] = $testC;
     $row['number_of_st'] = $resultCheck;

     $allTestC = "";
     for($i=1; $i<=$resultCheck; $i++){
        $allTestC = $allTestC. '<li id="testCase'.$i.'" class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
        Test Case'.$i.'<span id="tc'.$i.'" class="badge badge-primary badge-pill"></span>
      </li>';
     }

     //fetching testcases
     $sql = 'select * from testcase where qid='.$qid.';';
     $result = mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);
     $inp_func=array();
     $exp_out=array();
     $level=array();
     $type=array();
     if($resultCheck>0){
          while($rowT = mysqli_fetch_assoc($result)){
            array_push($inp_func,$rowT['input_function_call']);
            array_push($exp_out,$rowT['expected_output']);
            array_push($level,$rowT['difficulty_level']);
            array_push($type,$rowT['type']);
          }
     }
     $row['all_testcases'] = $allTestC;
     $row['testcases_inp'] = $inp_func;
     $row['testcases_out'] = $exp_out;
     $row['difficulty_level'] = $level;
     $row['type'] = $type;

     //encoding and returning response
     $response = json_encode($row);
     echo $response;
   }
?>
