<?php
    class Addbooks{
        // public function connect(){
        //     $link = mysqli_connect("localhost", "root", "", "lms");
        //     return $link;
        // }

        public function saveRecords(){
            $link = mysqli_connect("localhost", "root", "", "lms");

            $filename = basename($_FILES["image1"]["name"]); 
            $fileType = pathinfo($filename, PATHINFO_EXTENSION);
            $tempname = $_FILES["image1"]["tmp_name"];
            $image = $_FILES['image1']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));

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
                    }
    }
?>