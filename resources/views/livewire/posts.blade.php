<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use function Livewire\Volt\{state, rules, updated, with, usesPagination};

usesPagination();

state(['title', 'description', 'showModal', 'blogId']);

rules(['title' => 'required|max:50|min:5', 'description' => 'required|min:25|max:150']);

with(fn() => ['blogs' => Blog::where('created_by', Auth::user()->id)->get()]);

updated(['showModal' => function () {
    if (!$this->showModal) {
        $this->reset(['title', 'description', 'blogId']);
    }
}]);

$submit = function () {
    $this->validate();

    Blog::updateOrCreate(
        ['id' => $this->blogId],
        [
            'title' => $this->title,
            'description' => $this->description,
            'created_by' => Auth::user()->id,
        ]
    );
    $this->reset(['title', 'description', 'blogId']);
    $this->showModal = false;
};

$openUpdateBlog = function ($id) {
    $blog = Blog::find($id);

    $this->title = $blog->title;
    $this->description = $blog->description;
    $this->blogId = $id;
    $this->showModal = true;
};

$deleteBlog = function ($id) {
    Blog::where('id', $id)->delete();
}

?>

<div>
    <div wire:click="$toggle('showModal')" class="fixed cursor-pointer select-none bottom-12 right-12 bg-white p-4 font-semibold text-gray-500 rounded-2xl shadow-md inline-flex gap-2 items-center">
        <div>
            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5" />
            </svg>
        </div>
        <div>
            Add Post
        </div>
    </div>

    @if($showModal)
    <div class="fixed z-20 top-0 left-0 h-dvh w-full flex justify-center items-center bg-black/30">
        <div class="bg-white w-4/5 md:w-1/2 p-8 rounded-2xl shadow-md grid grid-cols-1 gap-6">
            <div class="flex justify-between">
                <div class="text-xl text-gray-500">Add Post</div>
                <div wire:click="$toggle('showModal')" class="p-2 rounded-full hover:bg-gray-300">
                    <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-2">
                <div class="grid grid-cols-1 gap-2">
                    <div class="text-lg text-gray-500">Title</div>
                    <div>
                        <input wire:model="title" class="rounded-lg border border-gray-500 bg-gray-100 w-full p-4 outline-none font-semibold text-gray-500">
                    </div>
                    <div class="text-red-500">@error('title'){{$message}}@enderror</div>
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <div class="text-lg text-gray-500">Description</div>
                    <div>
                        <textarea wire:model="description" class="rounded-lg min-h-32 border border-gray-500 bg-gray-100 w-full p-4 outline-none font-semibold text-gray-500"></textarea>
                    </div>
                    <div class="text-red-500">@error('description'){{$message}}@enderror</div>
                </div>
            </div>
            <div wire:click="submit" class="flex justify-center">
                <button class="font-semibold flex items-center bg-blue-500 rounded-lg px-4 py-3 text-white text-lg">
                    <div wire:loading.remove wire:target="submit">Submit</div>
                    <div wire:loading wire:target="submit">
                        <svg aria-hidden="true" class="w-6 h-6 text-transparent animate-spin fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 gap-6">
        <div class="lg:grid-cols-2 grid max-lg:grid-cols-1 gap-6">
            @foreach($blogs as $blog)
            <div class="bg-white rounded-2xl shadow-md p-6 grid grid-cols-1 gap-8">
                <div class=" flex justify-end">
                    <div class="inline-flex gap-2">
                        <div wire:click="openUpdateBlog({{$blog->id}})" class="p-2 rounded-full hover:bg-gray-300">
                            <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div wire:click="deleteBlog({{$blog->id}})" class="p-2 rounded-full hover:bg-gray-300">
                            <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="text-gray-500 font-semibold text-xl">{{$blog->title}}</div>
                @php
                $created_at = Carbon::parse($blog->created_at)->format('jS F Y');
                $updated_at = Carbon::parse($blog->updated_at)->format('jS F Y');
                @endphp
                <div>
                    <div class="text-gray-500 font-semibold text-sm">Posted: {{$created_at}}</div>
                    <div class="text-gray-500 font-semibold text-sm">Last Updated: {{$updated_at}}</div>
                </div>
                <div class="text-gray-500 font-semibold text-sm">{{$blog->description}}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>