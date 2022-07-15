<?php
	define("DB_USER", GetConfig('dbUser'));			// <-- mysqli db user
	define("DB_PASSWORD", GetConfig('dbPass'));		// <-- mysqli db password
	define("DB_NAME", GetConfig('dbDatabase'));		// <-- mysqli db pname
	define("DB_HOST", GetConfig('dbServer'));	// <-- mysqli server host

	define("SQL_VERSION","1.01");
	define("OBJECT","OBJECT");
	define("ARRAY_A","ARRAY_A");
	define("ARRAY_N","ARRAY_N");

	/*private $DB_USER = GetConfig('dbUser');
	private $DB_PASSWORD = GetConfig('dbPass');
	private $DB_NAME = GetConfig('dbDatabase');
	private $DB_HOST = GetConfig('dbServer');*/
	
	// ==================================================================
	//	The Main Class

	class db 
	{
		// ==================================================================
    	//	DB Constructor - connects to the server and selects a database

      public function __construct()
		{
			 $this->con = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
                          $this->con->query("set character_set_client='utf8'"); 
                            $this->con->query("set character_set_results='utf8'"); 
                            $this->con->query("set collation_connection='utf8_general_ci'");  
			if (! $this->con ) {
            	$this->print_error("<ol><b>Error establishing a database connection!</b><li>Are you sure you have the correct user/password?<li>Are you sure that you have typed the correct hostname?<li>Are you sure that the database server is running?</ol>");
        	}
			$this->select(DB_NAME);
		}

    	// ==================================================================
    	//	Select a DB (if another one needs to be selected)

    	function select($db) 
		{
        	if ( !@mysqli_select_db($this->con,$db)) {
            	$this->print_error("<ol><b>Error selecting database <u>$db</u>!</b><li>Are you sure it exists?<li>Are you sure there is a valid database connection?</ol>");
        	}
    	}

    	// ==================================================================
    	//	Select a DB (if another one needs to be selected)

    	

    	// ==================================================================
    	//	Print SQL/DB error.

    	function print_error($str = "") 
		{
			if ( !$str ) $str = mysqli_error($this->con);
			
			// If there is an error then take note of it
     	  	/*print "<blockquote><font face=arial size=2 color=ff0000>";
        	print "<b>SQL/DB Error --</b> ";
        	print "[<font color=000077>$str</font>]";
       	 	print "</font></blockquote>";*/
    	}
        
        function insertedid() 
		{
			return $this->con;
    	}

    	// ==================================================================
    	//	Basic Query	- see docs for more detail

    	function query($query, $output = OBJECT) 
		{
			// Log how the function was called
        	$this->func_call = "\$db->query(\"$query\", $output)";


        	// Kill this
        	$this->last_result = null;
        	$this->col_info = null;

        	// Keep track of the last query for debug..
        	$this->last_query = $query;
        	// Perform the query via std mysqli_query function..
        	$this->result = mysqli_query($this->con,$query);

        	if ( mysqli_error($this->con) ) 
			{
				// If there is an error then take note of it..
            	$this->print_error();
			}
        	else 
			{
				// In other words if this was a select statement..
            	if ( $this->result ) 
				{
					// =======================================================
                	// Take note of column info

                	$i=0;
                	while ($i < @mysqli_num_rows($this->result)) 
					{
                    	$this->col_info[$i] = @mysqli_fetch_field($this->result);
                    	$i++;
                	}

                	// =======================================================
                	// Store Query Results

                	$i=0;
                	while ( $row = @mysqli_fetch_object($this->result) ) 
					{
						// Store relults as an objects within main array
                    	$this->last_result[$i] = $row;
						$i++;
                	}

                	@mysqli_free_result($this->result);

                	// If there were results then return true for $db->query
                	if ($i) {
                    	return true;
					}
                	else {
                    	return false;
                	}

            	}

        	}
    	}

    	function ExeQuersys($qry) 
		{
        	//echo $qry;
        	$exe = mysqli_query($this->con,$qry);
        	return $exe;
    	}


    	function NumRows($qry) 
		{
        	//echo $qry;
        	$exe = $this->ExeQuersys($qry);
        	$nof = mysqli_num_rows($exe);
        	return $nof;
    	}

    	// ==================================================================
    	//	Get one variable from the DB - see docs for more detail

    	function get_var($query=null,$x=0,$y=0) 
		{
			// Log how the function was called
        	$this->func_call = "\$db->get_var(\"$query\",$x,$y)";

        	// If there is a query then perform it if not then use cached results..
        	if ( $query ) {
        	    $this->query($query);
      	  	}
	
        	// Extract var out of cached results based x,y vals
        	if ( $this->last_result[$y] ) {
         	   $values = array_values(get_object_vars($this->last_result[$y]));
        	}

        	// If there is a value return it else return null
        	return $values[$x]?$values[$x]:null;
    	}

    	// ==================================================================
    	//	Get one row from the DB - see docs for more detail

    	function get_row($query=null,$y=0,$output=OBJECT) 
		{
			// Log how the function was called
                        $this->func_call = "\$db->get_row(\"$query\",$y,$output)";

                        // If there is a query then perform it if not then use cached results..
                        if ( $query ) {
                        $this->query($query);
                        }

                        // If the output is an object then return object using the row offset..
                        if ( $output == OBJECT ) {
                           return $this->last_result[$y]?$this->last_result[$y]:null;
                        } // If the output is an associative array then return row as such..
                        elseif ( $output == ARRAY_A ) {
                        return $this->last_result[$y]?get_object_vars($this->last_result[$y]):null;
                        } // If the output is an numerical array then return row as such..
                        elseif ( $output == ARRAY_N ) {
                        return $this->last_result[$y]?array_values(get_object_vars($this->last_result[$y])):null;
                        } // If invalid output type was specified..
                        else {
                        $this->print_error(" \$db->get_row(string query,int offset,output type) -- Output type must be one of: OBJECT, ARRAY_A, ARRAY_N ");
                        }
		}
                
      function get_perms($query=null,$y=0,$output=OBJECT) 
		{
                        $query = "SELECT perms from user_roles WHERE id='" . $query . "'";
			// Log how the function was called
                        $this->func_call = "\$db->get_row(\"$query\",$y,$output)";

                        // If there is a query then perform it if not then use cached results..
                        if ( $query ) {
                        $this->query($query);
                        }

                        // If the output is an object then return object using the row offset..
                        if ( $output == OBJECT ) {
                           return $this->last_result[$y]?$this->last_result[$y]:null;
                        } // If the output is an associative array then return row as such..
                        elseif ( $output == ARRAY_A ) {
                        return $this->last_result[$y]?get_object_vars($this->last_result[$y]):null;
                        } // If the output is an numerical array then return row as such..
                        elseif ( $output == ARRAY_N ) {
                        return $this->last_result[$y]?array_values(get_object_vars($this->last_result[$y])):null;
                        } // If invalid output type was specified..
                        else {
                        $this->print_error(" \$db->get_row(string query,int offset,output type) -- Output type must be one of: OBJECT, ARRAY_A, ARRAY_N ");
                        }
		}

		// ==================================================================
    	//	Function to get 1 column from the cached result set based in X index
    	// se docs for usage and info

    	function get_col($query=null,$x=0) 
		{
			// If there is a query then perform it if not then use cached results..
        	if ( $query )  {
            	$this->query($query);
        	}

        	// Extract the column values
        	for ( $i=0; $i < count($this->last_result); $i++ ) {
        	    $new_array[$i] = $this->get_var(null,$x,$i);
       	 	}

        	return $new_array;
    	}

		// ==================================================================
    	// Return the the query as a result set - see docs for more details

    	function get_results($query=null, $output = OBJECT) 
		{
			// Log how the function was called
        	$this->func_call = "\$db->get_results(\"$query\", $output)";

        	// If there is a query then perform it if not then use cached results..
        	if ( $query ) {
        	    $this->query($query);
        	}

        	// Send back array of objects. Each row is an object
        	if ( $output == OBJECT ) {
        	    return $this->last_result;
        	}
        	elseif ( $output == ARRAY_A || $output == ARRAY_N ) 
			{
            	if ( $this->last_result ) {
            	    $i=0;
                	foreach( $this->last_result as $row ) 
					{
						$new_array[$i] = get_object_vars($row);

                    	if ( $output == ARRAY_N ) {
                        	$new_array[$i] = array_values($new_array[$i]);
                    	}

                    	$i++;
                	}
					return $new_array;
            	}
            	else {
                	return null;
            	}
        	}
    	}

		// ==================================================================
    	// Function to get column meta data info pertaining to the last query
    	// see docs for more info and usage

    	function get_col_info($info_type="name",$col_offset=-1) 
		{
			if ( $this->col_info ) {
            	if ( $col_offset == -1 ) {
            	    $i=0;
            	    foreach($this->col_info as $col ) {
            	        $new_array[$i] = $col->{$info_type};
                	    $i++;
                	}
                	return $new_array;
            	}
            	else {
                	return $this->col_info[$col_offset]->{$info_type};
            	}
			}
		}

		// ==================================================================
    	// Dumps the contents of any input variable to screen in a nicely
    	// formatted and easy to understand way - any type: Object, Var or Array

    	function vardump($mixed) 
		{
			echo "<blockquote><font color=000090>";
        	echo "<pre><font face=arial>";

        	if ( ! $this->vardump_called ) {
            	echo "<font color=800080><b>ezSQL</b> (v".SQL_VERSION.") <b>Variable Dump..</b></font>\n\n";
        	}

        	print_r($mixed);
        	echo "\n\n<b>Last Query:</b> ".($this->last_query?$this->last_query:"NULL")."\n";
        	echo "<b>Last Function Call:</b> " . ($this->func_call?$this->func_call:"None")."\n";
        	echo "<b>Last Rows Returned:</b> ".count($this->last_result)."\n";
        	echo "</font></pre></font></blockquote>";
        	echo "\n<hr size=1 noshade color=dddddd>";

        	$this->vardump_called = true;
		}

    	// Alias for the above function
    	function dumpvars($mixed) 
		{
       		$this->vardump($mixed);
    	}


		// ==================================================================
    	// Displays the last query string that was sent to the database & a
    	// table listing results (if there were any).
    	// (abstracted into a seperate file to save server overhead).

    	function debug() 
		{
			echo "<blockquote>";

        	// Only show ezSQL credits once..
        	if ( ! $this->debug_called ) {
        	    echo "<font color=800080 face=arial size=2><b>ezSQL</b> (v".SQL_VERSION.") <b>Debug..</b></font><p>\n";
        	}
        	echo "<font face=arial size=2 color=000099><b>Query --</b> ";
        	echo "[<font color=000000><b>$this->last_query</b></font>]</font><p>";

        	echo "<font face=arial size=2 color=000099><b>Query Result..</b></font>";
        	echo "<blockquote>";

        	if ( $this->col_info ) 
			{
				// =====================================================
            	// Results top rows

            	echo "<table cellpadding=5 cellspacing=1 bgcolor=555555>";
           	 	echo "<tr bgcolor=eeeeee><td nowrap valign=bottom><font color=555599 face=arial size=2><b>(row)</b></font></td>";


            	for ( $i=0; $i < count($this->col_info); $i++ ) {
                	echo "<td nowrap align=left valign=top><font size=1 color=555599 face=arial>{$this->col_info[$i]->type} {$this->col_info[$i]->max_length}<br><font size=2><b>{$this->col_info[$i]->name}</b></font></td>";
            	}

            	echo "</tr>";

            	// ======================================================
            	// print main results

            	if ( $this->last_result ) 
				{
					$i=0;
                	foreach ( $this->get_results(null,ARRAY_N) as $one_row ) 
					{
                    	$i++;
                    	echo "<tr bgcolor=ffffff><td bgcolor=eeeeee nowrap align=middle><font size=2 color=555599 face=arial>$i</font></td>";

                    	foreach ( $one_row as $item ) {
                        	echo "<td nowrap><font face=arial size=2>$item</font></td>";
                    	}
						echo "</tr>";
                	}
				} // if last result
            	else {
                	echo "<tr bgcolor=ffffff><td colspan=".(count($this->col_info)+1)."><font face=arial size=2>No Results</font></td></tr>";
            	}

            	echo "</table>";
			} // if col_info
        	else {
            	echo "<font face=arial size=2>No Results</font>";
        	}

       	 	echo "</blockquote></blockquote><hr noshade color=dddddd size=1>";
			$this->debug_called = true;
    	}

		///////////////////////////INSERt//////////////////////////////////	

    	function insert_record($table, $postData = array()) 
		{
             
        	$q = "DESC $table";
               
        	$q = mysqli_query($this->con,$q);

        	$getFields = array();

        	while ($field = mysqli_fetch_array($q)) {
            	$getFields[sizeof($getFields)] = $field['Field'];
        	}
              
                

        	$fields = "";
        	$values = "";

        	if (sizeof($getFields) > 0) 
			{
            	foreach($getFields as $k) 
				{
                	if (isset($postData[$k])) 
					{
                    	$postData[$k] = $this->con->real_escape_string($postData[$k]);
						$fields .= "`$k`, ";
                    	$values .= "'$postData[$k]', ";
                	}
            	}
                  
            	$fields = substr($fields, 0, strlen($fields) - 2);
            	$values = substr($values, 0, strlen($values) - 2);

            	$insert = "INSERT INTO $table ($fields) VALUES ($values)";
            	if (mysqli_query($this->con,$insert)) {
            	    return true;
            	}else {
             	   echo mysqli_error($this->con);
             	   return false;
            	}
        	}else {
            	return false;
        	}
    	}

    	///////////////////////////Update//////////////////////////////////

    	function update_record($table, $postData = array(), $conditions = array()) 
		{
        	$q = "DESC $table";
        	$q = mysqli_query($this->con,$q);
			$getFields = array();

        	while ($field = mysqli_fetch_array($q)) {
        	    $getFields[sizeof($getFields)] = $field['Field'];
        	}

        	$values = "";
        	$conds = "";

        	if (sizeof($getFields) > 0) 
			{
            	foreach($getFields as $k) 
				{
            	    if (isset($postData[$k])) 
					{
                	    $postData[$k] = $this->con->real_escape_string($postData[$k]);
						$values .= "`$k` = '$postData[$k]', ";
                	}
            	}

            	$values = substr($values, 0, strlen($values) - 2);
	
            	foreach($conditions as $k => $v) 
				{
                	$v = $this->con->real_escape_string($v);
					$conds .= "`$k` = '$v'";
            	}

            	$update = "UPDATE $table SET $values WHERE $conds";

            	if (mysqli_query($this->con,$update)) {
                	return true;
            	}else {
                	echo mysqli_error($this->con);
                	return false;
            	}
        	}else {
         	   return false;
        	}
    	}
        
      function update_record_custom($table, $postData , $conditions) 
		{
        	$q = "DESC $table";
        	$q = mysqli_query($this->con,$q);
			$getFields = array();

        	while ($field = mysqli_fetch_array($q)) {
        	    $getFields[sizeof($getFields)] = $field['Field'];
        	}

        	$values = "";
        	$conds = "";

        	if (sizeof($getFields) > 0) 
			{
            	foreach($getFields as $k) 
				{
            	    if (isset($postData[$k])) 
					{
                	    $postData[$k] = $this->con->real_escape_string($postData[$k]);
						$values .= "`$k` = '$postData[$k]', ";
                	}
            	}

            	$values = substr($values, 0, strlen($values) - 2);
	
//            	foreach($conditions as $k => $v) 
//				{
//                	$v = $this->con->real_escape_string($v);
//					$conds .= "`$k` = '$v'";
//            	}

            	$update = "UPDATE $table SET $values WHERE $conditions";

            	if (mysqli_query($this->con,$update)) {
                	return true;
            	}else {
                	echo mysqli_error($this->con);
                	return false;
            	}
        	}else {
         	   return false;
        	}
    	}
	
		function SelectDrop($qry,$sel="",$label = "", $value = "") 
		{
			//echo $qry;//exit;
			$result = $this->ExeQuersys($qry);
        	while($row=mysqli_fetch_array($result)) 
			{
            	if($sel!= "") {
            	    if($sel == $row[0]) {
            	        $sl = 'selected="selected"';
            	    }else {
             	       $sl = '';
             	   }
				}

            	if($label!= "") {
                	$lab = $row[$label];
				}else {
                	$lab = $row[1];
            	}
				if($value!= "") {
            	    $val = $row[$value];
            	}else {
            	    $val = $row[0];
            	}
            	$tr .= ' <option value="'.$val.'" '.$sl.' >'.$lab.'</option>';
        	}
        	return $tr;
    	}

    	function SelectPositionDrop($qry,$sel="",$label = "", $value = "",$unique_id="") 
		{
			$result = $this->ExeQuersys($qry);
        	while($row=mysqli_fetch_array($result)) 
			{
            	if($sel!= "") {
                	if($sel == $row[0]) {
                   		$sl = 'selected="selected"';
                	}else {
                    	$sl = '';
                	}
				}

            	if($label!= "") {
                	$lab = $row[$label];
				}else {
                	$lab = $row[1];
            	}
				if($value!= "") {
                	$val = $row[$value];
            	}else {
                	$val = $row[0];
            	}
            	$tr .= ' <option value="'.$val.'" '.$sl.' >'.$lab.'</option>';
        	}
     	   return $tr;
    	}
		function SelectCheckBox($qry,$sel="",$label = "", $value = "") 
		{
			
			$result = $this->ExeQuersys($qry);
        	$i=1;
			$temp_arr=explode(',',$sel);
			while($row=mysqli_fetch_array($result)) 
			{
            	if($sel!= "") {
					
					if(in_array($row[0], $temp_arr)) {
						$sl = 'checked="checked"';
					}
					else {
                    	$sl = '';
                	}
				}

            	if($label!= "") {
                	$lab = $row[$label];
				}else {
                	$lab = $row[1];
            	}
				if($value!= "") {
                	$val = $row[$value];
            	}else {
                	$val = $row[0];
            	}
            	$tr .= ' <input id="categories_id_'.$i.'" name="categories_id[]" type="checkbox" value="'.$val.'" '.$sl.' ><label style="margin-left:10px;" for="categories_id_'.$i.'">'.$lab.'</label></br>';
        	$i++;
			}
     	   return $tr;
    	}
		function PagesCheckBox($qry,$sel="",$label = "", $value = "") 
		{
			
			$result = $this->ExeQuersys($qry);
        	$i=1;
			$temp_arr=explode(',',$sel);
			while($row=mysqli_fetch_array($result)) 
			{
            	if($sel!= "") {
					
					if(in_array($row[0], $temp_arr)) {
						$sl = 'checked="checked"';
					}
					else {
                    	$sl = '';
                	}
				}

            	if($label!= "") {
                	$lab = $row[$label];
				}else {
                	$lab = $row[1];
            	}
				if($value!= "") {
                	$val = $row[$value];
            	}else {
                	$val = $row[0];
            	}
            	$tr .= ' <input id="pages_id_'.$i.'" name="pages_id[]" type="checkbox" value="'.$val.'" '.$sl.' ><label style="margin-left:10px;" for="pages_id_'.$i.'">'.$lab.'</label></br>';
        	$i++;
			}
     	   return $tr;
    	}
        
function html_escape($text)
{
    return htmlspecialchars($text, ENT_QUOTES, GetConfig('CharacterSet'));
}


function safe_string($string)
{
    
   $return =  $this->con->real_escape_string($string);
   return $return;
}
	}
