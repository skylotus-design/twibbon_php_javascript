<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include('twibbon_kontroller.php'); ?>

<h4>UPLOAD GAMBAR TRANSPARAN 1:1</h4>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="twibbon">
    <input type="submit" name="kirim" value="KIRIM">
</form>
    
<?php

    if(isset($_POST['kirim'])){
        $twibbon_name = $_FILES['twibbon']['name'];
        $twibbon_name_ok = mt_rand(0000, 9999) . "-" . preg_replace('/[()\s]/', '', $twibbon_name);
        $twibbon_file = $_FILES['twibbon']['tmp_name'];

        $twibbon = new TwibbonKontroller();
        $isinsert = $twibbon->uploadTwibbon($twibbon_name_ok);

        if($isinsert){
            move_uploaded_file($twibbon_file, '../upload/' . $twibbon_name_ok);
            header("Location:../index.php");
        }
    }

?>


</body>
</html>