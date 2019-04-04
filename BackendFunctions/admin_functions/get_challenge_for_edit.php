<?php
include_once '../db_conn.php';
if (isset($_POST['cid'])){
    fetchChallengeInfo($conn);
}
 function fetchChallengeInfo($conn){
   //fetching challenge
   $sql = 'select * from challenges where challenge_id ='.$_POST['cid'].';';
   $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));

    $qid_array = array();
    $sql = "select * from challenge_questions_mapping where challenge_id = ".$row['challenge_id'].";";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($rowQ = mysqli_fetch_assoc($result)){
            array_push($qid_array, $rowQ['qid']);
        }
    }

   $row['question_ids'] = $qid_array;
   //encoding and returning response
   $response = json_encode($row);
   echo $response;
 }
?>
