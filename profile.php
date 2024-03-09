<?php
$userId = $_SESSION["id"];
$userData = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE id=\"$userId\""));
if ($userData != null) {
    $userRole = $userData['type'];
    if ($userRole == 1) {
        $userRole = 'Cashier';
    } elseif ($userRole == 2) {
        $userRole = 'Stock Manager';
    } elseif ($userRole == 3) {
        $userRole = 'Administrator';
    }
    ?>

    <!-- USER ACCOUNT MODEL ------------------------------------------------------------------------------------------------------------------------ -->

    <div id="userDetMod" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3 id="head_title" style="text-align: center;text-transform: uppercase">My Account</h3>
        </div>
        <div class="modal-body">
            <form method="post" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">User Account :</label>
                    <div class="controls">
                        <input type="text" value="<?= ucwords($userData['name']) ?>" class="span3" placeholder="Full name" readonly/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Last Logined : </label>
                    <div class="controls">
                        <input type="text" value="<?= $userData['last_logined'] ?>" class="span3" placeholder="Last Logined" readonly/>
                    </div>
                </div>
                <div class="control-group" id="user_role_home">
                    <label class="control-label">User Role : </label>
                    <div class="controls">
                        <input type="text" value="<?= $userRole ?>" class="span3" placeholder="User Type"  readonly/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Contact no :</label>
                    <div class="controls">
                        <input type="text" value="<?= $userData['phone'] ?>" class="span3" placeholder="Contact Number" readonly/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email :</label>
                    <div class="controls">
                        <input type="text" value="<?= $userData['email'] ?>" class="span3" placeholder="Email Address"  readonly/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">User Bio :</label>
                    <div class="controls">
                        <textarea class="span3" readonly><?= $userData['bio'] ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">New Password :</label>
                    <div class="controls">
                        <input type="password" class="span3" name="new_pass" placeholder="New Password"  required/>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success" style="width:92%; margin-left: 6%;">Update</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['new_pass']) && !empty($_POST['new_pass'])) {
        $new_pass = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
        mysqli_query($con, "UPDATE `users` SET `password`=\"$new_pass\" WHERE `id`=\"$userId\"");
    }
}