<?php include '../BackendFunctions/db_conn.php';
// check if form is submitted
if (isset($_POST['submit']))
{
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $upwd = mysqli_real_escape_string($conn, $_POST['pass']);

    if ($uname === 'admin' && $upwd === 'admin')
    {
        // login successful - start user session, store data in session & redirect user to index or dashboard page as per your need
        session_start();
        $_SESSION['username'] = 'admin';
        $_SESSION['user_pass'] = 'admin';
        header("Location: dashboard.php"); 
    }
    else
    {
        // login failed
        header("Location: index.php?err=true");
    }
}
?>