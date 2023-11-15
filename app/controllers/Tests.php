<?php

require_once('../vendor/autoload.php');

class Tests extends Controller
{
    public function __construct()
    {
        $this->customerModel = $this->model("Customer");
        $this->transactionModel = $this->model("Transaction");
    }

    public function index()
    {
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
                'json' => [
                    'data' => [
                        'attributes' => [
                            'billing' => [
                                'name' => 'billingName',
                                'email' => 'email@email.com',
                                'phone' => '09123456789'
                            ],
                            'send_email_receipt' => false,
                            'show_description' => false,
                            'show_line_items' => true,
                            'description' => 'description',
                            'line_items' => [
                                [
                                    'currency' => 'PHP',
                                    'amount' => 400000,
                                    'description' => 'prodDescription',
                                    'name' => 'prodName',
                                    'quantity' => 3
                                ]
                            ],
                            'payment_method_types' => ['paymaya']
                        ]
                    ]
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                    'accept' => 'application/json',
                    'authorization' => 'Basic c2tfdGVzdF9Ec2c2Mnd5MUpYcHVYUGRMUmJIOThMSmg6',
                ],

                'verify' => false,
            ]);

            $responseData = json_decode($response->getBody(), true);

            // Check if the checkout URL is present in the response
            if (isset($responseData['data']['attributes']['checkout_url'])) {
                $checkoutUrl = $responseData['data']['attributes']['checkout_url'];
                header('Location:' . $checkoutUrl);
            } else {
                echo 'Checkout URL not found in the response.';
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle exceptions here, log or display an appropriate error message
            echo 'Error: ' . $e->getMessage();
        }
    }
}
