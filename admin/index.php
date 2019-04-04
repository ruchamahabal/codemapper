<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Title -->
    <title>CodeMapper Admin</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">

    <!-- font awesome stylesheet for icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="../resources/css/custom.css">
  </head>
  <body style="margin: 0; padding: 0; font-family: sans-serif; background: #34495e;">
    <form action="login.php" class="box" method="POST">
        <h1>Admin Login</h1>

        <?php if (isset($_GET['err'])) { ?>
            <div class="alert alert-dark text-center"><?php echo "Login failed! Invalid email-id or password!"; ?></div>
        <?php } ?>

        <input type="text" placeholder="Username" name="uname">
        <input type="password" placeholder="Password" name="pass">
        <input type="submit" value="Login" name="submit">
    </form>

<?php include 'footer.php';?>
 