<div style="text-align: Center">
    <h1> Comment on this Post: </h1>
    <form wire:submit.prevent="storeComment">
        <input type="text" name="description" value="{{ old('description')}}" 
            style="height:100px;font-size:12pt;width:500px;"></p><br>
        <button class="h-10 px-6 mb-4 font-semibold rounded-md bg-black text-white"
            type="submit" value="Submit">Add Comment
        </button>
    </form>
</div>
