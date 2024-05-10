<?php 
ob_start();
    include ('partials/side-nav.php');
    $email = $_SESSION['email'];
?>

<section class="home-section">
    <div class="text">Dashboard</div>

    <?php 
                            if(isset($_SESSION['login']))
                            {
                                echo $_SESSION['login'];
                                unset($_SESSION['login']);
                            }
                        ?>
    <br>
    <div class="b daily text-center">
        <?php
                                $daily_transactions_query = "SELECT COUNT(*) AS daily_transactions FROM tbl_appointment WHERE DATE(selected_date) = CURDATE() && email='$email'";
                                $daily_transactions_result = $conn->query($daily_transactions_query);
                                $daily_transactions_row = $daily_transactions_result->fetch_assoc();
                                $daily_transactions = $daily_transactions_row['daily_transactions'];
                                ?>
        <h5 class="h5">DAILY TRANSACTION</h5>
        <h2 class="h2"><?php echo $daily_transactions; ?></h2>
    </div>

    <div class="b weekly text-center">
        <?php
                                $weekly_transactions_query = "SELECT COUNT(*) AS weekly_transactions FROM tbl_appointment WHERE WEEK(selected_date) = WEEK(CURDATE()) && email='$email'";
                                $weekly_transactions_result = $conn->query($weekly_transactions_query);
                                $weekly_transactions_row = $weekly_transactions_result->fetch_assoc();
                                $weekly_transactions = $weekly_transactions_row['weekly_transactions'];
                                ?>
        <h5 class="h5">WEEKLY TRANSACTIONS</h5>
        <h2 class="h2"><?php echo $weekly_transactions; ?></h2>
    </div>

    <div class="b overall text-center">
        <?php
                                $total_transactions_query = "SELECT COUNT(*) AS total_transactions FROM appointment_archive WHERE email='$email'";
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
                                $certificate = "SELECT COUNT(*) AS Barangay_Certificate FROM appointment_archive WHERE type = 'Barangay Certificate' && email='$email'";
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
                                $indigency = "SELECT COUNT(*) AS Barangay_Indigency FROM appointment_archive WHERE type = 'Barangay Indigency' && email='$email'";
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
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Clearance FROM appointment_archive WHERE type = 'Barangay Clearance' && email='$email'";
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
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Business_Permit FROM appointment_archive WHERE type = 'Barangay Business Permit' && email='$email'";
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
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Facilities_Properties FROM appointment_archive WHERE type = 'Barangay Facilities & Properties' && email='$email'";
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
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Identification_Card FROM appointment_archive WHERE type = 'Barangay Indentification Card' && email='$email'";
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
                                $total_transactions_query = "SELECT COUNT(*) AS Barangay_Records FROM appointment_archive WHERE type = 'Barangay Records, Data & Similar Documents' && email='$email'";
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
                                $total_transactions_query = "SELECT COUNT(*) AS other FROM tbl_appointment WHERE type = 'other' && email='$email'";
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
	        array("label"=> "Certificate", "y"=> $Barangay_Certificate),
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