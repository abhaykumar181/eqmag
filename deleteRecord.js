

function deletePost(id){
    if(window.confirm(`Are you sure do you want to delete ?`)){
        window.location.href= `deleteSelected.php?postid=${id}`;
        window.location.href= `ourPosts.php`;
    }
       
}