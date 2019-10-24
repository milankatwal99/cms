<?php

use Illuminate\Database\Seeder;

use App\Post;
use App\Category;
use App\Tag;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category1 = Category::create(
        [
          'name'=>'News'
        ]
        );

        $post1 = Post::create(
            [
                'title'=>'What is Lorem Ipsum?',
                'description'=>'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text',
                'content'=> 'type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'category_id'=>$category1->id,
                'image'=>'image\apple-touch-icon.jpg'

            ]
        );

        $tag1=Tag::create(
            [
                'name'=>'Top'
            ]
        );

    }
}
