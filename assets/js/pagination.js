
// // Initialize breadcrumb
// updateBreadcrumb();
// loadContent(currentPage);

// const commentsPerPage = 14;
//     let currentPage = 1;
//     const comments = [];

//     function renderComments() {
//         const start = (currentPage - 1) * commentsPerPage;
//         const end = start + commentsPerPage;
//         const commentsContainer = document.getElementById('repliesContains');
//         commentsContainer.innerHTML = ''; // Clear previous comments

//         comments.slice(start, end).forEach((comment, index) => {
//             const commentDiv = document.createElement('div');
//             commentDiv.className = 'threadContent';
//             commentDiv.textContent = `Comment ${start + index + 1}: ${comment}`;
//             commentsContainer.appendChild(commentDiv);
//         });
//     }

//     function addComment() {
//         const newCommentText = document.getElementById('repliesBtn').value;
//         if (newCommentText.trim() !== "") {
//             comments.push(newCommentText); // Add new comment
//             document.getElementById('replyTextBar').value = ''; // Clear input field
            
//             // Update to last page if adding new page is needed
//             currentPage = Math.ceil(comments.length / commentsPerPage);
//             renderComments();
//         }
//     }

//     function nextPage() {
//         if (currentPage < Math.ceil(comments.length / commentsPerPage)) {
//             currentPage++;
//             renderComments();
//         }
//     }

//     function prevPage() {
//         if (currentPage > 1) {
//             currentPage--;
//             renderComments();
//         }
//     }

//     // Initial render
//     renderComments();

    // JavaScript to handle AJAX pagination
    const topicId = json_encode($_GET['id']) 
document.querySelectorAll('.pagination-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const page = this.getAttribute('href').split('page=')[1];

        fetch(`/path/to/your/php?page=${page}&id=topic-${topicId}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('repliesContainer').innerHTML = html;
            })
            .catch(error => console.error('Error loading page:', error));
    });
});

const threadId = json_encode($_GET['id']) 
document.querySelectorAll('.pagination-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const page = this.getAttribute('href').split('page=')[1];

        fetch(`/path/to/your/php?page=${page}&id=topic-${threadId}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('repliesContainer').innerHTML = html;
            })
            .catch(error => console.error('Error loading page:', error));
    });
});