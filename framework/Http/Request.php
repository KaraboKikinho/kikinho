<?php
 namespace Framework\Http;


class Request
{
	public function __construct(
		public readonly array $getParams, 
		public readonly array $postParams,
		public readonly array $cookies,
		public readonly array $files,
		public readonly array $server
	)
	{}
	
	public static function createFromGlobals($_COOKIES=[]): static
	{
		return new static($_GET, $_POST, $_COOKIES, $_FILES, $_SERVER);
	}
	
	public function getMethodInfo(): string
	{
		return $this->server['REQUEST_METHOD'];
	}
	
	public function getPathInfo() : string
	{
		return strtok($this->server['REQUEST_URI'], '?');
	}
	
}