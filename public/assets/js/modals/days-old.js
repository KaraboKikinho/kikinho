
$(document).ready(function()
{
	let calculator = $('#calculate')[0];
	
	calculator.addEventListener('click', function(e)
	{
		e.preventDefault();
		
		$('#calculate')[0].style.display = "block";
		let birthdate = $('#calend').val();
		
		if(birthdate !== "")
		{
			$.ajax({
				url: "/ajax-handler.php",
				type: 'POST',
				data: {
					action: "daysOld",
					birthDate: birthdate
				},
				dataType: "json",
				success: function(response){
					console.log(response);
					$('#results')[0].innerHTML = response.message;
					$('#calend').hide();
					$('#calculate').hide();
				},
				error: function(xhr, status, err){
					console.log(err);
				}
			})
		}
	});
	
	
	
	//Count your days BTN
	let countDaysBtn = $('#countYourDays')[0];
	
	countDaysBtn.addEventListener('click', function(){
		$('#calculate').show();
		$('#calend').show();
		$('#calend').innerHTMl = "YYYY/MM/DD";
		
	})
	
	
});

