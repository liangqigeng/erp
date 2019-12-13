$(function() {
    $('.pp').click(function () {
        console.log(getMsgUrl);
    });
    get_msg(getMsgUrl);
});

//异步轮询函数
function get_msg(url) {
       $.getJSON(url,function (data) {
           //console.log(data);
           var str = '';
           for(k in data){
                    str += '<div class="msg left msg_right">'
                    str += '<div class="msg_top_left left">订单申请</div>'
                    str +='<div class="msg_top_right right">'
                    str +='<div class="deal left"><span class="iconfont">&#xe61d;</span><span>接手</span></div>'
                    str +='<div class="deal right"><span class="iconfont">&#xe608;</span><span class="done">完成</span></div></div>'
                    str +='<div class="clear"></div>'
                    str +='<div class="msg_content">'
                    str +='<div class="msg_content_top">创建时间：'+data[k]['que_addtime']+' 创建人：'+data[k]['from_id']+'</div>'
                    str +='<div class="msg_content_title">'+data[k]['que_title']+'</div>'
                    str +='<div class="msg_content_remark">'+data[k]['que_remark']+'</div>'
                    str +='<div class="msg_bottom right">详情<span class="iconfont">&#xe628;</span></div>'
                    str +='<div class="clear"></div>'
                    str +='</div>'
                    str +='</div>'

           }
           $('.msg_deal').html(str);
           setTimeout(function () {
               get_msg(url);
           },5000);
       });
}

