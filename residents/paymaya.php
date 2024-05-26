<?php
include('../config/connection.php');
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
<script>
// Message will disappear after 2 seconds 
setTimeout(function() {
    var errorDiv = document.querySelector('.error');
    if (errorDiv) {
        errorDiv.remove(); // Remove the error message
    }
}, 2000);

setTimeout(function() {
    var errorDiv = document.querySelector('.success');
    if (errorDiv) {
        errorDiv.remove(); // Remove the success message
    }
}, 2000);
</script>


<script>
function limitAmount(field) {
    if (field.value.length > 3) {
        field.value = field.value.slice(0, 3);
    }
}
</script>

<body class="bg">
    <center>

        <div>
            <img src="../images/Logo Name.png" alt="" width=100%>
        </div>
        <div class="login">

            <h1>Payment Process</h1><br>


            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table-size">
                    <tr>
                        <label for="image" style="text-align: left; display: block;">Proof of paymanet:</label>
                        <input class="input-responsive" type="file" id="image" name="image" required><br>

                    </tr>
                    <tr>
                        <label for="reference" style="text-align: left; display: block;">Reference Number:</label>
                        <input class="input-responsive" type="text" id="reference" name="reference"
                            placeholder="Enter reference number" required><br>
                    </tr>

                    <tr>
                        <label for="amount" style="text-align: left; display: block;">Exact Amount:</label>
                        <input class="input-responsive" type="number" id="amount" name="amount"
                            oninput="limitAmount(this)" maxlength="3" placeholder="Enter exact amount" required><br>
                    </tr>

                    <br>
                    <button name="submit" id="submit" class="btn-second">Continue</button>
                    </tr>
                </table>
            </form>
        </div>
    </center>

</body>

</html>
<?php
    if(isset($_POST['submit'])) {

        // Get data from form
        $amount = $_POST['amount'];
        $reference = $_POST['reference'];
        $currentDateTime = date("Ymd-His");
        
         //Upload the image
       if(isset($_FILES['image']['name'])) {
        $img_name = $_FILES['image']['name'];
    
        // Extract the file extension
        $ext = end(explode('.', $img_name));
    
        $img_name = "Reference-Img-" . $currentDateTime . "." . $ext;
    
        // Temporary location of the uploaded image
        $src = $_FILES['image']['tmp_name'];
    
        // Destination directory where the image will be moved
        $dst = "../images/reference/" . $img_name;
    
        // Move the uploaded image to the destination directory
        $upload = move_uploaded_file($src, $dst);
    
        // Check if the image was uploaded successfully
        if($upload == false) {
            $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
            header('location:' . SITEURL . "residents/paymaya.php");
            die(); // Stop execution if upload fails
        }
    } else {
        $img_name = ""; // Set img_name to empty if no image is selected
    }


             // Sql query to serve the data into database
        $sql = "INSERT INTO tbl_payment SET
        img_name = '$img_name',
        amount = '$amount',
        reference = '$reference'
    ";
    // EXECUTE QUERY AND SAVE DATA IN DATABASE
   $res = mysqli_query($conn, $sql) or die(mysqli_error());

   // check if data is inserted or not and display message;

   if($res == TRUE){
    // data inserted
    // variable to display message;
    $_SESSION['appointment']="<div class='success'> &nbsp; Appointment and Payment Process Successful</div>";
    header("Location:".SITEURL.'residents/summary.php');
    exit();
   }
   else{
    // data not inserted
    $_SESSION['appointment'] = " <div class='error'> &nbsp; Please try to submit again </div>";
    header("location:".SITEURL.'residents/paymaya.php');
    exit();
   }
}   
?>