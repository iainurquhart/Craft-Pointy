<?php
namespace Craft;

class Pointy_PointyFieldType extends BaseFieldType
{
	public function getName()
	{
		return Craft::t('Pointy');
	}

	public function getInputHtml($name, $value)
	{
		// create our $value array from x|y string
		if($value && is_string($value))
		{
			$value = explode('|', $value);
			$x = (isset($value[0])) ? $value[0] : 0;
			$y = (isset($value[1])) ? $value[1] : 0;
		}
		// $value comes back as an array if it's a validation error
		// like the title is missing for example
		else
		{
			$x = (isset($value['x'])) ? $value['x'] : 0;
			$y = (isset($value['y'])) ? $value['y'] : 0;
		}
		

		return craft()->templates->render(
			'pointy/input', 
			array(
				'settings' => $this->getSettings(),
				'name'  => $name,
				'x' => $x,
				'y' => $y
			)
		);
	}

	public function prepValue($value)
	{
		
		if($value)
			$value = explode('|', $value);

		$x = (isset($value[0])) ? $value[0] : '';
		$y = (isset($value[1])) ? $value[1] : '';

		return array(
			'x' => $x,
			'y' => $y
		);
	}


	protected function prepPostData($value)
    {
    	return (is_array($value)) ? implode('|', $value) : '';
    }

	protected function defineSettings()
	{
		return array(
			'imageTypes' => array(
				AttributeType::Mixed, 'default' => array(
					'Fixed', 
					// 'Dynamic'
				)
			),
			'imageType' => array(AttributeType::Mixed),
			'fixedImageUrl' => array(AttributeType::Mixed, 'default' => 'http://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap&sensor=false'),
		);
	}

	public function getSettingsHtml()
    {
        return craft()->templates->render('pointy/settings', array(
            'settings' => $this->getSettings(),
            'pointyJs' => UrlHelper::getResourceUrl('resources/pointy.js')
        ));
    }
}