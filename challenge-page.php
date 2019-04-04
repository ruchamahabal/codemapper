<?php session_start();
include_once 'BackendFunctions/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--Font Awesome CSS-->
        <link rel="stylesheet" href="vendors/fonts/css/fontawesome.min.css">


        <!--Custom CSS-->
        <link rel="stylesheet" href="resources/css/custom.css" type="text/css">

        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="vendors/plugin/codemirror/theme/rubyblue.css">

        <title id="page_title">Challenge1</title>

        <!--codemirror stylesheet file-->
        <link rel="stylesheet" type="text/css" href="vendors/plugin/codemirror/lib/codemirror.css">

        <style type="text/css">
          .navbar{
            margin-bottom: 30px;
            color: white;
          }

          #login-btn {
            margin-right: 25px;
          }

          #signup-btn{
            margin-right: 25px;
          }

          #bordered-textarea{
            margin-bottom: 20px;
          }
          #btn-run{
             margin-right: 30px;
          }
          #output{
            margin-top: 30px;
          }
          .list-group{
            margin-top: 30px;
          }
          .table{
            margin-bottom: 30px;
          }

          .loader {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            margin-top: 20px;
            width: 60px;
            height: 60px;
            display: none;
            animation: spin 2s linear infinite;
          }

          @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
          }
          #signout-btn {
            margin-left: 25px;
          }
          .timer {
            font-size: 2em;
            text-align: center;
          }
        </style>

      </head>
      <body>
        <!--HEADER-->
        <header class="site-header" role="banner">
            <!--NAVBAR-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" bgcolor="black" >
                <a class="navbar-brand" href="index.php">CodeMapper</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item" style="margin-right:15px;">
                    Time remaining: <time id="countdown"> 90:00</time>
                  </li>
                  <li class="nav-item" style="margin-right:15px;">
                    Calls remaining: <span id="callsRem"></span>
                  </li>
                </ul>
            </nav><!--navbar-->

        </header><!--header-->

        <!-- body -->
        <div class="container" style="padding-top:30px;">
             <h2 id="challenge_title"></h2>
             <p class="lead"><span id="qnumber"></span><span id="question"></span></p>

             <!--sample test cases-->
              <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Sample Test Cases</h4>
                <div id="tc">
                </div>
              </div>
        </div>
        <div class="container mt-2-lg">
          <div id="bordered-textarea" class="border border-success">

            <textarea class="codemirror-textarea"></textarea><!-- codemirror texteditor-->

            <!-- codemirror js -->
            <script type="text/javascript" src="vendors/plugin/codemirror/lib/codemirror.js"></script>
            <script type="text/javascript" src="vendors/js/jquery.slim.min.js"></script>
            <!-- changing the mode of the code-editor to python -->
            <script type="text/javascript" src="vendors/plugin/codemirror/mode/python/python.js"></script>
            <!-- adding a autoclosebrackets feature to the editor -->
            <script type="text/javascript" src="vendors/plugin/codemirror/addon/edit/closebrackets.js"></script>

          </div><!-- bordered-textarea -->
          <button id="btn-run" type="button" class="btn btn-info">
            Compile/Run<span style="margin-left:5px;" id="calls" class="badge badge-light"></span>
          </button><!--run/compile button-->
          <button id="btn-submit" type="button" class="btn btn-success">Submit and Next</button><!--submit and next button -->
          <div class="loader"></div>
          <!--test cases container -->
          <ul id="allTestcases" class="list-group">
            <!-- <li id="testCase1" class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
              Test Case 1
              <span id="tc1" class="badge badge-primary badge-pill"></span>
            </li>
            <li id="testCase2" class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
              Test Case 2
              <span id="tc2" class="badge badge-primary badge-pill"></span>
            </li>
            <li id="testCase3" class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
              Test Case 3
              <span id="tc3" class="badge badge-primary badge-pill"></span>
            </li> -->
          </ul>

          <div id="output" class="border border-success">
              <textarea class="form-control" id="output-textarea" rows="7"></textarea>
          </div>
        </div><!-- container -->

        <?php
          $sql = 'select count(*) from challenge_questions_mapping where challenge_id='.$_GET['challenge_id'].';';
          $result = mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0){
              $row = mysqli_fetch_assoc($result);
              $no_of_questions = $row['count(*)'];
          }
          
          $sql = 'select * from challenges where challenge_id = '.$_GET['challenge_id'].';';
          $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
          $title = $result['title'];
          $time_in_seconds = $result['time_in_seconds'];
          $compilation_calls = $result['compilation_calls'];

          $marks_sum=0;
          $total_hidden_testcases=0;
          $sql = "select qid from challenge_questions_mapping where challenge_id =".$_GET['challenge_id'];
          $result = mysqli_query($conn, $sql);
          while($rowMarks = mysqli_fetch_assoc($result)){
            $sql = "select sum(difficulty_level) from testcase where qid = ".$rowMarks['qid'].";";
            $marks= mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $marks_sum += $marks['sum(difficulty_level)'];

            $sql = "select count(*) from testcase where qid = ".$rowMarks['qid']." and type='hidden';";
            $hidden= mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $total_hidden_testcases += $hidden['count(*)'];
          }
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--including jquery-->
        <script type="text/javascript" src="vendors/js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



        <script type="text/javascript">
            //setting up the coding text-editor
            var score=0;
            //score of entire challenge
            var challenge_score=<?php echo $marks_sum; ?>;
            var lastScore=0;
            var challengeId = <?php echo $_GET['challenge_id'];?>;
            var title = "<?php echo $title;?>";
            //var totalTime = 60; //total 120 mins i.e 7200 seconds
            var seconds = <?php echo $time_in_seconds;?>;
            var total_time = seconds;
            var timeRemaining = 0;
            var compilationCalls = <?php echo $compilation_calls;?>;
            var total_calls = compilationCalls;
            var hiddenPassed = 0;
            var total_hidden_testcases = <?php echo $total_hidden_testcases;?>;
            $(document).ready(function(){
                //code here....
                if(compilationCalls>=0){
                $("#calls").html(compilationCalls);
                $("#callsRem").html(compilationCalls);
                $('#page_title').html(title);
                $('#challenge_title').html(title);
              }
                $('#btn-submit').prop("disabled",true);
                var code = $(".codemirror-textarea")[0];
                //testcases and expectedOutput will be fetched from database
                var testcases = new Array();
                var expectedOutput = new Array();
                var levels = new Array();
                var type = new Array();
                //score array to store successive scores
                var scores = new Array();
                //hidden passed array to score successive hidden testcases passed
                var hiddenPassedArray = new Array();
                //sampleSuccess array to store whether all sample testcases are satisfied.. if yes then submit button is enabled.
                var sampleSuccess = new Array();
                //score to store final score
                // var score=0;
                // var lastScore=0;
                //adding codemirror to textarea
                var editor = CodeMirror.fromTextArea(code,{
                    lineNumbers : true,
                    theme : "rubyblue",
                    mode : "python",
                    autoCloseBrackets : true
                });
                //on page load fetch first challenge question
                var record=1;
                var scoreSum = 0;
                $.ajax({
                  type:'POST',
                  url:'BackendFunctions/fetch_next_question.php',
                  data: {rnum:record, cid:challengeId},
                  dataType: 'json',
                  beforeSend: function(){
                    $(".loader").show();
                  },
                  complete: function(){
                    $(".loader").hide();
                  },
                  success: function(data){
                      var qno = record;
                      var quest = data.question;
                      var initial = data.initial_code;
                      var sampleTC = data.sample_testcases;
                      var allTestcases = data.all_testcases;
                      testcases = data.testcases_inp;
                      expectedOutput = data.testcases_out;
                      levels = data.difficulty_level;
                      type = data.type;
                      $('#qnumber').html("Q<b>"+qno+".</b> ");
                      $('#question').html("<b>"+quest+"</b>");
                      $('#tc').html(sampleTC);
                      $('#allTestcases').html(allTestcases);
                      editor.getDoc().setValue("#don't touch this function call\n"+initial);
                  }
                }).fail(function(){
                  alert("could not complete");
                });
                //compile/run button function
                $("#btn-run").click(function(){
                    if(compilationCalls < 0){
                      alert("You have exhausted your compilation calls! :(");
                      $("#btn-submit").click();
                      $('#btn-run').prop('disabled',false);
                    }
                    scoreSum = 0;
                    sampleSuccess = [];
                    var userCode = editor.getValue();
                    var i;
                    for(i=0;i<testcases.length;i++)
                    {
                      userCode = userCode + "\n" + testcases[i] ;
                    }
                    $.ajax({
                    type: 'POST',
                    url: 'BackendFunctions/EvalCode/compile.php',
                    data: {code: userCode},
                    dataType: 'json',
                    beforeSend: function(){
                      $(".loader").show();
                      $('#btn-run').prop("disabled",true);
                    },
                    complete: function(){
                      $(".loader").hide();
                      compilationCalls-=1;
                      if(compilationCalls>=0){
                      $("#calls").html(compilationCalls);
                      $("#callsRem").html(compilationCalls);
                    }
                    $('#btn-run').prop("disabled",false);
                      var flag=0;
                      for(var k=0;k<sampleSuccess.length;k++){
                        if(sampleSuccess[k]==1){
                          flag = 1;
                        }
                        else{
                          flag=0;
                          break;
                        }
                      }
                      if(flag==1){
                        $('#btn-submit').prop('disabled',false);
                      }
                      else if(flag==0){
                        $('#btn-submit').prop('disabled',true);
                      }
                    },
                    success: function(data) {
                        var out=JSON.parse(data);
                        var outputs = out.output.split("\n");
                        var j;
                        var count=1;
                        var hiddenPassedVar = 0;
                        for(j=0;j<outputs.length;j++)
                        {
                          if(type[j]=="sample")
                          {
                              if(expectedOutput[j]===outputs[j])
                              {
                                $("#testCase"+count).removeClass("list-group-item-primary");
                                $("#testCase"+count).removeClass("list-group-item-danger");
                                $("#testCase"+count).addClass("list-group-item-success");
                                $("#tc"+count).removeClass("badge-primary");
                                $("#tc"+count).removeClass("badge-danger");
                                $("#tc"+count).addClass("badge-success");
                                $("#tc"+count).html("passed");
                                scoreSum += parseInt(levels[j]);
                                sampleSuccess.push(1);
                              }
                              else {
                                $("#testCase"+count).removeClass("list-group-item-primary");
                                $("#testCase"+count).removeClass("list-group-item-success");
                                $("#testCase"+count).addClass("list-group-item-danger");
                                $("#tc"+count).removeClass("badge-primary");
                                $("#tc"+count).removeClass("badge-success");
                                $("#tc"+count).addClass("badge-danger");
                                $("#tc"+count).html("failed");
                                sampleSuccess.push(0);
                              }
                              count++;
                          }
                          else if(type[j]=="hidden")
                          {
                              if(expectedOutput[j]===outputs[j])
                              {
                                scoreSum += parseInt(levels[j]);
                                hiddenPassedVar += 1;
                              }
                              else {
                              }
                          }
                          scores.push(scoreSum);
                        }
                        hiddenPassedArray.push(hiddenPassedVar);
                        $("textarea#output-textarea").val(data);
                    }
                    }).fail(function(){
                        alert("could not complete");
                    });
                });
                var no_of_questions = '<?php echo $no_of_questions; ?>';
                //next button function
                $("#btn-submit").click(function(){
                  record = record + 1;
                  if(scores.length > 0){
                    lastScore = scores[scores.length - 1];
                  }
                  else{
                    lastScore = 0;
                  }
                  //alert(lastScore);
                  scores = [0];
                  if(no_of_questions >= record && seconds>0 && compilationCalls>0)
                  {
                    score += lastScore;
                    hiddenPassed += hiddenPassedArray[hiddenPassedArray.length - 1];
                    //alert(score);
                    $.ajax({
                      type:'POST',
                      url:'BackendFunctions/fetch_next_question.php',
                      data: {rnum:record, cid:challengeId},
                      dataType: 'json',
                      beforeSend: function(){
                        $(".loader").show();
                        $('#btn-submit').prop("disabled", true);
                      },
                      complete: function(){
                        $(".loader").hide();
                        $('#btn-submit').prop("disabled",true);
                      },
                      success: function(data){
                          var qno = record;
                          var quest = data.question;
                          var initial = data.initial_code;
                          var sampleTC = data.sample_testcases;
                          var allTestcases = data.all_testcases;
                          var numSt = data.number_of_st;
                          testcases = data.testcases_inp;
                          expectedOutput = data.testcases_out;
                          levels = data.difficulty_level;
                          type = data.type;
                          $('#qnumber').html("<b>Q"+qno+"</b>.");
                          $('#question').html("<b>"+quest+"</b>");
                          $('#tc').html(sampleTC);
                          $('#allTestcases').html(allTestcases);
                          editor.getDoc().setValue("#don't touch this function call\n"+initial);
                          for(count=1;count<=data.number_of_st;count++){
                            $("#testCase"+count).removeClass("list-group-item-success");
                            $("#testCase"+count).removeClass("list-group-item-danger");
                            $("#testCase"+count).addClass("list-group-item-primary");
                            $("#tc"+count).removeClass("badge-success");
                            $("#tc"+count).removeClass("badge-danger");
                            $("#tc"+count).addClass("badge-primary");
                            $("#tc"+count).html("");
                         }
                      }
                    }).fail(function(){
                      alert("could not complete");
                    });
                 }
                 else
                 {
                   score += lastScore;
                   hiddenPassed += hiddenPassedArray[hiddenPassedArray.length - 1];
                   //calculate time remaining and add it to score
                   //timeRemaining = totalTime - seconds;
                   //score += seconds;
                   //alert(score);
                   $.ajax({
                      type:'POST',
                      url:'BackendFunctions/score_entry.php',
                      data: {scr:score, time:seconds,total_time:total_time, compile:compilationCalls, total_calls:total_calls, challenge_id: challengeId, total_score: challenge_score, hiddenTestcasesPassed: hiddenPassed, total_hidden_testcases: total_hidden_testcases},
                      success: function(data){
                         $("#output").append(score);
                         window.location.href = "score-page.php";
                      }
                   }).fail(function(){
                     alert("could not complete");
                   });
                 }
                });
                // script for timer
                 function secondPassed() {
                   var minutes = Math.round((seconds - 30)/60),
                       remainingSeconds = seconds % 60;

                   if (remainingSeconds < 10) {
                       remainingSeconds = "0" + remainingSeconds;
                   }

                   document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
                   if (seconds == 0) {
                       clearInterval(countdownTimer);
                     //form1 is your form name
                     $("#btn-submit").click();
                   } else {
                       seconds--;
                   }
               }
               var countdownTimer = setInterval(secondPassed, 1000);
         });
        </script>
      </body>
</html>
