<?php
/* contains all generak functins */
/* Quote string with slashes */
  function php_exit() {
   php_session_close();
   exit();
  }

/* Redirect to another page or site */
 function php_redirect($url) {
    if ( (strstr($url, "\n") != false) || (strstr($url, "\r") != false) ) { 
      php_redirect(php_href_link(FILENAME_DEFAULT, '', 'NONSSL', false));
    }

    if ( (ENABLE_SSL == true) && (getenv('HTTPS') == 'on') ) { // We are loading an SSL page
      if (substr($url, 0, strlen(HTTP_SERVER)) == HTTP_SERVER) { // NONSSL url
        $url = HTTPS_SERVER . substr($url, strlen(HTTP_SERVER)); // Change it to SSL
      }
    }

    header('Location: ' . $url);

    php_exit();
  }

  /*function php_redirect($url) {
    if ( (ENABLE_SSL == true) && (getenv('HTTPS') == 'on') ) { // We are loading an SSL page
      if (substr($url, 0, strlen(HTTP_SERVER)) == HTTP_SERVER) { // NONSSL url
        $url = HTTPS_SERVER . substr($url, strlen(HTTP_SERVER)); // Change it to SSL
      }
    }
    header('Location: ' . $url);
    php_exit();
  }
  */

/* Parse the data used in the html tags to ensure the tags will not break */
  function php_parse_input_field_data($data, $parse) {
    return strtr(trim($data), $parse);
  }
/* function to format data before inserting into database */ 
  function php_output_string($string, $translate = false, $protected = false) {
    if ($protected == true) {
      return htmlspecialchars($string);
    } else {
      if ($translate == false) {
        return php_parse_input_field_data($string, array('"' => '&quot;'));
      } else {
        return php_parse_input_field_data($string, $translate);
      }
    }
  }
/* function to format data before inserting into database */
  function php_output_string_protected($string) {
    return php_output_string($string, false, true);
  }
/* function to get all the GET parameters */
  function php_get_all_get_params($exclude_array = '') {
    global $_GET;

    if ($exclude_array == '') $exclude_array = array();

    $get_url = '';

    reset($_GET);
    while (list($key, $value) = each($_GET)) {
      if (($key != php_session_name()) && ($key != 'error') && (!in_array($key, $exclude_array))) $get_url .= $key . '=' . $value . '&';
    }

    return $get_url;
  }

/* Returns the clients browser */ 
  function php_browser_detect($component) {
    global $HTTP_USER_AGENT;

    return stristr($HTTP_USER_AGENT, $component);
  }


/* Check date */
  function php_checkdate($date_to_check, $format_string, &$date_array) {
    $separator_idx = -1;

    $separators = array('-', ' ', '/', '.');
    $month_abbr = array('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec');
    $no_of_days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    $format_string = strtolower($format_string);

    if (strlen($date_to_check) != strlen($format_string)) {
      return false;
    }

    $size = sizeof($separators);
    for ($i=0; $i<$size; $i++) {
      $pos_separator = strpos($date_to_check, $separators[$i]);
      if ($pos_separator != false) {
        $date_separator_idx = $i;
        break;
      }
    }

    for ($i=0; $i<$size; $i++) {
      $pos_separator = strpos($format_string, $separators[$i]);
      if ($pos_separator != false) {
        $format_separator_idx = $i;
        break;
      }
    }

    if ($date_separator_idx != $format_separator_idx) {
      return false;
    }

    if ($date_separator_idx != -1) {
      $format_string_array = explode( $separators[$date_separator_idx], $format_string );
      if (sizeof($format_string_array) != 3) {
        return false;
      }

      $date_to_check_array = explode( $separators[$date_separator_idx], $date_to_check );
      if (sizeof($date_to_check_array) != 3) {
        return false;
      }

      $size = sizeof($format_string_array);
      for ($i=0; $i<$size; $i++) {
        if ($format_string_array[$i] == 'mm' || $format_string_array[$i] == 'mmm') $month = $date_to_check_array[$i];
        if ($format_string_array[$i] == 'dd') $day = $date_to_check_array[$i];
        if ( ($format_string_array[$i] == 'yyyy') || ($format_string_array[$i] == 'aaaa') ) $year = $date_to_check_array[$i];
      }
    } else {
      if (strlen($format_string) == 8 || strlen($format_string) == 9) {
        $pos_month = strpos($format_string, 'mmm');
        if ($pos_month != false) {
          $month = substr( $date_to_check, $pos_month, 3 );
          $size = sizeof($month_abbr);
          for ($i=0; $i<$size; $i++) {
            if ($month == $month_abbr[$i]) {
              $month = $i;
              break;
            }
          }
        } else {
          $month = substr($date_to_check, strpos($format_string, 'mm'), 2);
        }
      } else {
        return false;
      }

      $day = substr($date_to_check, strpos($format_string, 'dd'), 2);
      $year = substr($date_to_check, strpos($format_string, 'yyyy'), 4);
    }

    if (strlen($year) != 4) {
      return false;
    }

    if (!settype($year, 'integer') || !settype($month, 'integer') || !settype($day, 'integer')) {
      return false;
    }

    if ($month > 12 || $month < 1) {
      return false;
    }

    if ($day < 1) {
      return false;
    }

    if (php_is_leap_year($year)) {
      $no_of_days[1] = 29;
    }

    if ($day > $no_of_days[$month - 1]) {
      return false;
    }

    $date_array = array($year, $month, $day);

    return true;
  }
