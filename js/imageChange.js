function preview() {
    frame.src = URL.createObjectURL(event.target.files[0]);
}

function triggerFileInput() {
    document.getElementById('formFile').click();
}
