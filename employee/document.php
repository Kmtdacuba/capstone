<?php include('../config/connection.php');
$queue_no = $_SESSION['queue_no'];
ob_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" type="image/png" href="../favicon.png">
    <title>Barangay 188 Tala Caloocan City</title>

</head>

<style>
/* Add CSS styles to make content visible when printing */
@media print {

    /* Show all elements */
    .container-certificate {
        display: block !important;
        visibility: visible !important;
    }

    .Indigency-container {
        display: block !important;
        visibility: visible !important;
    }

    .Permit-container {
        display: block !important;
        visibility: visible !important;
    }

    /* Hide the button for printing */
    .btn-print {
        display: none;
    }

}
</style>
<!--BARANGAY CERTIFICATE-->


<body>
    <br><br><br>

    <?php
                   $sql = "SELECT * FROM tbl_queuing WHERE queue_no=$queue_no";
       
                   $result = mysqli_query($conn, $sql);
       
                   if ($result == TRUE)
                   {
                       $count= mysqli_num_rows($result);
       
                       if($count==1)
                       {
                           $row = mysqli_fetch_assoc($result);
                           $name = $row['name'];
                           $age = $row['age'];
                       }
                   }
        ?>
    <div class="body-certificate">

        <div class="container-certificate">
            <div class="background-img-certificate"></div>
            <div class="header-certificate">
                <img src="../images/123.png" alt="logo" class="logo-certificate">
                <div class="text-certificate">
                    <p>Republic of the Philippines <br>
                        City of Caloocan <br>
                        OFFICE OF THE CITY MAYOR</p>
                    <h1>Barangay Clearance</h1>
                </div>
                <img src="../images/logo1.jpg" alt="another logo" class="logo-certificate">
            </div>
            <div class="content-certificate">
                <p>This is to certify that <?php echo "<strong>$name</strong>"; ?>,
                    <?php echo "<strong>$age</strong>"; ?> years old,
                    a residents of Barangay188, Tala Caloocan City </p>
                <p>To be of a good moral character and law-abiding citizen in the cmmunity </p>
                <p>To Certify further, that he/she has no derogatory and/or criminal records filed in this Barangay.</p>
                <p> ISSUED this <strong><?php echo date('F'); ?></strong>
                    day of <strong><?php echo date('j, Y '); ?></strong> at Barangay 188, Tala Caloocan
                    City upon request of the
                    interested party for whatever legal purposes it may serve. </p>
            </div>
            <div class="signature-certificate">
                <p><strong>Hon. Ma. Elise Liezel Chan</strong></p>
                <p>Barangay Captain</p>
                <br>
                <button class="btn-print" onclick="printContent()">Print</button>
            </div>
        </div>
    </div>
    <br><br><br>

    <!--BARANGAY PERMIT-->
    <div class="body-permit">
        <div class="Permit-container">
            <div class="background-img-permit"></div>
            <div class="header-permit">
                <img src="../images/123.png" alt="logo" class="logo-permit">
                <div class="text-permit">
                    <p>Republic of the Philippines <br>
                        City of Caloocan <br>
                        OFFICE OF THE CITY MAYOR <br>
                        BARANGAY PERMIT</p>
                    <h1><strong><?php echo date('F j, Y'); ?></strong></h1>
                </div>
                <img src="../images/logo1.jpg" alt="another logo" class="logo-permit">
            </div>
            <div class="content-permit">
                <p>Dear P/B Punongbayan:</p>
                <p>As part of the mandate of our office to regulate and monitor the operation of business in the City of
                    Caloocan, our office intends to conduct
                    (business) of business establishments located within North Caloocan in the months of (October to
                    December 2022).
                </p>
                <p>Significantly, we have reports that numerous business establishments within your territorial
                    jurisdiction
                    are operating without the requisite business permit obtained from the City Government. In this
                    regard,
                    our office hereby requests your good office to inform and persuade the said establishments to
                    voluntarily secure the necessary business permit from our office to avoid the closure of the
                    business
                    and possible civil/administrative/criminal prosecution for violation of city ordinance 0386 s. 2024
                    otherwise known as the updated Caloocan city. Revenue code of 2024 </p>
                <p> Hoping for your usual cooperation.</p>
                <p> Thank you Very much.</p>
            </div>
            <div class="permit-signature">
                <p><strong>Very Truely yours</strong></p>
                <p>atty.</p> <br><br>
                <button class="btn-print" onclick="printContent()">Print</button>
            </div>
        </div>
    </div>
    <br><br><br>
    <!--BARANGAY INDIGENDY-->
    <div class="body-indigency">
        <div class="Indigency-container">
            <div class="background-img-indigency"></div>
            <div class="header-indigency">
                <img src="../images/123.png" alt="logo" class="logo-indigency">
                <div class="text-indigency">
                    <p>Republic of the Philippines <br>
                        City of Caloocan <br>
                        OFFICE OF THE CITY MAYOR</p>
                    <h1>Certificate of Indigency</h1>
                </div>
                <img src="../images/logo1.jpg" alt="another logo" class="logo-indigency">
            </div>
            <div class="content-indigency">
                <p>TO WHOM IT MAY CONCERN:</p>
                <p> This is to certify that <?php echo "<strong>$name</strong>"; ?> of legal age, in a resident </p>
                <p>of Caloocan City member or indigent person in the barangay. </p>
                <p>Further, certify that the above-named person belongs to the Indigent Family in this Barangay.
                </p>
                <p> This Certification is being issued upon the request of the interested party in connection
                    with the
                    requirement for whatever legal purpose serves them best.</p>
                <p>Issued this <strong><?php echo date('F'); ?></strong>
                    day of <strong><?php echo date('j, Y '); ?></strong> the Barangay Office, Barangay 188 Tala Caloocan
                    City
                    Philippines
                </p>
            </div>
            <div class="signature-indigency">
                <p><strong>Hon. Ma. Elise Liezel Chan</strong></p>
                <p>Barangay Captain</p>
                <br><br>
                <button class="btn-print" onclick="printContent()">Print</button>
            </div>
        </div>
    </div>



</body>
<script>
function printContent() {
    // Check if the browser is mobile
    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

    // If it's mobile, just initiate print, else initiate print and redirect after a delay
    if (isMobile) {
        window.print();
    } else {
        window.print();
        setTimeout(function() {
            window.location.href = 'appointments.php';
        }, 1000); // Redirect after 1 second (adjust the delay as needed)
    }
}
</script>


</html>