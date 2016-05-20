/*!jquery.validate    Expand
 * set default config
 *	add validate Method
 *	add and Expand  jquery.validate.zh_cn.js
 */
 //  set  default  config
$.validator.setDefaults({
  submitHandler: function(form) {form.submit(); }
});

//   add validate methods
jQuery.validator.addMethod("regex", function(value, element, params) {
	return this.optional(element) || (new RegExp(params[0]).test(value));//第一个参数作为正则表达式匹配值
}, $.validator.format($.validator.messages.regex));

jQuery.validator.addMethod("validatorFn", function(value, element, params) {
	var validateResult = params[0](value,element);//执行function，取得返回值
	params[1]=validateResult==false?$.validator.messages.validatorFn:validateResult;//返回值为false则使用默认提示信息，否则，将返回值作为错误提示信息
	return  this.optional(element) || (validateResult==true);
}, $.validator.format("{1}"));//取得提示信息


//    add and Expand  jquery.validate.zh_cn.js 
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: ZH (Chinese, 中文 (Zhōngwén), 汉语, 漢語)
 */
$.extend($.validator.messages, {
	required: "这是必填字段",
	remote: "请修正此字段",
	email: "请输入有效的电子邮件地址",
	url: "请输入有效的网址",
	date: "请输入有效的日期",
	dateISO: "请输入有效的日期 (YYYY-MM-DD)",
	number: "请输入有效的数字",
	digits: "只能输入数字",
	creditcard: "请输入有效的信用卡号码",
	equalTo: "你的输入不相同",
	extension: "请输入有效的后缀",
	maxlength: $.validator.format("最多可以输入 {0} 个字符"),
	minlength: $.validator.format("最少要输入 {0} 个字符"),
	rangelength: $.validator.format("请输入长度在 {0} 到 {1} 之间的字符串"),
	range: $.validator.format("请输入范围在 {0} 到 {1} 之间的数值"),
	max: $.validator.format("请输入不大于 {0} 的数值"),
	min: $.validator.format("请输入不小于 {0} 的数值"),
	validatorFn:"格式不正确",
	regex:"格式不正确"
});

}));

