<?php

namespace Database\Seeders;

use App\Models\Chollo;
use Illuminate\Database\Seeder;

class CholloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chollos = [
            [
                'titulo' => 'Auriculares Bluetooth Sony WH-1000XM5',
                'descripcion' => 'Los mejores auriculares con cancelación de ruido del mercado. Sonido premium, batería de 30 horas y diseño cómodo para uso prolongado. Incluye estuche de transporte.',
                'url' => 'https://www.amazon.es/dp/B09XS7JWHH',
                'categoria' => 'Tecnología',
                'puntuacion' => 9,
                'precio' => 399.99,
                'precio_descuento' => 249.99,
                'disponible' => true,
            ],
            [
                'titulo' => 'Sneakers Nike Air Max 90',
                'descripcion' => 'Las zapatillas iconicas de Nike con tecnología Air Max. Cómodas y con diseño clásico que nunca pasa de moda. Disponibles en varios colores.',
                'url' => 'https://www.nike.com/w/air-max-90',
                'categoria' => 'Moda',
                'puntuacion' => 8,
                'precio' => 149.99,
                'precio_descuento' => 89.99,
                'disponible' => true,
            ],
            [
                'titulo' => 'Robot aspirador Xiaomi Robot Vacuum X10+',
                'descripcion' => 'Aspirador robot con mapeo láser, función de fregado y estación de autovaciado. Compatible con Alexa y Google Home.',
                'url' => 'https://www.xiaomi.com/es',
                'categoria' => 'Hogar',
                'puntuacion' => 8,
                'precio' => 599.99,
                'precio_descuento' => 349.99,
                'disponible' => true,
            ],
            [
                'titulo' => 'Funda iPhone 15 Pro Max de cuero',
                'descripcion' => 'Funda de cuero premium para iPhone 15 Pro Max. Protección completa con acceso a todos los puertos. Disponible en negro, marrón y azul.',
                'url' => 'https://www.amazon.es',
                'categoria' => 'Accesorios',
                'puntuacion' => 7,
                'precio' => 39.99,
                'precio_descuento' => 14.99,
                'disponible' => true,
            ],
            [
                'titulo' => 'Cafetera Nespresso Vertuo Next',
                'descripcion' => 'Cafetera Nespresso con tecnología Centrifusion para preparar café, espresso y americanos. Incluye 6 cápsulas de bienvenida.',
                'url' => 'https://www.nespresso.com/es/es/order/machines/vertuo',
                'categoria' => 'Hogar',
                'puntuacion' => 8,
                'precio' => 159.99,
                'precio_descuento' => 79.99,
                'disponible' => true,
            ],
            [
                'titulo' => 'Tablet Samsung Galaxy Tab S9 FE',
                'descripcion' => 'Tablet Samsung de 10.9 pulgadas con S Pen incluido, resistencia al agua IP68 y batería de larga duración. Perfecta para trabajo y ocio.',
                'url' => 'https://www.samsung.com/es/tablets/galaxy-tab-s9/',
                'categoria' => 'Tecnología',
                'puntuacion' => 9,
                'precio' => 449.99,
                'precio_descuento' => 299.99,
                'disponible' => true,
            ],
        ];

        foreach ($chollos as $chollo) {
            Chollo::create($chollo);
        }
    }
}