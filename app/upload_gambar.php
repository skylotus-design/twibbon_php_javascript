<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .twb {
            position: absolute;
            width: 640px;
            height: 640px;
            margin: 0px;
            background: red;
            top:0px;
            left:0px;
            z-index: +100;
            pointer-events: none;
        }
        .img {
            position: relative;
            width: 640px;
            height: 640px;
            margin: 0px;
            padding:0px;
            background: lightgray;
        }
        .main-border {
            width: 640px;
            height: 640px;
            margin: 50px auto;
            padding:0px;
            border:1px solid gray;
        }
    </style>
</head>
<body>
    
<?php include('twibbon_kontroller.php'); ?>

<?php
    $id_twibbon = $_REQUEST['twibbon'];

    $twibbon = new TwibbonKontroller();
    $query = $twibbon->uploadGambar($id_twibbon);
    $result = $query->fetch_array();
    $img = $result['gambar_twibbon'];
    
?>

    <div class="main-border">
        <div id="divnya" class="img">
            <div class="twb" style="background:url(../upload/<?=$img;?>);background-size:640px 640px;background-position:center;">
                
            </div>
            <canvas id="canvas" width="640" height="640"></canvas>
        </div>
    </div>


    <div style="width:640px;margin:50px auto; padding:10px">
        <input type="text" id="namanya" value="tanpanama" class="form-control">

        <input type="file" id="upload" accept="image/*" class="form-control mt-2">
        <button id="downloadBtn" class="form-control mt-2 btn btn-success">Download Gambar</button>
    </div>


<script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        var node = document.getElementById('divnya');
        var scale = 1080 / node.clientWidth; 

        domtoimage.toBlob(node, {
            width: 1080,
            height: 1080,
            style: {
                transform: 'scale(' + scale + ')',
                transformOrigin: 'top left'
            }
        })
        .then(function (blob) {
            var nama = document.getElementById('namanya').value;
            var link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = nama + '.png';
            link.click();
        });
    });
</script>

<script src="js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>

</body>
</html>