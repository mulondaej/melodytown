<main class="mainbox">
    <div class="profileContainer ">
        <input type="file" id="coverUpload" accept="image/*" style="display: none;">
        <div class="coverContainer">
            <img src="../assets/IMG/asha-frozz.jpg" alt="Cover Picture" id="cover-picture">
        </div>

        <div class="avatarContainer text-center">
            <input type="file" id="avatarUpload" class="avatarChange" accept="image/*" style="display: none;">
            <img src="../assets/IMG/Avril23j.jpg" alt="User Avatar" id="profileAvy">
            <button id="editAvatar" class="overLay">change</button>
        </div>
        <button id="editCover">change</button>
    </div>

    <div class="userContainer">
        <div class="username">
            <h4>@<?= $userAccount->username ?>
            <p>Location: <?= $userAccount->location ?></p></h4>
        </div>
        <div class="infoUser">
            <p>Joined since <?= $userAccount->registerDate ?></p>
            <p>Posts: <span id="postCount"><?= $userTotalAnswer ?></span></p>
            <p>Likes: <span id="likeCount">100</span></p>
            <p>Rank: <span id="rank">Member</span></p>
            <p>Points: <span id="points">500</span></p>
        </div>
    </div>
    <div class="mainContainer">
        <aside class="asideBar">
            <h3>Your Media <i class="fa-solid fa-folder-open"></i></h3>
            <div class="Media">
                <input type="file" id="mediaUpload" accept="image*/" style="display: none;">
                <div class="disGallery">
                    <img src="assets/IMG/melodytown.jpg" alt="media" id="gallery">
                    <img src="assets/IMG/melodytown.jpg" alt="media" id="gallery">
                    <img src="assets/IMG/melodytown.jpg" alt="media" id="gallery">
                </div>
                <button id="upload-media"><a href="/media">Open</a></button>
            </div>
            <h3>Archive <i class="fa-solid fa-box-archive"></i></h3>
            <div class="Archive">
                <input type="file" id="archiveUpload" accept="image*/" style="display: none;">
                <img src="assets/IMG/melodytown.jpg" alt="archive" id="archives">
                <button id="open-archive"><a href="/media">Open</a></button>
            </div>
        </aside>
         <main class="mainStatus"> 
            <div class="State">
                <div class="post">
                    <textarea name="" id="PostHere" ></textarea>
                    <button type="submit" id="Posted">Post</button>
                </div>
                <div class="statusContainer">
                    <div class="status">
                        <p>User Name: Lorem ipsum dolor sit amet.</p>
                        <p>Status: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="likeStatus">Like</button>
                        <button class="commentStatus">Comment</button>
                    </div>
                    <ul class="comments">
                        <!-- Comments go here -->
                        <li>
                            <p>User Name: Lorem ipsum dolor sit amet.</p>
                            <p>Comment: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <button class="likeComment">Like</button>
                            <button class="replyComment">Reply</button>
                        </li>
                        <!-- Add more comment entries as needed -->
                    </ul>
                    <!-- Reply form for status -->
                    <div class="reply-form hidden">
                        <textarea class="replyText" placeholder="Reply to this status..."></textarea>
                        <button class="postReply">Reply</button>
                    </div>
                </div>
            </div>
        </main>
        <aside class="activ">
            <h3>Activity</h3>
            <div class="activity">
                <ul id="activity-list">
                    <!-- Activity items will be added here dynamically with JavaScript -->
                </ul>
            </div>
        </aside>
    </div>
</main>