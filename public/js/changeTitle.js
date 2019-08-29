$(document).ready(function() {
    function GetPar(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return decodeURIComponent(r[2]);
        return null;
    }

    //传入参数名称（为字符串形式）
    //在这里获取，用变量储存，在后续页面才能获得，否则后续子页面无法获取
    var articleId = GetPar("article_id");
    if(!articleId){
        articleId = 0;
    }
    ;//链接上的文章id
    var columnId = GetPar("column_id");
    if(!columnId) {
        columnId = 0;
    }

    ;//链接上的栏目id
    console.log('文章id:', articleId, '栏目id:', columnId)
    console.log('title',$('#share-title'))
    $.post(
        '/index/changeTitle.html',
        {column_id: columnId, article_id: articleId},
        function (data) {
            if (data.code == 200) {
                console.log(data)
                $('title').text(data.title);
                // $('#share-title').attr('content',data.title)
            } else {
                console.log(data.msg)
            }
        }, 'json'
    );
})