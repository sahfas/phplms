<?php
include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add Books</h3>
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
                                <h2>Enter Book Details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                    <tr>
                                        <td> <input type="number" class="form-control" placeholder="ISBN" name="isbn" required="" minlength="13" maxlength="13" ></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" placeholder="Book Name" name="name" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Book Image<input type="file" class="form-control" name="image1" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" placeholder="Book Author Name" name="author_name" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" placeholder="Book Publication Name" name="publication_name" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" placeholder="Book Price" name="price" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" placeholder="Book Quantity" name="quantity" required=""></td>
                                    </tr>
                                    <!-- <tr>
                                        <td> <input type="text" class="form-control" placeholder="Available Quantity" name="available_quantity" required=""></td>
                                    </tr> -->
                                    <tr>
                                        <td> <input type="date" class="form-control" placeholder="Purchase Date" name="purchase_date" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $_SESSION['username'] ?>" placeholder="Librarian Name" name="librarian_name" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input class="btn btn-default submit " type="submit" name="submit2" value="Register"></td>
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
            if (isset($_POST["submit2"])){
                /* Attempt MySQL server connection. Assuming you are running MySQL
                server with default setting (user 'root' with no password) */
                $link = mysqli_connect("localhost", "root", "", "lms");
                
                $filename = basename($_FILES["image1"]["name"]); 
                $fileType = pathinfo($filename, PATHINFO_EXTENSION);
                $tempname = $_FILES["image1"]["tmp_name"];
                $image = $_FILES['image1']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image));
                // $filename = $_FILES["image1"]["name"];
                // $tempname = $_FILES["image1"]["tmp_name"];
                // $folder = "./books_image/" . $filename;
                // move_uploaded_file($tempname,$folder);
                
                // Attempt insert query execution
                $sql = "INSERT INTO books (isbn, name, image, author_name, publication_name, price, quantity, 
                available_quantity, purchase_date , librarians_name)
                VALUES ('$_POST[isbn]','$_POST[name]', '$imgContent', '$_POST[author_name]','$_POST[publication_name]'
                ,'$_POST[price]','$_POST[quantity]','$_POST[quantity]','$_POST[purchase_date]','$_SESSION[username]')";
                if(mysqli_query($link, $sql)){
                    ?>
                    <div class="alert alert-success col-lg-6 col-lg-push-3">
                        Books Registration successful
                    </div>
                    <?php
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                
                // Close connection
                mysqli_close($link);
            }
        ?> 

<?php
include "footer.php";
?>


        
