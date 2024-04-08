<main class="user">
    <h1>Les Membres inscrits : <?= $userCount ?></h1>
    <hr>
    <br>

    <?php if (count($userList) == 0): ?>
        <p>No user available</p>
    <?php else: ?>
        <?php foreach ($userList as $u): ?>
            <div class="subforum central" id="okey">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center" id="icon">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>
                    </div>
                    <div class="subforum-description subforum-column" id="subDescript">
                        <ul class="topic-list">
                            <h4>
                                <a href="/topic-<?= $u->id ?>">
                                    <b><?= $u->username ?>, <b></b><?= $u->roleName ?></b>
                                </a>
                            </h4>
                            <p><b>membre depuis:</b> <?= $u->registerDate ?>,
                                <b>Nombre de publications:</b> <?= $totalPosts ?></p>
                        </ul>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        <span>   
                        <?php if($_SESSION['user']['id'] == $u->id && $_SESSION['user']['id_usersRoles'] == 167 || 381) {?>
                            <a href="/profile-<?= $u->id ?>">visualiser</a>
                        </span>
                <?php } ?>
                    </div>
                    <div class="subforum-info subforum-column" id="centerBtn">
                    <?php if($_SESSION['user']['id'] == $u->id && $_SESSION['user']['id_usersRoles'] == 167 || 381) {?>
                        <a href="/modifier-topic-<?= $u->id ?>"> modifier</a>
                    </div>
                <?php } ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</main>
