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
                    <th>
                        <h1 class="font">
                            COUNTER NO
                        </h1>
                    </th>
                    <th>
                        <h1 class="font">
                            SERVING
                        </h1>
                    </th>
                    <th>
                        <h1 class="font">
                            CALLING
                        </h1>
                    </th>
                    <th>
                        <h1 class="font">
                            WAITING
                        </h1>
                    </th>
                </tr><br>
                <tr>
                    <!--ROW 1-->
                    <td class="font">COUNTER 1</td>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 0) {
    mysqli_data_seek($res, 0);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="blink">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

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
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>

                <tr>
                    <!--ROW 2-->
                    <td class="font">COUNTER 2</td>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 1) {
    mysqli_data_seek($res, 1);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 1) {
    mysqli_data_seek($res, 1);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

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
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>

                <tr>
                    <!--ROW 3-->
                    <td class="font">COUNTER 3</td>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 2) {
    mysqli_data_seek($res, 2);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 2) {
    mysqli_data_seek($res, 2);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

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
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>

                <tr>
                    <!--ROW 4-->
                    <td class="font">COUNTER 4</td>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 3) {
    mysqli_data_seek($res, 3);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 3) {
    mysqli_data_seek($res, 3);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

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
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>

                <tr>
                    <!--ROW 5-->
                    <td class="font">COUNTER 5</td>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Serving'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 4) {
    mysqli_data_seek($res, 4);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                    }

                    ?>
                    <?php
$sql = "SELECT * FROM tbl_queuing WHERE status='Calling'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($count > 4) {
    mysqli_data_seek($res, 4);

    if ($row = mysqli_fetch_assoc($res)) {
        $queue_no = $row['queue_no'];
        ?>
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
    }
}
else {
    ?>
                    <td><?php echo ' '; ?></td>

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
                    <td class="font">Queue-00<?php echo $queue_no; ?></td>
                    <?php
                        }
                    }
                    else {
                        ?>
                    <td><?php echo ' '; ?></td>

                    <?php
                                        }
                    
                                        ?>
                </tr>



            </table>
    </center>
</body>
<h1></h1>

</html>