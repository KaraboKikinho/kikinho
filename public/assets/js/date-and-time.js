
// Calculating my age in days
const daysOld = () => {
	let birthYear = 1992;
	let birthMonth = 0;  // January is 0, so this is correct
	let birthDate = 4;
	
	let today = new Date();
	let currentYear = today.getFullYear();
	let currentMonth = today.getMonth(); // 0-based index (January = 0)
	let currentDate = today.getDate();
	
	// Calculate age in years, months, and days
	let ageInYears = currentYear - birthYear;
	let ageInMonths = currentMonth - birthMonth;
	let ageInDays = currentDate - birthDate;

	// Adjust if the current month/day is before the birth month/day
	if (ageInMonths < 0 || (ageInMonths === 0 && ageInDays < 0)) {
		ageInYears--; // Reduce one year if the birth month/day hasn't been reached this year
	}

	// Total days considering leap years
	let daysInYears = ageInYears * 365.25;
	let daysInMonths = (ageInMonths / 12) * 365.25;
	let totalDays = Math.floor(daysInYears + daysInMonths + ageInDays);
	
	return totalDays;
};

// Days old display
document.addEventListener("DOMContentLoaded", () => {
	let daysOldElement = document.getElementById('total');
	if (daysOldElement) {
		daysOldElement.innerHTML = daysOld();
	}

	// Time display every second
	setInterval(() => time('footerTime'), 1000);

	// Date display
	let todays = document.getElementById('dateDisplay');
	if (todays) {
		todays.innerHTML = todaysDate();
	}
});

// Calculating time with a second's interval
const time = (tag) => {
	let currentTime = new Date();
	let hr = currentTime.getHours();
	let mn = currentTime.getMinutes();
	let sc = currentTime.getSeconds(); // Get the seconds
	
	// Add leading zeros to hours, minutes, and seconds if needed
	hr = hr < 10 ? '0' + hr : hr;
	mn = mn < 10 ? '0' + mn : mn;
	sc = sc < 10 ? '0' + sc : sc;

	let clock = "";

	if (currentTime.getHours() < 12) {
		clock = hr + ':' + mn + ':' + sc + " AM";
	} else {
		// Convert to 12-hour format for PM
		let hr12 = currentTime.getHours() % 12 || 12;
		clock = hr12 + ':' + mn + ':' + sc + " PM";
	}

	// Display the time
	let x = document.getElementById(tag);
	if (x) {
		x.innerHTML = clock;
	}
};


// Get today's date in YYYY/MM/DD format
const todaysDate = () => {
	let date_obj = new Date();
	let yr = date_obj.getFullYear();
	let mn = date_obj.getMonth() + 1; // Months are zero-indexed, so add 1
	let dt = date_obj.getDate();

	// Format the date as YYYY/MM/DD
	let formattedDate = yr + "/" + (mn < 10 ? '0' + mn : mn) + "/" + (dt < 10 ? '0' + dt : dt);
	return formattedDate;
};
