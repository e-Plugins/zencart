<?php

/**
 *  iDEALplugins.nl
 *  Digiwallet plugin for Opencart 2.0+
 *
 *  (C) Copyright Yellow Melon 2014
 *
 * @file       Digiwallet Catalog Controller
 * @author     Yellow Melon B.V. / www.sofortplugins.nl
 * @release    5 nov 2014
 */

require_once("system/helper/targetpay.class.php");


class ControllerExtensionPaymentSofort extends Controller
{
    private $paymentType = 'DEB';
    
    /**
     *        Select country
     */

    public function index()
    {
        $targetCore = new TargetPayCore($this->paymentType);
        $this->language->load('extension/payment/sofort');

        $data['text_title'] = $this->language->get('text_title');
        $data['text_wait'] = $this->language->get('text_wait');

        $data['entry_bank_id'] = $this->language->get('entry_bank_id');
        $data['button_confirm'] = $this->language->get('button_confirm');

        $data['custom'] = $this->session->data['order_id'];
        $data['banks'] =  $targetCore->getBankList();

        return $this->load->view($this->config->get('config_template') . 'extension/payment/sofort.tpl', $data);
    }

    /**
     *        Start payment
     */

    public function send()
    {
        $paymentType = $this->paymentType;

        $this->load->model('checkout/order');

        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

        $rtlo = ($this->config->get('sofort_rtlo')) ? $this->config->get('sofort_rtlo') : TargetPayCore::DEFAULT_RTLO; // Default Digiwallet

        if ($order_info['currency_code'] != "EUR") {
            $this->log->write("Invalid currency code " . $order_info['currency_code']);
            $json['error'] = "Invalid currency code " . $order_info['currency_code'];
        } else {
            $digiCore = new TargetPayCore($paymentType, $rtlo, TargetPayCore::APP_ID, "nl", false);
            $digiCore->setAmount(round($order_info['total'] * 100));
            $digiCore->setDescription("Order id: " . $this->session->data['order_id']);
            if (!empty($this->request->post['bank_id'])) {
                $digiCore->setCountryId($this->request->post['bank_id']);
            }

            $digiCore->setCancelUrl($this->url->link('checkout/cart', '', 'SSL'));
            $digiCore->setReturnUrl($this->url->link('checkout/success', '', 'SSL'));
            
            $params = array('order_id' => $this->session->data['order_id'],'payment_type' => $paymentType);
            $digiCore->setReportUrl(html_entity_decode($this->url->link('extension/payment/tp_callback/report', $params, 'SSL')));

            $bankUrl = $digiCore->startPayment();

            $this->storeTxid($digiCore->getPayMethod(), $digiCore->getTransactionId(), $this->session->data['order_id']);

            if (!$bankUrl) {
                $this->log->write('Digiwallet start payment failed: ' . $digiCore->getErrorMessage());
                $json['error'] = 'Digiwallet start payment failed: ' . $digiCore->getErrorMessage();
            } else {
                $json['success'] = $bankUrl;
            }
        }

        $this->response->setOutput(json_encode($json));
    }

    /**
     *        Save txid/order_id pair in database
     */

    public function storeTxid($method, $txid, $order_id)
    {
        $sql = "INSERT INTO `" . DB_PREFIX . TargetPayCore::TARGETPAY_PREFIX . TargetPayCore::METHOD_SOFORT ."` SET " .
            "`order_id`='" . $this->db->escape($order_id) . "', " .
            "`method`='" . $this->db->escape($method) . "', " .
            "`" . TargetPayCore::METHOD_SOFORT . "_txid`='" . $this->db->escape($txid) . "'";
        $this->db->query($sql);
    }
}
