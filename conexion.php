<?php
    $conn = mysqli_connect('localhost','root','','exchanges');
    if(!$conn) {
        echo '<script>window.location.href = "error.php";</script>';
    }
?>
