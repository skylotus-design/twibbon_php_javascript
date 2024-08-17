<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="app/upload_twibbon.php">Upload twibbon</a><br><br>

    <?php include('app/twibbon_kontroller.php'); ?>

    <?php
        $twibbon = new TwibbonKontroller();
        $query = $twibbon->allTwibbon();
        $result = $query->fetch_all(MYSQLI_ASSOC);
    ?>


    <?php foreach($result as $res): ?>

       <a href="app/hapus_twibbon.php?id=<?=$res['id_twibbon'];?>&img=<?=$res['gambar_twibbon'];?>">X</a>
        <a href="app/upload_gambar.php?twibbon=<?=$res['id_twibbon'];?>">
            <img src="upload/<?=$res['gambar_twibbon'];?>" style="width:200px;height:200px; padding:10px;">
        </a>

    <?php endforeach; ?>

</body>
</html>