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
            'image' => 'assets/images/hnahair-1.jpg',
            'title' => 'Glueless 13x4 HD Lace Wigs',
            'badge' => 'Bestseller',
        ],
        [
            'image' => 'assets/images/hnahair-2.jpg',
            'title' => 'Glueless 5x5 HD Lace Wigs',
            'badge' => 'Popular',
        ],
        [
            'image' => 'assets/images/hnahair-6.jpg',
            'title' => '13x6 HD Lace Frontal Wigs',
            'badge' => 'New Season',
        ],
        [
            'image' => 'assets/images/hnahair-7.jpg',
            'title' => 'Glueless HD Lace Wigs',
            'badge' => 'Premium',
        ],
        [
            'image' => 'assets/images/hnahair-9.jpg',
            'title' => 'Bump Hair Bundles',
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
        | 1. Glueless 13x4 HD Lace Wigs
        |--------------------------------------------------------------------------
        */
        [
            'id' => 'glueless-13x4-hd-lace-wigs',
            'name' => 'Glueless 13x4 HD Lace Wigs',
            'badge' => 'Bestseller',
            'reviews' => 142,
            'image' => 'assets/images/lacewig/hdwig2.jpg',
            'gallery' => [
                'assets/images/lacewig/hdwig2.jpg',
                'assets/images/lacewig/hdwig1.jpg',
                'assets/images/lacewig/hdwig3.jpg',
                'assets/images/lacewig/hdwig4.jpg',
                'assets/images/lacewig/hdwig5.jpg',
                'assets/images/lacewig/hdwig6.jpg',
                'assets/images/lacewig/hdwig7.jpg',
                'assets/images/lacewig/hdwig8.jpg',
                'assets/images/lacewig/hdwig9.jpg',
                'assets/images/lacewig/hdwig10.jpg',
                'assets/images/lacewig/hdwig11.jpg',
                'assets/images/lacewig/hdwig12.jpg',
                'assets/images/lacewig/hdwig13.jpg',
            ],
            'description' => 'Ultra-luxurious glueless 13x4 HD lace wig with 250% high density for maximum fullness. Pre-plucked natural hairline with invisible Swiss HD lace for an undetectable, seamless melt.',
            'details' => [
                'Lace Type' => '13x4 HD Swiss Lace (Invisible Melt)',
                'Hair Density' => 'LSY-250% High Density',
                'Cap Construction' => '100% Glueless with Adjustable Elastic Band & Combs',
                'Hair Material' => '100% Virgin Human Hair',
                'Hairline' => 'Pre-Plucked Natural Hairline with Baby Hair',
                'Bleached Knots' => 'Clean Lightly Bleached Knots',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length (LSY-250% Density)',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '14"', 'price' => 136.17],
                        ['label' => '16"', 'price' => 150.45],
                        ['label' => '18"', 'price' => 165.73],
                        ['label' => '20"', 'price' => 185.01],
                        ['label' => '22"', 'price' => 198.81],
                        ['label' => '24"', 'price' => 213.24],
                        ['label' => '26"', 'price' => 231.94],
                        ['label' => '28"', 'price' => 250.78],
                        ['label' => '30"', 'price' => 267.31],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 2. Glueless 5x5 HD Lace Wigs
        |--------------------------------------------------------------------------
        */
        [
            'id' => 'glueless-5x5-hd-lace-wigs',
            'name' => 'Glueless 5x5 HD Lace Wigs',
            'badge' => 'Popular',
            'reviews' => 118,
            'image' => 'assets/images/hnahair-2.jpg',
            'gallery' => [
                'assets/images/hnahair-2.jpg',
                'assets/images/hnahair-5.jpg',
                'assets/images/hnahair-8.jpg',
            ],
            'description' => 'Effortless everyday glamour with our glueless 5x5 HD lace closure wig. 250% density ensures rich, voluptuous thickness from roots to tips, with an ultra-fine HD lace that blends seamlessly into any skin tone.',
            'details' => [
                'Lace Type' => '5x5 HD Lace Closure',
                'Hair Density' => 'LSY-250% High Density',
                'Cap Construction' => 'Glueless Cap with Non-Slip Elastic Grip Band',
                'Hair Material' => '100% Virgin Human Hair',
                'Parting Space' => '5x5 Deep Free Parting',
                'Bleached Knots' => 'Pre-Plucked & Lightly Bleached',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length (LSY-250% Density)',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '14"', 'price' => 134.60],
                        ['label' => '16"', 'price' => 145.85],
                        ['label' => '18"', 'price' => 161.76],
                        ['label' => '20"', 'price' => 176.12],
                        ['label' => '22"', 'price' => 190.87],
                        ['label' => '24"', 'price' => 205.28],
                        ['label' => '26"', 'price' => 221.78],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 3. 13x6 HD Lace Frontal Wig
        |--------------------------------------------------------------------------
        */
        [
            'id' => '13x6-hd-lace-frontal-wig',
            'name' => '13x6 HD Lace Frontal Wig',
            'badge' => 'Premium',
            'reviews' => 156,
            'image' => 'assets/images/hnahair-6.jpg',
            'gallery' => [
                'assets/images/hnahair-6.jpg',
                'assets/images/hnahair-7.jpg',
                'assets/images/hnahair-3.jpg',
            ],
            'description' => 'Deep 6-inch parting space across the full 13-inch ear-to-ear hairline. Premium 250% high density provides supreme movement and body for deep side parts, half-up styles, and high ponytails.',
            'details' => [
                'Lace Type' => '13x6 HD Lace Frontal (Deep 6" Parting)',
                'Hair Density' => 'LSY-250% High Density',
                'Cap Construction' => 'Breathable Soft Cap with Adjustable Straps & Combs',
                'Hair Material' => '100% Virgin Human Hair',
                'Versatility' => 'Ear-to-Ear Free Parting & Ponytail Friendly',
                'Bleached Knots' => 'Pre-Plucked with Natural Hairline',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length (LSY-250% Density)',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '18"', 'price' => 155.37],
                        ['label' => '20"', 'price' => 170.46],
                        ['label' => '22"', 'price' => 183.19],
                        ['label' => '24"', 'price' => 222.93],
                        ['label' => '26"', 'price' => 243.61],
                        ['label' => '28"', 'price' => 261.16],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 4. Glueless HD Lace Wigs
        |--------------------------------------------------------------------------
        */
        [
            'id' => 'glueless-hd-lace-wigs',
            'name' => 'Glueless HD Lace Wigs',
            'badge' => 'Trending',
            'reviews' => 134,
            'image' => 'assets/images/hnahair-7.jpg',
            'gallery' => [
                'assets/images/hnahair-7.jpg',
                'assets/images/hnahair-4.jpg',
                'assets/images/hnahair-1.jpg',
            ],
            'description' => 'Signature wear-and-go glueless HD lace wig with 250% density for maximum bounce and silky smooth luster. Designed for quick 30-second styling with zero glue, tape, or hair damage.',
            'details' => [
                'Lace Type' => 'Ultra-Thin Invisible HD Lace',
                'Hair Density' => 'LSY-250% High Density',
                'Cap Construction' => '3D Dome Stretch Cap with Removable Elastic Band',
                'Hair Material' => '100% Virgin Human Hair',
                'Installation' => '100% Ready-to-Wear, No Glue Required',
                'Longevity' => '1–2+ Years with Standard Care',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length (LSY-250% Density)',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '18"', 'price' => 146.46],
                        ['label' => '20"', 'price' => 161.26],
                        ['label' => '22"', 'price' => 181.68],
                        ['label' => '24"', 'price' => 213.31],
                        ['label' => '26"', 'price' => 230.14],
                        ['label' => '28"', 'price' => 246.54],
                    ],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | 5. Bump Hair Bundles
        |--------------------------------------------------------------------------
        */
        [
            'id' => 'bump-hair-bundles',
            'name' => 'Bump Hair Bundles',
            'badge' => 'Top Value',
            'reviews' => 168,
            'image' => 'assets/images/hnahair-9.jpg',
            'gallery' => [
                'assets/images/hnahair-9.jpg',
                'assets/images/product-bundles.jpg',
                'assets/images/hnahair-10.jpg',
            ],
            'description' => 'Premium grade 100% human hair Bump bundles. Double machine-wefted to prevent shedding, silky-soft with natural bounce and shine. Can be easily bleached, dyed, straightened, and curled.',
            'details' => [
                'Product Type' => 'Bump Hair Bundles / Hair Weft',
                'Hair Material' => '100% Remy Human Hair',
                'Weft Quality' => 'Reinforced Double Machine Weft',
                'Bundle Weight' => '100g (±5g) Per Bundle',
                'Styling' => 'Bleach, Dye, Perm & Restyle Friendly',
                'Texture' => 'Smooth, Silky, Shedding & Tangle Free',
            ],
            'bulk_discounts' => [],
            'options' => [
                [
                    'name' => 'Length',
                    'type' => 'select',
                    'required' => true,
                    'values' => [
                        ['label' => '10"', 'price' => 17.58],
                        ['label' => '12"', 'price' => 21.56],
                        ['label' => '14"', 'price' => 25.59],
                        ['label' => '16"', 'price' => 29.58],
                        ['label' => '18"', 'price' => 37.91],
                        ['label' => '20"', 'price' => 42.81],
                        ['label' => '22"', 'price' => 46.12],
                        ['label' => '24"', 'price' => 49.83],
                        ['label' => '26"', 'price' => 57.39],
                        ['label' => '28"', 'price' => 61.81],
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
            'href' => '#services',
            'label' => 'Hair Services',
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
            'href' => '#about',
            'label' => 'About',
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
            'href' => '#services',
            'label' => 'Services',
        ],
        [
            'href' => '#gallery',
            'label' => 'Gallery',
        ],
        [
            'href' => '#about',
            'label' => 'About',
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
