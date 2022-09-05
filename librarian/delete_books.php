<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $link = mysqli_connect("localhost", "root", "", "lms");
    $res=mysqli_query($link, "DELETE FROM books WHERE id=$id ");
?>
<script type="text/javascript">
window.location="view_books.php";
</script>
<?php
}else {
    ?>
<script type="text/javascript">
window.location="view_books.php";
</script>
<?php
}
?>