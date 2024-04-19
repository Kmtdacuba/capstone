<?php 
    include ('partials/side-nav.php');
?>
<section class="home-section">
    <div class="text">Requirements</div>
    <br><br>

    <!-- Button to trigger modal Barangay Certificate-->
    <button class="requirement text-center" id="BtnCertificate">Barangay Certificate</button>

    <!-- The Modal -->
    <div id="InfoCertificate" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close1">&times;</span>
            <h6 class="text-center">Requirements for Barangay Certificate</h6><br>
            <hr><br>
            <b>
                <p>Valid ID (indicates your identity and address) such us:</p>
            </b><br>
            <p>- Barangay ID</p>
            <p>- Government ID</p>
            <p>- School ID</p>
            <p>- Company ID</p><br>
            <center><a href="requirements.php" class="btn-ok">OK</a></center>
        </div>
    </div>

    <!-- Script to handle modal functionality -->
    <script>
    // Get the modal
    var modal1 = document.getElementById('InfoCertificate');

    // Get the button that opens the modal
    var btn1 = document.getElementById("BtnCertificate");

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


    <!-- Button to trigger modal Barangay Indigency-->
    <button class="requirement text-center" id="BtnIndigency">Barangay Indigency</button>

    <!-- The Modal -->
    <div id="InfoIndigency" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close2">&times;</span>
            <h6 class="text-center">Requirements for Barangay Indigency</h6><br>
            <hr><br>
            <b>
                <p>Valid ID (indicates your identity and address) such us:</p>
            </b><br>
            <p>- Barangay ID</p>
            <p>- Government ID</p>
            <p>- School ID</p>
            <p>- Company ID</p><br>
            <center><a href="requirements.php" class="btn-ok">OK</a></center>
        </div>
    </div>

    <!-- Script to handle modal functionality -->
    <script>
    // Get the modal
    var modal2 = document.getElementById('InfoIndigency');

    // Get the button that opens the modal
    var btn2 = document.getElementById("BtnIndigency");

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

    <!-- Button to trigger modal Barangay Clearance-->
    <button class="requirement text-center" id="BtnClearance">Barangay Clearance</button>

    <!-- The Modal -->
    <div id="InfoClearance" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close3">&times;</span>
            <h6 class="text-center">Requirements for Barangay Clearance</h6><br>
            <hr><br>
            <b>
                <p>Valid ID (indicates your identity and address) such us:</p>
            </b><br>
            <p>- Barangay ID</p>
            <p>- Government ID</p>
            <p>- School ID</p>
            <p>- Company ID</p><br>
            <center><a href="requirements.php" class="btn-ok">OK</a></center>
        </div>
    </div>

    <!-- Script to handle modal functionality -->
    <script>
    // Get the modal
    var modal3 = document.getElementById('InfoClearance');

    // Get the button that opens the modal
    var btn3 = document.getElementById("BtnClearance");

    // Get the <span> element that closes the modal
    var span3 = document.getElementsByClassName("close3")[0];

    // When the user clicks the button, open the modal 
    btn3.onclick = function() {
        modal3.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span3.onclick = function() {
        modal3.style.display = "none";
    }
    </script>

    <!-- Button to trigger modal Barangay Business Permit-->
    <button class="requirement text-center" id="BtnPermit">Barangay Business Permit</button>

    <!-- The Modal -->
    <div id="InfoPermit" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close4">&times;</span>
            <h6 class="text-center">Requirements for Barangay Business Permit</h6><br>
            <hr><br>
            <b>
                <p>Valid ID (indicates your identity and address) such us:</p>
            </b><br>
            <p>- Barangay ID</p>
            <p>- Government ID</p>
            <p>- School ID</p>
            <p>- Company ID</p><br>
            <center><a href="requirements.php" class="btn-ok">OK</a></center>
        </div>
    </div>

    <!-- Script to handle modal functionality -->
    <script>
    // Get the modal
    var modal4 = document.getElementById('InfoPermit');

    // Get the button that opens the modal
    var btn4 = document.getElementById("BtnPermit");

    // Get the <span> element that closes the modal
    var span4 = document.getElementsByClassName("close4")[0];

    // When the user clicks the button, open the modal 
    btn4.onclick = function() {
        modal4.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span4.onclick = function() {
        modal4.style.display = "none";
    }
    </script>

    <!-- Button to trigger modal Barangay  Facilities & Properties-->
    <button class="requirement text-center" id="BtnFP">Barangay Facilities & Properties</button>

    <!-- The Modal -->
    <div id="InfoFP" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close5">&times;</span>
            <h6 class="text-center">Requirements for Barangay Facilities & Properties</h6><br>
            <hr><br>
            <b>
                <p>Valid ID (indicates your identity and address) such us:</p>
            </b><br>
            <p>- Barangay ID</p>
            <p>- Government ID</p>
            <p>- School ID</p>
            <p>- Company ID</p><br>
            <center><a href="requirements.php" class="btn-ok">OK</a></center>
        </div>
    </div>

    <!-- Script to handle modal functionality -->
    <script>
    // Get the modal
    var modal5 = document.getElementById('InfoFP');

    // Get the button that opens the modal
    var btn5 = document.getElementById("BtnFP");

    // Get the <span> element that closes the modal
    var span5 = document.getElementsByClassName("close5")[0];

    // When the user clicks the button, open the modal 
    btn5.onclick = function() {
        modal5.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span5.onclick = function() {
        modal5.style.display = "none";
    }
    </script>

    <!-- Button to trigger modal Barangay  Identification Card-->
    <button class="requirement text-center" id="BtnID">Barangay Identification Card</button>

    <!-- The Modal -->
    <div id="InfoID" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close6">&times;</span>
            <h6 class="text-center">Requirements for Barangay Identification Card</h6><br>
            <hr><br>
            <b>
                <p>Valid ID (indicates your identity and address) such us:</p>
            </b><br>
            <p>- Barangay ID</p>
            <p>- Government ID</p>
            <p>- School ID</p>
            <p>- Company ID</p><br>
            <center><a href="requirements.php" class="btn-ok">OK</a></center>
        </div>
    </div>

    <!-- Script to handle modal functionality -->
    <script>
    // Get the modal
    var modal6 = document.getElementById('InfoID');

    // Get the button that opens the modal
    var btn6 = document.getElementById("BtnID");

    // Get the <span> element that closes the modal
    var span6 = document.getElementsByClassName("close6")[0];

    // When the user clicks the button, open the modal 
    btn6.onclick = function() {
        modal6.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span6.onclick = function() {
        modal6.style.display = "none";
    }
    </script>

    <!-- Button to trigger modal Barangay  Data & Similar Documents-->
    <button class="requirement text-center" id="BtnData">Barangay Data & Similar Documents</button>

    <!-- The Modal -->
    <div id="InfoData" class=" modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close7">&times;</span>
            <h6 class="text-center">Requirements for Barangay Data & Similar Documents</h6><br>
            <hr><br>
            <b>
                <p>Valid ID (indicates your identity and address) such us:</p>
            </b><br>
            <p>- Barangay ID</p>
            <p>- Government ID</p>
            <p>- School ID</p>
            <p>- Company ID</p><br>
            <center><a href="requirements.php" class="btn-ok">OK</a></center>
        </div>
    </div>

    <!-- Script to handle modal functionality -->
    <script>
    // Get the modal
    var modal7 = document.getElementById('InfoData');

    // Get the button that opens the modal
    var btn7 = document.getElementById("BtnData");

    // Get the <span> element that closes the modal
    var span7 = document.getElementsByClassName("close7")[0];

    // When the user clicks the button, open the modal 
    btn7.onclick = function() {
        modal7.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span7.onclick = function() {
        modal7.style.display = "none";
    }
    </script>

    <!-- Button to trigger modal Barangay Other Services-->
    <button class="requirement text-center" id="BtnOther">Barangay Other Services</button>

    <!-- The Modal -->
    <div id="InfoOther" class=" modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close8">&times;</span>
            <h6 class="text-center">Requirements for Barangay Other Services</h6><br>
            <hr><br>
            <b>
                <p>Valid ID (indicates your identity and address) such us:</p>
            </b><br>
            <p>- Barangay ID</p>
            <p>- Government ID</p>
            <p>- School ID</p>
            <p>- Company ID</p><br>
            <center><a href="requirements.php" class="btn-ok">OK</a></center>
        </div>
    </div>

    <!-- Script to handle modal functionality -->
    <script>
    // Get the modal
    var modal8 = document.getElementById('InfoOther');

    // Get the button that opens the modal
    var btn8 = document.getElementById("BtnOther");

    // Get the <span> element that closes the modal
    var span8 = document.getElementsByClassName("close8")[0];

    // When the user clicks the button, open the modal 
    btn8.onclick = function() {
        modal8.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span8.onclick = function() {
        modal8.style.display = "none";
    }
    </script>



</section>
<?php 
    include ('partials/footer.php');
?>