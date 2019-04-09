<?php include '../BackendFunctions/db_conn.php';
session_start();
include 'header.php';?>

<div class="content">
    <main class="page-content">
    <div class="container">
    <h2><center>User History</center></h2>
        <div class="row">
        <?php
            $sql = "select * from users;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
        
           <div class="col-4" style="margin:10px 0px;">
            <div class="card">
                <div class="card-header">
                    <span class="text text-info"><b>User ID : <?php echo $row['user_id']; ?></b></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-info"><?php echo $row['user_first']." ".$row['user_last'];?></h5>
                
                    <p class="card-text"><b>User Email: </b> <?php echo $row['user_email'];?></p>

                    <a href="view_user_history.php?u_id=<?php echo $row['user_id']?>" class="btn btn-info" style="float:left; margin-left:10px;">
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