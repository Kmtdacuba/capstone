<?php
include('../config/connection.php');
ob_start();
?>

<!--Refresh every 5 seconds-->
<script>
setTimeout(function() {
    window.location.reload();
}, 1000);
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../favicon.png">
    <title>Barangay 188 Tala Caloocan City</title>
</head>

<!-- Refresh every 10 seconds -->
<meta http-equiv="refresh" content="1">

<body class="bg">
    <center>
        <div>
            <img src="../images/Logo Name.png" alt="" width=100%>
        </div>
        <div class="queuing-screen">
            <table class="table-full">
                <tr>
                    <th class="th-bg th">
                        <h1 class="font">
                            COUNTER NO
                        </h1>
                    </th>
                    <th class="th-bg th">
                        <h1 class="font">
                            SERVING
                        </h1>
                    </th>
                    <th class="th-bg th">
                        <h1 class="font">
                            CALLING
                        </h1>
                    </th>
                    <th class="th-bg th">
                        <h1 class="font">
                            WAITING
                        </h1>
                    </th>
                </tr><br>
                <tr>
                    <!--ROW 1-->
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE counter_no='1'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $counter_no = $row['counter_no'];
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th">COUNTER <?php echo $counter_no; ?></td>
                    <?php
    }
}?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving' AND counter_no ='1'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling' AND counter_no ='1'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="blink th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?> <?php
                    $sql = "SELECT * FROM tbl_queuing WHERE status='Waiting'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    
                    if ($count > 0) {
                        mysqli_data_seek($res, 0);
                    
                        if ($row = mysqli_fetch_assoc($res)) {
                            $queue_no = $row['queue_no'];
                            ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>

                <tr>
                    <!--ROW 2-->
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE counter_no=2";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $counter_no = $row['counter_no'];
        ?>
                    <td class="font th">COUNTER <?php echo $counter_no; ?></td>
                    <?php
    }
}?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving' AND counter_no ='2'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling' AND counter_no ='2'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?> <?php
                    $sql = "SELECT * FROM tbl_queuing WHERE status='Waiting'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    
                    if ($count > 1) {
                        mysqli_data_seek($res, 1);
                    
                        if ($row = mysqli_fetch_assoc($res)) {
                            $queue_no = $row['queue_no'];
                            ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>

                <tr>
                    <!--ROW 3-->
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE counter_no='3'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $counter_no = $row['counter_no'];
        ?>
                    <td class="font th">COUNTER <?php echo $counter_no; ?></td>
                    <?php
    }
}?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving' AND counter_no ='3'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling' AND counter_no ='3'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?> <?php
                    $sql = "SELECT * FROM tbl_queuing WHERE status='Waiting'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    
                    if ($count > 2) {
                        mysqli_data_seek($res, 2);
                    
                        if ($row = mysqli_fetch_assoc($res)) {
                            $queue_no = $row['queue_no'];
                            ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>

                <tr>
                    <!--ROW 4-->
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE counter_no='4'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $counter_no = $row['counter_no'];
        ?>
                    <td class="font th">COUNTER <?php echo $counter_no; ?></td>
                    <?php
    }
}?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving' AND counter_no ='4'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th ">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling' AND counter_no ='4'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?> <?php
                    $sql = "SELECT * FROM tbl_queuing WHERE status='Waiting'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    
                    if ($count > 3) {
                        mysqli_data_seek($res, 3);
                    
                        if ($row = mysqli_fetch_assoc($res)) {
                            $queue_no = $row['queue_no'];
                            ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>

                <tr>
                    <!--ROW 5-->
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE counter_no='5'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $counter_no = $row['counter_no'];
        ?>
                    <td class="font th">COUNTER <?php echo $counter_no; ?></td>
                    <?php
    }
}?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving' AND counter_no ='5'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling' AND counter_no ='5'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td class="th"><?php echo ' '; ?></td>

                    <?php
                    }

                    ?> <?php
                    $sql = "SELECT * FROM tbl_queuing WHERE status='Waiting'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    
                    if ($count > 4) {
                        mysqli_data_seek($res, 4);
                    
                        if ($row = mysqli_fetch_assoc($res)) {
                            $queue_no = $row['queue_no'];
                            ?>
                    <td class="font th">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td class="th"> <?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>



            </table>
    </center>
</body>
<h1></h1>

</html>