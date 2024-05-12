<?php 
    include ('partials/side-nav.php');
?>

<section class="home-section">
    <div class="text">Analytics</div>

    <?php 
                            if(isset($_SESSION['login']))
                            {
                                echo $_SESSION['login'];
                                unset($_SESSION['login']);
                            }
                        ?>
    <br>
    <div class="total resident text-center">
        <?php
                                $sql = "SELECT * FROM tbl_resident";

                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);
                                ?>
        <h2><?php echo $count; ?></h2>
        <h4>TOTAL REGISTERED RESIDENT</h4>
    </div>
    <div class="total female text-center">
        <?php
                                $female = "SELECT COUNT(*) AS female FROM tbl_resident WHERE gender = 'female'";
                                $female_result = $conn->query($female);
                                $female_row = $female_result->fetch_assoc();
                                $female = $female_row['female'];
                            ?>
        <h2><?php echo $female; ?></h2>
        <h4>TOTAL FEMALE</h4>
    </div>
    <div class="total male text-center">
        <?php
                                $male = "SELECT COUNT(*) AS male FROM tbl_resident WHERE gender = 'male'";
                                $male_result = $conn->query($male);
                                $male_row = $male_result->fetch_assoc();
                                $male = $male_row['male'];
                            ?>
        <h2><?php echo $male; ?></h2>
        <h4>TOTAL MALE</h4>
    </div>
    <div class="b daily text-center">
        <?php
                                $daily_transactions_query = "SELECT COUNT(*) AS daily_transactions FROM tbl_appointment WHERE DATE(date) = CURDATE()";
                                $daily_transactions_result = $conn->query($daily_transactions_query);
                                $daily_transactions_row = $daily_transactions_result->fetch_assoc();
                                $daily_transactions = $daily_transactions_row['daily_transactions'];
                                ?>
        <h5 class="h5">DAILY TRANSACTION</h5>
        <h2 class="h2"><?php echo $daily_transactions; ?></h2>
    </div>

    <div class="b weekly text-center">
        <?php
                                $weekly_transactions_query = "SELECT COUNT(*) AS weekly_transactions FROM tbl_appointment WHERE WEEK(date) = WEEK(CURDATE())";
                                $weekly_transactions_result = $conn->query($weekly_transactions_query);
                                $weekly_transactions_row = $weekly_transactions_result->fetch_assoc();
                                $weekly_transactions = $weekly_transactions_row['weekly_transactions'];
                                ?>
        <h5 class="h5">WEEKLY TRANSACTIONS</h5>
        <h2 class="h2"><?php echo $weekly_transactions; ?></h2>
    </div>

    <div class="b overall text-center">
        <?php
                                $total_transactions_query = "SELECT COUNT(*) AS total_transactions FROM tbl_appointment";
                                $total_transactions_result = $conn->query($total_transactions_query);
                                $total_transactions_row = $total_transactions_result->fetch_assoc();
                                $total_transactions = $total_transactions_row['total_transactions'];
                                ?>
        <h5 class="h5">TOTAL OVERALL TRANSACTIONS</h5>
        <h2 class="h2"><?php echo $total_transactions; ?></h2>
    </div>
    <br>

    <a href="certficate.php">
        <div class="d_box text-center">
            <?php
                                $certificate = "SELECT COUNT(*) AS Barangay_Certificate FROM tbl_appointment WHERE type = 'Barangay Certificate'";
                                $certificate_result = $conn->query($certificate);
                                $certificate_row = $certificate_result->fetch_assoc();
                                $Barangay_Certificate = $certificate_row['Barangay_Certificate'];
                                ?>
            <h4>Barangay</h4>
            <h4>Certificate</h4>
            <br>
            <h2 class="h2"><?php echo $Barangay_Certificate; ?></h2>
        </div>
    </a>

    <a href="indigendy.php">
        <div class="d_box text-center">
            <?php
                                $indigency = "SELECT COUNT(*) AS Barangay_Indigency FROM tbl_appointment WHERE type = 'Barangay Indigency'";
                                $indigency_result = $conn->query($indigency);
                                $indigency_row = $indigency_result->fetch_assoc();
                                $Barangay_Indigency= $indigency_row['Barangay_Indigency'];
                                ?>
            <h4>Barangay</h4>
            <h4>Indigency</h4>
            <br>
            <h2 class="h2"><?php echo $Barangay_Indigency; ?></h2>
        </div>
    </a>

    <a href="clearance.php">
        <div class="d_box text-center">
            <?php
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Clearance FROM tbl_appointment WHERE type = 'Barangay Clearance'";
                                $total_transactions_result = $conn->query($total_transactions_query);
                                $total_transactions_row = $total_transactions_result->fetch_assoc();
                                $Barangay_Clearance= $total_transactions_row['Barangay_Clearance'];
                                ?>
            <h4>Barangay</h4>
            <h4>Clearance</h4>
            <br>
            <h2 class="h2"><?php echo $Barangay_Clearance; ?></h2>
        </div>
    </a>

    <a href="bp.php">
        <div class="d_box text-center">
            <?php
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Business_Permit FROM tbl_appointment WHERE type = 'Barangay Business Permit'";
                                $total_transactions_result = $conn->query($total_transactions_query);
                                $total_transactions_row = $total_transactions_result->fetch_assoc();
                                $Barangay_Business_Permit= $total_transactions_row['Barangay_Business_Permit'];
                                ?>
            <h4>Barangay</h4>
            <h4>Business Permit</h4>
            <br>
            <h2 class="h2"><?php echo $Barangay_Business_Permit; ?></h2>
        </div>
    </a>

    <a href="bfp.php">
        <div class="d_box text-center">
            <?php
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Facilities_Properties FROM tbl_appointment WHERE type = 'Barangay Facilities & Properties'";
                                $total_transactions_result = $conn->query($total_transactions_query);
                                $total_transactions_row = $total_transactions_result->fetch_assoc();
                                $Barangay_Facilities_Properties = $total_transactions_row['Barangay_Facilities_Properties'];
                                ?>
            <h4>Barangay</h4>
            <h4>Facilities & Properties</h4>
            <br>
            <h2 class="h2"><?php echo $Barangay_Facilities_Properties; ?></h2>
        </div>
    </a>

    <a href="id.php">
        <div class="d_box text-center">
            <?php
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Identification_Card FROM tbl_appointment WHERE type = 'Barangay Identification Card'";
                                $total_transactions_result = $conn->query($total_transactions_query);
                                $total_transactions_row = $total_transactions_result->fetch_assoc();
                                $Barangay_Identification_Card = $total_transactions_row['Barangay_Identification_Card'];
                                ?>
            <h4>Barangay</h4>
            <h4>Identification Card</h4>
            <br>
            <h2 class="h2"><?php echo $Barangay_Identification_Card; ?></h2>
        </div>
    </a>

    <a href="record.php">
        <div class="d_box text-center">
            <?php
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Records FROM tbl_appointment WHERE type = 'Barangay Records, Data & Similar Documents'";
                                $total_transactions_result = $conn->query($total_transactions_query);
                                $total_transactions_row = $total_transactions_result->fetch_assoc();
                                $Barangay_Records= $total_transactions_row['Barangay_Records'];
                                ?>
            <h4>Barangay Records,</h4>
            <h4>Data & Similar Documents</h4>
            <br>
            <h2 class="h2"><?php echo $Barangay_Records; ?></h2>
        </div>
    </a>

    <a href="others.php">
        <div class="d_box text-center">
            <?php
                                $total_transactions_query = "SELECT COUNT(*) AS other FROM tbl_appointment WHERE type = 'other'";
                                $total_transactions_result = $conn->query($total_transactions_query);
                                $total_transactions_row = $total_transactions_result->fetch_assoc();
                                $other = $total_transactions_row['other'];
                                ?>
            <h4>Other</h4>
            <h4>Services</h4>
            <br>
            <h2 class="h2"><?php echo $other; ?></h2>
        </div>
        <a>
            <div class="clear"></div>
            <br>
            <hr><br>

            <!--Transaction Chart-->
            <?php 
