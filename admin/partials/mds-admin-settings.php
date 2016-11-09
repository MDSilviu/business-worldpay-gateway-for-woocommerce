<?php

/**
 * Provides settings inputs for admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.mdsdev.eu
 * @since      1.0.0
 *
 * @package    MDS_Worldpay_Woocommerce
 * @subpackage MDS_Worldpay_Woocommerce/admin/partials
 */
if (!defined('ABSPATH')) {
    exit;
}

return array(
    'enabled' => array(
        'title' => __('Enable/Disable', 'mds-worldpay-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Enable Business Payment Gateway', 'mds-worldpay-woocommerce'),
        'description' => __('Enable or disable the gateway.', 'mds-worldpay-woocommerce'),
        'desc_tip' => false,
        'default' => 'yes'
    ),
    'title' => array(
        'title' => __('Title', 'mds-worldpay-woocommerce'),
        'type' => 'text',
        'description' => __('This controls the title which the user sees during checkout.', 'mds-worldpay-woocommerce'),
        'desc_tip' => true,
        'default' => __('WorldPay', 'mds-worldpay-woocommerce')
    ),
    'description' => array(
        'title' => __('Description', 'mds-worldpay-woocommerce'),
        'type' => 'textarea',
        'description' => __('This controls the description which the user sees during checkout.', 'mds-worldpay-woocommerce'),
        'default' => __("Pay via WorldPay: Accepts Mastercad, Maestro, Visa, American Express, JCB ", 'mds-worldpay-woocommerce')
    ),
    'api_installation_id' => array(
        'title' => __('Installation ID', 'mds-worldpay-woocommerce'),
        'type' => 'text',
        'description' => __('Add your Business WorldPay Installation ID from your Setup->Installation.', 'mds-worldpay-woocommerce'),
        'default' => '',
        'desc_tip' => true
    ),
    'testmode' => array(
        'title' => __('WorldPay Test Mode', 'mds-worldpay-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Enable Test Mode', 'mds-worldpay-woocommerce'),
        'description' => __('Enable or disable the test mode for the gateway to test the payment method.', 'mds-worldpay-woocommerce'),
        'desc_tip' => false,
        'default' => 'yes'
    ),
    'debug' => array(
        'title' => __('Debug Log', 'mds-worldpay-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Enable logging', 'mds-worldpay-woocommerce'),
        'default' => 'no',
        'description' => sprintf(__('Log Worldpay events, inside <strong><code>%s</code></strong>', 'mds-worldpay-woocommerce'), wc_get_log_file_path('worldpay'))
    ),
    'advanced' => array(
        'title' => __('Advanced options', 'mds-worldpay-woocommerce'),
        'type' => 'title',
        'description' => '',
    ),
    'api_payment_response_password' => array(
        'title' => __('Payment Response Password ', 'mds-worldpay-woocommerce'),
        'type' => 'text',
        'description' => __('Add your Payment Response Password from your Setup->Installation->Payment Response Password. ', 'mds-worldpay-woocommerce'),
        'default' => '',
        'desc_tip' => true
    ),
    'api_md5_secret' => array(
        'title' => __('MD5 Secret', 'mds-worldpay-woocommerce'),
        'type' => 'text',
        'description' => __('Add your Business WorldPay MD5 Secret from your Setup->Installation->MD5 secret for transactions.', 'mds-worldpay-woocommerce'),
        'default' => '',
        'desc_tip' => true
    ),
    'api_md5_fields' => array(
        'title' => __('Set Signature Fields', 'mds-worldpay-woocommerce'),
        'type' => 'multiselect',
        'class' => 'chosen_select',
        'css' => 'max-width: 550px;',
        'desc_tip' => __('Select signature fields for MD5 encryption.', 'mds-worldpay-woocommerce'),
        'options' => $this->build_signature_options($this->api_md5_fields),
        'default' => array('instId', 'amount', 'currency', 'cartId'),
    ),
    'api_md5_generated_fields' => array(
        'title' => __('Signature Fields', 'mds-worldpay-woocommerce'),
        'type' => 'text',
        'description' => __('The generated signature fields. Copy this in your WorldPay account Setup->Installations->Integration Setup->"SignatureFields" field', 'mds-worldpay-woocommerce'),
        'desc_tip' => false,
        'class' => 'mds-mds-fields-str',
        'custom_attributes' => array(
            'readonly' => 'readonly',
            'data-md5-str' => $this->api_md5_fields_str
        ),
        'default' => $this->api_md5_fields_str,
    ),
    'merchant_acc' => array(
        'title' => __('Merchant Code', 'mds-worldpay-woocommerce'),
        'type' => 'title',
        'description' => __('This parameters will enable you to select which merchant code you would like payments to go through. You can select a total of three different ones. So for example if you would like payments to go through a specific merchant account you can input your preferred WorldPay merchant code in one of the fields. The first one to be used will be the one from the first field, if for some reason we the first one can\'t be used (incorrect currency, different capture delay settings, etc.), the second one will be used and then the third. If you do not know this information or you only have one merchant code you may leave these fields blank.', 'mds-worldpay-woocommerce')
    ),
    'api_merchant_code_1' => array(
        'title' => __('Merchant Code 1', 'mds-worldpay-woocommerce'),
        'type' => 'text',
        'description' => '',
        'desc_tip' => false,
        'default' => ''
    ),
    'api_merchant_code_2' => array(
        'title' => __('Merchant Code 2', 'mds-worldpay-woocommerce'),
        'type' => 'text',
        'description' => '',
        'desc_tip' => false,
        'default' => ''
    ),
    'api_merchant_code_3' => array(
        'title' => __('Merchant Code 3', 'mds-worldpay-woocommerce'),
        'type' => 'text',
        'description' => '',
        'desc_tip' => false,
        'default' => ''
    ),
    'payment_page' => array(
        'title' => __('Worldpay Payment Page Options', 'mds-worldpay-woocommerce'),
        'type' => 'title',
        'description' => '',
    ),
    'api_hide_contact' => array(
        'title' => __('Payment Page Billing Info', 'mds-worldpay-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Hide Billing Information', 'mds-worldpay-woocommerce'),
        'default' => 'yes',
        'description' => __('Display the shopper billing contact information on payment page', 'mds-worldpay-woocommerce'),
    ),
    'api_with_delivery' => array(
        'title' => __('Payment Page Delivery Info', 'mds-worldpay-woocommerce'),
        'type' => 'checkbox',
        'label' => __('With Delivery', 'mds-worldpay-woocommerce'),
        'custom_attributes' => $this->shipping_enabled ? '' : array(
            'disabled' => 'disabled'
        ),
        'default' => 'no',
        'description' => __('Display the shopper delivery information on payment page if shop shipping is enabled', 'mds-worldpay-woocommerce'),
    ),
    'api_fix_contact' => array(
        'title' => __('Payment Page Fix Info', 'mds-worldpay-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Fix Billing and Delivery Info', 'mds-worldpay-woocommerce'),
        'default' => 'yes',
        'description' => __('Allow shopper to edit the billing and delivery information on payment page', 'mds-worldpay-woocommerce'),
    ),
    'api_no_language_menu' => array(
        'title' => __('Payment Page Hide Language Menu', 'mds-worldpay-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Hide Language Menu', 'mds-worldpay-woocommerce'),
        'default' => 'yes',
        'description' => __('Allow shopper to change the language on payment page', 'mds-worldpay-woocommerce'),
    ),
    'api_lang' => array(
        'title' => __('Payment Page language', 'mds-worldpay-woocommerce'),
        'type' => 'select',
        'class' => 'chosen_select',
        'desc_tip' => __('Choose the default language shopper will see on Payment Page', 'mds-worldpay-woocommerce'),
        
        
        'options' => array(
            'LRD' => __('Liberian Dollar', 'mds-worldpay-woocommerce'),
            'UYU' => __('Uruguayan Peso', 'mds-worldpay-woocommerce'),
            'GBP' => __('Pounds Sterling', 'mds-worldpay-woocommerce'),
            'EGP' => __('Egyptian Pound', 'mds-worldpay-woocommerce'),
            'FKP' => __('Falkland Islands Pound', 'mds-worldpay-woocommerce'),
            'LBP' => __('Lebanese Pound', 'mds-worldpay-woocommerce'),
            'SHP' => __('St Helena Pound', 'mds-worldpay-woocommerce'),
            'JPY' => __('Japanese Yen', 'mds-worldpay-woocommerce'),
            'AUD' => __('Australian Dollar', 'mds-worldpay-woocommerce'),
            'AFN' => __('currency.AFN', 'mds-worldpay-woocommerce'),
            'AOA' => __('Angolan Kwanza', 'mds-worldpay-woocommerce'),
            'ARS' => __('Argentine Peso', 'mds-worldpay-woocommerce'),
            'AZN' => __('currency.AZN', 'mds-worldpay-woocommerce'),
            'BSD' => __('Bahamian Dollar', 'mds-worldpay-woocommerce'),
            'BND' => __('Brunei Dollar', 'mds-worldpay-woocommerce'),
            'PAB' => __('Panamanian Balboa', 'mds-worldpay-woocommerce'),
            'BMD' => __('Bermudian Dollar', 'mds-worldpay-woocommerce'),
            'BHD' => __('Bahraini Dinar', 'mds-worldpay-woocommerce'),
            'BBD' => __('Barbados Dollar', 'mds-worldpay-woocommerce'),
            'THB' => __('Thai Baht', 'mds-worldpay-woocommerce'),
            'ETB' => __('Ethiopian Birr', 'mds-worldpay-woocommerce'),
            'BTN' => __('currency.BTN', 'mds-worldpay-woocommerce'),
            'CVE' => __('Cape Verde Escudo', 'mds-worldpay-woocommerce'),
            'CAD' => __('Canadian Dollar', 'mds-worldpay-woocommerce'),
            'CDF' => __('currency.CDF', 'mds-worldpay-woocommerce'),
            'KMF' => __('Comoro Franc', 'mds-worldpay-woocommerce'),
            'XPF' => __('CFP Franc', 'mds-worldpay-woocommerce'),
            'CLP' => __('Chilean Peso', 'mds-worldpay-woocommerce'),
            'CHF' => __('Swiss Franc', 'mds-worldpay-woocommerce'),
            'KYD' => __('Cayman Islands Dollar', 'mds-worldpay-woocommerce'),
            'COP' => __('Colombian Peso', 'mds-worldpay-woocommerce'),
            'KHR' => __('Cambodia Riel', 'mds-worldpay-woocommerce'),
            'CZK' => __('Czech Koruna', 'mds-worldpay-woocommerce'),
            'VND' => __('Viet Nam Dong', 'mds-worldpay-woocommerce'),
            'GMD' => __('Gambian Dalasi', 'mds-worldpay-woocommerce'),
            'DZD' => __('Algerian Dinar', 'mds-worldpay-woocommerce'),
            'STD' => __('Sao Tome Principe Dobra', 'mds-worldpay-woocommerce'),
            'DJF' => __('Djibouti Franc', 'mds-worldpay-woocommerce'),
            'AED' => __('United Arab Emirates Dirham', 'mds-worldpay-woocommerce'),
            'MAD' => __('Moroccon Dirham', 'mds-worldpay-woocommerce'),
            'DKK' => __('Danish Krone', 'mds-worldpay-woocommerce'),
            'XCD' => __('East Caribbean Dollar', 'mds-worldpay-woocommerce'),
            'EUR' => __('Euro', 'mds-worldpay-woocommerce'),
            'FJD' => __('Fiji Dollar', 'mds-worldpay-woocommerce'),
            'BIF' => __('Burundi Franc', 'mds-worldpay-woocommerce'),
            'HUF' => __('Hungarian Forint', 'mds-worldpay-woocommerce'),
            'HTG' => __('Haitian Gourde', 'mds-worldpay-woocommerce'),
            'GEL' => __('currency.GEL', 'mds-worldpay-woocommerce'),
            'GHS' => __('currency.GHS', 'mds-worldpay-woocommerce'),
            'HKD' => __('Hong Kong Dollar', 'mds-worldpay-woocommerce'),
            'HRK' => __('Croatian Kuna', 'mds-worldpay-woocommerce'),
            'JMD' => __('Jamaican Dollar', 'mds-worldpay-woocommerce'),
            'JOD' => __('Jordanian Dinar', 'mds-worldpay-woocommerce'),
            'KES' => __('Kenyan Shilling', 'mds-worldpay-woocommerce'),
            'PGK' => __('New Guinea Kina', 'mds-worldpay-woocommerce'),
            'MMK' => __('Myanmar Kyat', 'mds-worldpay-woocommerce'),
            'KWD' => __('Kuwaiti Dinar', 'mds-worldpay-woocommerce'),
            'LAK' => __('Lao Kip', 'mds-worldpay-woocommerce'),
            'KZT' => __('Kazakhstan Tenge', 'mds-worldpay-woocommerce'),
            'SLL' => __('Sierra Leone Leone', 'mds-worldpay-woocommerce'),
            'LTL' => __('Lithuanian Litas', 'mds-worldpay-woocommerce'),
            'BGN' => __('Bulgarian Lev', 'mds-worldpay-woocommerce'),
            'LSL' => __('Lesotho Loti (Maloti)', 'mds-worldpay-woocommerce'),
            'MDL' => __('currency.MDL', 'mds-worldpay-woocommerce'),
            'MXN' => __('Mexico Peso', 'mds-worldpay-woocommerce'),
            'MGA' => __('currency.MGA', 'mds-worldpay-woocommerce'),
            'MZN' => __('currency.MZN', 'mds-worldpay-woocommerce'),
            'ANG' => __('Netherlands Antilles Guilder', 'mds-worldpay-woocommerce'),
            'NGN' => __('Nigerian Naira', 'mds-worldpay-woocommerce'),
            'ILS' => __('Israeli Shekel', 'mds-worldpay-woocommerce'),
            'NOK' => __('Norwegian Krone', 'mds-worldpay-woocommerce'),
            'TWD' => __('New Taiwan Dollar', 'mds-worldpay-woocommerce'),
            'NZD' => __('New Zealand Dollar', 'mds-worldpay-woocommerce'),
            'MOP' => __('Macau Pataca', 'mds-worldpay-woocommerce'),
            'BWP' => __('Botswana Pula', 'mds-worldpay-woocommerce'),
            'PHP' => __('Philippine Peso', 'mds-worldpay-woocommerce'),
            'PLN' => __('Polish New Zloty', 'mds-worldpay-woocommerce'),
            'TOP' => __('Tongan Pa\'anga', 'mds-worldpay-woocommerce'),
            'QAR' => __('Qatari Rial', 'mds-worldpay-woocommerce'),
            'BRL' => __('Brazilian Real', 'mds-worldpay-woocommerce'),
            'RUB' => __('Russian Ruble', 'mds-worldpay-woocommerce'),
            'ZAR' => __('South African Rand', 'mds-worldpay-woocommerce'),
            'RWF' => __('Rwanda Franc', 'mds-worldpay-woocommerce'),
            'MVR' => __('Maldives Rufiyaa', 'mds-worldpay-woocommerce'),
            'MYR' => __('Malaysian Ringgit', 'mds-worldpay-woocommerce'),
            'OMR' => __('Omani Rial', 'mds-worldpay-woocommerce'),
            'RON' => __('New Romanian Leu', 'mds-worldpay-woocommerce'),
            'IDR' => __('Indonesian Rupiah', 'mds-worldpay-woocommerce'),
            'INR' => __('Indian Rupee', 'mds-worldpay-woocommerce'),
            'PKR' => __('Pakistan Rupee', 'mds-worldpay-woocommerce'),
            'RSD' => __('Serbian Dinar', 'mds-worldpay-woocommerce'),
            'SGD' => __('Singapore Dollar', 'mds-worldpay-woocommerce'),
            'PEN' => __('Peruvian Nuevo Sol', 'mds-worldpay-woocommerce'),
            'SAR' => __('Saudi Riyal', 'mds-worldpay-woocommerce'),
            'SBD' => __('Solomon Islands Dollar', 'mds-worldpay-woocommerce'),
            'SEK' => __('Swedish Krona', 'mds-worldpay-woocommerce'),
            'LKR' => __('Sri Lanka Rupee', 'mds-worldpay-woocommerce'),
            'SOS' => __('Somalia Shilling', 'mds-worldpay-woocommerce'),
            'SCR' => __('Seychelles Rupee', 'mds-worldpay-woocommerce'),
            'SRD' => __('currency.SRD', 'mds-worldpay-woocommerce'),
            'TND' => __('Tunisian Dinar', 'mds-worldpay-woocommerce'),
            'TJS' => __('currency.TJS', 'mds-worldpay-woocommerce'),
            'BDT' => __('Bangladesh Taka', 'mds-worldpay-woocommerce'),
            'TMT' => __('currency.TMT', 'mds-worldpay-woocommerce'),
            'TZS' => __('Tanzanian Shilling', 'mds-worldpay-woocommerce'),
            'TTD' => __('Trinidad and Tobago Dollar', 'mds-worldpay-woocommerce'),
            'MNT' => __('Mongolia Tugrik', 'mds-worldpay-woocommerce'),
            'UAH' => __('Ukrainian Hryvnia', 'mds-worldpay-woocommerce'),
            'MRO' => __('Mauritanian Ouguiya', 'mds-worldpay-woocommerce'),
            'USD' => __('US Dollar', 'mds-worldpay-woocommerce'),
            'UGX' => __('Uganda Shilling', 'mds-worldpay-woocommerce'),
            'UZS' => __('currency.UZS', 'mds-worldpay-woocommerce'),
            'VUV' => __('Vanuatu Vatu', 'mds-worldpay-woocommerce'),
            'KRW' => __('South Korean Won', 'mds-worldpay-woocommerce'),
            'WST' => __('Western Samoan Tala', 'mds-worldpay-woocommerce'),
            'CNY' => __('Chinese Yuan Renminbi', 'mds-worldpay-woocommerce'),
            'TRY' => __('New Turkish Lira', 'mds-worldpay-woocommerce'),
            'ZMW' => __('Zambian Kwacha', 'mds-worldpay-woocommerce'),
        ),
        'default' => 'en'
    ),
    'api_hide_currency' => array(
        'title' => __('Payment Page Hide Currency', 'mds-worldpay-woocommerce'),
        'type' => 'checkbox',
        'label' => __('Hide Currency', 'mds-worldpay-woocommerce'),
        'default' => 'yes',
        'description' => __('Allow shopper to change the payment currency.', 'mds-worldpay-woocommerce'),
    ),

);
