
<?php
include "header.php";
?>

<div class="x_content">
    <
</div>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                <form name="form1" action="" method="post">
                <div class="input-group">
                    <input type="text" name="bknm" class="form-control" placeholder="Enter Book Name">
                    <!-- <span class="input-group-btn">
                    <button class="btn btn-default"  name="button1" type="submit">Search</button>
                    </span> -->
                </div>
                <!-- </form> -->
            </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        
                        <!-- <form name="form1" action="" method="post"> -->
                            <div class="input-group">
                            <select name="indx" id="indx" class="form-control">
                                <?php
                                $link = mysqli_connect("localhost", "root", "", "lms");
                                $res=mysqli_query($link, "select indexno from students");
                                while($row=mysqli_fetch_array($res)){
                                    echo "<option>"; echo $row["indexno"]; echo "</option>";
                                }
                                ?>
                            </select>
                                <span class="input-group-btn">
                                <button class="btn btn-default"  name="button2" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                        </div>
                    </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Lending Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form2" action="" method="post">
                                    <?php
                                    if(isset($_POST["button2"])){
                                    $link = mysqli_connect("localhost", "root", "", "lms");
                                    $res1=mysqli_query($link, "select * from students where indexno='$_POST[indx]'");
                                    $sql="SELECT isbn, name,author_name, publication_name FROM books
                                    WHERE name like ('%$_POST[bknm]%')";
                                    $res2 = $link->query($sql);
                                    while($row1=mysqli_fetch_array($res1)){
                                            if(empty($_POST["bknm"])){
                                                ?> 
                                                <script type="text/javascript">
                                                    alert("Book Name Empty");
                                                    window.location="lend_books.php";
                                                </script>
                                                <?php
                                            }else{
                                                while($row2=mysqli_fetch_array($res2)){
                                                    $isbn=$row2["isbn"];
                                                    $booksname=$row2["name"];
                                                    $author=$row2["author_name"];
                                                    $publication=$row2["publication_name"];
                                                    $_SESSION["isbn1"]=$isbn;
                                                    $_SESSION["name1"]=$booksname;
                                                    $_SESSION["author1"]=$author;
                                                    $_SESSION["publication1"]=$publication;
                                                }
                                            }
                                        
                                        $indexno=$row1["indexno"];
                                        $username=$row1["username"];
                                        $firstname=$row1["firstname"];
                                        $lastname=$row1["lastname"];
                                        $fullname="$firstname. $lastname";
                                        $semister=$row1["semister"];
                                        $contact=$row1["contact"];
                                        $email=$row1["email"];
                                        $_SESSION["indexno1"]=$indexno;
                                        $_SESSION["username1"]=$username;
                                        $_SESSION["fullname1"]=$fullname;
                                        $_SESSION["semister1"]=$semister;
                                        $_SESSION["contact1"]=$contact;
                                        $_SESSION["email1"]=$email;
                                    }    
                                    ?>
                                    <table class="table table-bordered">
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $indexno ?>" placeholder="Index Number" name="student_indexno" required="" disabled ></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $username ?>" placeholder="Student User Name" name="students_username" disabled></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $fullname ?>" placeholder="Student Name" name="students_name" disabled></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $semister ?>" placeholder="Student Semister" name="students_semister" disabled></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $contact ?>" placeholder="Contact Number" name="students_contact" disabled></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $email ?>" placeholder="Student Email" name="students_email" disabled></td>
                                    </tr>
                                    <!-- <tr>
                                        <td> 
                                        <select name="books_name" class="form-control" onclick="filterFunction()">
                                        <?php
                                        // $link = mysqli_connect("localhost", "root", "", "lms");
                                        // $res=mysqli_query($link, "select name from books");
                                        // while($row=mysqli_fetch_array($res)){
                                        //     echo "<option>"; echo $row["name"]; echo "</option>";
                                        // }
                                        ?>
                                        </select>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td> <input type="number" class="form-control" value="<?php echo $isbn ?>" placeholder="Book ISBN" name="books_isbn" required="" disabled></td>
                                    </tr>
                                    
                                    <?php
                                    $i=1;
                                    if ($booksname==$_SESSION["name1"]) {
                                        ?>
                                        <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $booksname ?>" placeholder="Book Name" name="books_name" required="" disabled></td>
                                        </tr>
                                        <tr>
                                            <td> <input type="text" class="form-control" value="<?php echo $author ?>" placeholder="Book Author" name="books_author" required="" disabled></td>
                                        </tr>
                                        <tr>
                                            <td> <input type="text" class="form-control" value="<?php echo $publication ?>" placeholder="Book Publication" name="books_publication" required="" disabled></td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <script type="text/javascript">
                                            alert("Book Not Available");
                                            window.location.href=window.location.href;
                                        </script>
                                        <?php
                                    }
                                    
                                    ?>
                                    <tr>
                                        <td> <input type="date" class="form-control" value="" placeholder="Lending Date" name="lending_date" required=""></td>
                                    </tr>
                                    <tr>
                                        <td> <input class="btn btn-default submit " type="submit" name="submit3" value="Register Details"></td>
                                    </tr>
                                    </table>
                                    <?php
                                }
                                ?>
                            </form>
                                <?php
                                if (isset($_POST["submit3"])){

                                    $qty=0;
                                    $res=mysqli_query($link,"SELECT * FROM books
                                    WHERE name ='$_SESSION[name1]' ");
                                    while($row=mysqli_fetch_array($res)){
                                        $qty=$row["available_quantity"];
                                    }

                                    if ($qty==0) {
                                        ?>
                                            <div class="alert alert-danger col-md-12 col-lg-10 col-lg-push-1">
                                            <strong style="color:white">Book Not Available in Stock</strong>
                                            </div>
                                        <?php
                                    }else {
                                        mysqli_query($link, "insert into lending_books values(
                                        '','$_SESSION[indexno1]','$_SESSION[username1]','$_SESSION[fullname1]'
                                        ,'$_SESSION[semister1]','$_SESSION[contact1]','$_SESSION[email1]',
                                        '$_SESSION[isbn1]','$_SESSION[name1]','$_SESSION[author1]'
                                        ,'$_SESSION[publication1]','Not Returned','$_POST[lending_date]','')");

                                        mysqli_query($link," UPDATE books SET available_quantity=available_quantity-1
                                        WHERE name='$_SESSION[name1]' ");

                                        ?>
                                        <script type="text/javascript">
                                            alert("Book Lending Successful");
                                            window.location.href=window.location.href;
                                        </script>
                                        <?php
                                    }
                                }
                                ?>
        </div>
        </div>
        </div>
        </div>
        </div>

<?php       
include "footer.php";
?>