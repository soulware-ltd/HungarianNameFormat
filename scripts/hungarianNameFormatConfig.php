<?php 

namespace Soulware\HungarianNameFormat;

class hungarianNameFormatConfig{
    
    public $module;
    public $sourcefile;
    public $type;
    public $replace;
    
    function __construct($module, $sourcefile, $type, $replace) {
        $this->module = $module;
        $this->sourcefile = $sourcefile;
        $this->type = $type;
        $this->replace = $replace;
    }

 
}   


    
    ?>