<?php

/**
 * Part of the Converter package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Converter
 * @version    2.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Cartalyst LLC
 * @link       http://cartalyst.com
 */

//https://github.com/JBZoo/SimpleTypes
//https://github.com/ayeo/temperature

return array(

    /*
    |--------------------------------------------------------------------------
    | Measurements
    |--------------------------------------------------------------------------
    |
    | The available measurements to convert and format units.
    |
    */

    'measurements' => array(

        /*
        |--------------------------------------------------------------------------
        | Area
        |--------------------------------------------------------------------------
        |
        | The available measurements to convert and format areas.
        |
        */

		'area' => array(
			'mm2' => array(
				'format' => '1,00.00 mm²',
				'unit' => 1000000,
			),
			'cm2' => array(
				'format' => '1,00.00 cm²',
				'unit' => 10000,
			),
			'm2' => array(
				'format' => '1,00.00 m²',
				'unit' => 1,
			),
			'km2' => array(
				'format' => '1,00.00 km²',
				'unit' => 9.9999999999999995E-7,
			),
			'ft2' => array(
				'format' => '1,00.00 ft²',
				'unit' => 10.763867548026493,
			),
			'ch2' => array(
				'format' => '1,00.00 ch²',
				'unit' => 0.0024710436922532534,
			),
			'ac' => array(
				'format' => '1,00.00 ac',
				'unit' => 0.00024710436922532533,
			),
			'ha' => array(
				'format' => '1,00.00 ha',
				'unit' => 0.01,
			),
		),

        /*
        |--------------------------------------------------------------------------
        | Data Storage
        |--------------------------------------------------------------------------
        |
        | The available measurements to convert and format data storage measurements.
        |
        */
		
		'storage' => array(
			'b' => array(
				'format' => '1,00 B',
				'unit' => 1,
			),
			'kb' => array(
				'format' => '1,00.0 KB',
				'unit' => 1 / pow(1000, 1),
			),
			'mb' => array(
				'format' => '1,00.00 MB',
				'unit' => 1 / pow(1000, 2),
			),
			'gb' => array(
				'format' => '1,00.00 GB',
				'unit' => 1 / pow(1000, 3),
			),
			'tb' => array(
				'format' => '1,00.00 TB',
				'unit' => 1 / pow(1000, 4),
			),
			'pb' => array(
				'format' => '1,00.00 PB',
				'unit' => 1 / pow(1000, 5),
			),
			'eb' => array(
				'format' => '1,00.00 EB',
				'unit' => 1 / pow(1000, 6),
			),
			'zb' => array(
				'format' => '1,00.00 ZB',
				'unit' => 1 / pow(1000, 7),
			),
			'yb' => array(
				'format' => '1,00.00 YB',
				'unit' => 1 / pow(1000, 8),
			),
			'kib' => array(
				'format' => '1,00.0 KiB',
				'unit' => 1 / pow(1024, 1),
			),
			'mib' => array(
				'format' => '1,00.00 MiB',
				'unit' => 1 / pow(1024, 2),
			),
			'gib' => array(
				'format' => '1,00.00 GiB',
				'unit' => 1 / pow(1024, 3),
			),
			'tib' => array(
				'format' => '1,00.00 TiB',
				'unit' => 1 / pow(1024, 4),
			),
			'pib' => array(
				'format' => '1,00.00 PiB',
				'unit' => 1 / pow(1024, 5),
			),
			'eib' => array(
				'format' => '1,00.00 EiB',
				'unit' => 1 / pow(1024, 6),
			),
			'zib' => array(
				'format' => '1,00.00 ZiB',
				'unit' => 1 / pow(1024, 7),
			),
			'yib' => array(
				'format' => '1,00.00 YiB',
				'unit' => 1 / pow(1024, 8),
			),
			'common' => array (
				'kb' => array(
					'format' => '1,00.0 KB',
					'unit' => 1 / pow(1024, 1),
				),
				'mb' => array(
					'format' => '1,00.00 MB',
					'unit' => 1 / pow(1024, 2),
				),
				'gb' => array(
					'format' => '1,00.00 GB',
					'unit' => 1 / pow(1024, 3),
				),
				'tb' => array(
					'format' => '1,00.00 TB',
					'unit' => 1 / pow(1024, 4),
				),
				'pb' => array(
					'format' => '1,00.00 PB',
					'unit' => 1 / pow(1024, 5),
				),
				'eb' => array(
					'format' => '1,00.00 EB',
					'unit' => 1 / pow(1024, 6),
				),
				'zb' => array(
					'format' => '1,00.00 ZB',
					'unit' => 1 / pow(1024, 7),
				),
				'yb' => array(
					'format' => '1,00.00 YB',
					'unit' => 1 / pow(1024, 8),
				),
			),
            'bit' => array(
                'format' => '1,00 bit',
                'unit' => 8,
            ),
            'kbit' => array(
                'format' => '1,00.0 Kbit',
                'unit' => 8 * 1 / pow(1000, 1),
            ),
            'mbit' => array(
                'format' => '1,00.00 Mbit',
                'unit' => 8 * 1 / pow(1000, 2),
            ),
            'gbit' => array(
                'format' => '1,00.00 Gbit',
                'unit' => 8 * 1 / pow(1000, 3),
            ),
            'tbit' => array(
                'format' => '1,00.00 Tbit',
                'unit' => 8 * 1 / pow(1000, 4),
            ),
            'pbit' => array(
                'format' => '1,00.00 Pbit',
                'unit' => 8 * 1 / pow(1000, 5),
            ),
            'ebit' => array(
                'format' => '1,00.00 Ebit',
                'unit' => 8 * 1 / pow(1000, 6),
            ),
            'zbit' => array(
                'format' => '1,00.00 Zbit',
                'unit' => 8 * 1 / pow(1000, 7),
            ),
            'ybit' => array(
                'format' => '1,00.00 Ybit',
                'unit' => 8 * 1 / pow(1000, 8),
            ),
            'kibit' => array(
                'format' => '1,00.0 Kibit',
                'unit' => 8 * 1 / pow(1024, 1),
            ),
            'mibit' => array(
                'format' => '1,00.00 Mibit',
                'unit' => 8 * 1 / pow(1024, 2),
            ),
            'gibit' => array(
                'format' => '1,00.00 Gibit',
                'unit' => 8 * 1 / pow(1024, 3),
            ),
            'tibit' => array(
                'format' => '1,00.00 Tibit',
                'unit' => 8 * 1 / pow(1024, 4),
            ),
            'pibit' => array(
                'format' => '1,00.00 Pibit',
                'unit' => 8 * 1 / pow(1024, 5),
            ),
            'eibit' => array(
                'format' => '1,00.00 Eibit',
                'unit' => 8 * 1 / pow(1024, 6),
            ),
            'zibit' => array(
                'format' => '1,00.00 Zibit',
                'unit' => 8 * 1 / pow(1024, 7),
            ),
            'yibit' => array(
                'format' => '1,00.00 Yibit',
                'unit' => 8 * 1 / pow(1024, 8),
            ),
		),

        /*
        |--------------------------------------------------------------------------
        | Currency
        |--------------------------------------------------------------------------
        |
        | The available measurements to convert and format currencies.
        |
        */

        'currency' => array(

            'usd' => array(
                'format' => '$1,0.00',
            ),

            'eur' => array(
                'format' => '&euro;1,0.00',
            ),

            'gbp' => array(
                'format' => '&pound;1,0.00',
            ),

        ),

        /*
        |--------------------------------------------------------------------------
        | Length
        |--------------------------------------------------------------------------
        |
        | The available measurements to convert and format lengths.
        |
        */

        'length' => array(

            'km' => array(
                'format' => '1,0.000 km',
                'unit'   => 0.001,
            ),

            'mi' => array(
                'format' => '1,0.000 mi.',
                'unit'   => 0.000621371,
            ),

            'm' => array(
                'format' => '1,0.000 m',
                'unit'   => 1.00,
            ),

            'cm' => array(
                'format' => '1!0 cm',
                'unit'   => 100,
            ),

            'mm' => array(
                'format' => '1,0.00 mm',
                'unit'   => 1000,
            ),

            'ft' => array(
                'format' => '1,0.00 ft.',
                'unit'   => 3.28084,
            ),

            'yd' => array(
                'format' => '1,0.00 yd.',
                'unit'   => 1.0936132983377077865266841644794,
            ),

            'in' => array(
                'format' => '1,0.00 in.',
                'unit'   => 39.3701,
            ),

            'nmi' => array(
                'format' => '1,0.00 nmi',
                'unit'   => 0.0005399580345572354211663066954644
            ),

        ),

        /*
        |--------------------------------------------------------------------------
        | Weight
        |--------------------------------------------------------------------------
        |
        | The available measurements to convert and format weights.
        |
        */

        'weight' => array(

            'kg' => array(
                'format' => '1,0.00 kg',
                'unit'   => 1.00,
            ),

            'g' => array(
                'format' => '1,0.00 g',
                'unit'   => 1000.00,
            ),

            'mg' => array(
                'format' => '1,0.00 mg',
                'unit'   => 1000000.00,
			),

			't' => array(
				'format' => '1,00.00 t',
				'unit' => 0.001,
			),
			
			'ton' => array(
				'short' => array(
					'format' => '1,00.00 short ton',
					'unit' => 1 / 907.185,
				),

				'long' => array(
					'format' => '1,00.00 long ton',
					'unit' => 1 / 1016.05,
				),
			),
			
			'lb' => array(
				'format' => '1,0.00 lb',
				'unit'   => 2.20462,
			),
			
			'oz' => array(
				'format' => '1,00.00 oz',
				'unit' => 35.273961949580411,
			),

        ),

        /*
        |--------------------------------------------------------------------------
        | Time
        |--------------------------------------------------------------------------
        |
        | The available measurements to convert and format times.
        |
        */

		'time' => array(

			'ns' => array(
				'format' => '1,00 ns',
				'unit' => 0.000001,
			),
			
			'mis' => array(
				'format' => '1,00 μs',
				'unit' => 0.000001,
			),
			
			'ms' => array(
				'format' => '1,00 ms',
				'unit' => 0.001,
			),
			
			's' => array(
				'format' => '1,00 s',
				'unit' => 1,
			),
			
			'm' => array(
				'format' => '1,00 min',
				'unit' => 1 / 60,
			),
			
			'h' => array(
				'format' => '1,00 h',
				'unit' => 1 / 3600,
			),
			
			'd' => array(
				'format' => '1,00 d',
				'unit' => 1 / 86400,
			),
			
			'w' => array(
				'format' => '1,00 week',
				'unit' => 1 / 604800,
			),
			
			'mth' => array(
				'format' => '1,00 month', // 30 days
				'unit' => 1 / 2592000,
			),
			
			'q' => array(
				'format' => '1,00 quarter',
				'unit' => 1 / 7776000,
			),
			
			'y' => array(
				'format' => '1,00 y',
				'unit' => 1 / 31557600,
			),

		),

        /*
        |--------------------------------------------------------------------------
        | Volume
        |--------------------------------------------------------------------------
        |
        | The available measurements to convert and format volumes.
        |
        */

        'volume' => array(

            'kl' => array(
                'format' => '1,0.00 kl',
                'unit'   => 0.001,
            ),

            'l' => array(
                'format' => '1,0.00 l',
                'unit'   => 1.00,
            ),

            'ml' => array(
                'format' => '1,0.00 ml',
                'unit'   => 1000.00,
            ),
			
			'cm3' => array(
				'format' => '1,00.00 cm³',
				'unit' => 10,
			),
			
			'm3' => array(
				'format' => '1,00.00 m³',
				'unit' => 0.001,
			),

        ),

    ),

    /*
    |--------------------------------------------------------------------------
    | Currency Cache Expiration Duration
    |--------------------------------------------------------------------------
    |
    | The duration currency rates are cached in minutes.
    |
    */

    'expires' => 60,

    /*
    |--------------------------------------------------------------------------
    | Currency Service Exchangers
    |--------------------------------------------------------------------------
    |
    | Here, you may specify any number of service exchangers configurations
    | your application requires.
    |
    */

    'exchangers' => array(

        /*
        |--------------------------------------------------------------------------
        | Default Exchanger
        |--------------------------------------------------------------------------
        |
        | Define here the default exchanger.
        |
        */

        'default' => 'native',

        /*
        |--------------------------------------------------------------------------
        | OpenExchangeRates.org
        |--------------------------------------------------------------------------
        |
        | Define here the OpenExchangeRates.org app id.
        |
        */

        'openexchangerates' => array(

            'app_id' => null,

        ),

    ),

);
