$(function () {

	$('#login-form-link').click(function (e) {
		$("#formlogin").delay(100).fadeIn(100);
		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function (e) {
		$("#register-form").delay(100).fadeIn(100);
		$("#formlogin").fadeOut(100);
		$('#formlogin-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});