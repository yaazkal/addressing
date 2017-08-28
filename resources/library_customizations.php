<?php

/**
 * A number of issues were found in Google's dataset and reported at.
 * https://github.com/googlei18n/libaddressinput/issues
 * Since Google has been slow to resolve them, the library maintains its own
 * list of customizations, in PHP format for easier contribution.
 *
 * @todo
 * PE subdivisions (https://github.com/googlei18n/libaddressinput/issues/50)
 * MZ https://github.com/googlei18n/libaddressinput/issues/58
 * Other points raised in https://github.com/googlei18n/libaddressinput/issues/49
 */

/**
 * Returns the address format customizations for the provided country code.
 */
function get_address_format_customizations($countryCode) {
    $formatCustomizations = [];
    // Switch %organization and %recipient.
    // https://github.com/googlei18n/libaddressinput/issues/83
    $formatCustomizations['DE'] = [
        'format' => '%organization\n%givenName %familyName\n%addressLine1\n%addressLine2\n%postalCode %locality',
    ];
    // Remove the administrative area.
    // https://github.com/googlei18n/libaddressinput/issues/115
    $formatCustomizations['GU'] = [
        'format' => '%givenName %familyName\n%organization\n%addressLine1\n%addressLine2\n%locality %postalCode',
         'required_fields' => [
             'addressLine1',
             'locality',
             'postalCode',
         ],
    ];
    // Make the postal codes required, add administrative area fields (EE, LT).
    // https://github.com/googlei18n/libaddressinput/issues/64
    $formatCustomizations['EE'] = [
        'format' => '%givenName %familyName\n%organization\n%addressLine1\n%addressLine2\n%postalCode %locality %administrativeArea',
        'required_fields' => [
            'addressLine1',
            'locality',
            'postalCode',
        ],
        'administrative_area_type' => 'county',
    ];
    $formatCustomizations['LT'] = [
        'format' => '%organization\n%givenName %familyName\n%addressLine1\n%addressLine2\n%postalCode %locality %administrativeArea',
        'required_fields' => [
            'addressLine1',
            'locality',
            'postalCode',
        ],
        'administrative_area_type' => 'county',
    ];
    $formatCustomizations['LV'] = [
        'required_fields' => [
            'addressLine1',
            'locality',
            'postalCode',
        ],
    ];
    // Make the postal code required for CZ and SK.
    // https://github.com/googlei18n/libaddressinput/issues/88
    $formatCustomizations['CZ'] = [
        'required_fields' => [
            'addressLine1',
            'locality',
            'postalCode',
        ],
    ];
    $formatCustomizations['SK'] = [
        'required_fields' => [
            'addressLine1',
            'locality',
            'postalCode',
        ],
    ];

    return isset($formatCustomizations[$countryCode]) ? $formatCustomizations[$countryCode] : [];
}

/**
 * Returns the subdivision customizations for the provided group.
 */
