<?php
error_reporting(0);
/**
 * Function to automatically load classes without explicitly having to require them in.
 * Classes will only be loaded when they're needed.
 */
spl_autoload_register(function($className) {

    // We can only load the classes we know about
    if (substr($className, 0, 3) != "CRT") {
        return;
    }
    // Loading an administration class


    if (substr($className, 0, 9) == "CRT_ADMIN") {

        $class = explode("_", $className, 3);
        $fileName = strtolower($class[2]);
        $fileName = str_replace("_", ".", $fileName);
        $fileName = BASE_PATH . "/dash/includes/classes/class." . $fileName . ".php";
    } else
        if (substr($className, 0, 7) == "CRT_LIB") {
            $class = explode("_", $className, 3);
            $fileName = strtolower($class[2]);
            $fileName = str_replace("_", ".", $fileName);
            $fileName = BASE_PATH . "/system/lib/class." . $fileName . ".php";
        } else {
            $class = explode("_", $className, 2);
            $fileName = strtolower($class[1]);
            $fileName = str_replace("_", ".", $fileName);
            $fileName = BASE_PATH . "/includes/classes/class." . $fileName . ".php";
        }
        if (file_exists($fileName)) {
            require_once $fileName;
        }
});

/**
 * Return an already instantiated (singleton) version of a class. If it doesn't exist, will automatically
 * be created.
 *
 * @param string The name of the class to load.
 * @return object The instantiated version fo the class.
 */

function GetClass($className)
{
    static $classes;
    if (!isset($classes[$className])) {
        $classes[$className] = new $className;
    }
    $class = &$classes[$className];
    return $class;
}

/**
 * Fetch a configuration variable from the store configuration file.
 *
 * @param string The name of the variable to fetch.
 * @return mixed The value of the variable.
 */
function GetConfig($config)
{
    if (array_key_exists($config, $GLOBALS['CFG'])) {
        return $GLOBALS['CFG'][$config];
    }
    return '';
}

/**
 * Returns a string with text that has been run through htmlspecialchars() with the appropriate options
 * for untrusted text to display
 * @param string $text the string to escape
 * @return string The escaped string
 */
function html_escape($text)
{
    return htmlspecialchars($text, ENT_QUOTES, GetConfig('CharacterSet'));
}

/**
 * escape string from givin param and return the safe string.
 * @param string.
 */

function safe_string($string)
{
    return ($string);
}

/**
 * redirect the page to another page.
 * @param string The name of the file to redirect.
 */
function redirect($pagename)
{
    header("Location:$pagename");
    exit;
}

/**
 * redirect the page to another page.
 * @param string The name of the file to redirect.
 */
function Javascript_redirect($pagename)
{
    echo '<script type="text/javascript">
			 window.location = "' . $pagename . '"
			</script>';
    exit;
}


/**
 * remove the html tags from the string.
 * @param string string to be clean.
 * @param string tags not to be remove
 * @param string tags want to check more
 */

function remove_html($s, $keep = '', $expand =
    'script|style|noframes|select|option')
{
    /**/ //prep the string
    $s = ' ' . $s;

    /**/ //initialize keep tag logic
    if (strlen($keep) > 0) {
        $k = explode('|', $keep);
        for ($i = 0; $i < count($k); $i++) {
            $s = str_replace('<' . $k[$i], '[{(' . $k[$i], $s);
            $s = str_replace('</' . $k[$i], '[{(/' . $k[$i], $s);
        }
    }

    //begin removal
    /**/ //remove comment blocks
    while (stripos($s, '<!--') > 0) {
        $pos[1] = stripos($s, '<!--');
        $pos[2] = stripos($s, '-->', $pos[1]);
        $len[1] = $pos[2] - $pos[1] + 3;
        $x = substr($s, $pos[1], $len[1]);
        $s = str_replace($x, '', $s);
    }

    /**/ //remove tags with content between them
    if (strlen($expand) > 0) {
        $e = explode('|', $expand);
        for ($i = 0; $i < count($e); $i++) {
            while (stripos($s, '<' . $e[$i]) > 0) {
                $len[1] = strlen('<' . $e[$i]);
                $pos[1] = stripos($s, '<' . $e[$i]);
                $pos[2] = stripos($s, $e[$i] . '>', $pos[1] + $len[1]);
                $len[2] = $pos[2] - $pos[1] + $len[1];
                $x = substr($s, $pos[1], $len[2]);
                $s = str_replace($x, '', $s);
            }
        }
    }

    /**/ //remove remaining tags
    while (stripos($s, '<') > 0) {
        $pos[1] = stripos($s, '<');
        $pos[2] = stripos($s, '>', $pos[1]);
        $len[1] = $pos[2] - $pos[1] + 1;
        $x = substr($s, $pos[1], $len[1]);
        $s = str_replace($x, '', $s);
    }

    /**/ //finalize keep tag
    for ($i = 0; $i < count($k); $i++) {
        $s = str_replace('[{(' . $k[$i], '<' . $k[$i], $s);
        $s = str_replace('[{(/' . $k[$i], '</' . $k[$i], $s);
    }

    return trim($s);
}

