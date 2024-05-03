$( document ).ready(function() {
    $(".btn-reply")
    .click(function (e)
    {
        var user = $(this).data("user");
        console.log(user);
    
        var news;
        if ($(this).data("news") == '')
        {
            news = null;
        }
        else 
        {
            news = $(this).data("news");
        }
        var parent = $(this).data("parent");
        var content = $(this).parent().parent().find("textarea").val();
        $.ajax
        ({
            type:'post',
            url:'index.php?page=main&controller=blog&action=reply',
            data:
            {
                content: content,
                news_id: news,
                user_id: user,
                parent: parent
            },
            success:function(response) {
                if (response == 'success')
                {
                    $("#blog").load(location.href+` #blog>*`,"");
                    $(`#modal-${news}`).load(location.href+` #modal-${news}>*`,"");
                    $(`#modal-${news}`).modal("show");
                }
                else 
                {
                    alert('Cannot insert! Please try again or log in.');
                    location.href='index.php?page=main&controller=login&action=index';
                }
        }});
    });
    
    $(document).on('click', ".btn-comment", function(e){
        console.log("Click btn-comment");
        var user = $(this).data("user");
        var news;
        if ($(this).data("news") == '')
        {
            news = null;
        }
        else 
        {
            news = $(this).data("news");
        }
        var parent = $(this).data("parent");
        var content = $(this).parent().parent().find("textarea").val();
        console.log("btn-comment" + content);
        $.ajax
        ({
            type:'post',
            url:'index.php?page=main&controller=blog&action=comment',
            data:
            {
                content: content,
                news_id: news,
                user_id: user
            },
            success:function(response) {
                console.log(response);
                if (response == 'success')
                {
                    $("#block").load(location.href+` #block>*`,"");
                    $(`#modal-${news}`).load(location.href+` #modal-${news}>*`,"");
                    $(`#modal-${news}`).modal("show");
                }
                else 
                {
                    alert('Cannot insert! Please try again or log in.');
                    location.href='index.php?page=main&controller=login&action=index';
                }
        }});  
    })});
    