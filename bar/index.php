<html>
    <head>
        <?php session_start(); ?>
        <title>Login | Barcode Generator</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" style="margin:10%;">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-3" style="box-shadow: 1px 5px 50px gray;padding: 5%">
                        <h6 style="text-align: center">Barcode Generator</h6>
                        <form method="post">
                            <div class="form-group">
                                <label for="username"></label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password"></label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <button type="submit" name="login" class="btn btn-sm btn-primary" style="float:right">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </footer>
    </body>
</html>
<?php
if (isset($_POST["login"])) {
    $con = mysqli_connect('localhost', 'root', '', 'gen_bar');
    $username = strtolower(trim($_POST["username"]));
    $password = trim($_POST["password"]);
    $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'"));
    if ($row != null) {
        $_SESSION["u_id"]=$row["u_id"];
        header("location:genarate.php");
    }
}