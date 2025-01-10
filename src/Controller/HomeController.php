<?php

namespace App\Controller;
use Framework\Http\Response;


class HomeController
{
	public function index(): Response
	{
		$links = Models\Links::includeAllLinks();
		$header = Models\Header::includeHeader();
		
		$carousel = Models\Carousel::includeCarousel();
		$cal = Models\Calendar::includeCalendar();
		$projects = Models\Projects::includeCurrentProjects();
		
		$footer = Models\Footer::includeFooter();
		
		$content = "";
		return new Response($content);
	}
}