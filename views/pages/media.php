<?php ?>

<main class="mainMedia">
    <div class="profileMedia">
        <div class="userMedia">
            <img src="../assets/IMG/users/<?= $userAccount->avatar ?>" alt="User Avatar" id="avyMedia">
            <h2>@<a href="/profil"><?= $userAccount->username ?></a></h2>
        
            <div class="usernameMedia">
                <p>Location: <a href=""><?= $userAccount->location ?></a> /</p>
                <p>Likes: <a href="">200</a> /</p>
                <p>Points: <a href="">100</a> </p>
            </div>
        </div>
        <div class="media-container">
        
            <form id="mediaForm" action="#" method="post" enctype="multipart/form-data">
                <input type="file" name="images[]" multiple accept="image/*">
                <input type="submit" value="Save" name="uploadMedia" id="uploadMediaBtn" id="imageInput">
            </form>
            <div id="imagePreviewGrid" class="imagePreviewGrid"></div>
        

            <!-- <input type="file" id="imageUpload" multiple accept="image/*">
            <button onclick="uploadImages()">Upload</button>
       
        <div id="status" class="imagePreviewGrid"></div> -->
    </div> 
    </div>
</main>