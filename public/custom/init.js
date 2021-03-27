$(function(){
    $(".ajaxlink").click(function () {
        var url = $(this).attr('url');
        $(".tips-ok").attr('url',url);
        var ask = $(this).attr('ask');
        $("#ask-info").html(ask);
        $('#tips-normal').modal('show');
    });
    $(".tips-ok").click(function () {
        var url = $(this).attr('url');
        if (url != '' && url != undefined) {
            window.location.href=url;
        }
    });

    $.extend($.validator.messages, {
        required: "这是必填字段",
        email: "请输入有效的电子邮件地址",
        url: "请输入有效的网址",
        dateISO: "请输入有效的日期 (YYYY-MM-DD)",
        number: "请输入有效的数字",
        digits: "只能输入数字",
        creditcard: "请输入有效的信用卡号码",
        equalTo: "你的输入不相同",
    });

    //Dashmix.helpers(['ckeditor5']);


    $('a.ajax-modals').click(function() {
        var url = $(this).attr('href');
        ajaxGetHtml(url);
        return false;
    });

    window.setTimeout(function(){
        $('[data-dismiss="tips"]').alert('close');
    },2000);
});

function ajaxGetHtml(url){
    jQuery.ajax({
        type: 'Get',
        url: url,
        dataType: "json",
        data: {},
        async: false,
        success: function(ret){
            showBox(ret);
        }
    });
}
function showBox(ret){
    $('#modal-block-vcenter').html(ret.data);
    $('#modal-block-vcenter').modal('show');
    Dashmix.helpers(['ckeditor5','select2', 'datepicker', 'colorpicker', 'maxlength', 'ckeditor','flatpickr']);
}

function submit_form(){
    $("#modal-block-vcenter form:first").submit();
}

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});