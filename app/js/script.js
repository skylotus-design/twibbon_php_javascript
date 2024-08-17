const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const upload = document.getElementById('upload');
let img = new Image();
let imgX = 0, imgY = 0;
let isDragging = false;
let startX, startY;

upload.addEventListener('change', handleUpload);
canvas.addEventListener('mousedown', handleMouseDown);
canvas.addEventListener('mousemove', handleMouseMove);
canvas.addEventListener('mouseup', handleMouseUp);
canvas.addEventListener('mouseout', handleMouseOut);

function handleUpload(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        img.src = e.target.result;
        img.onload = function() {
            imgX = (canvas.width - img.width) / 2;
            imgY = (canvas.height - img.height) / 2;
            draw();
        }
    }
    reader.readAsDataURL(file);
}

function handleMouseDown(event) {
    startX = event.offsetX;
    startY = event.offsetY;
    if (isMouseInImage(startX, startY)) {
        isDragging = true;
    }
}

function handleMouseMove(event) {
    if (isDragging) {
        const mouseX = event.offsetX;
        const mouseY = event.offsetY;
        const dx = mouseX - startX;
        const dy = mouseY - startY;
        imgX += dx;
        imgY += dy;
        startX = mouseX;
        startY = mouseY;
        draw();
    }
}

function handleMouseUp() {
    isDragging = false;
}

function handleMouseOut() {
    isDragging = false;
}

function isMouseInImage(x, y) {
    return x >= imgX && x <= imgX + img.width && y >= imgY && y <= imgY + img.height;
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(img, imgX, imgY);
}
