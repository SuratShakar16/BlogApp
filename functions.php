<?php
// Get all blog posts from the database
function getPosts()
{
  global $conn;
  $sql = "SELECT * FROM posts ORDER BY created_at DESC";
  $result = $conn->query($sql);
  $posts = [];

  if ($result) {
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
      }
    }
    $result->free(); // Free the result set
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  return $posts;
}

// Get all comments for a specific post
function getComments($postId)
{
  global $conn;
  $sql = "SELECT * FROM comments WHERE post_id = $postId";
  $result = $conn->query($sql);
  $comments = [];

  if ($result) {
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
      }
    }
    $result->free(); // Free the result set
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  return $comments;
}


