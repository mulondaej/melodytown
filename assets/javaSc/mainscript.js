document.addEventListener("DOMContentLoaded", function () {
    // Declare variables
    const searchBtn = document.getElementById('searchBtn');
    const sBtn = document.getElementById('sBtn');
    const searched = document.getElementById('searching');
    const avatar = document.getElementById("avatar");
    const avyOverlay = document.getElementById("avy-overlay");
    const fileInput = document.getElementById('fileUploadMedia');
    const uploadButton = document.getElementById('uploadMediaBtn');
    const mediaList = document.getElementById('media-list');
    const editCoverButton = document.getElementById("editCover");
    const avatarImageUpload = document.getElementById("avatarUpload");
    const editAvatarButton = document.getElementById("editAvatar");
    const mediaLink = document.getElementById('media-link');
    const mediaFolder = document.getElementById('media-folder');
    const lastUsernameEditTime = null; // Initialize lastUsernameEditTime

    searchBtn.addEventListener('click', () => {
        if (searched.style.display === 'none' || searched.style.display === '') {
            searched.style.display = 'block';
        } else {
            searched.style.display = 'none';
        }
    });
    ;

    //toggle profile settings
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

    //
    newThread.addEventListener("click", () => {
        if (threadForm.style.display === 'none' || threadForm.style.display === '') {
            threadForm.style.display = 'block';
        } else {
            threadForm.style.display = 'none';
        }
    })

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

    // file input when "Edit Cover" is clicked

    editCoverButton.addEventListener("click", function () {
        coverImageUpload.click(); // Trigger the file input click event
    });

    // avatar image upload (Similar to cover image upload)
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

    if (editAvatarButton != null) {
        editAvatarButton.addEventListener("click", function () {
            avatarImageUpload.click();
        });
    }

    // Toggle media folder 
    mediaLink.addEventListener('click', function (e) {
        e.preventDefault();
        mediaFolder.classList.toggle('show-media-folder');
    });

    // le thread 
    const threads = JSON.parse(localStorage.getItem('threads')) || [];

    let users = ($_SESSION['user'] && $_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';

    let score = 0;

    const createThread = document.getElementById('createThread');
    const newThreadForm = document.getElementById('threadForm');
    const forumContainer = document.getElementById('forumcontainer');
    const closeBtn = document.getElementById('closeBtn');
    const modalContainer = document.getElementById('modalContainer');

    createThread.addEventListener('click', () => {
        score = +1;
        let timestamp = new Date().toLocaleString();
        const newThread = {
            tag: document.getElementById('tag').value,
            title: document.getElementById('title').value,
            content: document.getElementById('content').value,
            timestamp,
            user: users,
        };

        threads.push(newThread);
        localStorage.setItem('threads', JSON.stringify(threads));

        displayThreads();
    });

    function displayThreads() {
        forumContainer.innerHTML = '';

        for (let i = 0; i < threads.length; i++) {
            const threadLink = document.createElement('a');
            threadLink.href = `thread.php?threadId=${i}`;
            threadLink.innerHTML = `<h4>${threads[i].title}</h4>
              <p> An interesting ${threads[i].tag}'s topic to discuss </p>`;

            const threadDiv = document.createElement('div');
            threadDiv.classList.add('subforum-row');
            threadDiv.innerHTML = `
              <div class="subforum-icon subforum-column center" id="icon">
                  <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
              </div>
              <div class="subforum-description subforum-column" id="subDescript">
                  <ul class="thread-list">
                      <li>
                          ${threadLink.outerHTML}
                      </li>   
                  </ul>
              </div>
              <div class="subforum-stats subforum-column center">
                  <span><a href="#" id="topicPost">${score} Posts | <a href="#" id="topics">${score} Topics</a></span>
              </div>
              <div class="subforum-info subforum-column">
                  <b><a href="#">Last post</a></b> by <a href="#">${threads[i].user}</a>,
                  <small id="dateAlert">${threads[i].timestamp}</small>
              </div>
          `;

            forumContainer.appendChild(threadDiv);
        }
    }

    newThreadForm.addEventListener("click", () => {
        if (threadForm.style.display === 'none' || threadForm.style.display === '') {
            threadForm.style.display = 'block';
        } else {
            threadForm.style.display = 'none';
        }
    });

    closeBtn.addEventListener("click", () => {
        modalContainer.style.display = 'none';
    });

    modalContainer.addEventListener("click", (e) => {
        modalContainer.style.display = 'none';
    });

    const contents = document.getElementById('threadContent');
    const commentBtn = document.getElementById('commentBtn');
    const likeBtn = document.getElementById('likeBtn');
    const quoteBtn = document.getElementById('quoteBtn');

    const quotedHere = document.getElementById('comments');
    let commentbox = document.querySelector('.commentsArea');
    let replied = document.querySelector('.replies');

    const replies = [];

    score = 0;

    commentBtn.addEventListener('click', () => {
        let commento = document.getElementById('comments').value;

        replies.push(commento);
        displayReplies();
    });

    function displayReplies() {
        let timestamp = new Date().toLocaleString();
        commentbox.innerHTML = '';

        for (let reply of replies) {
            let replyDiv = `<br><div class="replies"><p id="replied">${reply}<p>
          <br><p id=timed>${timestamp}</p><br>
          <button id="likedBtn"><i class="fa-solid fa-heart"></i></button>
          <button id="replyBtn"><a href="#comments">Reply</a></button>
          <button id="quotedBtn">+Quote</button></div>
          <hr>
          `;
            commentbox.innerHTML += replyDiv;
            console.log(replyDiv);
        }
    }

    likeBtn.addEventListener('click', () => {
        likeBtn.classList.toggle("changeColor");
    });

    quoteBtn.addEventListener('click', () => {
        quotedHere.value += '" ' + content + '\n\n' + '"';
    });

    // Event listener for the modal
    openModalBtn.addEventListener("click", () => {
        // Your existing code...
    });

    // Event listener for "Edit Username"
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

    // Event listener for "Edit Location"
    document.getElementById("editLocation").addEventListener("click", () => {
        // Allow editing location
        document.getElementById("location").contentEditable = true;
        document.getElementById("saveStatus").classList.remove("hidden");
    });

    // searching 
    sBtn.addEventListener('click', () => {
        // Retrieve values from input fields
        const searchQuery = document.getElementById('searchQuery').value;
        const category = document.getElementById('categorie').value;
        const tags = document.getElementById('tags').value;

        // Perform search based on categories and tags
        // You need to replace this with your actual search logic
        console.log('Search Query:', searchQuery);
        console.log('Categorie:', categorie);
        console.log('Tags:', tags);

        // Redirect to a search results page
        window.location.href = `/search?query=${searchQuery}&category=${category}&tags=${tags}`;
    });


});