<?php

Class ErrorHandler
{
	private function __construct() { }
	
	public static function SetHandler($errTypes = ERROR_TYPES)
	{
		return set_error_handler(array('ErrorHandler' , 'Handler'), $errTypes);
	}
	
	public static function Handler($errNo, $errStr, $errFile, $errLine)
	{
		$backtrace = ErrorHandler::GetBacktrace(2);
		//Creating error message.
		$error_message = "\nErrNo: $errNo\n TEXT: $errStr\n LOCATION: $errFile\n LINE: $errLine at" . date('F j, Y, g:i:a') . " Showing Backtrace: $backtrace". "\n";
		
		if(LOG_ERRORS)
			error_log($error_message, 3 , LOG_ERROR_FILE);
			
		if(SEND_ERROR_MAIL == true)
			error_log($error_message, 1, ADMIN_ERROR_MAIL, "From: ". SENDMAIL_FROM . "\r\nTo: " . ADMIN_ERROR_MAIL);
		
		if( ($errNo == E_WARNING && IS_WARNING_FATAL ==false) || ($errNo == E_NOTICE || $errNo == E_USER_NOTICE) )
		{
			if(DEBUGGING)
				echo '<div class="error_box"> <b> <pre>' . $error_message. '</pre> </b> </div>';
		} else {
			if(DEBUGGING)
				echo '<div class="error_box"> <b> <pre>' . $error_message. '</pre> </b> </div>';
			else
			{
				echo SITE_GENERIC_FORM_MESSAGE;
				ob_clean();
				include '500.php';
				flush();
				ob_flush();
				ob_end_clean();
				exit();
			}
			exit();
		}
	}
	
	public static function GetBacktrace($irrelevantFirstEntries)
	{
		$s = '';
		$MAXSTRLEN = 64;
		$trace_array = debug_backtrace();
		
		for ($i = 0; $i < $irrelevantFirstEntries; $i++)
			array_shift($trace_array);
		
		$tabs = sizeof($trace_array) - 1;
		
		foreach($trace_array as $arr)
		{
			$tabs = $tabs - 1;
			if(isset($arr['class']))
				$s = $s . $arr['class'] . '.';
			$args = array();
			
			if(!empty($arr['agrs']))
			
				foreach($arr['args'] as $v)
				{
					if(is_null($v))
					$args[] = 'null';
					elseif (is_array($v))
						$args[] = 'Array[' . sizeof($v) . ']';
					elseif (is_object($v))
						$args[] = 'Object: ' . get_class($v);
					elseif (is_bool($v))
						$args[] = $v?'true':'false';
					else
					{
						$v = (string)@$v;
						$str = htmlspecialchars(substr($v, 0, $MAXSTRLEN));
						if (strlen($v) > $MAXSTRLEN)
							$str = $str . "...";
						$args[] = '"'.$str.'"';
					}
				}
				
				$s = $s . $arr['function'] . '(' . implode(', ', $args). ')';
				$line = (isset ($arr['line']) ? $arr['line'] : "unknown");
				$file = (isset ($arr['file']) ? $arr['file'] : "unknown");
				$s = $s . sprintf(' # line %4d, file: $s', $line, $file);
				$s = $s . '\n';
		}
		return $s;
		
	}
}
	
?>
	
	