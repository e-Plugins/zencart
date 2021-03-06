<?php
/**
 * Digiwallet Payment Module for osCommerce
*
* @copyright Copyright 2013-2014 Yellow Melon
* @copyright Portions Copyright 2013 Paul Mathot
* @copyright Portions Copyright 2003 osCommerce
* @license   see LICENSE.TXT
*/
require_once "targetpay/targetpay.php";

$ywincludefile = realpath(dirname(__FILE__) . '/../../extra_datafiles/targetpay.php');
require_once $ywincludefile;

$availableLanguages = array("dutch","english");
$langDir = (isset($_SESSION["language"]) && in_array($_SESSION["language"], $availableLanguages)) ? $_SESSION["language"] : "dutch";

$ywincludefile = realpath(dirname(__FILE__) . '/../../languages/' . $langDir . '/modules/payment/targetpay_ide.php');
require_once $ywincludefile;

class targetpay_pyp extends targetpayBase
{
    protected $tpPaymentMethodId = 'PYP';
    protected $tpPaymentMethodName = 'Paypal';

    public function targetpay_pyp()
    {
        parent::targetpay();
    }
}
