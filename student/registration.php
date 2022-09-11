
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <h2>User Registration Form</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required=""/>
                    </div>

                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="email" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Contact Number" name="contact" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Semister" name="semister" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Index Number" name="indexno" required=""/>
                    </div>
                    <div class="col-lg-12">
                        <input class="btn btn-default submit " type="submit" name="submit1" value="Register">
                        <a class="reset_pass" href="login.php">Already Have An Account?</a>
                    </div>

                </form>
            </section>

            <?php
                if (isset($_POST["submit1"])){
                            /* Attempt MySQL server connection. Assuming you are running MySQL
                            server with default setting (user 'root' with no password) */
                            $link = mysqli_connect("localhost", "root", "", "lms");
                            $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
                            
                            // Attempt insert query execution
                            $sql = "INSERT INTO students (firstname, lastname, username, password, email, contact, 
                            semister, indexno , status)
                            VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[username]','$password'
                            ,'$_POST[email]','$_POST[contact]','$_POST[semister]','$_POST[indexno]','Deactive')";
                            if(mysqli_query($link, $sql)){
                                ?>
                                <div class="alert alert-success col-lg-6 col-lg-push-3">
                                    Registration successful, You will get email when your account is approved
                                </div>
                                <?php
                            } else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                            }
                            
                            // Close connection
                            mysqli_close($link);
            }
            ?>  



    </div>


</body>
</html>
