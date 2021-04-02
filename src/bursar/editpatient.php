<?php
session_start();
if (empty($_SESSION['bursar']) or empty($_SESSION['type'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Patient - HMS</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<div class="wrapper">
    <?php
    include "includes/header.php";
    include "includes/left.php";
    ?>
    <div class="right"><br>
        <a href="patients.php" style="margin-left:10px;">
            <button class="btnlink">View Patients</button>
        </a>
        <form action="search.php" method="get" style="float:right;margin-right:15px;"><input name="s" type="text"
                                                                                             style="height:25px; width:180px;padding-left:15px;"
                                                                                             placeholder="Search Patient By Firstname">
        </form>
        <br><br>
        <?php $id = $_GET['id']; ?>
        <center>
            <form action="editpatient.php?id=<?php echo $id; ?>" method="POST">
                <?php
                require "../includes/connect.php";
                $sql = "SELECT * FROM `patient` WHERE `id`='$id'";
                $query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <input type="text" name="fname" class="form" value="<?php echo $row['fname']; ?>"
                           required="required"><br><br>
                    <input type="text" name="sname" class="form" value="<?php echo $row['sname']; ?>"
                           required="required"><br><br>
                    <input type="email" name="email" class="form" value="<?php echo $row['email']; ?>"
                           required="required"><br><br>
                    <input type="number" name="phone" class="form" value="<?php echo $row['phone']; ?>"
                           required="required"><br><br>
                    <input type="text" name="address" class="form" value="<?php echo $row['address']; ?>"
                           required="required"><br><br>
                    <?php
                }
                ?>

                <select name="gender" class="form" required="required">
                    <option value="">Choose Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select><br><br>

                <select name="bloodgroup" class="form" required="required">
                    <option value="">Choose Blood Group</option>
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>o</option>
                </select><br><br>

                <select name="birthyear" class="form" required="required">
                    <option value="">Choose Birth Year--</option>
                    <?php foreach (range(1970, date('Y')) as $year): ?>
                        <option><?=$year?></option>
                    <? endforeach; ?>
                </select><br><br>
                <input type="submit" value="Update" class="btnlink" name="btn"><br><br>
            </form>
            <?php
            extract($_POST);
            if (isset($btn) && !empty($fname) && !empty($sname) && !empty($email) && !empty($phone) && !empty($address) && !empty($gender) && !empty($birthyear) && !empty($bloodgroup)) {
                require "../includes/reception.php";
                updatepatient();
            }
            ?>
        </center>

    </div>
    <?php
    include "includes/footer.php";
    ?>
</div>
</body>
</html>
