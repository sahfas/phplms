<?php
include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Books</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <form name="form1" action="" method="post">
                            <div class="input-group">
                                <input type="text" name="text1" class="form-control" placeholder="Books">
                                <span class="input-group-btn">
                                <button class="btn btn-default"  name="button1" type="submit">Search</button>
                                </span>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Books List</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php

                                if(isset($_POST["button1"])){

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
    
                                    $sql = "SELECT id, isbn, name, image, author_name, publication_name, price, 
                                    quantity, available_quantity, purchase_date, librarians_name FROM books
                                    WHERE name like ('%$_POST[text1]%')";
                                    $result = $conn->query($sql);
                                    echo "<table class= 'table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo"Image"; echo"</th>";
                                    echo "<th>"; echo"ISBN"; echo"</th>";
                                    echo "<th>"; echo"Book Name"; echo"</th>";
                                    echo "<th>"; echo"Author Name"; echo"</th>";
                                    echo "<th>"; echo"Publication Name"; echo"</th>";
                                    echo "<th>"; echo"Price"; echo"</th>";
                                    echo "<th>"; echo"Quantity"; echo"</th>";
                                    echo "<th>"; echo"Available Quantity"; echo"</th>";
                                    echo "<th>"; echo"Purchase Date"; echo"</th>";
                                    echo "<th>"; echo"Librarian Name"; echo"</th>";
                                    echo "<th>"; echo"Delete Books"; echo"</th>";
                                    echo "</tr>";
    
                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>"; ?><img src="data:image/jpg;charset=utf8;base64,
                                    <?php echo base64_encode($row['image']); ?>"  
                                    class='img-rounded' alt='Cinque Terre'><?php echo"</td>";
                                    echo "<td>"; echo $row["isbn"]; echo"</td>";
                                    echo "<td>"; echo $row["name"]; echo"</td>";
                                    echo "<td>"; echo $row["author_name"]; echo"</td>";
                                    echo "<td>"; echo $row["publication_name"]; echo"</td>";
                                    echo "<td>"; echo $row["price"]; echo"</td>";
                                    echo "<td>"; echo $row["quantity"]; echo"</td>";
                                    echo "<td>"; echo $row["available_quantity"]; echo"</td>";
                                    echo "<td>"; echo $row["purchase_date"]; echo"</td>";
                                    echo "<td>"; echo $row["librarians_name"]; echo"</td>";
                                    echo "<td>";
                                    ?> <a href="delete_books.php?id=<?php echo $row["id"];?>" style="color:red">Delete</a><?php
                                    echo"</td>";
                                    echo "</tr>";
                                    }
                                    echo "</table>";
                                    } else {
                                    echo "0 results";
                                    }
                                    $conn->close();

                                }else{

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

                                $sql = "SELECT id, isbn, name, image, author_name, publication_name, price, 
                                quantity, available_quantity, purchase_date, librarians_name FROM books";
                                $result = $conn->query($sql);
                                echo "<table class= 'table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo"Image"; echo"</th>";
                                echo "<th>"; echo"ISBN"; echo"</th>";
                                echo "<th>"; echo"Book Name"; echo"</th>";
                                echo "<th>"; echo"Author Name"; echo"</th>";
                                echo "<th>"; echo"Publication Name"; echo"</th>";
                                echo "<th>"; echo"Price"; echo"</th>";
                                echo "<th>"; echo"Quantity"; echo"</th>";
                                echo "<th>"; echo"Available Quantity"; echo"</th>";
                                echo "<th>"; echo"Purchase Date"; echo"</th>";
                                echo "<th>"; echo"Librarian Name"; echo"</th>";
                                echo "<th>"; echo"Delete Books"; echo"</th>";
                                echo "</tr>";

                                if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>"; ?><img src="data:image/jpg;charset=utf8;base64,
                                <?php echo base64_encode($row['image']); ?>" /><?php echo"</td>";
                                echo "<td>"; echo $row["isbn"]; echo"</td>";
                                echo "<td>"; echo $row["name"]; echo"</td>";
                                echo "<td>"; echo $row["author_name"]; echo"</td>";
                                echo "<td>"; echo $row["publication_name"]; echo"</td>";
                                echo "<td>"; echo $row["price"]; echo"</td>";
                                echo "<td>"; echo $row["quantity"]; echo"</td>";
                                echo "<td>"; echo $row["available_quantity"]; echo"</td>";
                                echo "<td>"; echo $row["purchase_date"]; echo"</td>";
                                echo "<td>"; echo $row["librarians_name"]; echo"</td>";
                                echo "<td>";
                                ?> <a href="delete_books.php?id=<?php echo $row["id"];?>" style="color:red">Delete</a><?php
                                echo"</td>";
                                echo "</tr>";
                                }
                                echo "</table>";
                                } else {
                                echo "0 results";
                                }
                                $conn->close();
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
        <!-- /page content -->

<?php
include "footer.php";
?>