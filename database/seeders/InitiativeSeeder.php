<?php

namespace Database\Seeders;

use App\Models\Initiative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitiativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Initiative::insert([
            [
                'user_id' => 1,
                'title' => 'مبادرة بيئية',
                'organizer' => 'مؤسسة أنيرا',
                'description' => 'مبادرة تهدف إلى تنظيف الحدائق العامة',
                'image' => 'https://example.com/image1.jpg',
                'participants' => 150,
                'status' => 'ongoing',
                'end_date' => '2025-04-22',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'مستقبل أفضل',
                'organizer' => 'مؤسسة أنيرا',
                'description' => 'مبادرة لدعم الطلاب الجامعيين',
                'image' => 'https://example.com/image2.jpg',
                'participants' => 200,
                'status' => 'completed',
                'end_date' => '2025-03-15',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
