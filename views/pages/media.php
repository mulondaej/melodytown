<?php 

session_start();

// Check if the user is logged in. You can implement your authentication logic here.
if (!isset($_SESSION['user'])) {
    // Redirect to the login page or display an error message.
    header("Location: /connexion");
    exit();
}

require_once('../../views/parts/header.php'); ?>

<main class="mainMedia">
    <div class="profileMedia">
        <div class="userMedia">
            <img src="../assets/IMG/logo2.jpg" alt="User Avatar" id="avyMedia">
            <h2>@<?= $_SESSION['user']['username'] ?></h2>
        </div>
        <div class="usernameMedia">
            <p>Location: <a href="">MeloTown</a> /</p>
            <p>Likes: <a href="">200</a> /</p>
            <p>Points: <a href="">100</a> </p>
        </div>
    </div>
    <div class="media-container">
        <input type="file" id="fileUploadMedia" accept="image/*">
        <button id="uploadMediaBtn">Upload Media</button>
        <ul id="media-list">
            <!-- Media files will be displayed here -->
        </ul>
    </div>
</main>

<?php require_once('../../views/parts/footer.php'); ?>