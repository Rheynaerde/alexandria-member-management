<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Site
|--------------------------------------------------------------------------
|
| These options configure some global options.
|
*/
$config['alexandria.site.default_title'] = 'Degencentrum Rheynaerde';

/*
|--------------------------------------------------------------------------
| Currency
|--------------------------------------------------------------------------
|
| Specify the currency used for payments. At the moment only a single 
| currency is supported.
|
*/
$config['alexandria.currency.symbol'] = '&euro;';

/*
|--------------------------------------------------------------------------
| Payment memo
|--------------------------------------------------------------------------
|
| These options configure the appearance of payment memos. The logo should
| be stored in the images folder in the root of the site.
|
*/
$config['alexandria.payment_memo.logo.include'] = FALSE;
$config['alexandria.payment_memo.logo.filename'] = 'logo.png';
$config['alexandria.payment_memo.address'] = 'Degencentrum Rheynaerde vzw<br>' .
        'Weverstraat 24<br>9250 Waasmunster<br>GSM: 0489/29 26 03<br>' .
        'e-mail: info@rheynaerde.be';
$config['alexandria.payment_memo.clubname'] = 'Degencentrum Rheynaerde vzw';
$config['alexandria.payment_memo.accountnumber'] = 'IBAN: <i>BE98 1420 6537 5193</i>, BIC: <i>GEBA BE BB</i>';