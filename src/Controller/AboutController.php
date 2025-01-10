<?php

namespace App\Controller;
use Framework\Http\Response;


class AboutController
{
	public function about_index(): Response
	{
		$links = Models\Links::includeAllLinks();
		$header = Models\Header::includeHeader();
		
		$about_me = Models\About::includeAboutMePage();
		
		$footer = Models\Footer::includeFooter();
		
		$content = "";
		return new Response($content);
	}
}