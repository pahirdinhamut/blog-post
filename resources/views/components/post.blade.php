@props(['post'=>$post])

<div class="mb-4">
    <a href="{{ route('users.posts',$post->user) }}" class="font-bold">{{ $post->user->name }}</a>
    <span class="text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2"> {{ $post->body }} </p>
    <div class="flex items-center">
        @auth
        @if(!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.likes',$post) }}" method="post" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-300">Like</button>
        </form>
        @else
        <form action="{{ route('posts.likes',$post)  }}"  method="post" class="mr-1">  
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-300">Unlike</button>
        </form>
        @endif
        @can('delete',$post)
        <form action="{{ route('posts.destroy',$post) }}"  method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="m-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" type='submit' stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </button>
        </form>
        @endcan 
        @endauth
        <span>  {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count() ) }} </span>
    </div>

</div>
    <hr>
    <br>


