<?php
/* ALLOWED MAXIMUM USERS */

$max_admins = 2;
$max_smangers = 1;
$max_cashiers = 2;

/* ---------------------- */
?>
<!-- USER ACCOUNT MODEL ------------------------------------------------------------------------------------------------------------------------ -->

<div id="myModal" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3 id="head_title"></h3>
    </div>
    <div class="modal-body">
        <form method="post" class="form-horizontal">
            <div class="control-group" style="display: none">
                <label class="control-label"></label>
                <div class="controls">
                    <input type="text" name="user_id" id="user_id" class="span3" value="<?php encrydata(0) ?>" required readonly hidden/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Full Name :</label>
                <div class="controls">
                    <input type="text" name="user_name" id="user_name" class="span3" placeholder="Full name" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">User Status</label>
                <div class="controls">
                    <select name="user_status" id="user_status" style="width:87%;" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="control-group" id="user_role_home">
                <label class="control-label">User Role</label>
                <div class="controls">
                    <select name="user_role" id="user_role" style="width:87%;" required>
                        <?php
                        /* Configuring Maximum Users */

                        $num_of_billings = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE type=1"));
                        if ($num_of_billings < $max_cashiers) {
                            ?>
                            <option value="1">Cashier</option>
                        <?php } ?>
                        <?php
                        $num_of_smanger = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE type=2"));
                        if ($num_of_smanger < $max_smangers) {
                            ?>
                            <option value="2">Stock Manager</option>
                        <?php } ?>
                        <?php
                        $num_of_admins = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE type=3"));
                        if ($num_of_admins < $max_admins) {
                            ?>
                            <option value="3">Administrator</option>
                            <?php
                        }

                        /* --------------------------------- */
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Contact no :</label>
                <div class="controls">
                    <input name="user_phone" type="number" id="user_phone" class="span3" placeholder="Contact Number"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email :</label>
                <div class="controls">
                    <input name="user_email" type="email" id="user_email" class="span3" placeholder="Email Address"  required/>
                </div>
            </div>
            <div class="control-group" >
                <label class="control-label">Login Password :</label>
                <div class="controls">
                    <input name="user_password" type="password" id="user_password" class="span3" placeholder="Enter Password"  required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">User Bio :</label>
                <div class="controls">
                    <textarea name="user_bio" class="span3" id="user_bio"></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" name="save" class="btn btn-success" style="width:92%; margin-left: 6%;">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- USER FEATURES MODEL ------------------------------------------------------------------------------------------------------------------------ -->

<div id="myModal1" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3 id="user_fe_head"></h3>
    </div>
    <div class="modal-body">
        <form method="post" class="form-horizontal">
            <div class="control-group" style="display: none">
                <label class="control-label"></label>
                <div class="controls">
                    <input type="text" name="user_fe_id" id="user_fe_id" class="span3" required readonly hidden/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Assign Access Module : </label>
                <div class="controls">
                    <label>
                        <input id="billings" type="checkbox" name="billings" />
                        Billings
                    </label>
                    <label>
                        <input id="customer_maintain" type="checkbox" name="customer_maintain" />
                        Customer & Maintanance
                    </label>
                    <label>
                        <input id="supplier_maintain" type="checkbox" name="supplier_maintain" />
                        Supplier & Maintanance
                    </label>
                    <label>
                        <input id="product_maintain" type="checkbox" name="product_maintain" />
                        Product & Maintanance
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Assign Access Special : </label>
                <div class="controls">
                    <label>
                        <input id="return_stock" type="checkbox" name="return_stock" />
                        Return Stock Management
                    </label>
                    <label>
                        <input id="qty_manage" type="checkbox" name="qty_manage" />
                        Quantity Management & Supplier Payments
                    </label>
                    <label>
                        <input id="notifications" type="checkbox" name="notifications" />
                        Notifications & Credit Bill
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Assign Access Reports : </label>
                <div class="controls">
                    <label>
                        <input id="costing_re" type="checkbox" name="costing_re"/>
                        Product Costing Report
                    </label>
                    <label>
                        <input id="sales_re" type="checkbox" name="sales_re" />
                        Product Sales Report
                    </label>
                    <label>
                        <input id="profit_re" type="checkbox" name="profit_re" />
                        Total Profit Report
                    </label>
                    <label>
                        <input id="transactions_re" type="checkbox" name="transactions_re" />
                        Daily Transactions Report
                    </label>
                    <label>
                        <input id="cus_ous_re" type="checkbox" name="cus_ous_re" />
                        Customer Outstanding Report
                    </label>
                    <label>
                        <input id="sup_ous_re" type="checkbox" name="sup_ous_re" />
                        Supplier Outstanding Report
                    </label>
                    <label>
                        <input id="fast_moving_re" type="checkbox" name="fast_moving_re" />
                        Fast Moving Item Report
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <button name="update" type="submit" class="btn btn-success" style="width:92%; margin-left: 6%;">Update & Assign Access</button>
            </div>
        </form>
    </div>
