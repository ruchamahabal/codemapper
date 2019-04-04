<?php session_start();
include_once 'BackendFunctions/db_conn.php';
include 'header.php';?>

<div class="content">
    <div class="container">
        <h2>Challenges</h2>
        <div class="row" style="margin: 20px 20px;">
        <?php
            $sql = "select * from challenges;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
        
           <div class="col-4" style="margin:10px 0px;">
            <div class="card">
                <div class="card-header">
                    <span class="text text-info"><b>Challenge ID : <?php echo $row['challenge_id']; ?></b></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-info"><?php echo $row['title']?></h5>
                    <p class="card-text"><b>Time(in minutes):</b> <?php echo (int)$row['time_in_seconds']/60 ;?></p>
                    <p class="card-text"><b>Compilation Calls:</b> <?php echo $row['compilation_calls'];?></p>

                    <?php
                       $sql = "select count(*) from challenge_questions_mapping where challenge_id = ".$row['challenge_id'].";";
                       $num_questions = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                    ?>
                    <p class="card-text"><b>No of questions: </b> <?php echo $num_questions['count(*)']?></p>

                        <a href="rules.php?challenge_id=<?php echo $row['challenge_id']?>" class="btn btn-dark">
                           Compete
                        </a>
                </div>
            </div>
            </div>

        <?php
                }
            }
            else{
                echo '<div class="alert alert-dark" role="alert">
                No active challenges!
                </div>';
            }
        ?>
        </div>

        </div>
</div>



<?php include 'footer.php';?>
    

