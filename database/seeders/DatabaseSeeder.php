<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Order::factory(6)->create([
            'created_at' => Carbon::today()
        ]);

        Order::factory(6)->create([
            'created_at' => Carbon::yesterday()
        ]);

        //This week
        Order::factory(6)->create([
            'created_at' => Carbon::now()->startOfWeek(),
        ])->each(function($post){
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440*6));
            $post->save();
        });

        //Last week
        Order::factory(6)->create([
            'created_at' => Carbon::now()->subWeek()->startOfWeek(),
        ])->each(function($post){
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440*6));
            $post->save();
        });

        //This Month
        Order::factory(6)->create([
            'created_at' => Carbon::now()->startOfMonth(),
        ])->each(function($post){
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440*30));
            $post->save();
        });

        //Last Month
        Order::factory(6)->create([
            'created_at' => Carbon::now()->subMonth()->startOfMonth(),
        ])->each(function($post){
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440*30));
            $post->save();
        });

        //This Year
        Order::factory(6)->create([
            'created_at' => Carbon::now()->startOfYear(),
        ])->each(function($post){
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440*365));
            $post->save();
        });

        //Last Year
        Order::factory(6)->create([
            'created_at' => Carbon::now()->subYear()->startOfYear(),
        ])->each(function($post){
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440*365));
            $post->save();
        });

        Product::factory(14)->create();
    }
}
