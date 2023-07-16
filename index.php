<?php
// Database connection and functions file
require 'config.php';
require 'functions.php';

// Fetch all blog posts from the database
$posts = getPosts();

// Fetch all comments for each post
foreach ($posts as &$post) {
  $post['comments'] = getComments($post['id']);
}
unset($post);
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Blog</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to My Blog</h1>

    <!-- Blog Posts -->
    <div class="blog-posts">
      <?php foreach ($posts as $post) : ?>
        <div class="post">
          <h2 class="post-title"><?php echo $post['title']; ?></h2>
          <p class="post-content"><?php echo $post['content']; ?></p>

          <!-- Comments -->
          <div class="comments">
            <h3>Comments:</h3>
            <?php foreach ($post['comments'] as $comment) : ?>
              <div class="comment">
                <p class="comment-content"><?php echo $comment['content']; ?></p>
                <p class="comment-author">By <?php echo $comment['author']; ?></p>
              </div>
            <?php endforeach; ?>

            <!-- Comment Form -->
            <form action="add_comment.php" method="post">
              <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
              <input type="text" name="author" placeholder="Your Name" required>
              <textarea name="comment" placeholder="Your Comment" required></textarea>
              <button type="submit">Add Comment</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Post Form -->
    <h2>Create a New Post</h2>
    <form action="add_post.php" method="post">
      <input type="text" name="title" placeholder="Post Title" required>
      <textarea name="content" placeholder="Post Content" required></textarea>
      <button type="submit">Create Post</button>
    </form>
  </div>
</body>
</html>
