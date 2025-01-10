<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'daysOld') 
{
    if (isset($_POST['birthDate']) && !empty($_POST['birthDate'])) 
	{
        $birthDate = htmlspecialchars(strip_tags($_POST['birthDate']), ENT_QUOTES);
        $birthDateTime = new DateTime($birthDate);
        $currentDateTime = new DateTime();

        // Calculate the difference in days
        $interval = $currentDateTime->diff($birthDateTime);
        $daysOld = $interval->format('%a'); // Total days
		
		if($daysOld > 0)
		{
			echo json_encode([
				'success' => true,
				'message' => "<b class='text-success'>You are $daysOld days old today</b>"
			]);
		}
		
    } else {
        // Handle missing or invalid birth date
        echo json_encode([
            'success' => false,
            'message' => "<b class='text-danger'>Invalid birth date provided.</b>"
        ]);
    }
} else {
    // Handle invalid request
    echo json_encode([
        'success' => false,
        'message' => 'Invalid action or method.'
    ]);
}
?>
