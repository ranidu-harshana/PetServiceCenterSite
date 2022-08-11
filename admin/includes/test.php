<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="">
        <input type="submit" value="" name="submit">
    </form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $image1 = $_FILES['image']['name'];
	    $image1_temp = $_FILES['image']['tmp_name'];

        echo $image1;
        echo "<br>";
        echo $image1_temp;
        // move_uploaded_file($image1_temp, "../images/$image1");
    }
?>