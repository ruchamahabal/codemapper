<?php
include_once '../db_conn.php';
if (isset($_POST['qid'])){
    fetchQuestionInfo($conn);
}
 function fetchQuestionInfo($conn){
   //fetching question
   $sql = 'select * from questions where qid ='.$_POST['qid'].';';
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck > 0){
     $row = mysqli_fetch_assoc($result);
   }

   //fetching sample test_cases
   $sql = "select * from testcase where qid =".$_POST['qid']." and type = 'sample';";
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);

   if($resultCheck>0){
     $st_input = array();
     $st_expected_output = array();
     $st_difficulty_level = array();
     while($rowT = mysqli_fetch_assoc($result)){
       array_push($st_input, $rowT['input']);
       array_push($st_expected_output, $rowT['expected_output']);
       array_push($st_difficulty_level, $rowT['difficulty_level']);
     }
   }
   $row['st_input'] = $st_input;
   $row['st_expected_output'] = $st_expected_output;
   $row['st_diff_level'] = $st_difficulty_level;
   $row['num_st'] = $resultCheck;

   //fetching hidden test_cases
   $sql = "select * from testcase where qid =".$_POST['qid']." and type = 'hidden';";
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);

   if($resultCheck>0){
     $hd_input = array();
     $hd_expected_output = array();
     $hd_difficulty_level = array();
     while($rowT = mysqli_fetch_assoc($result)){
       array_push($hd_input, $rowT['input']);
       array_push($hd_expected_output, $rowT['expected_output']);
       array_push($hd_difficulty_level, $rowT['difficulty_level']);
     }
   }
   $row['hd_input'] = $hd_input;
   $row['hd_expected_output'] = $hd_expected_output;
   $row['hd_diff_level'] = $hd_difficulty_level;
   $row['num_hd'] = $resultCheck;

   //encoding and returning response
   $response = json_encode($row);
   echo $response;
 }
?>
