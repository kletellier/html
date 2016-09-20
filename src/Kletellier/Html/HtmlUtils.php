<?php 

namespace Kletellier\Html; 

 

class HtmlUtils
{ 
 
	/**
	 * Return assets path to copy
	 * @return string
	 */
	public static function getAssetPath()
	{
		$ds =   DIRECTORY_SEPARATOR;
		$root = dirname(__FILE__);
		
		$path = $root . $ds . "assets";
		return $path;
	}

	public static function getCachePath()
	{
		$ds =   DIRECTORY_SEPARATOR;
		$root = dirname(__FILE__);
		
		$path = $root . $ds . "cache";
		return $path;
	}
	
	 
 
} 