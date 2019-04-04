<?php include '../BackendFunctions/db_conn.php';
include 'header.php';?>

<div class="content">
    <main class="page-content">
        <div id="result-alert" class="alert alert-success" role="alert">
            <span id="result-data"></span>
        </div>
        <div class="container">
            <!-- MultiStep Form -->
            <div class="row">
    
        <div class="col">
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Question Details</li>
                <li>Sample Testcases</li>
                <li>Hidden Testcases</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Question Details</h2>
                <h3 class="fs-subtitle">Challenge Question</h3>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Question:<button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" data-content="Question for the challenge<br> eg: Write a python function prime_list(l) that takes a python list as a parameter and returns a list of all the prime numbers in the parameter list. The result list should not contain duplicate elements."><i class="fas fa-question-circle"></i></button></label>
                    <textarea class="form-control" id="question" rows="3" name="question" required></textarea>
                    <span id="error-question" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Function Name:<button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" data-content="Function Name for the code to be written. Write the function name with paranthesis and parameters for eg: prime_list(l)"><i class="fas fa-question-circle"></i></button></label>
                    <input type="text" name="function_name" class="form-control" id="function-name" aria-describedby="emailHelp" placeholder="Enter Function Name">
                    <span id="error-func-name" class="text-danger"></span>
                </div>
                <input id="btn-ques-details" type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Sample Testcases</h2>
                <h3 class="fs-subtitle">These testcases will be visible to the user and whether user has passed them or not, will also be visible.</h3>
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                                <thead class="thead-dark">
                                    <tr >
                                        <th class="text-center">
                                            #
                                            <!-- <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Test case number" data-content="This is the test case sequence number"><i class="fas fa-question-circle"></i></button> -->
                                        </th>
                                        <th class="text-center">
                                            input
                                            <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Input to the function" data-content="This is the input to be given to the function which user is asked to write for solving the problem<br> <b>eg: input to the function may be a list like<br>[1,2,3,-1]<br> or it could be a string like<br> 'zb%78'</b> etc."><i class="fas fa-question-circle"></i></button>
                                        </th>
                                        <th class="text-center">
                                            expected output
                                            <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Expected Output" data-content="This is the output which the user-written function must return. If the expected output matches the actual output then the testcase is passed.<br> <b>eg: the function might be expected to return a list like<br>[1,2,3,-1]<br> or it could return a boolean value like<br> True</b> etc."><i class="fas fa-question-circle"></i></button>
                                        </th>
                                        <!-- <th class="text-center">
                                            input function call
                                            <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Expected Output" data-content="This is the output which the user-written function must return. If the expected output matches the actual output then the testcase is passed.<br> <b>eg: the function might be expected to return a list like<br>[1,2,3,-1]<br> or it could return a boolean value like<br> True</b> etc."><i class="fas fa-question-circle"></i></button>
                                        </th> -->
                                        <th class="text-center">
                                            difficulty level (marks)
                                            <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Marking Weightage for the testcase" data-content="This is the weightage of the testcase in the total score. If the testcase is difficult to pass set more marks for it and vice versa"><i class="fas fa-question-circle"></i></button>
                                        </th>
                                        <th class="text-center">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0' data-id="0" class="d-none">
                                        <td id="dynamic_number_st" data-name="st_num">
                                            <!-- <input type="text" name='st_num0'  placeholder='1' class="form-control"/> -->

                                        </td>
                                        <td data-name="st_input">
                                            <textarea name="st_input0" placeholder="Input" class="form-control" required></textarea>
                                        </td>
                                        <td data-name="st_output">
                                            <textarea name="st_output0" placeholder="Expected Output" class="form-control" required></textarea>
                                        </td>
                                        <td data-name="st_diff_level">
                                            <input type="number" name='st_diff_level0' placeholder='marks' class="form-control"/>
                                        </td>
                                        <td data-name="del">
                                            <button name="del0" class='btn btn-danger row-remove'><i class="fas fa-times"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a id="add_row" class="btn btn-secondary btn-sm text-white pull-right">Add Row</a>
                </div>

                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" id="btn-sample-tc-details" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Hidden Testcases</h2>
                <h3 class="fs-subtitle">Unlike sample testcases which will be visible to user, hidden testcases are not visible. User is not indicated about these while attempting the challenge question but at the end of the challenge user is shown how many hidden testcases has the user's code passed.</h3>
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-hover table-sortable" id="tab_logic_hd_tc">
                                <thead class="thead-dark">
                                    <tr >
                                        <th class="text-center">
                                            #
                                            <!-- <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Test case number" data-content="This is the test case sequence number"><i class="fas fa-question-circle"></i></button> -->
                                        </th>
                                        <th class="text-center">
                                            input
                                            <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Input to the function" data-content="This is the input to be given to the function which user is asked to write for solving the problem<br> <b>eg: input to the function may be a list like<br>[1,2,3,-1]<br> or it could be a string like<br> 'zb%78'</b> etc."><i class="fas fa-question-circle"></i></button>
                                        </th>
                                        <th class="text-center">
                                            expected output
                                            <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Expected Output" data-content="This is the output which the user-written function must return. If the expected output matches the actual output then the testcase is passed.<br> <b>eg: the function might be expected to return a list like<br>[1,2,3,-1]<br> or it could return a boolean value like<br> True</b> etc."><i class="fas fa-question-circle"></i></button>
                                        </th>
                                        <!-- <th class="text-center">
                                            input function call
                                            <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Expected Output" data-content="This is the output which the user-written function must return. If the expected output matches the actual output then the testcase is passed.<br> <b>eg: the function might be expected to return a list like<br>[1,2,3,-1]<br> or it could return a boolean value like<br> True</b> etc."><i class="fas fa-question-circle"></i></button>
                                        </th> -->
                                        <th class="text-center">
                                            difficulty level (marks)
                                            <button id="info-buttons" type="button" class="btn btn-sm btn-secondary" data-html="true" data-toggle="popover" title="Marking Weightage for the testcase" data-content="This is the weightage of the testcase in the total score. If the testcase is difficult to pass set more marks for it and vice versa"><i class="fas fa-question-circle"></i></button>
                                        </th>
                                        <th class="text-center">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0' data-id="0" class="d-none">
                                        <td id="dynamic_number_st" data-name="hd_num">
                                            <!-- <input type="text" name='st_num0'  placeholder='1' class="form-control"/> -->

                                        </td>
                                        <td data-name="hd_input">
                                            <textarea name="hd_input0" placeholder="Input" class="form-control" required></textarea>
                                        </td>
                                        <td data-name="hd_output">
                                            <textarea name="hd_output0" placeholder="Expceted Output" class="form-control" required></textarea>
                                        </td>
                                        <td data-name="hd_diff_level">
                                            <input type="number" name='hd_diff_level0' placeholder='marks' class="form-control"/>
                                        </td>
                                        <td data-name="del">
                                            <button name="del0" class='btn btn-danger row-remove'><i class="fas fa-times"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a id="add_row_hd_tc" class="btn btn-secondary btn-sm text-white pull-right">Add Row</a>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" id="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        </form>
      </div>
    </div>
    <!-- /.MultiStep Form -->
    </main>
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
    <!-- <script type="text/javascript">
    $(".link").click(function(e) {
        e.preventDefault();
        $('.content-container div').fadeOut('slow');
        $('#' + $(this).data('rel')).fadeIn('slow');
    });
    </script> -->

    <!-- form with progressbar jquery -->
    <script type="text/javascript">
         //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function(){
        if(animating) return false;
        animating = true;
        
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
            'transform': 'scale('+scale+')',
            'position': 'absolute'
        });
                next_fs.css({'left': left, 'opacity': opacity});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                animating = false;
            }, 
            //this comes from the custom easing plugin
            // easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function(){
        if(animating) return false;
        animating = true;
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1-now) * 50)+"%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity, 'position':'relative'});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                animating = false;
            }, 
            //this comes from the custom easing plugin
            // easing: 'easeInOutBack'
        });
    });
    </script>

    <!-- popover jquery -->
	<script>
		$(function () {
			$('[data-toggle="popover"]').popover()
			});
	</script>

    <script type="text/javascript">
    $(document).ready(function() {
    $('#result-alert').hide();
    //array to store generated sample testcase row ids
    var stIds = new Array();
    //array to store generated hidden testcase row ids
    var hdIds = new Array();
    var qid = <?php echo $_GET['qid']; ?>;
    /** get question info and initialize fields */
    $.ajax({
        type:'POST',
        url:'../BackendFunctions/admin_functions/get_question_for_edit.php',
        data: {qid:qid},
        dataType: 'json',
        success: function(data){
            var quest = data.question;
            var function_name = data.function_name;
            var st_input = data.st_input;
            var st_expected_output = data.st_expected_output;
            var st_difficulty_level = data.st_diff_level;
            var hd_input = data.hd_input;
            var hd_expected_output = data.hd_expected_output;
            var hd_difficulty_level = data.hd_diff_level;
            $('#question').html(quest);
            $('#function-name').val(function_name);
            //setting previous sample testcases 
            for(var i=0; i<data.num_st; i++)
            {
                $("#add_row").trigger("click");
                $("[name=st_input"+stIds[i]+"]").val(st_input[i]);
                $("[name=st_output"+stIds[i]+"]").val(st_expected_output[i]);
                $("[name=st_diff_level"+stIds[i]+"]").val(st_difficulty_level[i]);
            }
            //setting previous hidden testcases 
            for(var i=0; i<data.num_hd; i++)
            {
                $("#add_row_hd_tc").trigger("click");
                $("[name=hd_input"+hdIds[i]+"]").val(hd_input[i]);
                $("[name=hd_output"+hdIds[i]+"]").val(hd_expected_output[i]);
                $("[name=hd_diff_level"+hdIds[i]+"]").val(hd_difficulty_level[i]);
            }
        }
    }).fail(function(){
        alert("could not complete");
    });

    /** add row in sample testcase table */
    $("#add_row").on("click", function() {
        // Dynamic Rows Code
        
        // Get max row id and set new id
        var newid = 0;
        $.each($("#tab_logic tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                var td = $("<td></td>", {
                    'text': $('#tab_logic tr').length
                }).appendTo($(tr));
            }
        });
        
        // add delete button and td
        /*
        $("<td></td>").append(
            $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
                .click(function() {
                    $(this).closest("tr").remove();
                })
        ).appendTo($(tr));
        */
        
        // add the new row
        $(tr).appendTo($('#tab_logic'));
        stIds.push(newid);
        // alert(stIds);

        $(tr).find("td button.row-remove").on("click", function() {
             var removedId =  $(this).closest("tr").data("id");
            //  alert("removed"+removedId);
             var index = stIds.indexOf(removedId);
             if (index !== -1) stIds.splice(index, 1);
             $(this).closest("tr").remove();
        });
    });

    /** add row in hidden testcases table */
    
    $("#add_row_hd_tc").on("click", function() {
            // Dynamic Rows Code
            
            // Get max row id and set new id
            var newid = 0;
            $.each($("#tab_logic_hd_tc tr"), function() {
                if (parseInt($(this).data("id")) > newid) {
                    newid = parseInt($(this).data("id"));
                }
            });
            newid++;
            // alert("h"+hdIds);
            // alert("s"+stIds);
            
            var tr = $("<tr></tr>", {
                id: "addr"+newid,
                "data-id": newid
            });
            
            // loop through each td and create new elements with name of newid
            $.each($("#tab_logic_hd_tc tbody tr:nth(0) td"), function() {
                var cur_td = $(this);
                
                var children = cur_td.children();
                
                // add new td and element if it has a nane
                if ($(this).data("name") != undefined) {
                    var td = $("<td></td>", {
                        "data-name": $(cur_td).data("name")
                    });
                    
                    var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                    c.attr("name", $(cur_td).data("name") + newid);
                    c.appendTo($(td));
                    td.appendTo($(tr));
                } else {
                    var td = $("<td></td>", {
                        'text': $('#tab_logic_hd_tc tr').length
                    }).appendTo($(tr));
                }
            });
            
            // add delete button and td
            /*
            $("<td></td>").append(
                $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
                    .click(function() {
                        $(this).closest("tr").remove();
                    })
            ).appendTo($(tr));
            */
            
            // add the new row
            $(tr).appendTo($('#tab_logic_hd_tc'));
            hdIds.push(newid);
            
            $(tr).find("td button.row-remove").on("click", function() {
                var removedId =  $(this).closest("tr").data("id");
                // alert("removed"+removedId);
                var index = hdIds.indexOf(removedId);
                if (index !== -1) hdIds.splice(index, 1);
                $(this).closest("tr").remove();
            });
    });


    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();



    // $("#add_row").trigger("click");

     /** Add question form submit button */
     $(".submit").click(function(){
        var qid = <?php echo $_GET['qid']; ?>;
        var question = $("[name=question]").val();
        var functionName = $("[name=function_name]").val();
        var initialCode = "def "+ functionName + ": #code_below"; 
        functionName = functionName.split('(')[0];
        var sampleTestcases = [];
        var input, output, diff_level;
        //fetching sample testcases
        for(var i=0; i<stIds.length; i++)
        {
                input = $("[name=st_input"+stIds[i]+"]").val();
                output = $("[name=st_output"+stIds[i]+"]").val();
                diff_level = $("[name=st_diff_level"+stIds[i]+"]").val();
                sampleTestcases[i]=[input,output, diff_level];
        }
        console.log(sampleTestcases);
        //fetching hidden testcases
        var hiddenTestcases = [];
        for(var i=0; i<hdIds.length; i++)
        {
                input = $("[name=hd_input"+hdIds[i]+"]").val();
                output = $("[name=hd_output"+hdIds[i]+"]").val();
                diff_level = $("[name=hd_diff_level"+hdIds[i]+"]").val();
                hiddenTestcases[i]=[input,output, diff_level];
        }
        console.log(hiddenTestcases);
        $.ajax({
                      type:'POST',
                      url:'../BackendFunctions/admin_functions/update_question.php',
                      data: { qid:qid, question:question, functionName:functionName, initialCode:initialCode, sampleTestcases: sampleTestcases, hiddenTestcases:hiddenTestcases},
                      dataType: 'json',
                      complete: function(){
                        console.log("completed");
                      },
                      success: function(data){
                         //alert(data);
                         $('#result-alert').show();
                         if(data.type == 'danger'){
                             $('#result-alert').removeClass('alert-success');
                             $('#result-alert').addClass('alert-danger');
                         }
                         $('#result-data').html(data.msg);
                      },
                   }).fail(function(){
                     console.log("no");
        });
    })
});


    </script>

    <!-- form validations -->
    <!-- <script type="text/javascript">
       $(document).ready(function(){
            $('#btn-question-details').click(function(){
                var error_question = "Question is required";
                if($.trim($('#question').val()).length == 0)
                {
                $('#error-question').html(error_question);
                $('#question').addClass('has-error');
                }
            });
        });
    </script> -->
  </body>
</html>
