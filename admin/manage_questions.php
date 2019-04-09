<?php include '../BackendFunctions/db_conn.php';
session_start();
include 'header.php';?>

<div class="content">
    <main class="page-content">
        <h2>Questions</h2>
        <?php 
            if(isset($_GET['err'])){
                echo '<div class="alert alert-danger" role="alert">
                Some Error Occured. Question could not be deleted.
              </div>';
            }
            if(isset($_GET['questiondel'])){
                echo '<div class="alert alert-success" role="alert">
                Question deleted successfully!
              </div>';
            }
        ?>
        <?php
            $sql = "select * from questions;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
        
        <div class="row">
           <div class="col">
            <div class="card">
                <div class="card-header">
                    <span class="text text-info"><b>QID : <?php echo $row['qid']; ?></b></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['question']?></h5>
                    <p class="card-text">Function Name: <?php echo $row['function_name']?></p>
                        <button type="button" class="btn btn-info ques-info" data-toggle="modal" data-qid="<?php echo $row['qid'];?>" data-target="#viewQuestionModal" style="float:left;">
                            View
                        </button>
                        <a href="edit_question.php?qid=<?php echo $row['qid']?>" class="btn btn-dark" style="float:left; margin-left:10px;">
                            Edit
                        </a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-qid="<?php echo $row['qid'];?>" data-target="#deleteModal" style="float:left; margin-left:10px;">
                            Delete
                        </button>
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

    </main>
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

  <div class="modal fade" tabindex="-1" id="deleteModal" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
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
                <form action="../BackendFunctions/admin_functions/delete_question.php" method="post">
                    <input name="qid" class="form-control qqid" style="display:none;">
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
     $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var qid = button.data('qid');
            var modal = $(this);
            modal.find('.modal-footer .qqid').val(qid);
        });
    });
</script>