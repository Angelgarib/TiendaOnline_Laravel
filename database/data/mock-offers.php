<?php

return [
    1 => [
        'id' => 1,
        'name' => 'Rebajas de enero',
        'slug' => 'rebajas-enero',
        'discount_percentage' => 15,
        'description' => 'Descuento por las rebajas de enero del 15%',
        'start_date' => '2026-01-07 00:00:00',
        'end_date' => '2026-01-31 23:59:59',
        'active' => false
    ],
    2 => [
        'id' => 2,
        'name' => 'Black Friday',
        'slug' => 'black-friday',
        'discount_percentage' => 40,
        'description' => 'Gran descuento del Black Friday.',
        'start_date' => '2025-11-24 00:00:00',
        'end_date' => '2025-11-30 23:59:59',
        'active' => false
    ],
    3 => [
        'id' => 3,
        'name' => 'Liquidación',
        'slug' => 'liquidacion',
        'discount_percentage' => 50,
        'description' => 'Oferta hasta agotar existencias.',
        'start_date' => '2026-01-01 00:00:00',
        'end_date' => '2026-12-31 00:00:00',
        'active' => true
    ],
    4 => [
        'id' => 4,
        'name' => 'Ofertas de verano',
        'slug' => 'ofertas-verano',
        'discount_percentage' => 35,
        'description' => 'Descuentos para época veraniega.',
        'start_date' => '2026-06-24 00:00:00',
        'end_date' => '2026-08-31 23:59:59',
        'active' => false
    ]
];
?>