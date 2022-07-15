<?php

class CRT_ADMIN_CONFIG {
	
	function ParseTags($Template, $ParseTags){ 
        $Template = file_get_contents($Template); 
        foreach($ParseTags as $UnParsed => $Parsed){ 
        $Template = str_replace("{".$UnParsed."}", $Parsed, $Template); 
      } 
      return $Template; 
	} 

  	function SaveConfig($content){
		// Last Updated: 3rd Aug 2010 @ 2:35 PM
		$time = "Last Updated " . date('l jS \of F Y h:i:s A');
		file_put_contents(BASE_PATH.'/config/config.php','<?php
		// '.$time.'
		  '.$content.'');
	}
}