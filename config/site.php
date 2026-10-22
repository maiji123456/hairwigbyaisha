<?php

/*
| Static site content. Edit here instead of the Blade templates.
| (No database: the website is static.)
*/

return [
    'name' => 'LuxeHair by Aisha',
    'title' => 'LuxeHair by Aisha — Luxury Hair You Can Wear',
    'description' => 'Premium human hair, luxury hair care, and expert salon services by LuxeHair by Aisha. Book bridal styling, coloring, treatments and shop premium bundles, wax, oils and extensions.',
    'og_description' => 'Premium human hair, luxury hair care, and expert salon services by LuxeHair by Aisha.',
    'handle' => '@LuxeHairByAisha',
    'logo' => 'assets/images/luxehair-logo.png',
    'phone' => '+447539593290',
    'email' => 'info@luxhairbyaisha.co.uk',
    'client_notification_email' => env('CLIENT_NOTIFICATION_EMAIL'),
    'social' => [
        'instagram' => 'https://www.instagram.com/luxehairbyaisha?utm_source=qr',
        'facebook' => 'https://www.facebook.com/share/1MmcokJbP8/?mibextid=wwXIfr',
    ],
    'tawk' => '6abe59699762d834392b33a8/1k3roqh7l',

    /*
    |--------------------------------------------------------------------------
    | Currency Configuration
    |--------------------------------------------------------------------------
    | Change this symbol anytime (e.g. '$', '£', '€') and it will automatically
    | update across the product page, cards, and shopping cart.
    */
    'currency_symbol' => '£',

    'features' => [
        [
            'icon' => 'bi-gem',
            'label' => 'Premium Human Hair',
        ],
        [
            'icon' => 'bi-stars',
            'label' => 'Signature Hair Wax',
        ],
        [
            'icon' => 'bi-scissors',
            'label' => 'Professional Styling',
        ],
        [
            'icon' => 'bi-flower2',
            'label' => 'Precision Trimming',
        ],
        [
            'icon' => 'bi-palette',
            'label' => 'Bespoke Hair Designing',
        ],
        [
            'icon' => 'bi-heart',
            'label' => 'Luxury Hair Care',
        ],
        [
            'icon' => 'bi-truck',
            'label' => 'Worldwide Fast Delivery',
        ],
        [
            'icon' => 'bi-shield-check',
            'label' => 'Secure Payments',
        ],
    ],
        'categories' => [
        [
            'image' => 'assets/images/products/13x4-lace-front-wigs/image-1.jpg',
            'title' => 'Glueless 13x4 HD Lace Wigs',
            'badge' => 'Bestseller',
        ],
        [
            'image' => 'assets/images/products/5x5-closure-wig/image-1.jpg',
            'title' => 'Glueless 5x5 HD Lace Wigs',
            'badge' => 'Popular',
        ],
        [
            'image' => 'assets/images/products/wholesale-360-lace-wig/image-1.jpg',
            'title' => '360 HD Lace Wigs',
            'badge' => 'New Season',
        ],
        [
            'image' => 'assets/images/products/full-lace-wig/image-1.jpg',
            'title' => 'Full Lace Human Hair Wigs',
            'badge' => 'Premium',
        ],
        [
            'image' => 'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-1.jpg',
            'title' => '100% Remy Hair Bundles',
            'badge' => 'Top Value',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Products List
    |--------------------------------------------------------------------------
    | Clean, modular structure for easy manual editing of prices, lengths,
    | descriptions, images, and details.
    */
        'products' => [

        /*
        |--------------------------------------------------------------------------
        | 1. 100% virgin remy human hair 5x5 HD lace closure
        |--------------------------------------------------------------------------
        */
        [
            'id' => '100-virgin-remy-human-hair-5x5-hd-lace-closure',
            'name' => '100% Virgin Remy Hair 5x5 HD Lace Closure',
            'badge' => 'Bestseller',
            'reviews' => 110,
            'image' => 'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-1.jpg',
            'gallery' => [
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-1.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-2.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-3.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-4.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-5.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-6.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-7.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-8.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-9.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-10.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-11.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-12.jpg',
                'assets/images/products/100-virgin-remy-human-hair-5x5-hd-lace-closure/image-13.jpg',
            ],
            'description' => '',
            'details' => [
                'Hair Material' => '100% Virgin Remy Human Hair',
                'Hair Quality' => 'Factory Direct Premium Grade',
                'Bleached Knots' => 'Clean Lightly Bleached Knots',
                'Longevity' => '1–2+ Years with proper care',
                'Styling' => 'Can be dyed, bleached, straightened & curled',
                'Lace Type' => '5x5 HD Swiss Lace (Invisible Melt)',
                'Parting Space' => '5x5 Free Parting',
                'Hairline' => 'Pre-Plucked Natural Hairline with Baby Hair',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '10"', 'price' => 69.23],
                        ['label' => '12"', 'price' => 72.09],
                        ['label' => '14"', 'price' => 76.85],
                        ['label' => '16"', 'price' => 81.61],
                        ['label' => '18"', 'price' => 87.33],
                        ['label' => '20"', 'price' => 102.57],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 2. 100% virgin remy human hair 13x4 HD lace frontal
        |--------------------------------------------------------------------------
        */
        [
            'id' => '100-virgin-remy-human-hair-13x4-lace-frontal',
            'name' => '100% Virgin Remy Hair 13x4 HD Lace Frontal',
            'badge' => 'Trending',
            'reviews' => 127,
            'image' => 'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-1.jpg',
            'gallery' => [
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-1.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-2.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-3.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-4.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-5.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-6.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-7.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-8.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-9.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-10.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-11.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-12.jpg',
                'assets/images/products/100-virgin-remy-human-hair-13x4-lace-frontal/image-13.jpg',
            ],
            'description' => '',
            'details' => [
                'Hair Material' => '100% Virgin Remy Human Hair',
                'Hair Quality' => 'Factory Direct Premium Grade',
                'Bleached Knots' => 'Clean Lightly Bleached Knots',
                'Longevity' => '1–2+ Years with proper care',
                'Styling' => 'Can be dyed, bleached, straightened & curled',
                'Lace Type' => '13x4 HD Swiss Lace (Ear to Ear)',
                'Parting Space' => '13x4 Deep Parting',
                'Hairline' => 'Pre-Plucked Natural Hairline with Baby Hair',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '10"', 'price' => 83.52],
                        ['label' => '12"', 'price' => 87.33],
                        ['label' => '14"', 'price' => 94.00],
                        ['label' => '16"', 'price' => 101.62],
                        ['label' => '18"', 'price' => 110.19],
                        ['label' => '20"', 'price' => 129.25],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 3. 100% virgin remy human hair weft 3Pcs bundles - factory direct affordable price
        |--------------------------------------------------------------------------
        */
        [
            'id' => 'premium100-virgin-remy-human-hair-bundles',
            'name' => '100% Virgin Remy Human Hair Weft (3Pcs Bundles)',
            'badge' => 'Hot Value',
            'reviews' => 144,
            'image' => 'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-1.jpg',
            'gallery' => [
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-1.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-2.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-3.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-4.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-5.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-6.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-7.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-8.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-9.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-10.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-11.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-12.jpg',
                'assets/images/products/premium100-virgin-remy-human-hair-bundles/image-13.jpg',
            ],
            'description' => '',
            'details' => [
                'Hair Material' => '100% Virgin Remy Human Hair',
                'Hair Quality' => 'Factory Direct Premium Grade',
                'Bleached Knots' => 'Clean Lightly Bleached Knots',
                'Longevity' => '1–2+ Years with proper care',
                'Styling' => 'Can be dyed, bleached, straightened & curled',
                'Product Type' => '3 Pieces Hair Weft Bundles',
                'Weft Construction' => 'Reinforced Double Machine Weft',
                'Bundle Weight' => '100g (±5g) per bundle, 300g Total',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length Combinations (3 Bundles)',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '10" + 10" + 10"', 'price' => 109.81],
                        ['label' => '12" + 12" + 12"', 'price' => 121.24],
                        ['label' => '10" + 12" + 14"', 'price' => 125.82],
                        ['label' => '12" + 14" + 16"', 'price' => 144.30],
                        ['label' => '14" + 14" + 14"', 'price' => 146.40],
                        ['label' => '14" + 16" + 18"', 'price' => 164.12],
                        ['label' => '16" + 16" + 16"', 'price' => 165.26],
                        ['label' => '18" + 18" + 18"', 'price' => 180.69],
                        ['label' => '16" + 18" + 20"', 'price' => 182.03],
                        ['label' => '18" + 20" + 22"', 'price' => 199.94],
                        ['label' => '20" + 20" + 20"', 'price' => 200.13],
                        ['label' => '22" + 22" + 22"', 'price' => 218.99],
                        ['label' => '20" + 22" + 24"', 'price' => 223.94],
                        ['label' => '24" + 24" + 24"', 'price' => 252.72],
                        ['label' => '22" + 24" + 26"', 'price' => 252.91],
                        ['label' => '24" + 26" + 28"', 'price' => 286.06],
                        ['label' => '26" + 26" + 26"', 'price' => 287.01],
                        ['label' => '28" + 28" + 28"', 'price' => 318.45],
                        ['label' => '26" + 28" + 30"', 'price' => 319.21],
                        ['label' => '30" + 30" + 30"', 'price' => 352.18],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 4. 5x5 HD lace closure wig - glueless beginner friendly 100% virgin remy human hair wigs with drawstring - factory direct affordable price
        |--------------------------------------------------------------------------
        */
        [
            'id' => '5x5-closure-wig',
            'name' => '5x5 HD Lace Closure Wig (Glueless Wear & Go)',
            'badge' => 'Popular',
            'reviews' => 111,
            'image' => 'assets/images/products/5x5-closure-wig/image-1.jpg',
            'gallery' => [
                'assets/images/products/5x5-closure-wig/image-1.jpg',
                'assets/images/products/5x5-closure-wig/image-2.jpg',
                'assets/images/products/5x5-closure-wig/image-3.jpg',
                'assets/images/products/5x5-closure-wig/image-4.jpg',
                'assets/images/products/5x5-closure-wig/image-5.jpg',
                'assets/images/products/5x5-closure-wig/image-6.jpg',
                'assets/images/products/5x5-closure-wig/image-7.jpg',
                'assets/images/products/5x5-closure-wig/image-8.jpg',
                'assets/images/products/5x5-closure-wig/image-9.jpg',
                'assets/images/products/5x5-closure-wig/image-10.jpg',
                'assets/images/products/5x5-closure-wig/image-11.jpg',
                'assets/images/products/5x5-closure-wig/image-12.jpg',
                'assets/images/products/5x5-closure-wig/image-13.jpg',
            ],
            'description' => '&nbsp; Textures available Loose deep, deep wave, loose wave, body wave, kinky curly, straight, water wave, kinky straight Hair Color Natural color Feature Undetectable, invisible, Bleached knots, Pre-plucked hairline, pre-cut lace, ready to go Hai...',
            'details' => [
                'Hair Material' => '100% Virgin Remy Human Hair',
                'Hair Quality' => 'Factory Direct Premium Grade',
                'Bleached Knots' => 'Clean Lightly Bleached Knots',
                'Longevity' => '1–2+ Years with proper care',
                'Styling' => 'Can be dyed, bleached, straightened & curled',
                'Lace Type' => '5x5 HD Swiss Lace',
                'Cap Construction' => '100% Glueless Wear & Go with Drawstring & Elastic Band',
                'Installation' => 'Beginner Friendly, 30-Second Wear, Zero Glue',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length & Density',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '16" (180% Density)', 'price' => 131.34],
                        ['label' => '16" (200% Density)', 'price' => 135.93],
                        ['label' => '16" (250% Density)', 'price' => 144.30],
                        ['label' => '18" (180% Density)', 'price' => 146.70],
                        ['label' => '18" (200% Density)', 'price' => 152.64],
                        ['label' => '18" (250% Density)', 'price' => 160.30],
                        ['label' => '20" (180% Density)', 'price' => 160.39],
                        ['label' => '20" (200% Density)', 'price' => 165.46],
                        ['label' => '20" (250% Density)', 'price' => 171.86],
                        ['label' => '22" (180% Density)', 'price' => 185.49],
                        ['label' => '22" (200% Density)', 'price' => 193.17],
                        ['label' => '22" (250% Density)', 'price' => 187.87],
                        ['label' => '24" (180% Density)', 'price' => 200.92],
                        ['label' => '24" (200% Density)', 'price' => 209.89],
                        ['label' => '24" (250% Density)', 'price' => 218.10],
                        ['label' => '26" (180% Density)', 'price' => 219.63],
                        ['label' => '26" (200% Density)', 'price' => 230.02],
                        ['label' => '26" (250% Density)', 'price' => 237.66],
                        ['label' => '28" (180% Density)', 'price' => 247.62],
                        ['label' => '28" (200% Density)', 'price' => 261.53],
                        ['label' => '28" (250% Density)', 'price' => 265.23],
                        ['label' => '30" (180% Density)', 'price' => 275.58],
                        ['label' => '30" (200% Density)', 'price' => 291.65],
                        ['label' => '30" (250% Density)', 'price' => 285.68],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 5. 360 lace wig - 100% virgin remy human hair - factory direct affordable price
        |--------------------------------------------------------------------------
        */
        [
            'id' => 'wholesale-360-lace-wig',
            'name' => '360 HD Lace Wig (100% Virgin Remy Human Hair)',
            'badge' => 'Premium',
            'reviews' => 128,
            'image' => 'assets/images/products/wholesale-360-lace-wig/image-1.jpg',
            'gallery' => [
                'assets/images/products/wholesale-360-lace-wig/image-1.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-2.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-3.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-4.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-5.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-6.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-7.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-8.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-9.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-10.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-11.jpg',
                'assets/images/products/wholesale-360-lace-wig/image-12.jpg',
            ],
            'description' => '&nbsp; Textures available Loose deep, deep wave, loose wave, body wave, kinky curly, straight, water wave, kinky straight Hair Color Black Feature Undetectable, invisible, Bleached knots, Pre-plucked hairline, pre-cut lace, ready to go Hair Length...',
            'details' => [
                'Hair Material' => '100% Virgin Remy Human Hair',
                'Hair Quality' => 'Factory Direct Premium Grade',
                'Bleached Knots' => 'Clean Lightly Bleached Knots',
                'Longevity' => '1–2+ Years with proper care',
                'Styling' => 'Can be dyed, bleached, straightened & curled',
                'Lace Type' => '360 HD Lace (Full Perimeter Lace)',
                'Cap Construction' => '100% Glueless with Drawstring & Elastic Grip Band',
                'Versatility' => 'High Ponytails, Buns & Free Parting',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length & Density',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '16" (180% Density)', 'price' => 157.13],
                        ['label' => '16" (200% Density)', 'price' => 161.72],
                        ['label' => '16" (250% Density)', 'price' => 163.15],
                        ['label' => '18" (180% Density)', 'price' => 174.26],
                        ['label' => '18" (200% Density)', 'price' => 180.20],
                        ['label' => '18" (250% Density)', 'price' => 180.22],
                        ['label' => '20" (180% Density)', 'price' => 191.16],
                        ['label' => '20" (200% Density)', 'price' => 196.23],
                        ['label' => '20" (250% Density)', 'price' => 216.68],
                        ['label' => '22" (180% Density)', 'price' => 213.05],
                        ['label' => '22" (200% Density)', 'price' => 220.73],
                        ['label' => '22" (250% Density)', 'price' => 241.93],
                        ['label' => '24" (180% Density)', 'price' => 228.49],
                        ['label' => '24" (200% Density)', 'price' => 237.45],
                        ['label' => '24" (250% Density)', 'price' => 243.42],
                        ['label' => '26" (180% Density)', 'price' => 247.19],
                        ['label' => '26" (200% Density)', 'price' => 257.58],
                        ['label' => '26" (250% Density)', 'price' => 266.83],
                        ['label' => '28" (180% Density)', 'price' => 275.19],
                        ['label' => '28" (200% Density)', 'price' => 289.09],
                        ['label' => '28" (250% Density)', 'price' => 301.06],
                        ['label' => '30" (180% Density)', 'price' => 303.14],
                        ['label' => '30" (200% Density)', 'price' => 319.22],
                        ['label' => '30" (250% Density)', 'price' => 326.40],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 6. Full lace wig - 100% virgin remy human hair wig - factory direct affordable price
        |--------------------------------------------------------------------------
        */
        [
            'id' => 'full-lace-wig',
            'name' => 'Full Lace Wig (100% Virgin Remy Human Hair)',
            'badge' => 'Luxury Choice',
            'reviews' => 145,
            'image' => 'assets/images/products/full-lace-wig/image-1.jpg',
            'gallery' => [
                'assets/images/products/full-lace-wig/image-1.jpg',
                'assets/images/products/full-lace-wig/image-2.jpg',
                'assets/images/products/full-lace-wig/image-3.jpg',
                'assets/images/products/full-lace-wig/image-4.jpg',
                'assets/images/products/full-lace-wig/image-5.jpg',
                'assets/images/products/full-lace-wig/image-6.jpg',
                'assets/images/products/full-lace-wig/image-7.jpg',
                'assets/images/products/full-lace-wig/image-8.jpg',
                'assets/images/products/full-lace-wig/image-9.jpg',
                'assets/images/products/full-lace-wig/image-10.jpg',
                'assets/images/products/full-lace-wig/image-11.jpg',
            ],
            'description' => '&nbsp; Textures available Loose deep, deep wave, loose wave, body wave, kinky curly, straight, water wave, kinky straight Hair Color Black Feature Undetectable, invisible, Bleached knots, Pre-plucked hairline, pre-cut lace, ready to go Hair Length...',
            'details' => [
                'Hair Material' => '100% Virgin Remy Human Hair',
                'Hair Quality' => 'Factory Direct Premium Grade',
                'Bleached Knots' => 'Clean Lightly Bleached Knots',
                'Longevity' => '1–2+ Years with proper care',
                'Styling' => 'Can be dyed, bleached, straightened & curled',
                'Lace Type' => '100% Full Lace (All Hand-Tied)',
                'Cap Construction' => 'Breathable Full Lace Cap with Stretch Middle',
                'Versatility' => 'Part Anywhere, Braids, Updos & Ponytails',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '16"', 'price' => 161.81],
                        ['label' => '18"', 'price' => 188.93],
                        ['label' => '20"', 'price' => 220.90],
                        ['label' => '22"', 'price' => 269.32],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 7. 13x4 HD lace frontal wigs - glueless beginner friendly 100% virgin remy human hair wigs with drawstring - factory direct affordable price
        |--------------------------------------------------------------------------
        */
        [
            'id' => '13x4-lace-front-wigs',
            'name' => '13x4 HD Lace Frontal Wigs (Glueless Wear & Go)',
            'badge' => 'Top Rated',
            'reviews' => 112,
            'image' => 'assets/images/products/13x4-lace-front-wigs/image-1.jpg',
            'gallery' => [
                'assets/images/products/13x4-lace-front-wigs/image-1.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-2.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-3.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-4.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-5.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-6.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-7.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-8.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-9.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-10.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-11.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-12.jpg',
                'assets/images/products/13x4-lace-front-wigs/image-13.jpg',
            ],
            'description' => '&nbsp; Textures available Loose deep, deep wave, loose wave, body wave, kinky curly, straight, water wave, kinky straight Hair Color Natural color Feature Undetectable, invisible, Bleached knots, Pre-plucked hairline, pre-cut lace, ready to go Hai...',
            'details' => [
                'Hair Material' => '100% Virgin Remy Human Hair',
                'Hair Quality' => 'Factory Direct Premium Grade',
                'Bleached Knots' => 'Clean Lightly Bleached Knots',
                'Longevity' => '1–2+ Years with proper care',
                'Styling' => 'Can be dyed, bleached, straightened & curled',
                'Lace Type' => '13x4 HD Swiss Lace',
                'Cap Construction' => '100% Glueless Wear & Go with Drawstring & Elastic Band',
                'Installation' => 'Beginner Friendly, 30-Second Wear, Zero Glue',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length & Density',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '16" (180% Density)', 'price' => 147.35],
                        ['label' => '16" (200% Density)', 'price' => 151.94],
                        ['label' => '16" (250% Density)', 'price' => 170.09],
                        ['label' => '18" (180% Density)', 'price' => 165.37],
                        ['label' => '18" (200% Density)', 'price' => 171.31],
                        ['label' => '18" (250% Density)', 'price' => 189.65],
                        ['label' => '20" (180% Density)', 'price' => 181.73],
                        ['label' => '20" (200% Density)', 'price' => 186.80],
                        ['label' => '20" (250% Density)', 'price' => 203.87],
                        ['label' => '22" (180% Density)', 'price' => 210.38],
                        ['label' => '22" (200% Density)', 'price' => 218.07],
                        ['label' => '22" (250% Density)', 'price' => 219.88],
                        ['label' => '24" (180% Density)', 'price' => 225.82],
                        ['label' => '24" (200% Density)', 'price' => 234.78],
                        ['label' => '24" (250% Density)', 'price' => 251.00],
                        ['label' => '26" (180% Density)', 'price' => 244.53],
                        ['label' => '26" (200% Density)', 'price' => 254.91],
                        ['label' => '26" (250% Density)', 'price' => 270.56],
                        ['label' => '28" (180% Density)', 'price' => 272.52],
                        ['label' => '28" (200% Density)', 'price' => 286.42],
                        ['label' => '28" (250% Density)', 'price' => 298.13],
                        ['label' => '30" (180% Density)', 'price' => 300.47],
                        ['label' => '30" (200% Density)', 'price' => 316.55],
                        ['label' => '30" (250% Density)', 'price' => 318.58],
                    ],
                ],
            ],
        ],
    ],
    'services' => [
        [
            'image' => 'assets/images/service-color.jpg',
            'title' => 'Precision Hair Cutting',
            'price' => 'from $65',
            'text' => 'Sculpted lines tailored to your face and lifestyle.',
        ],
        [
            'image' => 'assets/images/service-treatment.jpg',
            'title' => 'Signature Hair Trimming',
            'price' => 'from $35',
            'text' => 'A refined dust to keep every strand glossy and healthy.',
        ],
        [
            'image' => 'assets/images/service-bridal.jpg',
            'title' => 'Bespoke Hair Designing',
            'price' => 'from $120',
            'text' => 'Editorial-inspired designs, engineered for you.',
        ],
        [
            'image' => 'assets/images/service-color.jpg',
            'title' => 'Luxury Hair Coloring',
            'price' => 'from $180',
            'text' => 'Balayage, gloss and dimensional tones by masters.',
        ],
        [
            'image' => 'assets/images/service-treatment.jpg',
            'title' => 'Restorative Treatments',
            'price' => 'from $95',
            'text' => 'Deep repair, keratin and silk botanicals.',
        ],
        [
            'image' => 'assets/images/product-wax.jpg',
            'title' => 'Hair Wax Styling',
            'price' => 'from $45',
            'text' => 'Sleek, sculpted finishes with our signature wax.',
        ],
        [
            'image' => 'assets/images/service-bridal.jpg',
            'title' => 'Bridal Hair Styling',
            'price' => 'from $250',
            'text' => 'Once-in-a-lifetime looks for your most important day.',
        ],
        [
            'image' => 'assets/images/service-treatment.jpg',
            'title' => 'Hair Treatment Ritual',
            'price' => 'from $145',
            'text' => 'A 90-minute glow ritual with rose gold infusion.',
        ],
    ],
    'testimonials' => [
        [
            'quote' => 'Aisha turned my wedding day into a fairytale. The bundles were flawless and the styling lasted through every dance.',
            'initial' => 'A',
            'name' => 'Amara Johnson',
            'role' => 'Bride, New York',
        ],
        [
            'quote' => 'The signature hair wax is unreal. Zero flake, all shine. LuxeHair is now the only brand on my vanity.',
            'initial' => 'Z',
            'name' => 'Zara Malik',
            'role' => 'Content Creator',
        ],
        [
            'quote' => 'A five-star experience from booking to blowout. The salon feels like a Parisian couture atelier.',
            'initial' => 'P',
            'name' => 'Priya Sharma',
            'role' => 'Editor, Vogue Circle',
        ],
    ],
    'instagram' => [
        'assets/images/product-bundles.jpg',
        'assets/images/salon-interior.jpg',
        'assets/images/service-bridal.jpg',
        'assets/images/product-wax.jpg',
        'assets/images/product-wig.jpg',
        'assets/images/service-color.jpg',
        'assets/images/product-oil.jpg',
        'assets/images/service-treatment.jpg',
    ],
    'marquee' => [
        'Free Worldwide Shipping over $150',
        'Book Your Bridal Consult',
        'New Autumn Wax Drop',
        '100% Premium Human Hair',
    ],
    'nav' => [
        [
            'href' => '#home',
            'label' => 'Home',
        ],
        [
            'href' => '#shop',
            'label' => 'Shop',
        ],
        [
            'href' => '#wax',
            'label' => 'Hair Wax',
        ],
        [
            'href' => '#gallery',
            'label' => 'Gallery',
        ],
        [
            'href' => '#testimonials',
            'label' => 'Testimonials',
        ],
        [
            'href' => '#contact',
            'label' => 'Contact',
        ],
    ],
    'footer_quick_links' => [
        [
            'href' => '#home',
            'label' => 'Home',
        ],
        [
            'href' => '#shop',
            'label' => 'Shop',
        ],
        [
            'href' => '#gallery',
            'label' => 'Gallery',
        ],
        [
            'href' => '#testimonials',
            'label' => 'Testimonials',
        ],
        [
            'href' => '#contact',
            'label' => 'Contact',
        ],
    ],
    'footer_services' => [
        [
            'href' => '#services',
            'label' => 'Hair Cutting',
        ],
        [
            'href' => '#services',
            'label' => 'Hair Coloring',
        ],
        [
            'href' => '#services',
            'label' => 'Bridal Styling',
        ],
        [
            'href' => '#services',
            'label' => 'Treatments',
        ],
        [
            'href' => '#services',
            'label' => 'Hair Wax Styling',
        ],
        [
            'href' => '#services',
            'label' => 'Trimming',
        ],
    ],
];
