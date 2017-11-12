<?php

	define('SITE_ROOT', dirname(dirname(__FILE__)));
	define ('HOST', 'localhost');
	define ('USER', 'aparokshadba');
	define ('PASS', '@p@r0ksh@dba2015');
	define ('DBNAME', 'aparokshadb');
	define('PDO_DSN', 'mysql:host=' . HOST . ';dbname=' . DBNAME);
	define('DB_PERSISTENCY', true);
	define ('SITE_TITLE', 'APAROKSHA-16');
	
//ftp credentials for dir creation and file writing	
	define ('FTP_USER','root');
	define ('FTP_PASS','');
	
	//define('HTTP_SERVER_PORT', '80');
	//define('VIRTUAL_LOCATION', '/cms/');
	
	//Error handling parametres
	define('IS_WARNING_FATAL', true);
	define('DEBUGGING', true);
	define('ERROR_TYPES', E_ALL);

	//Mailing system parametres
	define('SEND_ERROR_MAIL', false);
	define('ADMIN_ERROR_MAIL', '');
	define('SEND_FROM', 'report@projectblue.com');

	//Error logging parametres
	define('LOG_ERRORS', true);
	define('LOG_ERROR_FILE', '/register/error_log.txt');
	define('SITE_GENERIC_ERROR_MESSAGE', '<h1> Site: An Error Occured </h1>');

	//Subscription System Mailer
	define('MAIL_HOST', 'ssl://smtp.gmail.com');
	define('MAIL_PORT', 465);
	define('MAIL_FROM', 'team.aparoksha@iiita.ac.in');
	define('MAIL_FROM_PWD', '2016aparoksha');
	define('FROM_ADDRESS', 'team.aparoksha@iiita.ac.in');
	define('URL',  'https://aparoksha.iiita.ac.in/register/');
	define('SUBSCRIBE_SUBJECT', "Aparoksha 2016 Account Confirmation");
	
	define('ENCRYPT', "vbdkb@@12");
	define('HOME', "index.php");
	
	define('LOGIN', "?page=login");
	define('REGISTER', "?page=register");
	define('CAPTCHA', 1);

	define('1_eve', "/register/event/konqueror/");
	define('2_eve', "/register/event/platzen/");
	define('3_eve', "/register/event/stegolica/");
	define('4_eve', "#");
	
?>
