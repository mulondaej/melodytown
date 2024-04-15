document.addEventListener("DOMContentLoaded", function () {
    const fileUploadMedia = document.getElementById("fileUploadMedia");
    const mediaList = document.getElementById("media-list");

    fileUploadMedia.addEventListener("change", function () {
        const files = this.files;
        if (files.length > 0) {
            mediaList.innerHTML = ""; // Clear existing list items
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const listItem = document.createElement("li");
                const image = document.createElement("img");
                image.src = URL.createObjectURL(file); // Set image source
                image.alt = file.name; // Set alt text
                listItem.appendChild(image); // Append image to list item
                mediaList.appendChild(listItem); // Append list item to list
            }
        }
    });

    const mediaForm = document.getElementById("mediaForm");
    mediaForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission
        const formData = new FormData(this);

        fetch("upload.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            console.log(data);
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});


// const mediaLink = document.getElementById('media-link');
// const mediaFolder = document.getElementById('media-folder');

// if (mediaLink != null) {
//     mediaLink.addEventListener('click', function (e) {
//         e.preventDefault();
//         mediaFolder.classList.toggle('show-media-folder');
//     })
// };

