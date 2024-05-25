<?php
include('../config/connection.php');
$user_id = $_SESSION['user_id'];
ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay 188 Tala Caloocan City</title>
    <link rel="icon" type="image/png" href="../favicon.png">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/4a6db1b6a3.js" crossorigin="anonymous"></script>
</head>

<body class="bg">
    <center>
        <div>
            <img src="../images/Logo Name.png" alt="" width=100%>
        </div>
        <div class="content-payment">


            <h1>Choose Payment</h1><br><br>

            <a href="summary.php">
                <div class="payment text-center">
                    <h4>CASH</h4>
                </div>
            </a>

            <!-- Button to trigger modal Gcash-->
            <button class="payment text-center" id="BtnGcash">GCASH PAYMENT</button>

            <!-- The Modal -->
            <div id="InfoGcash" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close1">&times;</span>
                    <h6 class="text-center">Scan Using Gcash</h6><br>
                    <hr><br>
                    <b>
                        <img src="../images/gcash.jpg" alt="" width=70%>
                        <p id="phone-number" class="copy-button">+639358019043</p>
                        <script>
                        document.getElementById('phone-number').addEventListener('click', function() {
                            const phoneNumber = this.innerText;
                            const tempInput = document.createElement('input');
                            tempInput.value = phoneNumber;
                            document.body.appendChild(tempInput);
                            tempInput.select();
                            document.execCommand('copy');
                            document.body.removeChild(tempInput);
                            alert('Phone number copied to clipboard: ' + phoneNumber);
                        });
                        </script>
                    </b><br>

                    <center><a href="gcash.php" class="btn-ok">OK</a></center>
                </div>
            </div>

            <!-- Script to handle modal functionality -->
            <script>
            // Get the modal
            var modal1 = document.getElementById('InfoGcash');

            // Get the button that opens the modal
            var btn1 = document.getElementById("BtnGcash");

            // Get the <span> element that closes the modal
            var span1 = document.getElementsByClassName("close1")[0];

            // When the user clicks the button, open the modal 
            btn1.onclick = function() {
                modal1.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span1.onclick = function() {
                modal1.style.display = "none";
            }
            </script>
            <!-- Button to trigger modal Paymaya-->
            <button class="payment text-center" id="BtnPaymaya">PAYMAYA PAYMENT</button>

            <!-- The Modal -->
            <div id="InfoPaymaya" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close2">&times;</span>
                    <h6 class="text-center">Scan Using Gcash</h6><br>
                    <hr><br>
                    <b>
                        <img src="../images/paymaya.jpg" alt="" width=70%>
                        <p id="phone-number" class="copy-button">+639358019043</p>
                        <script>
                        document.getElementById('phone-number').addEventListener('click', function() {
                            const phoneNumber = this.innerText;
                            const tempInput = document.createElement('input');
                            tempInput.value = phoneNumber;
                            document.body.appendChild(tempInput);
                            tempInput.select();
                            document.execCommand('copy');
                            document.body.removeChild(tempInput);
                            alert('Phone number copied to clipboard: ' + phoneNumber);
                        });
                        </script>
                    </b><br>

                    <center><a href="gcash.php" class="btn-ok">OK</a></center>
                </div>
            </div>

            <!-- Script to handle modal functionality -->
            <script>
            // Get the modal
            var modal2 = document.getElementById('InfoPaymaya');

            // Get the button that opens the modal
            var btn2 = document.getElementById("BtnPaymaya");

            // Get the <span> element that closes the modal
            var span2 = document.getElementsByClassName("close2")[0];

            // When the user clicks the button, open the modal 
            btn2.onclick = function() {
                modal2.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span2.onclick = function() {
                modal2.style.display = "none";
            }
            </script>
        </div>




    </center>



</body>

</html>