function get_subdivision_customizations($group) {

    // Adds Colombian subdivisions
    // https://github.com/googlei18n/libaddressinput/issues/135
    $subdivisionCustomizations['CO'] = [
        '_replace' => ['VID' => 'VID'],
        '_add' => [
            'VAU' => 'VID',
            'VAC' => 'VAU',
            'TOL' => 'VAC',
            'SUC' => 'TOL',
            'SAN' => 'SUC',
            'SAP' => 'SAN',
            'RIS' => 'SAP',
            'QUI' => 'RIS',
            'PUT' => 'QUI',
            'NSA' => 'PUT',
            'NAR' => 'NSA',
            'MET' => 'NAR',
            'MAG' => 'MET',
            'LAG' => 'MAG',
            'HUI' => 'LAG',
            'GUV' => 'HUI',
            'GUA' => 'GUV',
            'CHO' => 'GUA',
            'CUN' => 'CHO',
            'COR' => 'CUN',
            'CES' => 'COR',
            'CAU' => 'CES',
            'CAS' => 'CAU',
            'CAQ' => 'CAS',
            'CAL' => 'CAQ',
            'BOY' => 'CAL',
            'BOL' => 'BOY',
            'ATL' => 'BOL',
            'ARA' => 'ATL',
            'ANT' => 'ARA',
            'AMA' => 'ANT',
            'DC' => 'AMA'
        ],
        'DC' => [
            'name' => 'Distrito Capital de Bogotá',
            'iso_code' => 'CO-DC',
            'postal_code_pattern' => '11\d{4}',
        ],
        'AMA' => [
            'name' => 'Amazonas',
            'iso_code' => 'CO-AMA',
            'postal_code_pattern' => '91\d{4}',
        ],
        'ANT' => [
            'name' => 'Antioquia',
            'iso_code' => 'CO-ANT',
            'postal_code_pattern' => '05\d{4}',
        ],
        'ARA' => [
            'name' => 'Arauca',
            'iso_code' => 'CO-ARA',
            'postal_code_pattern' => '81\d{4}',
        ],
        'ATL' => [
            'name' => 'Atlántico',
            'iso_code' => 'CO-ATL',
            'postal_code_pattern' => '08\d{4}',
        ],
        'BOL' => [
            'name' => 'Bolívar',
            'iso_code' => 'CO-BOL',
            'postal_code_pattern' => '13\d{4}',
        ],
        'BOY' => [
            'name' => 'Boyacá',
            'iso_code' => 'CO-BOY',
            'postal_code_pattern' => '15\d{4}',
        ],
        'CAL' => [
            'name' => 'Caldas',
            'iso_code' => 'CO-CAL',
            'postal_code_pattern' => '17\d{4}',
        ],
        'CAQ' => [
            'name' => 'Caquetá',
            'iso_code' => 'CO-CAQ',
            'postal_code_pattern' => '18\d{4}',
        ],
        'CAS' => [
            'name' => 'Casanare',
            'iso_code' => 'CO-CAS',
            'postal_code_pattern' => '85\d{4}',
        ],
        'CAU' => [
            'name' => 'Cauca',
            'iso_code' => 'CO-CAU',
            'postal_code_pattern' => '19\d{4}',
        ],
        'CES' => [
            'name' => 'Cesar',
            'iso_code' => 'CO-CES',
            'postal_code_pattern' => '20\d{4}',
        ],
        'COR' => [
            'name' => 'Córdoba',
            'iso_code' => 'CO-COR',
            'postal_code_pattern' => '23\d{4}',
        ],
        'CUN' => [
            'name' => 'Cundinamarca',
            'iso_code' => 'CO-CUN',
            'postal_code_pattern' => '25\d{4}',
        ],
        'CHO' => [
            'name' => 'Chocó',
            'iso_code' => 'CO-CHO',
            'postal_code_pattern' => '27\d{4}',
        ],
        'GUA' => [
            'name' => 'Guanía',
            'iso_code' => 'CO-GUA',
            'postal_code_pattern' => '94\d{4}',
        ],
        'GUV' => [
            'name' => 'Guaviare',
            'iso_code' => 'CO-GUV',
            'postal_code_pattern' => '95\d{4}',
        ],
        'HUI' => [
            'name' => 'Huila',
            'iso_code' => 'CO-HUI',
            'postal_code_pattern' => '41\d{4}',
        ],
        'LAG' => [
            'name' => 'La Guajira',
            'iso_code' => 'CO-LAG',
            'postal_code_pattern' => '44\d{4}',
        ],
        'MAG' => [
            'name' => 'Magdalena',
            'iso_code' => 'CO-MAG',
            'postal_code_pattern' => '47\d{4}',
        ],
        'MET' => [
            'name' => 'Meta',
            'iso_code' => 'CO-MET',
            'postal_code_pattern' => '50\d{4}',
        ],
        'NAR' => [
            'name' => 'Nariño',
            'iso_code' => 'CO-NAR',
            'postal_code_pattern' => '52\d{4}',
        ],
        'NSA' => [
            'name' => 'Norte de Santander',
            'iso_code' => 'CO-NSA',
            'postal_code_pattern' => '54\d{4}',
        ],
        'PUT' => [
            'name' => 'Putumayo',
            'iso_code' => 'CO-PUT',
            'postal_code_pattern' => '86\d{4}',
        ],
        'QUI' => [
            'name' => 'Quindío',
            'iso_code' => 'CO-QUI',
            'postal_code_pattern' => '63\d{4}',
        ],
        'RIS' => [
            'name' => 'Risaralda',
            'iso_code' => 'CO-RIS',
            'postal_code_pattern' => '66\d{4}',
        ],
        'SAP' => [
            'name' => 'San Andrés, Providencia y Santa Catalina',
            'iso_code' => 'CO-SAP',
            'postal_code_pattern' => '88\d{4}',
        ],
        'SAN' => [
            'name' => 'Santander',
            'iso_code' => 'CO-SAN',
            'postal_code_pattern' => '68\d{4}',
        ],
        'SUC' => [
            'name' => 'Sucre',
            'iso_code' => 'CO-SUC',
            'postal_code_pattern' => '70\d{4}',
        ],
        'TOL' => [
            'name' => 'Tolima',
            'iso_code' => 'CO-TOL',
            'postal_code_pattern' => '73\d{4}',
        ],
        'VAC' => [
            'name' => 'Valle del Cauca',
            'iso_code' => 'CO-VAC',
            'postal_code_pattern' => '76\d{4}',
        ],
        'VAU' => [
            'name' => 'Vaupés',
            'iso_code' => 'CO-VAU',
            'postal_code_pattern' => '97\d{4}',
        ],
        'VID' => [
            'name' => 'Vichada',
            'iso_code' => 'CO-VID',
            'postal_code_pattern' => '99\d{4}',
        ]
    ];

    // 'Islas Baleares' -> 'Balears'.
    // https://github.com/googlei18n/libaddressinput/issues/48
    $subdivisionCustomizations['ES'] = [
        '_remove' => ['Islas Baleares'],
        '_add' => [
            // Add 'Balears' before 'Barcelona'.
            'Balears' => 'Barcelona',
        ],
        'Balears' => [
            'name' => 'Balears',
            'iso_code' => 'ES-PM',
            'postal_code_pattern' => '07',
        ],
    ];
    // 'Estado de México' => 'México'.
    // https://github.com/googlei18n/libaddressinput/issues/49
    $subdivisionCustomizations['MX'] = [
        '_remove' => ['MEX'],
        '_add' => [
            'MEX' => 'MIC',
        ],
        'MEX' => [
            'name' => 'México',
            'iso_code' => 'MX-MEX',
            'postal_code_pattern' => '5[0-7]',
        ],
    ];

    return isset($subdivisionCustomizations[$group]) ? $subdivisionCustomizations[$group] : [];
}
