<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $users = User::pluck('id')->toArray(); // جلب جميع المستخدمين

        if (empty($users)) {
            $this->command->info('No users found! Please add users before running the seeder.');
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            Notification::create([
                'user_id' => 2,
                'title' => $faker->sentence(4), // عنوان عشوائي
                'message' => $faker->paragraph(), // رسالة عشوائية
                'is_read' => $faker->boolean(30), // 30% من الإشعارات ستكون مقروءة
            ]);
        }

        $this->command->info('✅ 20 إشعار تم إضافتهم بنجاح!');

    }
}
