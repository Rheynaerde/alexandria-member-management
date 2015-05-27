<?php
defined('BASEPATH') OR exit('Directe toegang tot scripts is niet toegestaan');

$lang['pdf/payments.memo.overview'] = 'Overzicht';
$lang['pdf/payments.memo.item'] = 'Item';
$lang['pdf/payments.memo.description'] = 'Omschrijving';
$lang['pdf/payments.memo.total'] = 'Totaal';
$lang['pdf/payments.memo.grand_total'] = 'TOTAAL';

$lang['pdf/payments.memo.message.format.with_date'] = 
    'Het verschuldigde bedrag dient ten laatste op %2$s gestort te worden ' .
    'op het rekeningnummer van %3$s (%4$s) met als mededeling <b>%1$s</b>. ' . 
    'Indien je van mening bent, dat er zich fouten in deze onkostennota bevinden, ' . 
    'gelieve dit dan zo snel mogelijk te melden, zodat we je een correcte versie ' . 
    'kunnen doorsturen.';
$lang['pdf/payments.memo.message.format.no_date'] = 
    'Het verschuldigde bedrag dient gestort te worden ' .
    'op het rekeningnummer van %2$s (%3$s) met als mededeling <b>%1$s</b>. ' . 
    'Indien je van mening bent, dat er zich fouten in deze onkostennota bevinden, ' . 
    'gelieve dit dan zo snel mogelijk te melden, zodat we je een correcte versie ' . 
    'kunnen doorsturen.';
$lang['pdf/payments.memo.message.date_format'] = 'd/m/Y';