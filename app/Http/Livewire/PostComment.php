<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComment extends Component
{
    public function storeComment(Request $request,Post $post)
    {   
        $validatedData = $request->validate([
            'description' => 'required|max:500',
        ]);
        
        $comment = new Comment;
        $comment->description = $request->description;
        $comment->user_id = auth()->user()->id; 
        $comment->post_id = $request->input('post_id');
        $comment->save();
 
    }

    public function render()
    {
        return view('livewire.post-comment');
    }
}
