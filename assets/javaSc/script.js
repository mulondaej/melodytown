<<<<<<< HEAD
document.addEventListener("DOMContentLoaded", function () {
    //const menuButton = document.getElementById("menu-button");
    //const menuOverlay = document.getElementById("menu-overlay");

    //menuButton.addEventListener("click", function () {
    //menuOverlay.style.right = menuOverlay.style.right === "0%" ? "-100%" : "0%";
    //});


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

    //Comment
    function showComment() {
        var commentArea = document.getElementById("comment-area");
        commentArea.classList.remove("hide");
    }

    //Reply
    function showReply() {
        var replyArea = document.getElementById("reply-area");
        replyArea.classList.remove("hide");
    }

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

    //modal
    openModalBtn.addEventListener("click", () => {
        modalContainer.style.display = "flex"
    })

    closeBtn.addEventListener("click", () => {
        modalContainer.style.display = "none"
    })

    modalContainer.addEventListener("click", (e) => {
        if (e.target != modal && e.target != modalText) {
            modalContainer.style.display = "none"
        }

    })

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


    // Define a variable to track the last edit time for username
    let lastUsernameEditTime = null;

    // ... (previous code) ...

    // Handle "Edit Username" button click
    document.getElementById("editUsername").addEventListener("click", () => {
        const currentTime = new Date().getTime();
        if (!lastUsernameEditTime || currentTime - lastUsernameEditTime >= 31536000000) {
            // Allow editing if it's the first time or it's been a year since the last edit
            document.getElementById("username").contentEditable = true;
            document.getElementById("saveStatus").classList.remove("hidden");
            lastUsernameEditTime = currentTime;
        } else {
            alert("You can only edit your username once a year.");
        }
    });

    // Handle "Edit Location" button click (similar to username editing)
    document.getElementById("editLocation").addEventListener("click", () => {
        // Allow editing location
        document.getElementById("location").contentEditable = true;
        document.getElementById("saveStatus").classList.remove("hidden");
    });

    // Handle "Save Status" button click
    document.getElementById("saveStatus").addEventListener("click", () => {
        // Save the edited status to local storage
        const editedStatus = document.getElementById("status-text").value;
        localStorage.setItem("userStatus", editedStatus);
        // Disable editing status
        document.getElementById("status-text").disabled = true;
        document.getElementById("status-text").value = editedStatus;
        document.getElementById("saveStatus").classList.add("hidden");
    });

    // ... (previous code) ...

    // ... (previous code) ...

    // Handle status likes
    const likeStatusButtons = document.querySelectorAll('.likeStatus');
    likeStatusButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Handle like functionality here
        });
    });

    // Handle status comments
    const commentStatusButtons = document.querySelectorAll('.commentStatus');
    commentStatusButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const statusContainer = button.closest('.statusContainer');
            const replyForm = statusContainer.querySelector('.reply-form');
            replyForm.classList.toggle('hidden');
        });
    });

    // Handle comment likes
    const likeCommentButtons = document.querySelectorAll('.likeComment');
    likeCommentButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Handle like functionality for comments here
        });
    });

    // Handle reply to comment
    const replyCommentButtons = document.querySelectorAll('.replyComment');
    replyCommentButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const commentContainer = button.closest('li');
            const replyForm = commentContainer.querySelector('.reply-form');  // Change to the appropriate class or ID
            replyForm.classList.toggle('hidden');
        });
    });

    // Sample data (You would replace this with data from your server)
    const userActivityData = [
        { type: "post", text: "Posted a new status: Hello, world!" },
        { type: "profileVisit", visitor: "John Doe" },
        { type: "follow", user: "Alice" },
        { type: "follow", user: "Bob" },
        { type: "follower", user: "Charlie" },
        // Add more activity items here
    ];

    // Function to render user activity
    function renderActivity() {
        const activityList = document.getElementById("activity-list");

        userActivityData.forEach((item) => {
            const li = document.createElement("li");
            if (item.type === "post") {
                li.textContent = item.text;
            } else if (item.type === "profileVisit") {
                li.textContent = `${item.visitor} visited your profile.`;
            } else if (item.type === "follow") {
                li.textContent = `You started following ${item.user}.`;
            } else if (item.type === "follower") {
                li.textContent = `${item.user} started following you.`;
            }

            activityList.appendChild(li);
        });
    }

    // Call the function to render user activity when the page loads
    renderActivity();
