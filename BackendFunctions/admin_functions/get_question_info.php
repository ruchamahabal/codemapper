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

   //fetching test_cases
   $sql = 'select * from testcase where qid ='.$_POST['qid'].';';
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck>0){
     $testC = "";
     while($rowT = mysqli_fetch_assoc($result)){
       $testC = $testC.
       "<tr>
            <th scope='row'>".$rowT['tc_no']."</th>".
            "<td>".$rowT['input_function_call']."</td>".
            "<td>".$rowT['expected_output']."</td>".
            "<td>".$rowT['difficulty_level']."</td>".
            "<td>".$rowT['type']."</td>".
       "</tr>";
     }
   }
   $row['testcases'] = $testC;

   //encoding and returning response
   $response = json_encode($row);
   echo $response;
 }
?>
