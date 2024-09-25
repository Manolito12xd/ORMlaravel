<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App;
use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Level;
use App\Models\User;
use App\Models\Profile;
use App\Models\Location;
use App\Models\Image;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Video;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Group::factory()->count(3)->create();

        Level::factory()->create(['name'=>'Oro']);
        Level::factory()->create(['name'=>'Plata']);
        Level::factory()->create(['name'=>'Bronce']);

        User::factory()->count(5)->create()->each(function($user){

            $profile = $user->profile()->save(Profile::factory()->make());

            $profile->location()->save(Location::Factory()->make());

            $user->groups()->attach($this->array(rand(1,3)));

            $user->image()->save(Image::factory()->make(['url' => 'https://picsum.photos/200/300']));

        });


            Category::factory()->count(4)->create();

            Tag::factory()->count(12)->create();

            Post::factory()->count(40)->create()->each(function ($post){

                $post->image()->save(Image::factory()->make());
                $post->tags()->attach($this->array(rand(1,12)));

                $number_comments = rand(1,6);

                for ($i=0; $i < $number_comments ; $i++) { 
                   $post->comments()->save(Comment::factory()->make());
                }

            });
            Video::factory()->count(40)->create()->each(function ($video){

                $video->image()->save(Image::factory()->make(['url' => 'https://picsum.photos/200/300']));
                $video->tags()->attach($this->array(rand(1,12)));

                $number_comments = rand(1,6);

                for ($i=0; $i < $number_comments ; $i++) { 
                   $video->comments()->save(Comment::factory()->make());
                }

            });

    }

    public function array($max){
        $values = [];
        
        for ($i=1; $i < $max ; $i++) { 
            $values[] = $i;
        }

        return $values;
    }

}
