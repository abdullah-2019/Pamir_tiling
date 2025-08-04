<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Wall and Floor Tiling',
                'slug' => 'wall-and-floor-tiling',
                'desc' => 'All kinds ceramic tiling service from ceramic, porcelain, and mosaic tiles',
                'features' => json_encode(
                    [
                        'Installation of ceramic, porcelain, and mosaic tiles', 
                        'Kitchen splashbacks and bathroom walls',
                        'Flooring for living rooms, hallways, and commercial spaces',
                        'Feature walls and decorative tiling',
                        'Surface preparation and waterproofing'
                    ]),
                'image' => 'wholesale.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Waterproofing',
                'slug' => 'waterproofing',
                'desc' => 'Fully licensed commercial waterproofing sub contractor to satisfy your commercial project waterproofing requirements with a wide range of waterproofing products.',
                'features' => json_encode(['Push Notifications', 'Offline Mode', 'In-App Purchases', 'Analytics']),
                'image' => 'wholesale.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Stone Paving',
                'slug' => 'stone-paving',
                'desc' => 'We provide all kinds of stone cladding services from natural stone tiles, terrazzo, to dry stone cladding.',
                'features' => json_encode(['Wireframing', 'Prototyping', 'User Testing', 'Visual Design']),
                'image' => 'wholesale.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Planning',
                'slug' => 'planning',
                'desc' => 'We project manage your job efficiently and effectively for a fast turnaround.',
                'features' => json_encode(['SEO', 'Social Media', 'Content Marketing', 'Analytics']),
                'image' => 'wholesale.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Seal and Polish',
                'slug' => 'seal-and-polish',
                'desc' => 'Professional natural stone sealing and polishing service',
                'features' => json_encode(['AWS', 'Azure', 'Google Cloud', 'DevOps']),
                'image' => 'wholesale.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Swimming Pools',
                'slug' => 'swimming-pools',
                'desc' => 'Not only have we installed countless water features, but we also have experience in installing pool tiles of all shapes and sizes.',
                'features' => json_encode(['Threat Detection', 'Vulnerability Assessment', 'Security Training', 'Compliance']),
                'image' => 'wholesale.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        // Insert the services into the database
        DB::table('services')->insert($services);

    }
}
