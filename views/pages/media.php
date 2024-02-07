<?php ?>

<main class="mainMedia">
    <div class="profileMedia">
        <div class="userMedia">
            <img src="../assets/IMG/Avril23j.jpg" alt="User Avatar" id="avyMedia">
            <h2>@<?= $userAccount->username ?></h2>
        </div>
        <div class="usernameMedia">
            <p>Location: <a href=""><?= $userAccount->location ?></a> /</p>
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

<script src="../../assets/javaSc/profile.js"></script>
