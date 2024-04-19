<?php 
    include ('partials/side-nav.php');

?>
<section class="home-section">
    <div class="text">Dashboard</div>
    <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add']; // display session message
                    unset($_SESSION['add']); // remove session message
                }

        ?>
</section>
<?php 
    include ('partials/footer.php');
?>