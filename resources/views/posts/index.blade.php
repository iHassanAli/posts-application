@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6 bg-white rounded-lg">
        @auth
            <form action="{{route('posts')}}" method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full
                    p-4 rounded-lg @error('body') border-red-50 @enderror" 
                    placeholder="Post Something!"></textarea>
                    
                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>  
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2
                    rounded font-medium">Post</button>
                </div>
            </form>
        @endauth    
        @if ($posts->count())
            @foreach ($posts as $postx)
                <x-post :posty="$postx" />
            @endforeach
            {{ $posts->links() }}
        @else
            <p>There are no posts.</p>
        @endif
        </div>

    </div>
@endsection