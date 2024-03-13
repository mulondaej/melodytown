document.addEventListener("DOMContentLoaded", function () {
    const searchBtn = document.getElementById('searchBtn');
    const searched = document.getElementById('searching');

    searchBtn.addEventListener('click', () => {
        if (searched.style.display === 'none' || searched.style.display === '') {
            searched.style.display = 'block';
        } else {
            searched.style.display = 'none';
        }
    });
    ;

    //toggle profile settings
    const avatar = document.getElementById("avatar");
    const avyOverlay = document.getElementById("avy-overlay");

    avatar.addEventListener('click', function () {
        avyOverlay.style.left = avyOverlay.style.left === "0%" ? "-100%" : "0%";

    });

    //Media js
    const fileInput = document.getElementById('fileUploadMedia');
    const uploadButton = document.getElementById('uploadMediaBtn');
    const mediaList = document.getElementById('media-list');

    uploadButton.addEventListener('click', function () {
        fileInput.click();
    });

    fileInput.addEventListener('change', function () {
        const files = fileInput.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const listItem = document.createElement('li');
            const image = document.createElement('img');
            image.src = URL.createObjectURL(file);
            listItem.appendChild(image);
            mediaList.appendChild(listItem);
        }
        fileInput.value = ''; // Clear the file input
    });

    function goBack() {
        window.history.back
    }

    //PROFILE
    const coverImageUpload = document.getElementById("coverUpload");
    const coverPicture = document.getElementById("coverPicture");

    coverImageUpload.addEventListener("change", function () {
        const file = coverImageUpload.files[0];

        if (file) {
            // Create a FileReader to read the uploaded file
            const reader = new FileReader();

            reader.onload = function (e) {
                // Set the uploaded image as the cover picture source
                coverPicture.src = e.target.result;
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        }
    });

    // Add functionality to trigger the file input when "Edit Cover" is clicked
    const editCoverButton = document.getElementById("editCover");

    editCoverButton.addEventListener("click", function () {
        coverImageUpload.click(); // Trigger the file input click event
    });

    // JavaScript for avatar image upload (Similar to cover image upload)
    const avatarImageUpload = document.getElementById("avatarUpload");
    const avatarImg = document.getElementById("avatar");

    avatarImageUpload.addEventListener("change", function () {
        const file = avatarImageUpload.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                avatarImg.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });

    const editAvatarButton = document.getElementById("editAvatar");
    if (editAvatarButton != null) {
        editAvatarButton.addEventListener("click", function () {
            avatarImageUpload.click();
        });
    }

    const mediaLink = document.getElementById('media-link');
    const mediaFolder = document.getElementById('media-folder');

    // Toggle media folder visibility
    mediaLink.addEventListener('click', function (e) {
        e.preventDefault();
        mediaFolder.classList.toggle('show-media-folder');
    });

});