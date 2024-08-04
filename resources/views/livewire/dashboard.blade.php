<?php

use App\Models\Blog;
use App\Models\Data;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
use function Livewire\Volt\{state, mount, with, usesPagination};

usesPagination();

with(fn() => ['blogs' => Blog::get()]);


?>

<div class="grid grid-cols-1 gap-6">
    <div class="lg:grid-cols-2 grid max-lg:grid-cols-1 gap-6">
        @foreach($blogs as $blog)
        <div class="bg-white rounded-2xl shadow-md p-6 grid grid-cols-1 gap-8">
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