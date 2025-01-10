<?php

namespace App\Controller;
use Framework\Http\Response;


class BusinessController
{
	public function business_index(): Response
	{
		$links = Models\Links::includeAllLinks();
		$header = Models\Header::includeHeader();
		
		$business = Models\Business::includeBusinessPage();
		
		$footer = Models\Footer::includeFooter();
		
		$content = "";
		return new Response($content);
	}
}