<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['pdf/payments.memo.overview'] = 'Overview';
$lang['pdf/payments.memo.item'] = 'Item';
$lang['pdf/payments.memo.description'] = 'Description';
$lang['pdf/payments.memo.total'] = 'Total';
$lang['pdf/payments.memo.grand_total'] = 'TOTAL';

$lang['pdf/payments.memo.message.format.with_date'] = 
    'The amount due must be paid before %2$s ' .
    'to the account of %3$s (%4$s) with as description <b>%1$s</b>. ' . 
    'If you believe that this memo contains errors, please let us know ' .
    'as soon as possible so we can send you a correct version.';
$lang['pdf/payments.memo.message.format.no_date'] = 
    'The amount due must be paid to the account of %2$s (%3$s) ' .
    'with as description <b>%1$s</b>. If you believe that this memo contains ' . 
    'errors, please let us know as soon as possible so we can send you a correct version.';
$lang['pdf/payments.memo.message.date_format'] = 'm/d/Y';