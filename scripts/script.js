
function delBlog(currentBlogID) {
    if (confirm('Are you sure you want to delete this blog?')) {
        location.replace('process_blog.php?action=delete&blogID=' + currentBlogID);
        alert(window.location.href.split("=")[1]+" Deleted Successfully!\nJump Back to Blog Page...");
    }
}
