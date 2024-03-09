<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_id = intval($_SESSION["id"]);
if ($user_id > 0) {
    $query = "SELECT * FROM user_features WHERE id=$user_id";
    $user_feature_det = mysqli_fetch_assoc(mysqli_query($con, $query));
    if ($user_feature_det != null) {
        ?>
        <!--close-Header-part--> 

        <!--top-Header-menu-->
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
                <li class="" ><a title=""  href="#userDetMod" data-toggle="modal"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
                <?php if ($user_feature_det["settings"] == 1) { ?>
                    <li class=""><a title="" href="settings/autharization.php"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <?php } ?>
                <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>

        <div id="sidebar">
            <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a><ul>
                <?php if ($user_feature_det["settings"] == 1) { ?>
                    <li class="active"><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
                <?php } ?>
                <?php if ($user_feature_det["billings"] == 1) { ?>
                    <li> <a onclick="window.open('billing.php', '', 'scrollbars=yes,resizable=yes,width=1920,height=1000,top=65,left=300')" href="#"><i class="icon icon-list-alt"></i> <span>Billing</span></a> </li>
                <?php } ?>
                <?php if ($user_feature_det["customer_maintain"] == 1) { ?>
                    <li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>Customer Module</span></a>
                        <ul>
                            <li><a href="customer/new_cus.php">Add Customers</a></li>
                            <li><a href="customer/cus_main.php">Customer Maintanance</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($user_feature_det["supplier_maintain"] == 1) { ?>
                    <li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>Supplier Module</span></a>
                        <ul>
                            <li><a href="supplier/new_sup.php">Add Supplier</a></li>
                            <li><a href="supplier/sup_main.php">Supplier Maintanance</a></li>
                            <?php if ($user_feature_det["credit_bill"] == 1) { ?>
                                <li><a onclick="window.open('supplier/do_payment.php', '', 'scrollbars=yes,resizable=yes,width=826,height=518,top=65,left=300')" href="">Supplier Payment Module</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($user_feature_det["product_maintain"] == 1) { ?>
                    <li class="submenu"> <a href="#"><i class="icon icon-barcode"></i> <span>Product Module</span></a>
                        <ul>
                            <li><a href="product/new_pro.php">Add Products</a></li>
                            <li><a href="product/pro_main.php">Products Maintanance</a></li>
                            <?php if ($user_feature_det["qty_manage"] == 1) { ?>
                                <li><a href="product/item_qty_control.php">Quantity Control ( Item wise )</a></li>
                                <li><a href="product/bill_qty_control.php">Quantity Control ( Bill wise )</a></li>
                            <?php } ?>
                            <?php if ($user_feature_det["return_stock"] == 1) { ?>
                                <li><a href="product/return_stock.php">Return Stock Handling</a></li>
                            <?php } ?>
                            <li><a href="product/category.php">Product Category Maintanance</a></li>
                            <?php if ($user_feature_det["barcode_gen"] == 1) { ?>
                                <li><a onclick="window.open('bar/genarate.php', '', 'scrollbars=yes,resizable=yes,width=826,height=518,top=65,left=450')" href="#">Barcode Genarator</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($user_feature_det["notifications"] == 1) { ?>
                    <li><a href="notify/alerts.php"><i class="icon icon-bell"></i> <span>Notifications</span></a></li>
                <?php } ?>
                <?php if ($user_feature_det["dep_main"] == 1) { ?>
                    <li class="submenu"> <a href="#"><i class="icon icon-folder-open"></i> <span>Department Module</span></a>
                        <ul>
                            <li><a href="department/new_dep.php">Add Department</a></li>
                            <li><a href="department/dep_main.php">Department Maintanance</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="submenu"> <a href="#"><i class="icon icon-download-alt"></i> <span>Report Module</span></a>
                    <ul>
                        <?php if ($user_feature_det["costing_re"] == 1) { ?>
                            <li><a href="kpi_reports/costing_report.php">Product Costing Report</a></li>
                        <?php } ?>
                        <?php if ($user_feature_det["sales_re"] == 1) { ?>
                            <li><a href="kpi_reports/sales_report.php">Product Sales Report</a></li>
                        <?php } ?>
                        <?php if ($user_feature_det["profit_re"] == 1) { ?>
                            <li><a href="kpi_reports/profit_report.php">Total Profit Report</a></li>
                        <?php } ?>
                        <?php if ($user_feature_det["transactions_re"] == 1) { ?>
                            <li><a href="kpi_reports/transaction_report.php">Daily Transactions Report</a></li>
                        <?php } ?>
                        <?php if ($user_feature_det["cus_ous_re"] == 1) { ?>
                            <li><a href="kpi_reports/customer_oustanding.php">Customer Outstanding Report</a></li>
                        <?php } ?>
						<?php if ($user_feature_det["supplier_maintain"] == 1) { ?>
                            <li><a href="kpi_reports/suuplier_oustanding.php">Supplier Outstanding Report</a></li>
                        <?php } ?>
                        <?php if ($user_feature_det["fast_moving_re"] == 1) { ?>
                            <li><a href="kpi_reports/fast_moving.php">Fast Moving Item Report</a></li>
                        <?php } ?>
                        <?php if ($user_feature_det["transactions_re"] == 1) { ?>
                            <li><a href="kpi_reports/cus_returns.php">Customer Returns Report</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
        <?php
        include_once 'profile.php';
    }
}    