<?php
namespace Mcc\HeaderHook;

class Plugin extends \System\Classes\PluginBase
{
	public function pluginDetails() {
		
		return [
			'name' => 'MCC Header Hook',
			'description' => 'Provides hooks to query and set request and response headers from twig.',
			'author' => 'Geoff Oslund',
			'icon' => 'icon-leaf'
		];
	}

	public function registerComponents() {
		return [
			'Mcc\HeaderHook\Components\HeaderHook' => 'headerHook',
			'Mcc\HeaderHook\Components\GetRequestHeader' => 'getRequestHeader',
			'Mcc\HeaderHook\Components\SetResponseHeader' => 'setResponseHeader'
		];
	}
}