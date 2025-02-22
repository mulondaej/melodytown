function uploadImages() {
    let files = document.getElementById('imageUpload').files;
    if (files.length === 0) {
        alert('Please select images.');
        return;
    }

    let formData = new FormData();
    for (let i = 0; i < files.length; i++) {
        formData.append('images[]', files[i]); // Send multiple files
    }

    fetch('../../media.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('status').innerHTML = data.message;
    })
    .catch(error => console.error('Error:', error));
}