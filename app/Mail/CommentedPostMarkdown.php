<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// class CommentedPostMarkdown extends Mailable implements ShouldQueue // if you want to use queue and jobs
class CommentedPostMarkdown extends Mailable
{
    use Queueable, SerializesModels;

    public  $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Comment for {$this->comment->commentable->postname} Post";

        $name = str_replace(' ', '_', $this->comment->user->name) . ".png";
        
        return $this
                    ->attachFromStorage($this->comment->user->image->path, $name)
                    ->markdown('emails.posts.comment-post');
    }
}
