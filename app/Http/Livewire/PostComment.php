<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Notifications\CommentPostNotification;
use App\Models\Comment;
use App\Models\Post;

class PostComment extends Component
{   
    public $post;
    public $description;
    protected $listeners = ['commentPaginate' => '$refresh'];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function saveComment()
    {   
        $validatedData = $this->validate([
            'description' => 'required|max:500',
        ]);

        $comment = new Comment;
        $comment->description = $this->description;
        $comment->user_id = auth()->user()->id; 
        $comment->post_id = $this->post->id;
        $comment->save();

        $comment->post->user->notify(new CommentPostNotification($comment->user, $comment->post));
        
        $this->description = "";
        $this->emit('commentPaginate');
    }

    public function render()
    {
        
        $commentPaginate = $this->post->comments->paginate(10);
        return view('livewire.post-comment',['commentPaginate' => $commentPaginate]);
    }
}
