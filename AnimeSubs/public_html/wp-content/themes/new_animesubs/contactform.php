<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
	<title>AnimeSubs Contact Form</title> 
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		$("#contact").validate({
			debug: false,
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
				subject: "required",
				comment: "required"
			},
			messages: {
				name: "Please let us know who you are.",
				email: "A valid email will help us get in touch with you.",
				subject: "Please put subject on your message.",
				comment: "A brief description of why you need to contact us is highly appreciated."
			},
			submitHandler: function(form) {
				// do other stuff for a valid form
				$.post('sendform.php', $("#contact").serialize(), function(data) {
					$('#results').html(data);
				});
                                $("#results").addClass('success');
			}
		});
	});
	</script>
	<style>
	label.error { width: 250px; display: inline; color: red;}
	#contact label {
		display:block;
		padding:5px 0;
                color:#FFF;
	}

	#contact input, #contact textarea {
		border:1px solid #ddd;
		padding:8px;
		width:300px;
		margin-bottom:10px;
	   -moz-border-radius:4px;
	   -webkit-border-radius:4px;
	}


	#contact textarea {
		width:560px;
		font-family:Arial, Helvetica, sans-serif;
		font-size:13px;
	}

	#contact input[type="submit"]{
		border:none;
		width:151px;
		height:32px;
		margin-top:10px;
		cursor:pointer;
		background:url(images/but_form.jpg) 0 100% repeat-x;
		color:#FFF;
		font-size:12px;
		padding:0;
	}

	#contact label.error, label.success{
		background:#FEF4F1;
		border:1px solid #F7A68A;
		color:#DA4310;
		padding:10px;
		-moz-border-radius:4px;
	   -webkit-border-radius:4px;
	}

	#success {
		background:#F5FAF1;
		border:1px solid #C2E1AA;
		color:#8FA943;
		-moz-border-radius:4px;
	   -webkit-border-radius:4px;
	}
	</style>
</head>
<body>
<form name="contact" id="contact" action="" method="POST">  
<!-- The Name form field --> 
    <label for="name" id="name_label"><b>Name:</b></label>  
    <input type="text" name="name" id="name" size="30" value=""/>  
	<br> 
<!-- The Email form field --> 
    <label for="email" id="email_label"><b>Email:</b></label>  
    <input type="text" name="email" id="email" size="30" value=""/> 
	<br> 
<!-- The Subject form field --> 
    <label for="subject" id="subject_label"><b>Subject:</b></label>  
    <input type="text" name="subject" id="subject" value=""/>  
	<br> 
<!-- The Subject form field --> 
    <label for="comment" id="comment_label"><b>Your Message:</b></label>  
    <textarea cols="20" rows="7" id="commentinput" name="comment"></textarea>  
	<br> 
<!-- The Submit button --> 
	<input type="submit" name="submit" value="Submit" /> 
        <input type="hidden" id="receiver" name="receiver" value="vledor0723@gmail.com"/>
        <input type="hidden" id="blogname" name="blogname" value="AnimeSubs"/>
</form>
<!-- We will output the results from process.php here --> 
<div id="results"><div>
</body>
</html>			