/**
 * remove the html tags from the string.
 * @param string string to be clean.
 * @param string tags not to be remove
 * @param string tags want to check more
 */
function display_html($str, $tags = array('script', 'style', 'noframes',
    'select', 'option', 'font', 'div', 'span'), $stripContent = false)
{
    $content = '';
    if (!is_array($tags)) {
        $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) :
            array($tags));
        if (end($tags) == '')
            array_pop($tags);
    }
    foreach ($tags as $tag) {
        if ($stripContent)
            $content = '(.+</' . $tag . '[^>]*>|)';
        $str = preg_replace('#</?' . $tag . '[^>]*>' . $content . '#is', '', $str);
    }
    return $str;
}


/**
 * Get a list of countries as option tags where the country name is the value and the option.
 *
 * @param string The selected country.
 * @param boolean Set to true to include an additional item (value is empty) at the top of the select.
 * @param string The language variable to use for the first option.
 * @return string The select box.
 */

function GetCountryNameListAsOptions($selectedCountry = 0, $includeFirst = true,
    $firstText = 'Select Country')
{
    $list = array();

    if ($includeFirst) {
        $list[] = '<option value="">-- ' . $firstText . ' --</option>';
    }

    $resultu = $GLOBALS['db']->ExeQuersys("select countryid, countryname from countries order by countryname asc");

    while ($row = mysqli_fetch_array($resultu)) {
        $sel = '';
        if (is_array($selectedCountry)) {
            if (in_array($row['countryname'], $selectedCountry) || in_array($row['countryid'],
                $selectedCountry)) {
                $sel = 'selected="selected"';
            }
        } else {
            if ($selectedCountry != '' && ($row['countryname'] == $selectedCountry || $row['countryid'] ==
                $selectedCountry)) {
                $sel = 'selected="selected"';
            }
        }

        $list[] = '<option value="' . $row['countryname'] . '" ' . $sel . '>' .
            html_escape($row['countryname']) . '</option>';
    }
    return implode('', $list);
}

/**
 * Generate a field (either a text box or select box) for entering/selecting a state.
 * In the case that the supplied country does not have any states, a text box is returned.
 * If the country does have states, a textbox asking for the country to be selected is returned.
 *
 * @param string The name of the text box/select box.
 * @param string The ID of the text box/select box.
 * @param string The name of the country to fetch the states for (can also be the country ID)
 * @param string The name of the selected state.
 * @param string Optionally a class name to be applied to the select box or text box.
 * @return string The generated text/select box.
 */

function GenerateStateSelect($name, $id, $country = '', $selectedState = '', $className =
    '')
{
    // If no country was supplied use the store default
    if (empty($country)) {
        $country = GetConfig('CompanyCountry');
    }

    $stateList = GetStateListAsOptions($country, $selectedState, false, '', '', false, true);
    if (!$stateList) {
        return '<input type="text" name="' . $name . '" id="' . $id . '" class="' . $className .
            '"  value="' . html_escape($selectedState) . '" />';
    } else {
        $select = '<select name="cusb_state" id="cusb_state" class="' . $className .
            ' StateSelect" >';
        $select .= '<option value="">Select State</option>';
        $select .= $stateList;
        $select .= '</select>';
        return $select;
    }
}

/**
 *	Get a list of states as <option> tags
 */