/* Check if year is a leap year */
  function php_is_leap_year($year) {
    if ($year % 100 == 0) {
      if ($year % 400 == 0) return true;
    } else {
      if (($year % 4) == 0) return true;
    }

    return false;
  }
/* function to check variable not null */
  function php_not_null($value) {
    if (is_array($value)) {
      if (sizeof($value) > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0)) {
        return true;
      } else {
        return false;
      }
    }
  }
/* Return a random value */
  function php_rand($min = null, $max = null) {
    static $seeded;

    if (!isset($seeded)) {
      mt_srand((double)microtime()*1000000);
      $seeded = true;
    }

    if (isset($min) && isset($max)) {
      if ($min >= $max) {
        return $min;
      } else {
        return mt_rand($min, $max);
      }
    } else {
      return mt_rand();
    }
  }
/* function to set cookie */
  function php_setcookie($name, $value = '', $expire = 0, $path = '/', $domain = '', $secure = 0) {
    setcookie($name, $value, $expire, $path, (php_not_null($domain) ? $domain : ''), $secure);
  }
/* function to get client ip address */
  function php_get_ip_address() {
    if (isset($_SERVER)) {
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }
    } else {
      if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
      } elseif (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
      } else {
        $ip = getenv('REMOTE_ADDR');
      }
    }

    return $ip;
  }

/* function to get the extension of the filename */
	function get_extension($name)	{
		$ext = strrchr($name,".");
		return $ext;
	}

	function php_sanitize_string($string) {
		$string = ereg_replace(' +', ' ', trim($string));
		return preg_replace("/[<>]/", '_', $string);
	}

/* function to get the column value from database */
	function get_column_value($col,$table,$where = "")	{
		$query = php_db_query("select ". $col ." from ". $table ." " . $where );
		$query_values = php_db_fetch_array($query);
		return $query_values[$col];
	}

	/*function to get category name from category master table*/
	function get_category_title($cat_id)
	{
		$cat_rs = php_db_query("select CatId, CatTitle from ". TABLE_CAT_MST . " where CatId= '". $cat_id ."' " );
		/* To get the category name from the array*/
		$cat_values = php_db_fetch_array($cat_rs);
		return $cat_values['CatTitle'];
	}
	
	function display($ID)
	{
		$array= array('At' => 'At',
				'by' => 'by',
				'for' => 'for',
				'from' => 'from',
				 'in' => 'in',
				 'of' => 'of','off'=>'off','on'=>'on','out'=>'out','through'=>'through','till'=>'till',
				'to'=>'to','up'=>'up','with'=>'with','About'=>'About','above'=>'About', 'across'=>'About', 'along'=>'About', 'amidst'=>'About', 'among'=>'About',
				'amongst'=>'About', 'around'=>'About', 'before'=>'About', 'below'=>'About' , 'beneath'=>'About','beside'=>'About',
'between'=>'About', 'beyond'=>'About', 'inside'=>'About', 'outside'=>'About', 'underneath'=>'About', 'within'=>'About', 'without'=>'About'
				);
	
		$rs_member =  php_db_query(" select * from ". TABLE_LISTING." where contentid=".$ID."");
		$arr_member = php_db_fetch_array($rs_member);
		$paraone = html_entity_decode($arr_member['paraone']);
		
	
				foreach($array as $val)
				{
					$paraone =  html_entity_decode(str_replace(' '.$val.' ', ' ____ ' , $paraone));
				}
			
		
	
		echo $paraone;
	}
	
	function displayresult($ID)
	{
		$array= array('At' => 'At',
				'by' => 'by',
				'for' => 'for',
				'from' => 'from',
				 'in' => 'in',
				 'of' => 'of','off'=>'off','on'=>'on','out'=>'out','through'=>'through','till'=>'till',
				'to'=>'to','up'=>'up','with'=>'with','About'=>'About','above'=>'About', 'across'=>'About', 'along'=>'About', 'amidst'=>'About', 'among'=>'About',
				'amongst'=>'About', 'around'=>'About', 'before'=>'About', 'below'=>'About' , 'beneath'=>'About','beside'=>'About',
'between'=>'About', 'beyond'=>'About', 'inside'=>'About', 'outside'=>'About', 'underneath'=>'About', 'within'=>'About', 'without'=>'About'
				);
	
		$rs_member =  php_db_query(" select * from ". TABLE_LISTING." where contentid=".$ID."");
		$arr_member = php_db_fetch_array($rs_member);
		$paraone = html_entity_decode($arr_member['paraone']);
		
	
				foreach($array as $val)
				{
					$paraone =  html_entity_decode(str_replace(' '.$val.' ', '<span style="color:red; font-weight:bold;"> '.$val.' </span> ' , $paraone));
				}
			
		
	
		echo $paraone;
	}
?>