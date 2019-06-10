<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = \App\Category::create([
           'name' => 'News'
        ]);

        $category2 = \App\Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = \App\Category::create([
            'name' => 'Partnership'
        ]);
        $post1 = \App\Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);

        $post2 = \App\Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 150.',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);

        $post3 = \App\Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);

        $post4 = \App\Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category2->id,
            'image' => 'posts/4.jpg'
        ]);

        $tag1 = \App\Tag::create([
            'name' => 'Job'
        ]);

        $tag2 = \App\Tag::create([
            'name' => 'Customers'
        ]);

        $tag3 = \App\Tag::create([
            'name' => 'Record'
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);

        $post2->tags()->attach([$tag2->id,$tag3->id]);

        $post3->tags()->attach([$tag1->id,$tag3->id]);
    }
}
