<?php
namespace Mcc\HeaderHook\Components;

use \Illuminate\Http\JsonResponse;
use Event;
use Response;
use Cms\Classes\Controller;
class SetResponseHeader extends \Cms\Classes\ComponentBase
{
	public function componentDetails() {
		return [
			'name' => 'Set Response Header',
			'description' => 'Hooks into the response to inject a custom header value from twig.'
		];
	}

	public function setPageResponseType($type) {

		$page = $this->getController()->getPage();

		
		$page->settings['mcc-content-type'] = $type;
		
	}

	public function sendJsonResponse($payload) {
		

		$page = $this->getController()->getPage();
		$apiBag = $page->apiBag;
				$statusCode = 200;
		if (!$page) {
	 	   	$statusCode = 404;
		}
		
		$headers = array();
		if (isset($page->settings['mcc-content-type']) && !empty($page->settings['mcc-content-type'])) {
			$type = $page->settings['mcc-content-type'];
			$contentTypes = array(
	            'html' => 'text/html',
	            'json' => 'application/json',
	            'css' => 'text/css',
	            'js' => 'application/javascript',
	            'pdf' => 'application/pdf',
	            'txt' => 'text/plain',
	            'xml' => 'application/xml'
        	);

        	$headers['Content-Type'] = $contentTypes[$type];

		}

		$response = Response::make($payload, $statusCode, $headers);

		// $response = Response::header($payload, $statusCode);
		// $response->header('Content-Type', 'application/json');
		// $response->setData($payload);
		$response->send();
		return null;

		
	}

	public function defineProperties() {
		return [
			'searchValue' => [
				'title' => 'Search Value'
			]	
		];
	}
}