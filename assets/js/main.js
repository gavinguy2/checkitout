$(document)
.on("submit", "form.js-register", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val(),
        username: $("input[type='text']", _form).val()

	};

	if(dataObj.email.length < 6) {
		_error
			.text("Please enter a valid email address")
			.show();
		return false;
	} else if (dataObj.password.length < 6) {
		_error
			.text("Please enter a password that is at least 6 characters long.")
			.show();
		return false;
	}
    else if (dataObj.username.length < 5) {
		_error
			.text("Please enter a username that is at least 5 characters long.")
			.show();
		return false;
	}

	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is 
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
	})
	.always(function ajaxAlwaysDoThis(data) {
		console.log('Always');
	})

	return false;
})

.on("submit", "form.js-login", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		password: $("input[type='password']", _form).val(),
        username: $("input[type='text']", _form).val()

	};

	 if (dataObj.password.length < 6) {
		_error
			.text("Please enter a password that is at least 6 characters long.")
			.show();
		return false;
	}
    else if (dataObj.username.length < 5) {
		_error
			.text("Please enter a username that is at least 5 characters long.")
			.show();
		return false;
	}

	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/login.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
	})
	.always(function ajaxAlwaysDoThis(data) {
		console.log('Always');
	})

	return false;
})

.on("submit", "form.js-post", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		post_description: $("input[id='post_description']", _form).val(),
        post_title: $("input[id='post_title']", _form).val()

	};

	 if (dataObj.post_description.length < 3) {
		_error
			.text("Please enter a description that is at least 3 characters long.")
			.show();
		return false;
	}
    else if (dataObj.post_title.length < 3) {
		_error
			.text("Please enter a title that is at least 3 characters long.")
			.show();
		return false;
	}

	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/create_post.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
	})
	.always(function ajaxAlwaysDoThis(data) {
		console.log('Always');
	})

	return false;
})

.on("submit", "form.js-reply", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
        new_reply: $("input[id='new_reply']", _form).val(),
        post_id: current
        

	};

	  if (dataObj.new_reply.length < 3) {
		_error
			.text("Please enter a reply that is at least 3 characters long.")
			.show();
		return false;
	}

	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/reply.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
	})
	.always(function ajaxAlwaysDoThis(data) {
		console.log('Always');
        document.getElementById("new_reply").value = "";
       // ("input[id='new_reply']", _form).val() = "";
        console.log(dataObj.post_id);

	})

	return false;
    
    
    
    
})










