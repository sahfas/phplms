<?php
include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Edit Books</h3>
                    </div>
                    <form name="form1" action="" method="post">
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" name="txt1" class="form-control" placeholder="Book Name">
                                <span class="input-group-btn">
                                <button class="btn btn-default" name="button1" type="submit">Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Edit Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <?php

                                if(isset($_POST["button1"])){
                                    $link = mysqli_connect("localhost", "root", "", "lms");
                                    $res=mysqli_query($link,"SELECT * FROM books WHERE 
                                    name like('%$_POST[txt1]%')");
                                    $res1=mysqli_query($link,"SELECT * FROM books WHERE 
                                    name like('%$_POST[txt1]%')");
                                    while($row=mysqli_fetch_array($res)){
                                            if(empty($_POST["txt1"])){
                                                ?> 
                                                <script type="text/javascript">
                                                    alert("Book Name Empty");
                                                    window.location="edit_books.php";
                                                </script>
                                                <?php
                                            }else{
                                                while ($row1=mysqli_fetch_array($res1)) {
                                                    $isbn=$row1["isbn"];
                                                    $name=$row1["name"];
                                                    $oldname=$row1["name"];
                                                    $image=$row1["image"];
                                                    $author=$row1["author_name"];
                                                    $publication=$row1["publication_name"];
                                                    $price=$row1["price"];
                                                    $availablequantity=$row1["available_quantity"];
                                                    $edited=$row1["edited_date"];
                                                    $_SESSION["oldname"]=$oldname;
                                                }
                                            }
                                        
                                            $isbn=$row["isbn"];
                                            $name=$row["name"];
                                            $oldname=$row["name"];
                                            $image=$row["image"];
                                            $author=$row["author_name"];
                                            $publication=$row["publication_name"];
                                            $price=$row["price"];
                                            $availablequantity=$row["available_quantity"];
                                            $edited=$row["edited_date"];
                                            $_SESSION["oldname"]=$oldname;
                                            $_SESSION["name"]=$name;
                                    }
                                    if ($oldname==$_SESSION["oldname"]) {
                                        ?>
                                        <table class="table table-bordered">
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $isbn ?>" placeholder="ISBN" name="isbn" required="" ></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $oldname ?>" placeholder="Book Name" name="oldname" disabled></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $name ?>" placeholder="Book Name" name="name" required=""></td>
                                    </tr>
                                    <tr>
                                    <td>Book Image<input type="file" class="form-control" name="image1" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $author ?>" placeholder="Author Name" name="author" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $publication ?>" placeholder="Publication Name" name="publication" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $price ?>" placeholder="Price" name="price" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="number" class="form-control" value="<?php echo $availablequantity ?>" placeholder="Available Quantity" name="available" required="" ></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="date" class="form-control" value="<?php echo $edited ?>" placeholder="Edited Date" name="edited" required="" ></td>
                                    </tr>
                                    <tr>
                                        <td> <input class="btn btn-default submit " type="submit" name="submit1" value="Submit Details"></td>
                                    </tr>
                                    </table>
                                        <?php
                                    }else{
                                        ?>
                                        <script type="text/javascript">
                                            alert("Book Not Available");
                                            window.location.href=window.location.href;
                                        </script>
                                        <?php
                                    }
                                    
                                }
                            ?>
                            </form>
                            

                            <?php

                            

                            if(isset($_POST["submit1"])){
                                $filename = basename($_FILES["image1"]["name"]); 
                                $fileType = pathinfo($filename, PATHINFO_EXTENSION);
                                $tempname = $_FILES["image1"]["tmp_name"];
                                $image = $_FILES['image1']['tmp_name']; 
                                $imgContent = addslashes(file_get_contents($image));

                                
                                $link = mysqli_connect("localhost", "root", "", "lms");
                                mysqli_query($link," UPDATE books SET isbn='$_POST[isbn]',
                                name='$_POST[name]',image='$imgContent', author_name='$_POST[author]',
                                publication_name='$_POST[publication]', price=$_POST[price], 
                                available_quantity=$_POST[available], edited_date='$_POST[edited]'
                                WHERE name='$_SESSION[oldname]' ");
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


        
