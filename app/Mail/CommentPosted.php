<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentPosted extends Mailable
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

		// dd($name);

		return $this
					// ->attach(storage_path('app/public') . '/' . $this->comment->user->image->path,
					// [
					// 	'as' => $name,
					// 	'mime' => 'image/png'
					// ])
					// ->attachFromStorage($this->comment->user->image->path, $name)
					->attachFromStorageDisk('public', $this->comment->user->image->path, $name)
					->subject($subject)
					->view('emails.posts.comment');
	}
}
