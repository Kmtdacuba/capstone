<div id="refreshedArea">Content to be refresh </div>

<script>
document.getElementById("refreshButton").addEventListener("click", function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("refreshedArea").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "http://localhost/capstone/admin/form-1.php", true);
    xhttp.send();
});
</script>