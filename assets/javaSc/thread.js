//faire apparaître le formulaire du creation du thread en cliquant sur le button "newThread"
const newThread = document.getElementById('newThread');
const modalContainer = document.getElementById('modalContainer');
const threadCloseBtn = document.getElementById('threadCloseBtn');

// Fonction d'affichage de conteneur modal
function openModal() {
    modalContainer.style.display = 'block';
}

// Fonction de clotûre de  conteneur modal
function closeModal() {
    modalContainer.style.display = 'none';
}

// le bouton "Supprimer" par un clic
newThread.addEventListener('click', openModal);

// le button "fermer" par un clic
threadCloseBtn.addEventListener('click', closeModal);

// fermer le conteneur en cliquant n'importe où
modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }
})



// la creation du thread 
const threads = JSON.parse(localStorage.getItem('threads')) || [];

let users = ($_SESSION['user'] && $_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';

let score = 0;

const createThread = document.getElementById('createThread');
const newThreadForm = document.getElementById('threadForm');
const forumContainer = document.getElementById('forumcontainer');

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

threadCloseBtn.addEventListener("click", () => {
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