=======
document.addEventListener("DOMContentLoaded", function () {
    //const menuButton = document.getElementById("menu-button");
    //const menuOverlay = document.getElementById("menu-overlay");

    //menuButton.addEventListener("click", function () {
    //menuOverlay.style.right = menuOverlay.style.right === "0%" ? "-100%" : "0%";
    //});


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

    //Comment
    function showComment() {
        var commentArea = document.getElementById("comment-area");
        commentArea.classList.remove("hide");
    }

    //Reply
    function showReply() {
        var replyArea = document.getElementById("reply-area");
        replyArea.classList.remove("hide");
    }

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

    //modal
    openModalBtn.addEventListener("click", () => {
        modalContainer.style.display = "flex"
    })

    closeBtn.addEventListener("click", () => {
        modalContainer.style.display = "none"
    })

    modalContainer.addEventListener("click", (e) => {
        if (e.target != modal && e.target != modalText) {
            modalContainer.style.display = "none"
        }

    })

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


    // Define a variable to track the last edit time for username
    let lastUsernameEditTime = null;

    // ... (previous code) ...

    // Handle "Edit Username" button click
    document.getElementById("editUsername").addEventListener("click", () => {
        const currentTime = new Date().getTime();
        if (!lastUsernameEditTime || currentTime - lastUsernameEditTime >= 31536000000) {
            // Allow editing if it's the first time or it's been a year since the last edit
            document.getElementById("username").contentEditable = true;
            document.getElementById("saveStatus").classList.remove("hidden");
            lastUsernameEditTime = currentTime;
        } else {
            alert("You can only edit your username once a year.");
        }
    });

    // Handle "Edit Location" button click (similar to username editing)
    document.getElementById("editLocation").addEventListener("click", () => {
        // Allow editing location
        document.getElementById("location").contentEditable = true;
        document.getElementById("saveStatus").classList.remove("hidden");
    });

    // Handle "Save Status" button click
    document.getElementById("saveStatus").addEventListener("click", () => {
        // Save the edited status to local storage
        const editedStatus = document.getElementById("status-text").value;
        localStorage.setItem("userStatus", editedStatus);
        // Disable editing status
        document.getElementById("status-text").disabled = true;
        document.getElementById("status-text").value = editedStatus;
        document.getElementById("saveStatus").classList.add("hidden");
    });

    // ... (previous code) ...

    // ... (previous code) ...

    // Handle status likes
    const likeStatusButtons = document.querySelectorAll('.likeStatus');
    likeStatusButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Handle like functionality here
        });
    });

    // Handle status comments
    const commentStatusButtons = document.querySelectorAll('.commentStatus');
    commentStatusButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const statusContainer = button.closest('.statusContainer');
            const replyForm = statusContainer.querySelector('.reply-form');
            replyForm.classList.toggle('hidden');
        });
    });

    // Handle comment likes
    const likeCommentButtons = document.querySelectorAll('.likeComment');
    likeCommentButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Handle like functionality for comments here
        });
    });

    // Handle reply to comment
    const replyCommentButtons = document.querySelectorAll('.replyComment');
    replyCommentButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const commentContainer = button.closest('li');
            const replyForm = commentContainer.querySelector('.reply-form');  // Change to the appropriate class or ID
            replyForm.classList.toggle('hidden');
        });
    });

    // Sample data (You would replace this with data from your server)
    const userActivityData = [
        { type: "post", text: "Posted a new status: Hello, world!" },
        { type: "profileVisit", visitor: "John Doe" },
        { type: "follow", user: "Alice" },
        { type: "follow", user: "Bob" },
        { type: "follower", user: "Charlie" },
        // Add more activity items here
    ];

    // Function to render user activity
    function renderActivity() {
        const activityList = document.getElementById("activity-list");

        userActivityData.forEach((item) => {
            const li = document.createElement("li");
            if (item.type === "post") {
                li.textContent = item.text;
            } else if (item.type === "profileVisit") {
                li.textContent = `${item.visitor} visited your profile.`;
            } else if (item.type === "follow") {
                li.textContent = `You started following ${item.user}.`;
            } else if (item.type === "follower") {
                li.textContent = `${item.user} started following you.`;
            }

            activityList.appendChild(li);
        });
    }

    // Call the function to render user activity when the page loads
    renderActivity();
>>>>>>> 19db88153d4fb2b0737212ded8e024505fda031c
});