<?php

namespace Framework\Http;

class Response {
	
	public function __construct(
		private string|array|object $content = "",
		private int $status = 200,
		private array $headers = []
	)
	{}
	
	public function send(): void
	{
		echo $this->content;
	}

	
} 
