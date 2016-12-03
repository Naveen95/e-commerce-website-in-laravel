<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Indipay Service Config 
    | ------- ciprus payment gateway Test Credentials--------------
    | vanity Url : https://sandbox.citruspay.com/e6ojft1vuh
    | Access key : T80ONT2HMDCNNMOU4852
    | Secret Key : b5a61cf7a75cda5d07ad6378bae77d5138a48109
    |--------------------------------------------------------------------------
    |   gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo
    |   view    = File
    */

    'gateway' => 'InstaMojo',                // Replace with the name of default gateway you want to use

    'testMode'  => true,                   // True for Testing the Gateway [For production false]

    'ccavenue' => [                         // CCAvenue Parameters
        'merchantId'  => env('INDIPAY_MERCHANT_ID', ''),
        'accessCode'  => env('INDIPAY_ACCESS_CODE', ''),
        'workingKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'redirectUrl' => env('INDIPAY_REDIRECT_URL', 'indipay/response'),
        'cancelUrl' => env('INDIPAY_CANCEL_URL', 'indipay/response'),

        'currency' => env('INDIPAY_CURRENCY', 'INR'),
        'language' => env('INDIPAY_LANGUAGE', 'EN'),
    ],

    'payumoney' => [                         // PayUMoney Parameters
        'merchantKey'  => env('INDIPAY_MERCHANT_KEY', 'rjQUPktU'),
        'salt'  => env('INDIPAY_SALT', 'e5iIg1jwi8'),
        'workingKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'successUrl' => env('INDIPAY_SUCCESS_URL', 'http://localhost:8000/user/paymentresponse'),
        'failureUrl' => env('INDIPAY_FAILURE_URL', 'http://localhost:8000/user/paymentresponse'),
    ],

    'ebs' => [                         // EBS Parameters
        'account_id'  => env('INDIPAY_MERCHANT_ID', ''),
        'secretKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'return_url' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
    ],

    'citrus' => [                         // Citrus Parameters
        'vanityUrl'  => env('INDIPAY_CITRUS_VANITY_URL', 'e6ojft1vuh'),
        'secretKey' => env('INDIPAY_WORKING_KEY', 'b5a61cf7a75cda5d07ad6378bae77d5138a48109'),

        // Should be route address for url() function
        'returnUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
        'notifyUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
    ],

    'instamojo' =>  [
        'api_key' => env('INSTAMOJO_API_KEY',''),
        'auth_token' => env('INSTAMOJO_AUTH_TOKEN',''),
        'redirectUrl' => env('INDIPAY_REDIRECT_URL', 'indipay/response'),
    ],

    // Add your response link here. In Laravel 5.2 you may use the api middleware instead of this.
    'remove_csrf_check' => [
        'paymentresponse'
    ],





];
