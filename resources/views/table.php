<! DOCTYPE HTML>

<html>
    <head>

        <style type="text/css" title="currentStyle">

        </style>
        <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>

    </head>

    <body> 
        <?php
        $con = mysqli_connect("localhost", "root", "", "stock_bae");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con, "SELECT * FROM client");
        ?>


        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Password</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Account No.</th>
                    <th>National Insurance No.</th>
                    <th>Contact No.</th>
                    <th>Networth</th>
                    <th>Recent Activity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $connect = mysql_connect("localhost", "root", "");
                if (!$connect) {
                    die(mysql_error());
                }
                mysql_select_db("stock_bae");
                $results = mysql_query("SELECT * FROM client ");
                while ($row = mysql_fetch_array($results)) {
                    $id = $row['c_id'];
                    ?>
                    <tr>
                        <td><?php echo $row['c_id'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['dob'] ?></td>
                        <td><?php echo $row['account_no'] ?></td>
                        <td><?php echo $row['ni_no'] ?></td>
                        <td><?php echo $row['contact_no'] ?></td>
                        <td><?php echo $row['networth'] ?></td>
                        <td><?php echo $row['recent_activity'] ?></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
            <tfoot>
            <tr>
                <th>User ID</th>
                <th>Password</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Account No.</th>
                <th>National Insurance No.</th>
                <th>Contact No.</th>
                <th>Networth</th>
                <th>Recent Activity</th>
            </tr>
            </tfoot>
        </table>
        <a href='#'> <input type='submit' value =" get followers" /></a>
        
    </body>
</html>