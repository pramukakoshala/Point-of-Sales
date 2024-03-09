<?php

include 'dbconnect.php';
$sql2 = "SELECT MAX(t_id) FROM transaction";
$max_trans_id = mysqli_fetch_assoc(mysqli_query($con, $sql2))["MAX(t_id)"] + 1;

$finalcode = $max_trans_id * mt_rand(100, 1000) * mt_rand(10000, 100000);
