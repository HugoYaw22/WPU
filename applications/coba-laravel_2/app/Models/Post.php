<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Sandhika Galih",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, doloremque mollitia. Ex officia vel sapiente error. Blanditiis, corrupti molestias? Esse ut vel perferendis necessitatibus non cumque veniam aliquid facere, accusantium, eveniet explicabo, sunt consectetur quas dolorem autem provident tenetur iusto. Placeat, laborum. Eos saepe, quo atque assumenda veritatis blanditiis illo obcaecati a perferendis minima quis ullam possimus qui voluptatem nihil, hic iure culpa exercitationem, nulla eum ex? Itaque iure incidunt nulla deleniti minima expedita ex ea architecto perferendis, repellendus a."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Doddy Ferdiansyah",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi temporibus ea suscipit molestiae reiciendis illum, beatae nihil aperiam non numquam magni alias optio voluptates culpa qui minus id saepe maiores? Itaque nulla deserunt reprehenderit repellendus omnis impedit atque repellat perferendis eveniet! Debitis quo, excepturi, iste ut dicta exercitationem provident quam cumque magni nam modi repellendus dignissimos explicabo deleniti! Explicabo inventore quis exercitationem ea, veniam sequi quos optio illo minus nulla alias laudantium et placeat possimus esse odio id aliquid mollitia earum molestiae sapiente assumenda ipsam iure dicta? Laborum eius aliquam laboriosam, ducimus debitis cupiditate porro, ex distinctio laudantium repudiandae architecto."
        ]
    ];

    public static function all()
    {
        return self::$blog_posts;
    }

    public static function find($slug)
    {
        $posts = self::$blog_posts;

        $post = [];
        foreach($posts as $p) {
            if($p["slug"] === $slug) {
                $post = $p;
            }
        }

        return $post;
    }
}
