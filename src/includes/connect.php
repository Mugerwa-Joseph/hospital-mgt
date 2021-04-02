<?php
if (file_exists('config/env.php')) {
    require_once 'config/env.php';
} else {
    require_once '../config/env.php';
}
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (empty($con)) {
    echo mysqli_error($con);
}

