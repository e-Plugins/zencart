<?php
/**

    Digiwallet module class for Zencart
    (C) Copyright Yellow Melon B.V. 2013

*/
 
define('DIGIWALLET_TABLE_HEADING_TRANSACTION_DETAILS', 'Transactiebijzonderheden');
define('DIGIWALLET_TABLE_HEADING_TRANSACTION_ID', 'Transactie ID');
define('DIGIWALLET_TABLE_HEADING_PURCHASE_ID', 'Aankoop ID');
define('DIGIWALLET_TABLE_HEADING_ORDER_ID', 'Bestel ID');
define('DIGIWALLET_TABLE_HEADING_TRANSACTION_STATUS', 'Transactiestatus');
define('DIGIWALLET_TABLE_HEADING_ORDER_STATUS', 'Bestelstatus');
define('DIGIWALLET_TABLE_HEADING_TRANSACTION_DATE_TIME', 'Transactie tijdstip');
define('DIGIWALLET_TABLE_HEADING_LAST_MODIFIED', 'Laatst bewerkt');
define('DIGIWALLET_TABLE_HEADING_SUGGESTED_ACTION', 'Aanbevolen handeling');

define('DIGIWALLET_TEXT_SEARCH_TRANSACTION_ID', 'Transactie ID: ');
define('DIGIWALLET_TEXT_SEARCH_ORDER_ID', 'Bestel ID: ');
define('DIGIWALLET_TEXT_FILTER', 'Filter');
define('DIGIWALLET_TEXT_FILTER_ALL', 'Alle');
define('DIGIWALLET_TEXT_FILTER_INCOMPLETE', 'Onafgeronde');
define('DIGIWALLET_TEXT_FILTER_COMPLETE', 'Afgeronde');
define('DIGIWALLET_TEXT_FILTER_CLEANUP', 'Opruimen');
define('DIGIWALLET_TEXT_CLEANUP', '(verwijder transacties welke niet de status Success of Open hebben)');
define('DIGIWALLET_TEXT_RESTOCK_QUANTITY', 'Producten restocken tijdens het opruimen?');

define('DIGIWALLET_TEXT_DETAILS', 'Details');
define('DIGIWALLET_NAME_ZERO_STATUS_ORDER', 'Nul-status bestelling');

define('DIGIWALLET_TEXT_NO_ACTION', '[Geen handeling]');


define('DIGIWALLET_TABLE_HEADING_AGE', 'Verstreken tijd');

// aanbevolen handelingen:
define('DIGIWALLET_TEXT_CHECK_STATUS', 'Status peilen');
define('DIGIWALLET_TEXT_CREATE_ORDER', 'Voltooi bestelling');
define('DIGIWALLET_WAIT_OR_CREATE_ORDER', 'Wacht (of voltooi bestelling).');
define('DIGIWALLET_TEXT_CHANGE_STATUS', 'Bestelstatus wijzigen');
define('DIGIWALLET_TEXT_REFUND', 'Transactie annuleren');

define('DIGIWALLET_TEXT_ARE_YOU_SURE_WAIT', 'LET OP: De klant kan de bestelling zelf nog voltooien! Het is aanbevolen te wachten. Weet u 100% zeker dat u deze bestelling nu wilt voltooien?');
define('DIGIWALLET_TEXT_ARE_YOU_SURE', 'Weet u zeker dat u deze bestelling wilt voltooien?');

define('TEXT_CSV_FILENAME', 'CSV bestand');

define('DIGIWALLET_MESSAGE_SUCCESS_REFUND', 'Transactiestatus is op "refunded" gezet.');
define('DIGIWALLET_MESSAGE_WARNING_REFUND', 'Het was niet mogelijk om de transactiestatus op "refunded" te zetten.');
define('DIGIWALLET_MESSAGE_SUCCESS_STATUS', 'Transactiestatus opgehaald.');
define('DIGIWALLET_MESSAGE_WARNING_STATUS', 'Transactiestatus kon niet opgehaald worden.');

define('DIGIWALLET_HEADING_CUSTOMER_ID', 'Klant ID');
define('DIGIWALLET_HEADING_TRANSACTION_AMOUNT', 'Transactiebedrag');
define('DIGIWALLET_HEADING_CUSTOMER_ACCOUNT', 'Bankrekening klant');
define('DIGIWALLET_HEADING_CUSTOMER_NAME', 'Naam klant');
define('DIGIWALLET_HEADING_CUSTOMER_CITY', 'Stad klant');

define('DIGIWALLET_HEADING_EXPLANATION', 'Uitleg');
define('DIGIWALLET_TEXT_EXPLANATION', 'Bovenstaande tabel geeft een overzicht van de Digiwallet iDeal transacties 
                in het systeem. Aanvankelijk worden alleen de onafgeronde transacties 
                getoond; dit ziet u aan het bolletje voor ' . DIGIWALLET_TEXT_FILTER_INCOMPLETE .
                ' naast het knopje ' . DIGIWALLET_TEXT_FILTER . '. 
                U kunt ook kiezen om alleen ' . DIGIWALLET_TEXT_FILTER_COMPLETE . ' of ' .
                DIGIWALLET_TEXT_FILTER_ALL . ' transacties te tonen. 
                ' . DIGIWALLET_TEXT_FILTER_COMPLETE . ' transacties kunt u bekijken maar hebben geen bewerking nodig. ' .
                DIGIWALLET_TEXT_FILTER_INCOMPLETE . ' 
                transacties zijn transacties die nog verder bewerkt moeten worden.
                
                ');