</div>

<!-- MODELS SCRIPTS ------------------------------------------------------------------------------------------------------------------------ -->

<script>
    function add_user_details(u_id = '', name = "", phone = "", email = "", bio = "", password = "", role = '', status = 1) {
        document.getElementById("user_name").value = name;
        document.getElementById("user_email").value = email;
        document.getElementById("user_phone").value = phone;
        if (password != "") {
            document.getElementById("user_password").parentElement.parentElement.style.display = "none";
        } else {
            document.getElementById("user_password").parentElement.parentElement.style.display = "block";
        }
        document.getElementById("user_bio").innerHTML = bio;
        document.getElementById("user_status").value = status;
        if (role != '') {
            document.getElementById("user_role").parentElement.parentElement.style.display = "none";
        } else {
            document.getElementById("user_role").parentElement.parentElement.style.display = "block";
        }
        if (u_id != '') {
            document.getElementById("user_id").value = u_id;
            document.getElementById("head_title").innerHTML = "Edit User | " + name;
        } else {
            document.getElementById("head_title").innerHTML = "Create New System User";
    }
    }
    function add_user_features(unic = "", user_name = "", billings = 0, customer_maintain = 0, supplier_maintain = 0, product_maintain = 0, return_stock = 0, qty_manage = 0, notifications = 0, costing_re = 0, sales_re = 0, profit_re = 0, transactions_re = 0, cus_ous_re = 0, sup_ous_re = 0, fast_moving_re = 0) {

        document.getElementById("user_fe_head").innerHTML = "Assign System Access For User, " + user_name;
        document.getElementById("user_fe_id").value = unic;

        document.getElementById("customer_maintain").checked = false;
        document.getElementById("supplier_maintain").checked = false;
        document.getElementById("product_maintain").checked = false;
        document.getElementById("return_stock").checked = false;
        document.getElementById("qty_manage").checked = false;
        document.getElementById("notifications").checked = false;
        document.getElementById("costing_re").checked = false;
        document.getElementById("sales_re").checked = false;
        document.getElementById("profit_re").checked = false;
        document.getElementById("transactions_re").checked = false;
        document.getElementById("cus_ous_re").checked = false;
        document.getElementById("sup_ous_re").checked = false;
        document.getElementById("billings").checked = false;
        document.getElementById("fast_moving_re").checked = false;

        document.getElementById("customer_maintain").style.opacity = "0";
        document.getElementById("supplier_maintain").style.opacity = "0";
        document.getElementById("product_maintain").style.opacity = "0";
        document.getElementById("return_stock").style.opacity = "0";
        document.getElementById("qty_manage").style.opacity = "0";
        document.getElementById("notifications").style.opacity = "0";
        document.getElementById("costing_re").style.opacity = "0";
        document.getElementById("sales_re").style.opacity = "0";
        document.getElementById("profit_re").style.opacity = "0";
        document.getElementById("transactions_re").style.opacity = "0";
        document.getElementById("cus_ous_re").style.opacity = "0";
        document.getElementById("sup_ous_re").style.opacity = "0";
        document.getElementById("billings").style.opacity = "0";
        document.getElementById("fast_moving_re").style.opacity = "0";

        if (customer_maintain == 1) {
            document.getElementById("customer_maintain").checked = true;
            document.getElementById("customer_maintain").style.opacity = "1";
        }
        if (supplier_maintain == 1) {
            document.getElementById("supplier_maintain").checked = true;
            document.getElementById("supplier_maintain").style.opacity = "1";
        }
        if (product_maintain == 1) {
            document.getElementById("product_maintain").checked = true;
            document.getElementById("product_maintain").style.opacity = "1";
        }
        if (return_stock == 1) {
            document.getElementById("return_stock").checked = true;
            document.getElementById("return_stock").style.opacity = "1";
        }
        if (qty_manage == 1) {
            document.getElementById("qty_manage").checked = true;
            document.getElementById("qty_manage").style.opacity = "1";
        }
        if (notifications == 1) {
            document.getElementById("notifications").checked = true;
            document.getElementById("notifications").style.opacity = "1";
        }
        if (costing_re == 1) {
            document.getElementById("costing_re").checked = true;
            document.getElementById("costing_re").style.opacity = "1";
        }
        if (sales_re == 1) {
            document.getElementById("sales_re").checked = true;
            document.getElementById("sales_re").style.opacity = "1";
        }
        if (profit_re == 1) {
            document.getElementById("profit_re").checked = true;
            document.getElementById("profit_re").style.opacity = "1";
        }
        if (transactions_re == 1) {
            document.getElementById("transactions_re").checked = true;
            document.getElementById("transactions_re").style.opacity = "1";
        }
        if (cus_ous_re == 1) {
            document.getElementById("cus_ous_re").checked = true;
            document.getElementById("cus_ous_re").style.opacity = "1";
        }
        if (sup_ous_re == 1) {
            document.getElementById("sup_ous_re").checked = true;
            document.getElementById("sup_ous_re").style.opacity = "1";
        }
        if (billings == 1) {
            document.getElementById("billings").checked = true;
            document.getElementById("billings").style.opacity = "1";
        }
        if (fast_moving_re == 1) {
            document.getElementById("fast_moving_re").checked = true;
            document.getElementById("fast_moving_re").style.opacity = "1";
    }
    }
