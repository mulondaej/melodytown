document.getElementById('editCover').addEventListener('click', function() {
    document.getElementById('coverUpload').click();
});

document.getElementById('coverUpload').addEventListener('change', function() {
    var file = this.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('cover-picture').src = e.target.result;
    };

    reader.readAsDataURL(file);
});

document.getElementById('editAvatar').addEventListener('click', function() {
    document.getElementById('avatarUpload').click();
});

document.getElementById('avatarUpload').addEventListener('change', function() {
    var file = this.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('profileAvy').src = e.target.result;
    };

    reader.readAsDataURL(file);
});


//////////////////////////////////////////
const mediaLink = document.getElementById('media-link');
const mediaFolder = document.getElementById('media-folder');

if (mediaLink != null) {
    mediaLink.addEventListener('click', function (e) {
        e.preventDefault();
        mediaFolder.classList.toggle('show-media-folder');
    })
};