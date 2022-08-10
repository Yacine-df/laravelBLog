<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::factory()->create([
            'name'=>'Yacine Diaf'
        ]);
        post::factory(10)->create([
            'user_id'=>$user->id
        ]);
        Comment::factory(5)->create([
            'post_id'=>'1'
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
