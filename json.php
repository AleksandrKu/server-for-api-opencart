<?php
$products = [];
foreach ($order_info["product_ids"] as $prod) {
    $products[] = [
        "product_id" => $prod["product_id"], //string,
        "order_product_id" => $prod["order_product_id"], //string,
        "model" => $prod["model"], //string,
        "name" => $prod["name"], //string,
        "price" => $prod["price"], //decimal,
        "quantity" => $prod["quantity"], //int,
        "total_price" => $prod["total"], //decimal,
        "tax_percent" => $prod["tax"], //decimal,
        "tax_value" => "!!!!!", //decimal,
        "variant_id" => "!!!!!", //string
    ];

}
$json = [
    "return_code" => 1, // int
    "return_message" => "!!!!!", // string
    "result" => [
        "orders_count" => 1, //int
        "order" => [
            "id" => "!!! 1", // string,
            "order_id" => "$order_id", // string,
            "customer" => [
                "id" => $order_info["customer_id"], //string
                "email" => $order_info["email"], //string
                "first_name" => $order_info["firstname"], // string
                "last_name" => $order_info["lastname"], // string
            ],
            "create_at" => "!!!!!", // string
            "currency" => [
                "name" => $order_info["currency_code"], //string
                "iso3" => "!!!!!", //string
                "symbol_left" => "!!!!!", //string
                "symbol_right" => "!!!!!", // string
                "rate" => "!!!!!" // decimal

            ],
            "billing_address" => [
                "id" => "!!!!!", //string
                "type" => "!!! type", //string
                "first_name" => $order_info["payment_firstname"], // string
                "last_name" => $order_info["payment_lastname"], //string,
                "postcode" => $order_info["payment_postcode"], //string,
                "address1" => $order_info["payment_address_1"], //string,
                "address2" => $order_info["payment_address_2"], //string,
                "phone" => $order_info["telephone"], //string,
                "city" => $order_info["payment_city"], //string,
                "country" => [
                    "code2" => $order_info["payment_iso_code_2"], //string,
                    "code3" => $order_info["payment_iso_code_3"], //string,
                    "name" => $order_info["payment_country"], //string
                ],
                "state" => [
                    "code" => "!!!!!", //string,
                    "name" => "!!!!!", //string
                ],
                "company" => $order_info["payment_company"], // string,
                "fax" => "!!!!!", //string,
                "website" => "!!!!!", //string,
                "gender" => "!!!!!", //string,
                "region" => "!!!!!", //string,
                "default" => "!!!!!", //string,
                "tax_id" => "!!!!!", //string
            ],
            "shipping_address" => [

                "id" => "!!!!!", //string,
                "type" => $order_info["shipping_code"], //string,
                "first_name" => $order_info["shipping_firstname"], //string,
                "last_name" => $order_info["shipping_lastname"], //string,
                "postcode" => $order_info["shipping_postcode"], //string,
                "address1" => $order_info["shipping_address_1"], //string,
                "address2" => $order_info["shipping_address_2"], //string,
                "phone" => "!!!!!", //string,
                "city" => $order_info["shipping_city"], //string,
                "country" => [
                    "code2" => $order_info["shipping_iso_code_2"], //string,
                    "code3" => $order_info["shipping_iso_code_3"], //string,
                    "name" => $order_info["shipping_country"], //string
                ],
                "state" => [
                    "code" => "!!!!!", //string,
                    "name" => "!!!!!", //string
                ],
                "company" => "!!!!!", //string,
                "fax" => "!!!!!", //string,
                "website" => "!!!!!", //string,
                "gender" => "!!!!!", //string,
                "region" => "!!!!!", //string,
                "default" => "!!!!!", //string,
                "tax_id" => "!!!!!", //string
            ],
            "payment_method" => [
                "name" => $order_info["payment_method"] //string
            ],
            "shipping_method" => [
                "name" => $order_info["shipping_method"] // string
            ],
            "status" => [
                "id" => "!!!!!", //string,
                "name" => "!!!!!", //string,
                "history" => [
                    "history" => [
                        "id" => "!!!!!", //string,
                        "name" => "!!!!!", //string,
                        "modified_time" => "!!!!!", //string,
                        "notify" => "!!!!!", //string,
                        "comment" => "!!!!!", //string
                    ]
                ],
                "refund_info" => [
                    "shipping" => "!!!!!", //decimal,
                    "fee" => "!!!!!", //decimal,
                    "total_refunded" => "!!!!!", //decimal,
                    "time" => "!!!!!", //string,
                    "comment" => "!!!!!", //string,
                    "refunded_items" => [
                        "items" => [
                            "product_id" => "!!!!!", //string,
                            "variant_id" => "!!!!!", //string,
                            "qty" => "!!!!!", //int,
                            "refund" => "!!!!!", //decimal
                        ]
                    ]

                ],

            ],
            "totals" => [
                "total" => $order_info["total"], // decimal,
                "subtotal" => $order_info["total"], // decimal,
                "shipping" => "!!!!!", // decimal,
                "tax" => "!!!!!", //decimal,
                "discount" => "!!!!!" //decimal
            ],
            "total" => [
                "subtotal_ex_tax" => "!!!!!", //decimal,
                "wrapping_ex_tax" => "!!!!!", //decimal,
                "shipping_ex_tax" => "!!!!!", //decimal,
                "total_discount" => "!!!!!", //decimal,
                "total_tax" => "!!!!!", //decimal,
                "total" => "!!!!!", //decimal,
                "additional_attributes" => [
                    "shipping_discount_ex_tax" => "!!!!!", //decimal,
                    "subtotal_discount_ex_tax" => "!!!!!", //decimal,
                    "subtotal_tax" => "!!!!!", //decimal,
                    "wrapping_tax" => "!!!!!", //decimal,
                    "shipping_tax" => "!!!!!", //decimal
                ]
            ],
            "order_products" => $products,
            "modified_at" => "!!!!!", // string,
            "finished_time" => "!!!!!", //string,
            "comment" => $order_info["comment"], //string,
            "store_id" => $order_info["store_id"], //string
        ]
    ]
];