<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Components\JsonPlaceholderClient;
use App\Models\Post;
use App\Models\Comment;

class ImportBlogData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:blog-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импортирует посты и комментарии из jsonplaceholder';

    public function __construct(protected JsonPlaceholderClient $client)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = $this->client->getPosts();
        $comments = $this->client->getComments();

        foreach ($posts as $post) {
            Post::firstOrCreate([
                'title' => $post->title,
            ],
            [
                'id' => $post->id,
                'user_id' => $post->userId,
                'title' => $post->title,
                'content' => $post->body,
            ]);
        }
    
        foreach ($comments as $comment) {
            Comment::firstOrCreate([
                'name' => $comment->name,
            ],
            [
                'id' => $comment->id,
                'post_id' => $comment->postId,
                'name' => $comment->name,
                'email' => $comment->email,
                'content' => $comment->body,
            ]);
        }
    
        $this->info("\nЗагружено " . count($posts) . " записей и " . count($comments) . " комментариев.");
    }
}
