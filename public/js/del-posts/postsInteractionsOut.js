function addLike(postId) {

    if ($('#post-likes-'+postId).hasClass('active')){
        $('#post-likes-'+postId).removeClass('active');
        decPostsLikes(postId);
    } else {
        if ($('#post-dislikes-'+postId).hasClass('active')){
            $('#post-dislikes-'+postId).removeClass('active');

            decPostsDislikes(postId);
        }

        $('#post-likes-'+postId).addClass('active');

        incPostsLikes(postId);
    }

}

function addDislike(postId) {
    if ($('#post-dislikes-'+postId).hasClass('active')){
        $('#post-dislikes-'+postId).removeClass('active');

        decPostsDislikes(postId);
    } else {
        if ($('#post-likes-'+postId).hasClass('active')){
            $('#post-likes-'+postId).removeClass('active');

            decPostsLikes(postId);
        }

        $('#post-dislikes-'+postId).addClass('active');
    }

    incPostsDislikes(postId);
}

function incPostsLikes(postId) {
    $.ajax({
        url: URLROOT+'/posts/incPostsLikes/'+postId,
        method: "post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(likes){
            $("#posts-likes-count-"+postId).text(likes);
        }
    })
}

function decPostsLikes(postId) {
    $.ajax({
        url: URLROOT+'/posts/decPostsLikes/'+postId,
        method: "post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(likes){
            $("#posts-likes-count-"+postId).text(likes);
        }
    })
}

function incPostsDislikes(postId) {
    $.ajax({
        url: URLROOT+'/postsout/incPostsDislikes/'+postId,
        method: "post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(likes){
            $("#posts-dislikes-count-"+postId).text(likes);
        }
    })
}

function decPostsDislikes(postId) {
    $.ajax({
        url: URLROOT+'/postsout/decPostsDislikes/'+postId,
        method: "post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(likes){
            $("#posts-dislikes-count-"+postId).text(likes);
        }
    })
}




