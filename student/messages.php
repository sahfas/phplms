<?php
include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Messages</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Messages From Librarian</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <table class="table table-bordered">
                                <tr>
                                <th>Librarian Name</th>
                                <th>Title</th>
                                <th>Message</th>
                                </tr>
                                <?php
                                $link=mysqli_connect("localhost","root","","lms");
                                $res=mysqli_query($link, "SELECT * FROM messages WHERE 
                                rusername='$_SESSION[username]' ORDER BY id DESC ");
                                while ($row=mysqli_fetch_array($res)){
                                    $res1=mysqli_query($link, "SELECT * FROM librarians WHERE 
                                    username='$row[susername]' ");
                                    while ($row1=mysqli_fetch_array($res1)){
                                        $librarianname=$row1["firstname"]." ".$row1["lastname"];
                                }
                                    echo"<tr>";
                                    echo"<td>"; echo $librarianname; echo"</td>";
                                    echo"<td>"; echo $row["title"]; echo"</td>";
                                    echo"<td>"; echo $row["message"]; echo"</td>";
                                    echo"</tr>";

                                }
                                ?>
                            </table>
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