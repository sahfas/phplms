<?php
include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Return Books</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <!-- <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Lent Books List</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <select name="indx" class="form-control">
                                            <?php
                                            $link = mysqli_connect("localhost", "root", "", "lms");
                                            $res=mysqli_query($link, "SELECT students_indexno FROM lending_books
                                            WHERE return_date ='' ");
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>"; echo $row["students_indexno"]; echo "</option>";
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="submit" name="submit1" value="search" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="bknm" class="form-control">
                                            <?php
                                            $link = mysqli_connect("localhost", "root", "", "lms");
                                            $res=mysqli_query($link, "SELECT books_name FROM lending_books
                                            WHERE return_date ='' ");
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>"; echo $row["books_name"]; echo "</option>";
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="submit" name="submit2" value="search" class="form-control">
                                        </td>
                                    </tr>
                                    
                                </table>
                            </form>
                            <?php
                            if(isset($_POST["submit1"])){
                                $res=mysqli_query($link, "SELECT * FROM lending_books
                                WHERE students_indexno ='$_POST[indx]' ");
                                echo "<table class= 'table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo"ISBN"; echo"</th>";
                                echo "<th>"; echo"Book Name"; echo"</th>";
                                echo "<th>"; echo"Author Name"; echo"</th>";
                                echo "<th>"; echo"Students Name"; echo"</th>";
                                echo "<th>"; echo"Index Number"; echo"</th>";
                                echo "<th>"; echo"Username"; echo"</th>";
                                echo "<th>"; echo"Lending Date"; echo"</th>";
                                echo "<th>"; echo"Status"; echo"</th>";
                                echo "<th>"; echo"Return Book"; echo"</th>";
                                echo "</tr>";
                                while($row=mysqli_fetch_array($res)){
                                    echo "<tr>";
                                    echo "<td>"; echo $row["books_isbn"]; echo"</td>";
                                    echo "<td>"; echo $row["books_name"]; echo"</td>";
                                    echo "<td>"; echo $row["books_author_name"]; echo"</td>";
                                    echo "<td>"; echo $row["students_name"]; echo"</td>";
                                    echo "<td>"; echo $row["students_indexno"]; echo"</td>";
                                    echo "<td>"; echo $row["students_username"]; echo"</td>";
                                    echo "<td>"; echo $row["lending_date"]; echo"</td>";
                                    echo "<td>"; echo $row["status"]; echo"</td>";
                                    echo "<td>";
                                    ?> <a href="return.php?id=<?php echo $row["id"]; ?>">Return Book</a> <?php
                                    echo"</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }else {
                                if(isset($_POST["submit2"])){
                                    $res=mysqli_query($link, "SELECT * FROM lending_books
                                    WHERE books_name ='$_POST[bknm]' ");
                                    echo "<table class= 'table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo"ISBN"; echo"</th>";
                                    echo "<th>"; echo"Book Name"; echo"</th>";
                                    echo "<th>"; echo"Author Name"; echo"</th>";
                                    echo "<th>"; echo"Students Name"; echo"</th>";
                                    echo "<th>"; echo"Index Number"; echo"</th>";
                                    echo "<th>"; echo"Username"; echo"</th>";
                                    echo "<th>"; echo"Lending Date"; echo"</th>";
                                    echo "<th>"; echo"Status"; echo"</th>";
                                    echo "<th>"; echo"Return Book"; echo"</th>";
                                    echo "</tr>";
                                    while($row=mysqli_fetch_array($res)){
                                        echo "<tr>";
                                        echo "<td>"; echo $row["books_isbn"]; echo"</td>";
                                        echo "<td>"; echo $row["books_name"]; echo"</td>";
                                        echo "<td>"; echo $row["books_author_name"]; echo"</td>";
                                        echo "<td>"; echo $row["students_name"]; echo"</td>";
                                        echo "<td>"; echo $row["students_indexno"]; echo"</td>";
                                        echo "<td>"; echo $row["students_username"]; echo"</td>";
                                        echo "<td>"; echo $row["lending_date"]; echo"</td>";
                                        echo "<td>"; echo $row["status"]; echo"</td>";
                                        echo "<td>";
                                        ?> <a href="return.php?id=<?php echo $row["id"]; ?>">Return Book</a> <?php
                                        echo"</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                }
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