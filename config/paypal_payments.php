<?php
return [
	'Account'=>[
		'paypal_client_id'=>env('PAYPAL_CLIENT'),
		'paypal_client_secret'=>env('PAYPAL_SECRET'),
	],
	
	'Http'=>[
		'ConnectionTimeOut'=>30,
		'Retry'=>1,
	],

	'Service'=>[
		'EndPoint'=>'https://api.sandbox.paypal.com',
	],


	'Log'=>[
		'LogEnabled'=>true,
		'FileName'=>'../PayPal.log',

		'LogLevel'=>'FINE'	
	],

];