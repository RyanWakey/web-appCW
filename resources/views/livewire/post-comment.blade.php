<div style="text-align: Center">
    Add Comment
    <form method="POST" wire:submit="saveComment">
        @csrf
        <input type="text" wire:model="description" id="description" value="{{ old('description')}}" 
            style="height:100px;font-size:12pt;width:500px;"></p><br>
        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}"/>   
        <button class="h-10 px-6 mb-4 font-semibold rounded-md bg-black text-white"
            type="submit" value="Submit">Add Comment
        </button>
    </form>
</div>
