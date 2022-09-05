<?php
include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <!-- <h3>Send Message</h3> -->
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
                                <h2>Send Message</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <select name="duser" class="form-control pull-top">
                                                <?php
                                                $link = mysqli_connect("localhost", "root", "", "lms");
                                                $res=mysqli_query($link, "SELECT * FROM students");
                                                while($row=mysqli_fetch_array($res)){
                                                    ?><option value="<?php echo $row["username"]?>">
                                                        <?php echo $row["username"]."(".$row["indexno"].")";?>
                                                    </option><?php
                                                }
                                                ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Tiltle" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <textarea name=message class="form-control" placeholder="Enter Message" required></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit1" class="form-control" value="Send Message" required>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <?php
        if (isset($_POST["submit1"])) {
            mysqli_query($link,"INSERT INTO messages values('','$_SESSION[username]'
            ,'$_POST[duser]','$_POST[title]','$_POST[message]','n')");

            ?>
            <script type="text/javascript" >
                alert("Message Sent");
            </script>
            <?php
        }
        ?>

<?php
include "footer.php";
?>


        
