
<?php
session_start();
include "header.php";
include "db_connection.php";   
?>
<!-- $("bknm").click(function(){
            $("bknm").mousemove(function(){ -->
<script>
    $(document).ready(function(){
        $(form4).submit(function(event){
            event.preventDefault();
            var name = $("bknm").val();
            $(".form-message").load("load_books.php",{
                name: name
            });
        });
    });
    // $(document).ready(function(){
    //     $(form3).submit(function(event){
    //         event.preventDefault();
    //         var name = $("bookname").val();
    //         $(".form-message").load("load_books.php",{
    //             name: name
    //         });
    //     });
    // });
    // $(document).ready(function(){
    //     $(button1).click(function(){
    //         var name = $("bknm").val();
    //         $.post("load_books.php", function(data, status){
    //             $(comments).html(data);
    //         });
    //     });
    // });
    // $(document).ready(function(){
    //     $(button3).click(function(){
    //         $.get("load_books.html" , function(data, status ){
    //             $(comments).html(data);
    //             alert("status");
    //         });
    //     });
    // });
</script>



<div class="x_content">
    <div id="comments" class="pull-right">
        <p id="prg"></p>
    </div>
    
</div>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-ledt top_search">
                        <form name="form4" action="" method="post">
                            <div class="input-group">
                                <select name="bknm" id="bknm" class="form-control">
                                <?php
                                $link = mysqli_connect("localhost", "root", "", "lms");
                                $res=mysqli_query($link, "select name from books");
                                while($row=mysqli_fetch_array($res)){
                                    echo "<option>"; echo $row["name"]; echo "</option>";
                                     
                                }
                                ?>
                                </select>
                                <span class="input-group-btn">
                                <button class="btn btn-default" id="button1"  name="button1" type="submit">Search</button>
                                </span>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        
                        <form name="form1" action="" method="post">
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
                                    $res3=mysqli_query($link, "select * from books ");
                                    while($row1=mysqli_fetch_array($res1)){
                                        while($row3=mysqli_fetch_array($res3)){
                                            $image=$row3["image"];
                                            $isbn=$row3["isbn"];
                                            $_SESSION["image1"]=$image;
                                            $_SESSION["isbn1"]=$isbn;
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
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $image ?>" 
                                        placeholder="Index Number" name="student_indexno" required=""  ></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $isbn ?>" 
                                        placeholder="Student User Name" name="students_username" ></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $booksname ?>" 
                                        placeholder="Book Name" name="books_name" ></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $author ?>" 
                                        placeholder="Student Semister" name="students_semister" ></td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" value="<?php echo $publication ?>" 
                                        placeholder="Contact Number" name="students_contact" ></td>
                                    </tr>
                                    <!-- <tr>
                                        <td> <input class="btn btn-default submit " type="submit" name="submit3" value="Register Details"></td>
                                    </tr> -->
                                    </table>
                                    <?php
                                }
                                ?>
                            </form>
                                <?php
                                if (isset($_POST["submit3"])){
                                    mysqli_query($link, "insert into lending_books values(
                                    '','$_SESSION[indexno1]','$_SESSION[username1]','$_SESSION[fullname1]'
                                    ,'$_SESSION[semister1]','$_SESSION[contact1]','$_SESSION[email1]',
                                    '$_POST[books_isbn]','$_POST[books_name]','$_POST[lending_date]','')");

                                    ?>
                                    <script type="text/javascript">
                                        alert("Book Lending Successful");
                                        window.location.href=window.location.href;
                                    </script>
                                    <?php
                                }
                                ?>
        <?php
        // if(isset($_POST["button2"])){
        //     $link = mysqli_connect("localhost", "root", "", "lms");
        //     $res2=mysqli_query($link, "select * from books where name='$bknm'");
        //     while($row2=mysqli_fetch_array($res2)){
        //         $image=$row2["image"];
        //         $isbn=$row2["isbn"];
        //         $booksname=$row2["name"];
        //         $author=$row2["author_name"];
        //         $publication=$row2["publication_name"];
        //         $_SESSION["indexno1"]=$indexno;
        //         $_SESSION["username1"]=$username;
        //         $_SESSION["fullname1"]=$fullname;
        //         $_SESSION["semister1"]=$semister;
        //         $_SESSION["contact1"]=$contact;
        //         $_SESSION["email1"]=$email;
        //     }

        
        ?>
        <div class="X_content" >
        <div class="clearfix"></div>
        <form id="form3" name="form3" action="load_books.php" method="post">
        <tr>
        <td> <input type="text" placeholder="Book Name" name="bookname" ></td>
        </tr>
        <tr>
            <td> <input class="btn btn-default submit " type="submit" name="submit3" value="Register Details"></td>
        </tr>
        <p class="form-message"></P>
        </form>
        </div>
        </div>
        <?php
    //    }
        ?>
        </div>
        </div>
        </div>
        </div>
        </div>

<?php
        
include "footer.php";
?>