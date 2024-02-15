document.addEventListener("DOMContentLoaded", function () {
    // Les variables déclarés
    //PROFILE
    const editCoverButton = document.getElementById("editCover");
    const avatarImageUpload = document.getElementById("avatarUpload");
    const editAvatarButton = document.getElementById("editAvatar");
    const mediaLink = document.getElementById('media-link');
    const mediaFolder = document.getElementById('media-folder');
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

    // file input when "Edit Cover" is clicked

    editCoverButton.addEventListener("click", function () {
        coverImageUpload.click(); // Trigger the file input click event
    });

    // avatar image upload (Similar to cover image upload)
    const avatarImg = document.getElementById("profileAvy");

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

    if (editAvatarButton != null) {
        editAvatarButton.addEventListener("click", function () {
            avatarImageUpload.click();
        });
    }
});

const editForm = document.getElementById('editModal');
const formEdit = document.getElementById('logFormEdits');

editForm.addEventListener("click", () => {
    if (formEdit.style.display === 'none' || formEdit.style.display === '') {
        formEdit.style.display = 'block';
    } else {
        formEdit.style.display = 'none';
    }
});

