@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rouded-lg">
        <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('body') border-red-500 @enderror" placeholder="Post Somehting .." ></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm" >
                        {{  $message }}
                    </div>
                @enderror
            </div>
            <div >
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
            </div>
        </form>

        @if($posts->count())
            @foreach ($posts as $post)
                <div class="mb-4">
                    <a href="" class="font-bold">{{ $post->user->name }}</a>
                    <span class="text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
                    <p class="mb-2"> {{ $post->body }} </p>
                    <div class="flex items-center">
                        <form action="" class="mr-1">
                            @csrf
                            <button type="submit" class="text-blue-300">Like</button>
                        </form>
                        <form action="" class="mr-1">
                            @csrf
                            <button type="submit" class="text-blue-300">Unlike</button>
                        </form>
                    </div>
                


                </div>
            @endforeach

            {{ $posts->links()}}
        @else 
            <p>there are not posts</p>
       @endif 


    </div>
</div>
    
@endsection