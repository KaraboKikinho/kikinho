<?php

namespace App\Controller;
use Framework\Http\Response;


class EmailController
{
	public function email_index(): Response
	{
		$links = Models\Links::includeAllLinks();
		$header = Models\Header::includeHeader();
		
		$email = Models\Emails::displayEmails();
		
		$footer = Models\Footer::includeFooter();
		
		$content = "";
		return new Response($content);
	}
}