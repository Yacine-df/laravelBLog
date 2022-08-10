<x-guest-layout>
    @include('posts._header')
        @if ($posts->count())
            <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
                    <x-post-card-featured :post="$posts[0]"></x-post-card-featured>
            
                <div class="max-w-6xl mx-auto grid lg:grid-cols-6 grid-cols-4">
                    @foreach ($posts->skip(1) as $post)
                        <x-post-card :post="$post"
                                class="{{$loop->iteration < 3 ? 'col-span-2 lg:col-span-3 ' : 'col-span-2'}}">
                        </x-post-card>
                    @endforeach
                    
                </div>

                {{$posts->links()}}
                
            </main>
        @else
        <p class="text-center my-4 font-bold">No posts yet. Please check back later.</p>
        @endif
       </div>
          
</x-guest-layout>