function GetStateListAsOptions($country, $selectedState = 0, $IncludeFirst = true,
    $FirstText = "ChooseAState", $FirstValue = "0", $FirstSelected = false, $useNamesAsValues = false)
{

    if (!is_numeric($country)) {
        $countryn = $GLOBALS['db']->get_row("SELECT * FROM countries WHERE countryname='" .
            safe_string($country) . "' ");
    }

    $list = "";
    $query = sprintf("select stateid, statename from country_states where statecountry='%d' order by statename asc",
        safe_string($countryn->countryid));
    $result = $GLOBALS['db']->ExeQuersys($query);

    // Should we add a blank option?
    if ($IncludeFirst) {
        if ($FirstSelected) {
            $sel = 'selected="selected"';
        } else {
            $sel = "";
        }

        $list = sprintf("<option %s value='%s'>%s</option>", $sel, $FirstValue, $FirstText);
    }

    while ($row = mysqli_fetch_array($result)) {
        if (is_numeric($selectedState)) {
            // Match $selectedState by country id
            if ($row['stateid'] == $selectedState) {
                $sel = 'selected="selected"';
            } else {
                $sel = "";
            }
        } else
            if (is_array($selectedState)) {
                // A list has been passed in
                if (in_array($row['stateid'], $selectedState) || in_array($row['statename'], $selectedState)) {
                    $sel = 'selected="selected"';
                } else {
                    $sel = "";
                }
            } else {
                // Just one state has been passed in
                if (strtolower($row['statename']) == strtolower($selectedState)) {
                    $sel = 'selected="selected"';
                } else {
                    $sel = "";
                }
            }

            if ($useNamesAsValues) {
                $value = html_escape($row['statename']);
            } else {
                $value = $row['stateid'];
            }
            $list .= sprintf("<option value='%s' %s>%s</option>", $value, $sel, $row['statename']);
    }

    return $list;
}

/**
 * Convert Array  to Object
 * @param object The name of the object you want to convert.
 */
function parseArrayToObject($array)
{
    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
        foreach ($array as $name => $value) {
            $name = strtolower(trim($name));
            if (!empty($name)) {
                $object->$name = $value;
            }
        }
    }
    return $object;
}
/**
 * Convert Object  to Array 
 * @param array The name of the array you want to convert.
 */
function parseObjectToArray($object)
{
    $array = array();
    if (is_object($object)) {
        $array = get_object_vars($object);
    }
    return $array;
}
/**
 * apply number format to price
 * @param price to be format.
 */
 function currency_format($price){
    return number_format($price,2,'.',',');
 }
 
 function CheckBoxSelect($val1,$val2){
	 if($val1 == $val2){
		 $checked = 'checked="checked"';
	}
	return $checked;
 }
  
 function SelectTab($act){
	 if($_GET['act'] == $act){
		// return 'class="ui-actv"';
		return ' menu-selected ';
	}
 }
 
 /**
	* Internal Shopping Cart replacement for the PHP date() function. Applies our timezone setting.
	*
	* @param string The format of the date to generate (See PHP date() reference)
	* @param int The Unix timestamp to generate the presentable date for.
	* @param float Optional timezone offset to use for this stamp. If null, uses system default.
	*/
 function date_now($format, $timeStamp=null, $timeZoneOffset=null)
	{
		if($timeStamp === null) {
			$timeStamp = time();
		}

		$dstCorrection = 0;
		if($timeZoneOffset === null) {
			$timeZoneOffset = 0;
			$dstCorrection = 0;
		}

		// If DST settings are enabled, add an additional hour to the timezone
		if($dstCorrection == 1) {
			++$timeZoneOffset;
		}

		return gmdate($format, $timeStamp + ($timeZoneOffset * 3600));
	}
	
	/**
	* Internal Shopping Cart replacement for the PHP mktime() fnction. Applies our timezone setting.
	*
	* @see mktime()
	* @return int Unix timestamp
	*/
	function mktime_now()
	{
		$args = func_get_args();
		$result = call_user_func_array("mktime", $args);
		if($result) {
			$timeZoneOffset = 0;
			$dstCorrection = 0;

			// If DST settings are enabled, add an additional hour to the timezone
			if($dstCorrection == 1) {
				++$timeZoneOffset;
			}
			$result +=  $timeZoneOffset * 3600;
		}
		return $result;
	}
	
	/**
	 * Parse an incoming shop path and turn it in to both a valid shop path and
	 * application path.
	 *
	 * @param string The URL to transform.
	 * @return array Array of WebPath and appPath
	 */
	function ParseAppPath($url)
	{
		$parts = parse_url($url);
		if(!isset($parts['scheme'])) {
			$parts['scheme'] = 'http';
		}

		if(!isset($parts['path'])) {
			$parts['path'] ='';
		}
		$parts['path'] = rtrim($parts['path'], '/');

		$WebPath = $parts['scheme'].'://'.$parts['host'];
		if(!empty($parts['port']) && $parts['port'] != 80) {
			$WebPath .= ':'.$parts['port'];
		}

		$WebPath .= $parts['path'];

		return array(
			'WebPath' => $WebPath,
			'appPath' => $parts['path']
		);
	}

?>