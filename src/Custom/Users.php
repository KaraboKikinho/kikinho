<?php 


namespace App\Custom;
use App\DbAccess\DbController;


class Users extends DbController
{
	
	public function countOnlineUsers($timeout = 300)
	{

    $currentTime = time();

    // Set a timeout for inactive users (in seconds)
    $timeout = $timeout;
		
		// Check if the user has a session variable indicating their last activity time
    if (isset($_SESSION['last_activity']) && ($currentTime - $_SESSION['last_activity']) < $timeout) 
		{
      // User is still active, update the last activity time
      $_SESSION['last_activity'] = $currentTime;
				
    } 
		else {
        // User is either a new visitor or has been inactive for too long, update session variables
        $_SESSION['last_activity'] = $currentTime;
        $_SESSION['user_count'] = isset($_SESSION['user_count']) ? $_SESSION['user_count'] + 1 : 1;
    }
		
		// Count the number of online users
    $onlineUsers = isset($_SESSION['user_count']) ? $_SESSION['user_count'] : 0;
		

    // End the session
    session_write_close();

    // Return the count of online users
    return $onlineUsers;
		
	}
	
	
}
