<?php include '../BackendFunctions/db_conn.php';
session_start();
include 'header.php';?>

<div class="content">
    <main class="page-content">
        <h2>Challenges</h2>
        <?php 
            if(isset($_GET['err'])){
                echo '<div class="alert alert-danger" role="alert">
                Some Error Occured. Challenge could not be updated.
              </div>';
            }
            if(isset($_GET['success'])){
                echo '<div class="alert alert-success" role="alert">
                Challenge updated successfully!
              </div>';
            }
            if(isset($_GET['insert_err'])){
              echo '<div class="alert alert-danger" role="alert">
              Some Error Occured. Challenge could not be created.
              </div>';
            }
            if(isset($_GET['insert_success'])){
                echo '<div class="alert alert-success" role="alert">
                Challenge created successfully!
              </div>';
            }
            if(isset($_GET['delerr'])){
                echo '<div class="alert alert-danger" role="alert">
                Some Error Occured. Challenge could not be deleted.
              </div>';
            }
            if(isset($_GET['challengedel'])){
                echo '<div class="alert alert-success" role="alert">
                Challenge deleted successfully!
              </div>';
            }
        ?>
        <div class="row">
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

                        <a href="view_challenge.php?challenge_id=<?php echo $row['challenge_id']?>" class="btn btn-info" style="float:left; margin-left:10px;">
                           View
                        </a>
                        
                        <a href="edit_challenge.php?challenge_id=<?php echo $row['challenge_id']?>" class="btn btn-dark" style="float:left; margin-left:10px;">
                            Edit
                        </a>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-cid="<?php echo $row['challenge_id'];?>" data-target="#deleteChallengeModal" style="float:left; margin-left:10px;">
                            Delete
                        </button>
                </div>
            </div>
            </div>

        <?php
                }
            }
            else{
                echo '<div class="alert alert-dark" role="alert">
                No questions added!
                </div>';
            }
        ?>
        </div>

    </main>
</div>

<div class="modal fade" id="viewChallengeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="questionId">Challenge ID<span id="challenge_id"></span></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="eventsModalBody">
            <p><b>Title: </b><span id="Title"> </span></p><hr/>
            <p><b>Time (in minutes): <br> </b><span id="Time"> </span></p><hr/>
            <p><b>No of compilation calls: </b><span id="CompilationCalls"> </span><p>
            <p><b>No of questions: </b><span id="NoOfQuestions"> </span><p>
            <p>Questions: </p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Qid</th>
                        <th scope="col">Question</th>
                        <th scope="col">Initial Code</th>
                        <th scope="col">Function Name</th>
                        <th scope="col">
                            <button type="button" class="btn btn-info ques-info" data-toggle="modal" data-qid="<?php echo $row['qid'];?>" data-target="#viewQuestionModal" style="float:left;">
                                View
                            </button>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="viewQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="questionId">QID<span id="qid"></span></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="eventsModalBody">
            <p><b>Question: </b><span id="Question"> </span></p><hr/>
            <p><b>Function Name:<br> </b><span id="FunctionName"> </span></p><hr/>
            <p><b>Initial Code: </b><span id="InitialCode"> </span><p>
            <p>Testcases:</p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Input Function Call</th>
                        <th scope="col">Expected Output</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Type</th>
                    </tr>
                </thead>
                <tbody id="testcasesTable">
                    
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" tabindex="-1" id="deleteChallengeModal" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Warning</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the record?</p>
            </div>
            <div class="modal-footer">
                <form action="../BackendFunctions/admin_functions/delete_challenge.php" method="post">
                    <input name="cid" class="form-control ccid" style="display:none;">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="../vendors/js/jquery.min.js"></script>
    <script type="text/javascript" src="../vendors/js/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../vendors/js/bootstrap.min.js"></script>
    <!-- Sidenav JS -->
    <script type="text/javascript">
    jQuery(function ($) {

        $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
        $(this)
        .parent()
        .hasClass("active")
        ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
        .parent()
        .removeClass("active");
        } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
        $(this)
        .parent()
        .addClass("active");
        }
        });

        $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
        });
        });
    </script>

<script type="text/javascript">
    $(document).ready(function(){
      $(".ques-info").click(function(){
        var qid = $(this).attr('data-qid');
        $.ajax({
          type:'POST',
          url:'../BackendFunctions/admin_functions/get_question_info.php',
          data: {qid:qid},
          dataType: 'json',
          success: function(data){
            //var qno = data.qid;
            var quest = data.question;
            var initial = data.initial_code;
            var testcases = data.testcases;
            $('#qid').html(data.qid);
            $('#Question').html(quest);
            $('#InitialCode').html(initial);
            $('#FunctionName').html(data.function_name);
            $('#testcasesTable').html(testcases);
          }
        }).fail(function(){
          alert("could not complete");
        });
     });
     $('#deleteChallengeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var cid = button.data('cid');
            var modal = $(this);
            modal.find('.modal-footer .ccid').val(cid);
        });
    });
</script>