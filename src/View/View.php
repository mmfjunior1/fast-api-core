<?php
/**
 * View Class.
 *
 * PHP version 5.6
 *
 * @category Utils
 * @package  Nstalker
 * @author   mario.junior@aker.com.br <mario.junior@aker.com.br>
 * @license  www.aker.com.br Proprietary
 * @link     www.aker.com.br
 */
namespace FastApi\View;
/**
 * View Class.
 *
 * PHP version 5.6
 *
 * @category Utils
 * @package  Nstalker
 * @author   mario.junior@aker.com.br <mario.junior@aker.com.br>
 * @license  www.aker.com.br Proprietary
 * @link     www.aker.com.br
 */
class View
{
    /**
     * Provide a json response
     * 
     * @param Array $array Fields for json conversion
     * 
     * @return print(json_encode())
     */
    public static function json($array = array())
    {
        if (ob_get_length()) {
            ob_clean();
        }
        ob_start();
        header('Content-Type: application/json');
        return print(json_encode($array));
    }
    
    public static function render($template = null, $partials = array()) {
       if ($template === null) {
          throw new \Exception("The template must be specified");
       } 
       if (count($partials) > 0) {
           extract($partials);
       }
       if (file_exists('../views/' . $template)) {
          require('../views/' . $template);
          return true;
       }
       throw new \Exception("Template not found");
    }
}
