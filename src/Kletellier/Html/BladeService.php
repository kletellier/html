<?php

namespace Kletellier\Html;
 
use Philo\Blade\Blade;

/**
 * Load Blade Environment
 *
 */
class BladeService 
{
              
     function __construct()
     {
       
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
    public function render($template,array $params,$disabledebug=false)
    {   
        $ret = "";
        try 
        {            
            $cachepath = \Kletellier\Html\HtmlUtils::getCachePath();
            $views = $this->getPathArray();
            $blade = new Blade($views, $cachepath); 

            // get blade compiler
            $compiler = $blade->getCompiler();

            // add use directive
            $compiler->directive('use', function($expression){               
                return "<?php use $expression; ?>";
            });   
             
            
            $ret =  $blade->view()->make($template, $params)->render();  
        } 
        catch (\Exception $e) 
        {
            throw new \Exception($e->getMessage());          
        }
         
        return $ret;
    }
}
