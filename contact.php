<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Blogger & Vagabond</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header class="site-header">
    <h1>Travel Blogger & Vagabond. Headed to a new place, always.</h1>
</header>
ass="posts-grid">
    <?php
    include 'dao/blogDAO.php';
    $blogDAO = new BlogDAO();
    $blog_posts = $blogDAO->getBlogs();

    if (!empty($blog_posts)) {
        foreach ($blog_posts as $post) {
            echo '<article class="post">';
            echo '<img src="' . htmlspecialchars($post['image_url'])
                . '" alt="' . htmlspecialchars($post['title']) . '">';
            echo '<h2>' . htmlspecialchars($post['title']) . '</h2>';
            echo '<p>' . htmlspecialchars($post['excerpt']) . '</p>';
            echo '<div class="post-meta">';
            echo '<span>' . htmlspecialchars($post['date']) . '</span> | ';
            echo '<span>' . htmlspecialchars($post['category']) . '</span>';
            echo '</div>';
            echo '</article>';
        }
    } else {
        echo '<p>No blog posts found.</p>';
    }
    ?>
</section>

<?php include 'footer.php'; ?>
</body>
</html>
