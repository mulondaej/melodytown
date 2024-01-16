<form method="POST" action="process_replies.php">
    <textarea name="content" rows="4" required></textarea>
    <input type="hidden" name="thread_id" value="THREAD_ID_HERE">
    <input type="submit" value="Post Reply">
</form>

<div class="post">
    <p>Post content here...</p>

    <?php if ($post['id'] === $_SESSION['user']): ?>
        <a href="edit_post.php?post_id=<?php echo $post['post_id']; ?>">Edit</a>
        <a href="delete_post.php?post_id=<?php echo $post['post_id']; ?>">Delete</a>
    <?php endif; ?>
</div>