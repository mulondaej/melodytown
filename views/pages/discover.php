<?php

?>

<div id="main">
<?php
// Function to fetch RSS feed
function fetchRSS($url) {
    $rss = simplexml_load_file($url);
    return $rss;
}

// RSS feed URLs for series
$series_feeds = array(
    'Case closed' => 'https://aniwatch.to/case-closed-323.xtml',
    'Series 2' => 'https://example.com/series2.rss',
    // Add more series with their corresponding RSS feed URLs
);

// Loop through each series feed
foreach ($series_feeds as $series_name => $series_feed_url) {
    // Fetch the RSS feed
    $rss = fetchRSS($series_feed_url);

    // Display series name
    echo "<h2>$series_name</h2>";

    // Display episodes
    foreach ($rss->channel->item as $item) {
        $episode_title = $item->title;
        $episode_description = $item->description;
        $episode_link = $item->link;

        // Display episode details
        echo "<h3>$episode_title</h3>";
        echo "<p>$episode_description</p>";
        echo "<a href='$episode_link'>Read more</a>";
        echo "<hr>";
    }
}
?>

    <section class="forum" id="forum">
        <div class="forumcontainer">
            <h1> Explorez des séries !</h1>

            <?php // Découvrir 
            ?>

            <div class="subforum discover" id="explore">
                <div class="subforum-title">
                    <h1 id="decouvrir">Series</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Latest shows</a></h4>
                        <p>Soyons respecteux dans la discussion</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b><a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Upcoming</a></h4>
                        <p>Soyons respecteux dans la discussion</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b><a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Finished</a></h4>
                        <p>Soyons respecteux dans la discussion</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b><a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
            </div>

            <div class="subforum discover" id="explore">
                <div class="subforum-title">
                    <h1 id="decouvrir">Anime</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Hot ongoing series</a></h4>
                        <p>Soyons respecteux dans la discussion</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b><a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
                
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Finished</a></h4>
                        <p>Soyons respecteux dans la discussion</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b><a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
            </div>
            <div class="subforum discover" id="explore">
                <div class="subforum-title">
                    <h1 id="decouvrir">Cartoons</h1>
                </div>
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Family Guy</a></h4>
                        <p>Soyons respecteux dans la discussion</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b><a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Simpsons</a></h4>
                        <p>Soyons respecteux dans la discussion</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b><a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
                <hr class="subforum-devider">
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column ">
                        <i class="fa-regular fa-comment" style="color: #e0e9f6"></i>
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/topics">Autres</a></h4>
                        <p>Soyons respecteux dans la discussion</p>
                    </div>
                    <div class="subforum-stats subforum-column ">
                    <span><a href="" id="topics"><?= $totalCount ?></a> posts</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post:</a></b><a href="/thread?">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <?= $latestAnswer->username ?>, <?= $latestAnswer->publicationDate ?></a>
                <?php } else { ?>
                    <a href="/thread?">
                        <?php setlocale(LC_TIME, 'fr_FR.utf8');
                        echo 'User: ' . strftime('%A, %d %B %Y %H:%M'); ?></a>
                <?php } ?>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
?>