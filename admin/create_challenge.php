<?php include '../BackendFunctions/db_conn.php';
session_start();
include 'header.php';?>

<div class="content">
    <main class="page-content">
        <h2>Create a new Challenge</h2>
        <div class="container">
            <form action="../BackendFunctions/admin_functions/insert_challenge.php" method="POST">
                <div class="form-group">
                    <label for="Title">Challenge Title</label>
                    <input type="input" class="form-control" name="challenge_title" placeholder="TechXposure 2.0" required>
                </div>
                <div class="form-group">
                    <label for="Title">Time(in minutes)</label>
                    <input type="number" class="form-control" name="challenge_time" placeholder="120" required>
                </div>
                <div class="form-group">
                    <label for="Title">Compilation Calls</label>
                    <input type="number" class="form-control" name="challenge_compilation_calls" placeholder="20" required>
                </div>
                <div class="form-group">
                <label for="Questions">Select Questions for the Challenge:</label>
                <div class="input-group mb-3" required>
                <?php
                    $sql = "select * from questions;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                ?>    
                <div class="container">
                    <div class="row">
                    
                        <div class="col">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="question_list[]" aria-label="Checkbox for following text input" value="<?php echo $row['qid'];?>">
                                </div>
                                <div class="card" style="width:100%;">
                                    <div class="card-header">
                                        <span class="text text-info"><b>QID : <?php echo $row['qid']; ?></b></span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['question']?></h5>
                                        <p class="card-text">Function Name: <?php echo $row['function_name']?></p>
                                            <button type="button" class="btn btn-info ques-info" data-toggle="modal" data-qid="<?php echo $row['qid'];?>" data-target="#viewQuestionModal" style="float:left;">
                                                View
                                            </button>
                                    </div>
                                </div>
                            </div>
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
                </div>
                <center><button type="submit" name="submitQ" class="btn btn-success">Submit</button></center>
            </form>
        </div>
    </main>
</div>

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
    });
     </script>
  </body>
</html>
