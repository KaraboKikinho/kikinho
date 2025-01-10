


$(document).ready(function() 
{
	
	var nameInput = $('#name'); 
	var cellphoneInput = $('#number');
	var emailInput = $('#email');
	var subjectInput = $('#subject');
	var messageInput = $('#message');
	
	var nameRegex = /^[A-Za-z\s-']{1,50}$/;
	var cellphoneRegex = /^\d{10,13}$/;
	var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	var subjectRegex = /^[A-Za-z0-9\s.,!?]+$/;
	var messageRegex = /^[A-Za-z0-9\s.,!?@%()+-/*#='":]+$/;
	
	nameInput.keyup(function(event) 
	{
		event.preventDefault();

		var inputValue = nameInput.val();

		if (inputValue !== "") 
		{
			if (!nameRegex.test(inputValue)) 
			{
				$('.name-err').html('Name contains invalid characters. Only letters allowed');
				return;
			}
			else{
				$('.name-err').html('');
			}
			
		}
		else{
			$('.name-err').html('Name cannot be empty');
			return;
		}
		
	});
	
	
	cellphoneInput.keyup(function(event) 
	{
		event.preventDefault();

		var inputValue = cellphoneInput.val();

		if (inputValue === "") 
		{
			$('.number-err').html('');
			return;
		}

		if (inputValue.length > 13 || inputValue.length < 10) 
		{
			$('.number-err').html('Cellphone number must be between 10 and 13 digits');
			return;
		}
		

		if (!cellphoneRegex.test(inputValue)) 
		{
			$('.number-err').html('Invalid cellphone number');
			return;
		}
		
		
		// If all validations pass
		$('.number-err').html('');
	
	});
	
	
	
	

	emailInput.keyup(function(event) 
	{
		event.preventDefault();

		var inputValue = emailInput.val();

		if (inputValue === "") 
		{
			$('.email-err').html('');
			return;
		}

		if (!emailRegex.test(inputValue)) 
		{
			$('.email-err').html('Invalid email address');
			return;
		}

		// If all validations pass
		$('.email-err').html('');
	
	});
		
	
	

// SUBJECT ONKEYUP
	subjectInput.keyup(function(event) 
	{
		event.preventDefault();

		var inputValue = subjectInput.val();

		if (inputValue === "") 
		{
			$('.subject-err').html('Subject cannot be empty');
			return;
		}
		

		if (!subjectRegex.test(inputValue)) 
		{
			$('.subject-err').html('Invalid characters in the subject');
			return;
		}

		// If all validations pass
		$('.subject-err').html('');
	});


// SUBJECT ONFOCUS
	subjectInput.on('focus', function()
	{
		if(cellphoneInput.val() == "" && emailInput.val() == "")
		{
			$('.email-number-err').html('Either your email or cellphone number is required3!');
		}
		else{
			$('.email-number-err').html('');
		}
		
	});
	
	
	
	
// Message validation
	

	messageInput.keyup(function(event) 
	{
		event.preventDefault();

		var inputValue = messageInput.val();

		if (inputValue === "") 
		{
			$('.message-err').html('Message cannot be empty');
			return;
		}

		// Customize this regex based on your message validation requirements
		

		if (!messageRegex.test(inputValue)) 
		{
			$('.message-err').html('Invalid characters in your message');
			return;
		}

		// If all validations pass
		$('.message-err').html('');
	});

	
	
});


// SEND EMAIL BUTTON 

document.addEventListener('DOMContentLoaded', function()
{
	var sendingBtn = $('#emailBtn');
	
	sendingBtn.on('click', function(event)
	{
		event.preventDefault();
		sendingBtn.attr('disabled', true);
		
		
		var name = $('#name').val();
		var cellphone = $('#number').val();
		var email = $('#email').val();
		var subject = $('#subject').val();
		var message = $('#message').val();
				
		var nameRegex = /^[A-Za-z\s'-]{1,50}$/;
		var cellphoneRegex = /^\d{10,13}$/;
		var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		var subjectRegex = /^[A-Za-z0-9\s.,!?]+$/;
		var messageRegex = /^[A-Za-z0-9\s.,!?@%()+-\/*#='":]+$/;
		
		if (name !== "") 
		{
			if (!nameRegex.test(name)) 
			{
				$('.name-err').html('Name contains invalid characters');
				$('#name').focus();
				sendingBtn.attr('disabled', false);
				return;
			}
			else{
				$('.name-err').html('');
			}
		}
		
		else
		{
			$('.name-err').html('Name cannot be empty');
			$('#name').focus();
			sendingBtn.attr('disabled', false);
			return;
		}
		
		
		// CELLPHONE
		
		if (cellphone.length < 10 && cellphone.length > 13) 
		{
			$('.number-err').html('Cellphone numbers must be between 10 and 13');
			$('#number').focus();
			sendingBtn.attr('disabled', false);
			return;
		}
		
		else
		{
			$('.number-err').html('');
		}
			
		
		if (cellphone === "" && email === "") 
		{
			$('.number-err').html('Either your cellphone or email is required');
			$('#number').focus();
			sendingBtn.attr('disabled', false);
			return;
		}
		
		if(email === "")
		{
			if (!cellphoneRegex.test(cellphone)) 
			{
				$('.number-err').html('Invalid cellphone number');
				$('#number').focus();
				sendingBtn.attr('disabled', false);
				return;
			}
			else
			{
				$('.number-err').html('');
			}
		}
		
		
		// email

		// Validate Email if provided
		if(cellphone === "")
		{
			if (!emailRegex.test(email)) 
			{
				// If email is provided but not valid, display an error
				$('.email-err').html('Please double check your email address');
				$('#email').focus();
				sendingBtn.attr('disabled', false);
				return;
			}
			else
			{
				$('.email-err').html('');
			}
		}
	
		
		// SUBJECT
		if (subject === "") 
		{
			$('.subject-err').html('Subject cannot be empty');
			$('#subject').focus();
			sendingBtn.attr('disabled', false);
			return;
		}

		if (!subjectRegex.test(subject)) 
		{
			$('.subject-err').html('Invalid characters are not allowed');
			$('#subject').focus();
			sendingBtn.attr('disabled', false);
			return;
		}
		
		// MESSAGE
		if (message === "") 
		{
			$('.message-err').html('You cannot send an empty email');
			$('#message').focus();
			sendingBtn.attr('disabled', false);
			return;
		}

		if (!messageRegex.test(message)) 
		{
			$('.message-err').html('Check you messages for invalid characters');
			$('#message').focus();
			sendingBtn.attr('disabled', false);
			return;
		}
		
		
		$.ajax(
		{
			type: "POST",
			url: "/ajax-handler.php",
			data: {
				action: "sendEmail",
				name: name,
				number: cellphone,
				email:  email,
				subject: subject,
				message: message
			},
			dataType: "json",
			success: function(response)
			{
				console.log(response)
				// Check if the response indicates failure
        if (response.success === false) 
				{		
					if (response.errors.name) 
					{
						$('.name-err').text(response.errors.name);
						$('#name').focus();
						sendingBtn.attr('disabled', false);
					}
					
					if (response.errors.number) 
					{
						$('.number-err').html(response.errors.number);
						$('#number').focus();
						sendingBtn.attr('disabled', false);
					}

					if (response.errors.email) 
					{
						$('.email-err').html(response.errors.email);
						$('#email').focus();
						sendingBtn.attr('disabled', false);
					}
					
					if (response.errors.subject) 
					{
						$('.subject-err').text(response.errors.subject);
						$('#subject').focus();
						sendingBtn.attr('disabled', false);
					}
					
					if (response.errors.message) 
					{
						$('.message-err').text(response.errors.message);
						$('#message').focus();
						sendingBtn.attr('disabled', false);
					}

        } 
				else if(response.success === null)
				{
					$('.emailMsg').html(response.emailResp);
					$('#emailBtn').html('Send email again');
					$('#emailBtn').attr('class', 'button is-danger');
					$('.responseFromEmail').html(response.emailResp);
					$('.responseFromEmail').attr('class', 'text-danger text-center');
					sendingBtn.attr('disabled', false);
        }
				else if(response.success === true)
				{
					$('.emailMsg').html(response.emailResp);
					$('.emailMsg').attr('class', 'text-success text-center');
					$('#emailBtn').html(response.emailResp);
					$('#emailBtn').attr('disabled', true);
					$('#email-ajax-form')[0].reset();
				}
				
			},
			error: function(xhr, status, error) 
			{
				// Handle errors (e.g., show an error message)
				$('#emailNotification').html("Error has occured. Please try again later!");
      }
			
		})
		
		
		
	});
	
});






