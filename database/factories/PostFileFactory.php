<?php

namespace Database\Factories;

use App\Models\PostFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostFile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $posts = [
            [
                'file' => 'https://linkdhub.github.io/batu-images/images/image%20(16).jpg',
                'file_type' => 'image',
                'post_id' => 1,
            ],
            [
                'file' => 'https://linkdhub.github.io/batu-images/images/image%20(14).jpg',
                'file_type' => 'image',
                'post_id' => 2,
            ],
            [
                'file' => 'https://linkdhub.github.io/batu-images/images/image%20(1).jpg',
                'file_type' => 'image',
                'type' => 'news',
                'post_id' => 3,
            ],
            [
                'file' => 'https://linkdhub.github.io/batu-images/images/image%20(15).jpg',
                'file_type' => 'image',
                'post_id' => 4,
            ]
        ];
        static $index = 0;
        $post = $posts[$index];
        $index = ($index + 1) % count($posts);
        return [
            'file' =>$post['file'],
            'file_type' => $post['file_type'],
            'post_id' => $post['post_id'],
        ];
    }
}
