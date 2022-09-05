<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];
$rtdt=date("d-m-Y");
$link = mysqli_connect("localhost", "root", "", "lms");
$res=mysqli_query($link, "UPDATE lending_books SET return_date='$rtdt' WHERE id=$id ");

$booksname="";

$res=mysqli_query($link, "SELECT * FROM lending_books WHERE id=$id ");
while($row=mysqli_fetch_array($res)){
    $booksname=$row["books_name"];
}
mysqli_query($link," UPDATE books SET available_quantity=available_quantity+1
 WHERE name='$booksname' ");
mysqli_query($link," UPDATE lending_books SET status='Returned'
 WHERE id=$id ");



?>
<script type="text/javascript">
window.location="return_books.php";
</script>
<?php
}else {
    ?>
<script type="text/javascript">
window.location="return_books.php";
</script>
<?php
}
?>