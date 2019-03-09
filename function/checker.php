<script>
$("#username").change(function () {
	var input = $(this);

	if (input.val() === "") {
		input.closest('.form-group').removeClass('has-error').removeClass('has-success');
		$('.fa-check, fa-warning', input.closest('.form-group')).remove();

		return;
	}

	input.attr("readonly", true).
	attr("disabled", true).
	addClass("spinner");

	$.post('<?=$url?>ajax/username.php', {
		username: input.val()
	}, function (res) {
		input.attr("readonly", false).
		attr("disabled", false).
		removeClass("spinner");

		// change popover font color based on the result
		if (res.status == 'OK') {
			input.closest('.form-group').removeClass('has-error').addClass('has-success');
			$('.fa-warning', input.closest('.form-group')).remove();
			input.before('<i class="fa fa-check"></i>');
			input.data('bs.popover').tip().removeClass('error').addClass('success');
		} else {
			input.closest('.form-group').removeClass('has-success').addClass('has-error');
			$('.fa-check', input.closest('.form-group')).remove();
			input.before('<i class="fa fa-warning"></i>');

			input.popover('destroy');
			input.popover({
				'html': true,
				'placement': (App.isRTL() ? 'top' : 'top'),
				'container': 'body',
				'content': res.message,
			});
			input.popover('show');
			input.data('bs.popover').tip().removeClass('success').addClass('error');

			App.setLastPopedPopover(input);
		}

	}, 'json');

});

$("#email").change(function () {
	var input = $(this);

	if (input.val() === "") {
		input.closest('.form-group').removeClass('has-error').removeClass('has-success');
		$('.fa-check, fa-warning', input.closest('.form-group')).remove();

		return;
	}

	input.attr("readonly", true).
	attr("disabled", true).
	addClass("spinner");

	$.post('<?=$url?>ajax/email.php', {
		email: input.val()
	}, function (res) {
		input.attr("readonly", false).
		attr("disabled", false).
		removeClass("spinner");

		// change popover font color based on the result
		if (res.status == 'OK') {
			input.closest('.form-group').removeClass('has-error').addClass('has-success');
			$('.fa-warning', input.closest('.form-group')).remove();
			input.before('<i class="fa fa-check"></i>');
			input.data('bs.popover').tip().removeClass('error').addClass('success');
		} else {
			input.closest('.form-group').removeClass('has-success').addClass('has-error');
			$('.fa-check', input.closest('.form-group')).remove();
			input.before('<i class="fa fa-warning"></i>');

			input.popover('destroy');
			input.popover({
				'html': true,
				'placement': (App.isRTL() ? 'top' : 'top'),
				'container': 'body',
				'content': res.message,
			});
			input.popover('show');
			input.data('bs.popover').tip().removeClass('success').addClass('error');

			App.setLastPopedPopover(input);
		}

	}, 'json');

});
var initialized = false;
var password = $("#password");
var repassword = $("#repassword");

password.keydown(function () {
	if (initialized === false) {
		// set base options
		password.pwstrength({
			raisePower: 1.4,
			minChar: 8,
			verdicts: ["Weak", "Normal", "Medium", "Strong", "Very Strong"],
			scores: [17, 26, 40, 50, 60]
		});

		// add your own rule to calculate the password strength
		password.pwstrength("addRule", "demoRule", function (options, word, score) {
			return word.match(/[a-z].[0-9]/) && score;
		}, 10, true);

		// set as initialized 
		initialized = true;
	}
});
var initialize = false;
repassword.keydown(function () {
	if (initialize === false) {
		// set base options
		repassword.pwstrength({
			raisePower: 1.4,
			minChar: 8,
			verdicts: ["Weak", "Normal", "Medium", "Strong", "Very Strong"],
			scores: [17, 26, 40, 50, 60]
		});

		// add your own rule to calculate the password strength
		repassword.pwstrength("addRule", "demoRule", function (options, word, score) {
			return word.match(/[a-z].[0-9]/) && score;
		}, 10, true);

		// set as initialized 
		initialize = true;
	}
});
</script>