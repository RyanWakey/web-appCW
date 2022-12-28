<div style="text-align: Center">
    Add Comment
    <form method="POST" wire:submit.prevent="saveComment"   placeholder="Add Comment">
        @csrf
        <input type="text" wire:model="description" id="description" value="{{ old('description')}}" 
            style="height:100px;font-size:12pt;width:500px;"></p><br>
        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}"/>   
        <button class="shadow-md shadow-green-500 h-10 px-6 mb-4 font-semibold rounded-md bg-black text-white"
            type="submit">Add Comment
        </button>
    </form>
    
    <div style="text-align: Left; font-size:14pt">
        <ul>
            @foreach($commentPaginate as $comment)
                <div class="container mx-auto px-6 py-12 md:px-8 bg-orange-600 text-green-500">
                    User: 
                    <span class="text-purple-900 font-extrabold italic">
                        <a href="{{route('users.show',['user' => $post->user, 'post' => $post])}}" class="no-underline hover:underline"> 
                        @if($comment->user->profile == null)  
                            {{$comment->user->name}}<br></a>
                        @else
                            {{$comment->user->profile->display_name}}<br></a>
                        @endif        
                    </span>
                    Comment:
                    <span class="text-purple-900 font-extrabold">
                        <a href="{{route('comments.show', ['post' => $post, 'comment' => $comment])}}" class="no-underline hover:underline"> 
                            {{$comment->description}}<br><br></a>
                    </span>
            
                    @if(!Auth::user())
                    @else 
                        <form method="POST" action="{{route('likes.likeComment',['comment' => $comment, 'post' => $post])}}">
                            @csrf                
                            <button class="h-10 px-6 mb-2 font-black rounded-md border border-black text-slate-900 bg-green-600" 
                            type="submit"> Like Comment
                         </button>
                        </form>
                    @endif
                </div> 
                <br>
            @endforeach
        </ul>
    </div>
</div>


