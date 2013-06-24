<?php

namespace Craft;

class PointyPlugin extends BasePlugin {

	function getName()
	{
		return Craft::t('Pointy');
	}

	function getVersion()
	{
		return '1.0';
	}

	function getDeveloper()
	{
		return 'Iain Urquhart';
	}

	function getDeveloperUrl()
	{
		return 'http://iain.co.nz';
	}

}