<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Comment;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    public function testCreateComment()
    {
        $comment = new Comment();
        $comment->email = "dickysph@gmail.com";
        $comment->title = "Sample Title";
        $comment->comment = "Sample Comment";
        $comment->commentable_id = "1";
        $comment->commentable_type = "product";

        $comment->save();

        self::assertNotNull($comment->id);
    }

    public function testCreateDefaultAtributesValuesComment()
    {
        $comment = new Comment();
        $comment->email = "dickysph@gmail.com";
        $comment->commentable_id = "1";
        $comment->commentable_type = "product";

        $comment->save();

        self::assertNotNull($comment->id);
        self::assertNotNull($comment->comment);
        self::assertNotNull($comment->title);
    }
}
