<?php

$vehicles = [
    0 => [
        'name' => 'Toyota SUV',
        'type' => 'Truck',
        'price' => 5000,
        'image' => 'toyotauv.jpg',
        'in_stock' => true,
    ],
    1 => [
        'name' => 'NissanLeaf',
        'type' => 'Car',
        'price' => 2000,
        'image' => 'nissanleaf.jpg',
        'in_stock' => true,
    ],
    2 => [
        'name' => 'HondaCivic',
        'type' => 'Car',
        'price' => 3000,
        'image' => 'hondacivic.jpg',
        'in_stock' => true,
    ],
    3 => [
        'name' => 'FordMustang',
        'type' => 'Car',
        'price' => 4000,
        'image' => 'fordmustang.jpg',
        'in_stock' => true,
    ],
];

$vehiclesOutput = array_filter($vehicles, fn($vehicle) => $vehicle['in_stock']);

echo json_encode($vehiclesOutput);