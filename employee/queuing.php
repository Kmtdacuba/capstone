<?php 
    include ('partials/side-nav.php');
?>
<section class="home-section">
    <div class="refresh">
        <a class="icons" href="queuing.php">
            <i class="fa-solid fa-arrows-rotate"></i>
        </a>
    </div>
    <div class="text">Queuing
    </div>
    <br>

    <div class="q text-center">
        <h5 class="h5">Counter Access</h5>
    </div>

    <table class="table-full">
        <tr>
            <th>COUNTER NO.</th>
            <th>QUEUING NUMBER</th>
            <th>STATUS</th>
            <th>ANNOUNCEMENT</th>
        </tr><br>

        <tr>
            <td>1.</td>
            <td>1.</td>
            <td>1.</td>
            <td>1.</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>2.</td>
            <td>2.</td>
            <td>2.</td>
        </tr>

        <tr>
            <td>3.</td>
            <td>3.</td>
            <td>3.</td>
            <td>3.</td>
        </tr>

    </table>

    <div class="counter text-center">
        <h5 class="h5">Timer</h5>
    </div>

    <div class="counter text-center">
        <h5 class="h5">Counter</h5>
    </div>

    <div class="blank text-center">
        <h5 class="h5">Queuing Number</h5>
    </div>
    <br>
    <div class="cb text-center">
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
        <label for="checkbox">All</label>
    </div>
    <div class="cb text-center">
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
        <label for="checkbox">Regular</label>
    </div>
    <div class="cb text-center">
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
        <label for="checkbox">Priority</label>
    </div>

    <table class="table-full">
        <tr>
            <th>QUEUING NUMBER.</th>
            <th>DATE & TIME</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr><br>

        <tr>
            <td>1.</td>
            <td>1.</td>
            <td>1.</td>
            <td>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>" class="btn-fifth">Call</a>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>"
                    class="btn-forth">Recall</a>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>" class="btn-second">Done</a>
            </td>
        </tr>
        <tr>
            <td>2.</td>
            <td>2.</td>
            <td>2.</td>
            <td>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>" class="btn-fifth">Call</a>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>"
                    class="btn-forth">Recall</a>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>" class="btn-second">Done</a>
            </td>
        </tr>

        <tr>
            <td>3.</td>
            <td>3.</td>
            <td>3.</td>
            <td>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>" class="btn-fifth">Call</a>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>"
                    class="btn-forth">Recall</a>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>" class="btn-second">Done</a>
            </td>
        </tr>

        <tr>
            <td>4.</td>
            <td>4.</td>
            <td>4.</td>
            <td>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>" class="btn-fifth">Call</a>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>"
                    class="btn-forth">Recall</a>
                <a href="<?php echo SITEURL; ?>admin/transac-done.php?id=<?php echo $id; ?>" class="btn-second">Done</a>
            </td>
        </tr>
    </table>



</section>
<?php 
    include ('partials/footer.php');
?>