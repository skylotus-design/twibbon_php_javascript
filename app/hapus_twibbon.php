<?php include('twibbon_kontroller.php'); ?>

<?php
    $id = $_REQUEST['id'];
    $gambar = $_REQUEST['img'];

    $twibbon = new TwibbonKontroller();
    $query = $twibbon->hapusTwibbon($id);

    if($query){
        unlink('../upload/' . $gambar);
        header("Location:../index.php");
    }
?>