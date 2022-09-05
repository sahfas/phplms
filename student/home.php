<?php
include "header.php";
$link=mysqli_connect("localhost","root","","lms");
mysqli_query($link, "UPDATE messages SET read_message='y' 
WHERE rusername='$_SESSION[username]' ");
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Home</h3>
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
                                <h2>Lent Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <?php

                            $link = mysqli_connect("localhost", "root", "", "lms");
                            $res=mysqli_query($link, "SELECT students_indexno, students_username, books_isbn
                            , books_name, books_author_name, books_publication_name, status, lending_date, return_date
                            FROM lending_books WHERE students_username='$_SESSION[username]' ");

                            echo "<table class= 'table table-bordered'>";
                            echo "<tr>";
                            echo "<th>"; echo"ISBN"; echo"</th>";
                            echo "<th>"; echo"Book Name"; echo"</th>";
                            echo "<th>"; echo"Author Name"; echo"</th>";
                            echo "<th>"; echo"Publication Name"; echo"</th>";
                            echo "<th>"; echo"Index Number"; echo"</th>";
                            echo "<th>"; echo"Username"; echo"</th>";
                            echo "<th>"; echo"Status"; echo"</th>";
                            echo "<th>"; echo"Lending Date"; echo"</th>";
                            echo "<th>"; echo"Return Date"; echo"</th>";
                            echo "</tr>";

                            if ($res->num_rows > 0) {
                                // output data of each row
                                while($row = $res->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>"; echo $row["books_isbn"]; echo"</td>";
                                echo "<td>"; echo $row["books_name"]; echo"</td>";
                                echo "<td>"; echo $row["books_author_name"]; echo"</td>";
                                echo "<td>"; echo $row["books_publication_name"]; echo"</td>";
                                echo "<td>"; echo $row["students_indexno"]; echo"</td>";
                                echo "<td>"; echo $row["students_username"]; echo"</td>";
                                echo "<td>"; echo $row["status"]; echo"</td>";
                                echo "<td>"; echo $row["lending_date"]; echo"</td>";
                                echo "<td>"; echo $row["return_date"]; echo"</td>";
                                echo "</tr>";
                                }
                                echo "</table>";
                                } else {
                                echo "0 results";
                                }

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