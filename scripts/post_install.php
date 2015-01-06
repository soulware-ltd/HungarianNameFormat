<?php

function post_install(){
    
	require_once(__DIR__ . '/hungarianNameFormat.php');
        require_once (__DIR__.'/hungarianNameFormat.config.php');
   
	$name_format = new Soulware\HungarianNameFormat\hungarianNameFormat();
        $name_format->install($files_to_change);

} 

?>
