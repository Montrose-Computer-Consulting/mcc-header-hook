<?php
namespace Mcc\HeaderHook\Components;

use Request;
class HeaderHook extends \Cms\Classes\ComponentBase
{
	public function componentDetails() {
		return [
			'name' => 'Base Component',
			'description' => 'Hooks into the request to scan for a particular header value to inject into twig.'
		];
	}

	public function hasHeader($find_header) {
		return Request::header($find_header);
		
	}

	public function defineProperties() {
		return [
			'searchValue' => [
				'title' => 'Search Value'
			]	
		];
	}
}