$dataPoints1 = array(
	array("label"=> "Barangay Cetrificate", "y"=> $Barangay_Certificate),
	array("label"=> "Barangay Indigency", "y"=> $Barangay_Indigency),
    array("label"=> "Barangay Clearance", "y"=> $Barangay_Clearance),
    array("label"=> "Barangay Business Permit", "y"=> $Barangay_Business_Permit),
    array("label"=> "Barangay Facilities & Properties", "y"=> $Barangay_Facilities_Properties),
    array("label"=> "Barangay Identification Card", "y"=> $Barangay_Identification_Card),
    array("label"=> "Barangay Records, Data & Similar Documents", "y"=> $Barangay_Records),
    array("label"=> "Other", "y"=> $other)
);
	
?>
            <script>
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer1", {
                    animationEnabled: true,
                    exportEnabled: true,
                    backgroundColor: "#E4E9F7",
                    theme: "light1", // "light1", "light2", "dark1", "dark2"
                    title: {
                        fontFamily: "'Courier New', Courier, monospace",
                        text: "Transaction Report"
                    },
                    axisY: {
                        includeZero: true,
                        FontFamily: "'Courier New', Courier, monospace"
                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0\"\"",
                        indexLabel: "{y}",
                        indexLabelPlacement: "inside",
                        indexLabelFontColor: "white",
                        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
            }
            </script>
            <div id="chartContainer1" style="height: 400px; width: 100%;"></div>
            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

            <!--Transaction Chart Ends-->



            <!--Main Section Ends-->
</section>
<?php 
    include ('partials/footer.php');
?>