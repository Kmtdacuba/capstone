<?php include('../config/connection.php');
ob_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay 188 Tala Caloocan City</title>
    <style>
    /*CSS for Barangay Certificate*/
    .body-certificate {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container-certificate {
        background: white;
        padding: 20px;
        border: 2px solid black;
        width: 600px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .background-img-certificate {
        position: absolute;
        top: 160px;
        left: 160px;
        width: 300px;
        height: 300px;
        background-image: url('../images/logoo.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 5;
        z-index: 0;
    }

    .header-certificate {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .header-certificate .logo-certificate {
        width: 100px;
        height: 100px;
    }

    .header-certificate .text-certificate {
        text-align: center;
        flex: 1;
        margin: 0 20px;
    }

    .header-certificate h1 {
        margin: 15px 0;
        font-size: 25px;
        text-decoration: underline;
    }

    .header-certificate p {
        margin: 0;
    }

    .content-certificate {
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .content-certificate p {
        margin: 30px;
    }

    .signature-certificate {
        margin-top: 50px;
        text-align: right;
        position: relative;
        z-index: 1;
    }

    /*CSS for Barangay Permit*/
    .body-permit {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .Permit-container {
        background: white;
        padding: 20px;
        border: 2px solid black;
        width: 600px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .background-img {
        position: absolute;
        top: 160px;
        left: 160px;
        width: 300px;
        height: 300px;
        background-image: url('../images/logoo.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 5;
        z-index: 0;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .header .logo {
        width: 100px;
        height: 100px;
    }

    .header .text {
        text-align: center;
        flex: 1;
        margin: 0 20px;
    }

    .header h1 {
        margin: 15px 0;
        font-size: 15px;
    }

    .header p {
        margin: 0;
    }

    .content {
        margin-top: 25px;
        position: relative;
        z-index: 1;
    }

    .content p {
        margin: 30px;
    }

    .signature {
        margin-top: 50px;
        text-align: right;
        position: relative;
        z-index: 1;
    }

    /*CSS for Barangay Indigency*/

    .body-indigency {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .Indigency-container {
        background: white;
        padding: 20px;
        border: 2px solid black;
        width: 600px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .background-img {
        position: absolute;
        top: 100px;
        left: 160px;
        width: 300px;
        height: 300px;
        background-image: url('../images/logoo.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 5;
        z-index: 0;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .header .logo {
        width: 100px;
        height: 100px;
    }

    .header .text {
        text-align: center;
        flex: 1;
        margin: 0 20px;
    }

    .header h1 {
        margin: 15px 0;
        font-size: 25px;
        text-decoration: underline;
    }

    .header p {
        margin: 0;
    }

    .content {
        margin-top: 20px;
        position: relative;
        z-index: 1;
    }

    .content p {
        margin: 15px;
    }

    .signature {
        margin-top: 50px;
        text-align: right;
        position: relative;
        z-index: 1;
    }
    </style>
</head>
<!--BARANGAY CERTIFICATE-->

<body>
    <div class="body-certificate">

        <div class="container-certificate">
            <div class="background-img-certificate"></div>
            <div class="header-certificate">
                <img src="../images/123.png" alt="logo" class="logo-certificate">
                <div class="text-certificate">
                    <p>Republic of the Philippines</p>
                    <p>City of Caloocan</p>
                    <p>OFFICE OF THE CITY MAYOR</p>
                    <h1>Barangay Clearance</h1>
                </div>
                <img src="../images/logo1.jpg" alt="another logo" class="logo-certificate">
            </div>
            <div class="content-certificate">
                <p>TO WHOM IT MAY CONCERN:</p>
                <p>This is to certify that [name], of legal age with postal Address at [address] Zipcode [zipcode] is a
                    bonafide resident for [months/years] and </p>
                <p>he/she has no derogatory record on file of this date. </p>
                <p>Issued this [date] day of [month] 2024 City of Caloocan.</p>
            </div>
            <div class="signature-certificate">
                <p><strong>[Signature]</strong></p>
                <p>Hon. Ma. Elise Liezel Chan</p>
                <p>Barangay Captain</p>
            </div>
        </div>
    </div>

    <!--BARANGAY PERMIT-->
    <div class="body-permit">
        <div class="Permit-container">
            <div class="background-img"></div>
            <div class="header">
                <img src="../images/123.png" alt="logo" class="logo">
                <div class="text">
                    <p>Republic of the Philippines</p>
                    <p>City of Caloocan</p>
                    <p>OFFICE OF THE CITY MAYOR</p>
                    <p>BARANGAY PERMIT</p>
                    <h1>Date</h1>
                </div>
                <img src="../images/logo1.jpg" alt="another logo" class="logo">
            </div>
            <div class="content">
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
            <div class="signature">
                <p><strong>Very Truely yours</strong></p>
                <p>atty.</p>
            </div>
        </div>
    </div>

    <!--BARANGAY INDIGENDY-->
    <div class="body-indigency">
        <div class="Indigency-container">
            <div class="background-img"></div>
            <div class="header">
                <img src="../images/123.png" alt="logo" class="logo">
                <div class="text">
                    <p>Republic of the Philippines</p>
                    <p>City of Caloocan</p>
                    <p>OFFICE OF THE CITY MAYOR</p>
                    <h1>Certificate of Indigency</h1>
                </div>
                <img src="../images/logo1.jpg" alt="another logo" class="logo">
            </div>
            <div class="content">
                <p>TO WHOM IT MAY CONCERN:</p>
                <p> This is to certify that __________________________ of legal age, in a resident </p>
                <p>of __________________________member or indigent person in the barangay. </p>
                <p>Further, certify that the above-named person belongs to the Indigent Family in this Barangay.</p>
                <p> This Certification is being issued upon the request of the interested party in connection with the
                    requirement for whatever legal purpose serves them best.</p>
                <p>Issued this ____ day of __________, at the Barangay Office, Barangay 188 Tala Caloocan City
                    Philippines
                </p>
            </div>
            <div class="signature">
                <p><strong>[Signature]</strong></p>
                <p>Hon. Ma. Elise Liezel Chan</p>
                <p>Barangay Captain</p>
            </div>
        </div>
    </div>
</body>

</html>