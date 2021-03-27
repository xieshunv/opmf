function get_query_string(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) {
        return decodeURIComponent(r[2]);
    }
    return null;
}

// 手机
jQuery.validator.addMethod("isPhone", function(value, element) {
    var length = value.length;
    var mobile = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
    return this.optional(element) || (length == 11 && mobile.test(value));
}, "请填写正确的手机号码")
// 固话
jQuery.validator.addMethod("isTel", function(value, element) {
    var phone = /(^(\d{3,4}-)?\d{6,8}$)|(^(\d{3,4}-)?\d{6,8}(-\d{1,5})?$)|(\d{11})/;
    return this.optional(element) || (phone.test(value));
}, "请填写正确的固定电话")

$(function () {
    $('.confirm-btn').click(function (event) {
        var msg = $(this).attr('data-msg') || '删除后无法恢复，是否确定删除';
        var title = $(this).attr('data-title') || '重要提醒';
        var href = $(this).attr('data-href') || $(this).attr('href');
        layer.confirm(msg, {
            title: title,
        }, function () {
            // 确定按钮点击逻辑
            window.location.href = href;
        }, function () {

        })
        event.preventDefault();
    })
})
