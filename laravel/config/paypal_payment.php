<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => env('PAYPAL_CLIENT_ID', 'AbRpsoTMDNnMjhwfV3wTMWhz1EKNpW1sDduQaoCd8i8niZ1ICri4PX1qONYbMJtVA4mtnPdlN6FpDRAJ'),
		'ClientSecret' => env('PAYPAL_CLIENT_SECRET', 'EP_3RS7Xy_kTMLAVmrXiGFd4sfzLj6ZJ-jG_yMaT7msBQT5NIDRV0Oa_IaxPXHdJMaX3B1uUSde4DbaG'),
	),

	# Connection Information
	'Http' => array(
		'ConnectionTimeOut' => 30,
		'Retry' => 1,
		//'Proxy' => 'http://[username:password]@hostname[:port][/path]',
	),

	# Service Configuration
	'Service' => array(
		# For integrating with the live endpoint,
		# change the URL to https://api.paypal.com!
		'EndPoint' => 'https://api.sandbox.paypal.com',
	),


	# Logging Information
	'Log' => array(
		'LogEnabled' => true,

		# When using a relative path, the log file is created
		# relative to the .php file that is the entry point
		# for this request. You can also provide an absolute
		# path here
		'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		'LogLevel' => 'FINE',
	),
);
