<main class="mainbox">
    <div class="profileContainer ">
        <input type="file" id="coverUpload" accept="image/*" style="display: none;">
        <div class="coverContainer">
            <img src="../assets/IMG/asha-frozz.jpg" alt="Cover Picture" id="cover-picture">
        </div>

        <div class="avatarContainer text-center">
            <input type="file" id="avatarUpload" class="avatarChange" accept="image/*" style="display: none;">
            <img src="../assets/IMG/Avril23j.jpg" alt="User Avatar" id="profileAvy">
            <h4>@<b><?= $userAccount->username ?></b></h4>
            <button id="editAvatar" class="overLay">change</button>
        </div>
        <button id="editCover">change</button>
    </div>

    <div class="userContainer">
        <div class="infoUser">
            <p>from <b><?= $userAccount->location ?></b></p>
            <p>Posts: <span id="postCount"><b></b></span></p>
            <p>Likes: <span id="likeCount"><b>100</b></span></p>
            <p>Rank: <span id="rank"><b><?= $userAccount->roleName?></b></span></p>
            <p>Points: <span id="points"><b>500</b></span></p>
            <p>Joined since <b><?= $userAccount->registerDate ?></b></p>
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
                <form action="#status" method="POST" id="postStatus">
                    <textarea name="" id="postHere" ></textarea>
                    <button type="submit" id="posted" value="status" name="statusPost">Post</button>
                </form>
                <div class="statusContainer">
                    <div class="status" id="status">
                        <p></p>
                        <p></p>
                        <button class="likeStatus">Like</button>
                        <button class="commentStatus">Comment</button>
                    </div>
                    <ul class="comments">
                        <!-- Comments go here -->
                        <li>
                        <p></p>
                        <p></p>
                            <button class="likeComment">Like</button>
                            <button class="replyComment">Reply</button>
                        </li>
                    </ul>
                    <!-- Reply form for status -->
                    <form action="" method="POST" class="reply-form hidden">
                        <textarea class="replyText" placeholder="Reply to this status..."></textarea>
                        <button class="postReply" name="comment">Reply</button>
                    </form>
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

<script src="../../assets/javaSc/profile.js"></script>