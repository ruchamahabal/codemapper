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
    //array to store generated sample testcase row ids
    var stIds = new Array();
    //array to store generated hidden testcase row ids
    var hdIds = new Array();
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
        var question = $("[name=question]").val();
        var functionName = $("[name=function_name]").val();
        var initialCode = "def "+ functionName + ": #code_below"; 
        var sampleTestcases = []
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
                      url:'../BackendFunctions/admin_functions/insert_new_question.php',
                      data: {question:question, functionName:functionName, initialCode:initialCode, sampleTestcases: sampleTestcases, hiddenTestcases:hiddenTestcases},
                      complete: function(){
                        console.log("completed");
                      },
                      success: function(data){
                         alert(data);
                      },
                   }).fail(function(){
                     console.log("no");
        });
    })
});


    </script>
  </body>
</html>