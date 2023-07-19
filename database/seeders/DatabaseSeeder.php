<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            RoleSeeder::class,
            OccupationSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
            Role_userSeeder::class,
            PartnerSeeder::class,
            HealthCardSeeder::class,
            InventorySeeder::class,
            SubscriptionTypeSeeder::class,
            SubscriptionSeeder::class,
            PaymentSeeder::class,
            ModuleSeeder::class,
            RoleModuleSeeder::class,
        ]);

    }
}
