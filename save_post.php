<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog | New Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            width: 60%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-input {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }
        .form-textarea {
            width: 100%;
            height: 150px;
            margin-bottom: 10px;
            padding: 8px;
        }
        .form-button {
            padding: 10px 15px;
            margin-right: 10px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-button-secondary {
            background-color: #6c757d;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Post New Blog</h1>
</div>
<div class="container">
    <form action="save_post.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" class="form-input" placeholder="Blog Title...">
        <p>Date: <?php echo date("m/d/Y, h:i A"); ?></p>
        <input type="file" name="image" class="form-input">
        <textarea name="content" class="form-textarea" placeholder="Blog Paragraph..."></textarea>
        <input type="submit" value="Save Post" class="form-button">
        <button type="button" onclick="window.location.href='index.php';" class="form-button form-button-secondary">Go to Home Page</button>
    </form>
</div>
</body>
</html>
