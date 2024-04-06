
function delBlog(currentBlogID) {
    if (confirm('Are you sure you want to delete this blog?')) {
        location.replace('process_blog.php?action=delete&blogID=' + currentBlogID);
        alert(window.location.href.split("=")[1]+" Deleted Successfully!\nJump Back to Blog Page...");
    }
}

function delUser(currentUserID) {
    if (confirm('Are you sure you want to delete this user?')) {
        location.replace('process_user.php?action=delete&userID=' + currentUserID);
        alert(window.location.href.split("=")[1]+" Deleted Successfully!\nJump Back to user Page...");
    }
}

