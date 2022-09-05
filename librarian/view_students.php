<?php
include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Students</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                                </span> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>All Students</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "lms";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT id, firstname, lastname, username, password, email, contact,
                            semister, indexno, status FROM students";
                            $result = $conn->query($sql);
                            echo "<table class= 'table table-bordered'>";
                            echo "<tr>";
                            echo "<th>"; echo"First Name"; echo"</th>";
                            echo "<th>"; echo"Last Name"; echo"</th>";
                            echo "<th>"; echo"User Name"; echo"</th>";
                            // echo "<th>"; echo"Password"; echo"</th>";
                            echo "<th>"; echo"Email"; echo"</th>";
                            echo "<th>"; echo"Contact"; echo"</th>";
                            echo "<th>"; echo"Semister"; echo"</th>";
                            echo "<th>"; echo"Index Number"; echo"</th>";
                            echo "<th>"; echo"Status"; echo"</th>";
                            echo "<th>"; echo"Activate"; echo"</th>";
                            echo "<th>"; echo"Deactivate"; echo"</th>";
                            echo "</tr>";

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>"; echo $row["firstname"]; echo"</td>";
                            echo "<td>"; echo $row["lastname"]; echo"</td>";
                            echo "<td>"; echo $row["username"]; echo"</td>";
                            // echo "<td>"; echo $row["password"]; echo"</td>";
                            echo "<td>"; echo $row["email"]; echo"</td>";
                            echo "<td>"; echo $row["contact"]; echo"</td>";
                            echo "<td>"; echo $row["semister"]; echo"</td>";
                            echo "<td>"; echo $row["indexno"]; echo"</td>";
                            echo "<td>"; echo $row["status"]; echo"</td>";
                            echo "<td>"; ?> <a href="activate.php?id=<?php echo $row["id"];?>">Activate</a> <?php echo "</td>";
                            echo "<td>"; ?> <a href="deactivate.php?id=<?php echo $row["id"];?>">Deactivate</a> <?php echo "</td>";
                            echo "</tr>";
                            }
                            echo "</table>";
                            } else {
                            echo "0 results";
                            }
                            $conn->close();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php";
?>


        
