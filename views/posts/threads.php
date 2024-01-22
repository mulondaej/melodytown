<?php 
function displayThreads()
{
    global $threads, $users, $score;
    //echo '<div class="forumcontainer" id="forumcontainer"></div>';
    if (empty($threads)) {
        echo '<p>No threads available</p>';
    } else {
        foreach ($threads as $i => $thread) {

            // Your existing code to display threads
            $threadLink = '<a href="thread?threadId=' . $i . '">';
            $threadLink .= '<h4>' . $thread['title'] . '</h4>';
            $threadLink .= '<p>An interesting ' . $thread['tag'] . '\'s topic to discuss </p>';
            $threadLink .= '</a>';

            $threadDiv = '<div class="subforum-row">';
            $threadDiv .= '<div class="subforum-icon subforum-column center" id="icon">';
            $threadDiv .= '<i class="fa-regular fa-comment" style="color: #e0e9f6;"></i>';
            $threadDiv .= '</div>';
            $threadDiv .= '<div class="subforum-description subforum-column" id="subDescript">';
            $threadDiv .= '<ul class="thread-list">';
            $threadDiv .= '<li>' . $threadLink . '</li>';
            $threadDiv .= '</ul>';
            $threadDiv .= '</div>';
            $threadDiv .= '<div class="subforum-stats subforum-column center">';
            $threadDiv .= '<span><a href="" id="topicPost">' . ($score + 1) . ' Posts | <a href="" id="topics">' . ($score + 1) . ' Topics</a></span>';
            $threadDiv .= '</div>';
            $threadDiv .= '<div class="subforum-info subforum-column">';
            $threadDiv .= '<b><a href="#">Last post</a></b> by <a href="#">' . $thread['user'] . '</a>,';
            $threadDiv .= '<small id="dateAlert">' . $thread['publicationDate'] . '</small>';
            $threadDiv .= '</div>';
            $threadDiv .= '</div>';

            echo $threadDiv;
        }
    }
    //echo '</div>';
    //echo '</div>';
}

displayThreads();
var_dump($threads);
?>
    </section>
</div>