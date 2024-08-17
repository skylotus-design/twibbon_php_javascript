<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div id="myDiv" style="width: 200px; height: 200px; background-color: lightblue;">
        <h1>Hello, World!</h1>
    </div>
    <button id="downloadBtn">Download as Image</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            var node = document.getElementById('myDiv');
            var scale = 1080 / node.clientWidth;  // Calculate the scale factor based on the target width

            domtoimage.toBlob(node, {
                width: 1080,
                height: 1080,
                style: {
                    transform: 'scale(' + scale + ')',
                    transformOrigin: 'top left'
                }
            })
            .then(function (blob) {
                var link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'myDiv.png';
                link.click();
            });
        });
    </script>
</body>
</html>
