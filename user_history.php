<?php include 'header.php';
session_start();
include 'BackendFunctions/db_conn.php';?>
    <div class="container" style="margin-top:100px;">
    <h2><center>Your Challenge History</center></h2>
        <div class="row">
        <?php
            $sql = "select * from user_scores where user_id =".$_SESSION['u_id'].";";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $sql="select * from challenges where challenge_id = ".$row['challenge_id'].";";
                    $challenge_result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        ?>
        
           <div class="col-4" style="margin:10px 0px;">
            <div class="card">
                <div class="card-header">
                    <span class="text text-info"><b>Challenge ID : <?php echo $row['challenge_id']; ?></b></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-info"><?php echo $challenge_result['title']?></h5>
                    <p class="card-text">Your score: <?php echo $row['user_score']?> out of <?php echo $row['total_score'];?></p>
                    <p class="card-text">Time Remaining: <?php echo $row['time_remaining']?> of <?php echo $row['total_time'];?> seconds</p>
                    <p class="card-text">Compilation Calls Remaining: <?php echo $row['compilation_calls_remaining']?> out of <?php echo $row['total_compilation_calls'];?></p>
                    <p class="card-text">Hidden Testcases Passed: <?php echo $row['hidden_passed'];?> out of <?php echo $row['total_hidden_testcases'];?></p></p>

                    <?php
                       $sql = "select count(*) from challenge_questions_mapping where challenge_id = ".$row['challenge_id'].";";
                       $num_questions = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                    ?>
                    <p class="card-text"><b>No of questions: </b> <?php echo $num_questions['count(*)']?></p>

                    <a href="admin/view_challenge.php?challenge_id=<?php echo $row['challenge_id']?>" class="btn btn-info" style="float:left; margin-left:10px;">
                           View
                        </a>
                </div>
            </div>
            </div>

        <?php
                }
            }
            else{
                echo '<div class="alert alert-dark" role="alert">
                No active users!
                </div>';
            }
        ?>
        </div>

        </div>

<?php include 'footer.php';?>