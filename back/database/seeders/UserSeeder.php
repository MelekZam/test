<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->state(new Sequence(
            ['role' => Role::BRAND->value],
        ))->has(Brand::factory())->create();

        User::factory(20)->state(new Sequence(
            ['role' => Role::SUPPLIER->value],
        ))->has(Supplier::factory())->create();
    }
}
