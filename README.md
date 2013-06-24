# Pointy, for Craft CMS

### Overview

Pointy is my first attempt at a Craft Fieltype, and is a port of [Pointee for ExpressionEngine 2](http://iain.co.nz/software/docs/pointee).

Pointy records the x and y coordinates of a single click on an image.

![Screenshot of the Pointy Fieldtype](http://cl.ly/image/1C2O1y3Q431V)

#### Installation

Drop the /craft/plugins/pointy folder into your Craft site's plugin directory. Install the plugin and create a Pointy Field.

When creating the field, enter the url for the image which publishers will create coordinates on. An example url is included outputting a static Google Map image.

#### Template tags

Output your entries as per normal, in this example my Pointy field has the Handle/shortname of 'points'

	{% for entry in entries %}
		
	    <li><a href="{{ entry.url }}">{{ entry.title }} 

	    	{{ entry.points.x }} <!-- x coordinates -->
	    	{{ entry.points.y }} <!-- y coordinates -->

	   </a></li>
	{% endfor %}

If you want to offset the coordinates, for CSS positioning for example, simply append the math required to the variables:

	    	{{ entry.points.x + 14 }}
	    	{{ entry.points.y - 20 }}

#### To Do

Integrate Assets so allow uploading of images, and allow a per entry image in addition to the image per field.