<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     include 'koneksi.php';

     $find_count = mysqli_query($con,'SELECT * FROM visitor');

     while($row = mysqli_fetch_assoc($find_count)){
        $current_count = $row['jumlah'];
        $new_count= $current_count + 1;
        $update_count = mysqli_query($con,"UPDATE visitor set jumlah ='".$new_count."'");
        echo $new_count;
     }
    ?>
</body>
</html>