</script>
<?php
if (isset($_POST["save"])) {
    $user_id = validNumber(decrydata($_POST["user_id"]), "../");
    $user_name = ucwords($_POST["user_name"]);
    $user_email = strtolower($_POST["user_email"]);
    $user_phone = $_POST["user_phone"];
    $user_password = password_hash($_POST["user_password"], PASSWORD_DEFAULT);
    $user_bio = ucwords($_POST["user_bio"]);
    $user_status = $_POST["user_status"];
    if ($user_id == 0) {
        $user_role = $_POST["user_role"];
        mysqli_query($con, "INSERT INTO users(name,email,password,type,phone,bio,status) VALUES('$user_name','$user_email','$user_password',$user_role,'$user_phone','$user_bio',$user_status)");
        $id = mysqli_insert_id($con);
        if ($user_role == 1) {
            mysqli_query($con, "INSERT INTO user_features(id,customer_maintain,billings,sales_re) VALUES($id,1,1,1)");
        } elseif ($user_role == 2) {
            mysqli_query($con, "INSERT INTO user_features(id,supplier_maintain,product_maintain,return_stock,qty_manage,sup_payments,notifications,credit_bill,sales_re,sup_ous_re,barcode_gen) VALUES($id,1,1,1,1,1,1,1,1,1,1)");
        } elseif ($user_role == 3) {
            mysqli_query($con, "INSERT INTO user_features(id,customer_maintain,supplier_maintain,product_maintain,return_stock,qty_manage,sup_payments,notifications,credit_bill,costing_re,sales_re,profit_re,transactions_re,cus_ous_re,sup_ous_re,billings,settings,barcode_gen) VALUES($id,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1)");
        }
    } else {
        mysqli_query($con, "UPDATE users SET name='$user_name',email='$user_email',phone='$user_phone',bio='$user_bio',status=$user_status WHERE id=$user_id");
    }
    ?>
    <script>
        window.location.href = "autharization.php";
    </script>
    <?php
}
if (isset($_POST["update"])) {
    $user_fe_id = validNumber(decrydata($_POST["user_fe_id"]), "../");
    if (!empty($_POST["customer_maintain"])) {
        mysqli_query($con, "UPDATE user_features SET customer_maintain=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET customer_maintain=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["supplier_maintain"])) {
        mysqli_query($con, "UPDATE user_features SET supplier_maintain=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET supplier_maintain=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["product_maintain"])) {
        mysqli_query($con, "UPDATE user_features SET product_maintain=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET product_maintain=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["return_stock"])) {
        mysqli_query($con, "UPDATE user_features SET return_stock=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET return_stock=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["qty_manage"])) {
        mysqli_query($con, "UPDATE user_features SET qty_manage=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET qty_manage=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["notifications"])) {
        mysqli_query($con, "UPDATE user_features SET notifications=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET notifications=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["costing_re"])) {
        mysqli_query($con, "UPDATE user_features SET costing_re=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET costing_re=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["sales_re"])) {
        mysqli_query($con, "UPDATE user_features SET sales_re=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET sales_re=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["profit_re"])) {
        mysqli_query($con, "UPDATE user_features SET profit_re=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET profit_re=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["transactions_re"])) {
        mysqli_query($con, "UPDATE user_features SET transactions_re=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET transactions_re=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["cus_ous_re"])) {
        mysqli_query($con, "UPDATE user_features SET cus_ous_re=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET cus_ous_re=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["sup_ous_re"])) {
        mysqli_query($con, "UPDATE user_features SET sup_ous_re=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET sup_ous_re=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["billings"])) {
        mysqli_query($con, "UPDATE user_features SET billings=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET billings=0 WHERE uf_id=$user_fe_id");
    }
    if (!empty($_POST["fast_moving_re"])) {
        mysqli_query($con, "UPDATE user_features SET fast_moving_re=1 WHERE uf_id=$user_fe_id");
    } else {
        mysqli_query($con, "UPDATE user_features SET fast_moving_re=0 WHERE uf_id=$user_fe_id");
    }
    ?>
    <script>
        window.location.href = "autharization.php";
    </script>
    <?php
}