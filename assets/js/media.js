

document.getElementById('imageInput').addEventListener('change', function(event) {
    const files = event.target.files;
    const previewGrid = document.getElementById('imagePreviewGrid');
    previewGrid.innerHTML = ''; // Clear previous images

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'previewImg';
            previewGrid.appendChild(img);
        }

        reader.readAsDataURL(file);
    }
});
