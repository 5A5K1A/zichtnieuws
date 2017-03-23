<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Helpers
| -------------------------------------------------------------------------
| This file lets you define "helpers" to extend CI without hacking the core
| files.
|
*/

/**
* Get a value from $_POST / $_GET
* if unavailable, take a default value
*
* @param string $key Value key
* @param mixed $default_value (optional)
* @return mixed Value
*/
if( !function_exists('getValue') ) {
	function getValue( $key, $default_value = false ) {
		if( !isset($key) || empty($key) || !is_string($key) ) {
			return false;
		}

		$return = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default_value));

		if( is_string($return) ) {
			return stripslashes(urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($return))));
		}
		return $return;
	}
}

// extended print function
if( !function_exists('p') ) {
	function p( $value = array() ) {
		$backtrace = debug_backtrace();
		unset( $backtrace[0]['args'] );

		echo '<div style="padding: 20px;"><pre>';
		print_r($value);
		echo '<br><div class="alert alert-warning" role="alert">';
		foreach( $backtrace[0] as $key => $backtrace_value ) {
			echo $key . ': ' . $backtrace_value . '<br>';
		}
		echo '</div></pre></div>';
	}
}

// extended var_dump function
if( !function_exists('vd') ) {
	function vd( $value ) {
		echo '<pre>';
		var_dump($value);
		echo '</pre>';
	}
}

// check if $needle is in string
if( !function_exists('in_string') ) {
	function in_string( $needle, $str ) {
		return strpos( $str, $needle ) !== false;
	}
}

/**
 * Gets the pretty/ formatted date
 * @param      integer   $post_id   The post identifier
 * @param      integer   $limit     The limit of days ago
 * @return     string    Prettified date display
 */
if( !function_exists('studio_get_the_timetoshow') ) {
	function studio_get_the_timetoshow( $time, $limit = 10 ) {
		// early return if no time provided
		if( $time == NULL ) { return; }

		// get limit date
		$max_time = date( 'Y-m-d H:i:s', strtotime('-'.$limit.' days', strtotime('now')) );

		// check if postdate is within limit
		if( $max_time < $time ) {
			// show number of days ago
			$time_toshow = studio_time_diff( $time );
		} else {
			// show date
			$time_toshow  = 'op '.date( 'd-m-Y', strtotime($time) );
		}
		return $time_toshow;
	}
}

/**
 * Returns a more human way of the time ago
 * @param    integer   $start_time   The start time
 * @param    integer   $end_time     The end time
 * @return   string                  The time ago
 */
if( !function_exists('studio_time_diff') ) {
	function studio_time_diff( $start_time, $end_time = NULL ) {

	    $start_time = strtotime( $start_time );
	    $end_time   = ($end_time == NULL ) ? time() : strtotime($end_time);
	    $time_diff  = $end_time - $start_time;

	    $seconds    = $time_diff;
	    $minutes    = round( $time_diff/60 );
	    $hours      = round( $time_diff/(60*60) );
	    $days       = round( $time_diff/(24*60*60) );
	    $weeks      = round( $time_diff/(7*24*60*60));
	    $months     = round( $time_diff/(30*24*60*60) );
	    $years      = round( $time_diff/(365*24*60*60) );

	    /* seconds */ if( $seconds <= 60 )     { return 'zojuist'; }
	    /* minutes */ elseif( $minutes <= 60 ) { return ($minutes == 1) ? 'een minuut geleden' : $minutes.' minuten geleden'; }
	    /* hours */   elseif( $hours <= 24 )   { return ($hours == 1) ? 'een uur geleden' : $hours.' uur geleden'; }
	    /* days */    elseif( $days <= 7 )     { return ($days == 1) ? 'een dag geleden' : $days.' dagen geleden'; }
	    /* weeks */   elseif( $weeks <= 4.3 )  { return ($weeks == 1) ? 'een week geleden' : $weeks.' weken geleden'; }
	    /* months */  elseif( $months <= 12 )  { return ($months == 1) ? 'een maand geleden' : $months.' maanden geleden'; }
	    /* years */   else { return ($years == 1) ? 'een jaar geleden' : $years.' jaar geleden'; }
	}
}
