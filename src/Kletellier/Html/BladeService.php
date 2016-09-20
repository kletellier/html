<?php

namespace Kletellier\Html;
 
use Philo\Blade\Blade;

/**
 * Load Blade Environment
 *
 */
class BladeService 
{
    private $_cachefolder="";
              
     function __construct($cachefolder="")
     {
       $this->_cachefolder = $cachefolder;
     }
     
      /**
     * Function for Blade path searching
     * 
     * @return string
     */
    private function getPathArray()
    {
        return array(\Kletellier\Html\HtmlUtils::getAssetPath());
         
    }
    
    /**
     * Render Blade template
     * 
     * @param string $template template path
     * @param array $params parameters array for template
     */ 
    public function render($template,array $params)
    {   
        $ret = "";
        try 
        {           
          
            $cachepath = ($this->_cachefolder=="") ?  \Kletellier\Html\HtmlUtils::getCachePath() : $this->_cachefolder;
            $views = $this->getPathArray();
            $blade = new Blade($views, $cachepath); 
            $ret = $blade->view()->make($template, $params)->render();  
        } 
        catch (\Exception $e) 
        {
            throw new \Exception($e->getMessage());          
        }
         
        return $ret;
    }
}
