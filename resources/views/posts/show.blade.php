<x-guest-layout>
    @include('posts._header')
    <a href="/"
                       class="w-full mt-4 text-center transition-colors duration-300 relative inline-flex items-center justify-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000/" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
    </a>
    <main class="max-w-4xl mx-auto mt-6  space-y-6">
          {{-- first article --}}
            <article
            class=" rounded-xl">
                <div class="py-6 px-5 flex flex-col lg:flex-row ">
                    <div class="flex-1 lg:mr-8">
                        <img src={{$post->thumbnail == NULL ? "https://img.freepik.com/free-vector/abstract-digital-technology-background-with-network-connection-lines_1017-25552.jpg" : asset('/storage/'.$post->thumbnail)}} alt="Blog Post illustration" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 ">
                            <div class="space-x-2">
                                <a href="{{$post->category->name}}"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">
                                    {{$post->category->name}}
                                </a>
                            </div>

                            <div class="mt-4">
                                <h1 class="text-3xl">
                                    <a href="posts/{{$post->slug}}">
                                        {{$post->title}}
                                    </a>
                                 </h1>

                                <span class="mt-2 mb-2 block text-gray-400 text-xs">
                                    Published <time>{{$post->created_at->diffForHumans()}}</time>
                                </span>
                                <div class="mb-2 flex items-center text-sm ">
                                    <img class="w-8 rounded" src="https://www.artnews.com/wp-content/uploads/2021/08/BAYC-8746.png?w=631" alt="Lary avatar">
                                    <div class="ml-3">
                                        <h5 class="font-bold">{{$post->author->name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </header>
                            <div class="text-sm mt-2">
                                {!! $post->excerpt !!}
                            </div>

                            <div class="text-sm mt-2">
                                {!! $post->body !!}
                            </div>
                    </div>
                </div>
                @auth
                    <section class="lg:grid lg:grid-cols-12 gap-4 mt-5 mx-2">
                        
                        <form method="POST" action="/posts/{{$post->slug}}/comments" class="col-span-6 col-start-7 border border-gray-200 rounded-xl p-4">
                            @csrf
                            <header class="flex items-center mb-4">
                                <img src="https://i.pravatar.cc/40?u={{auth()->user()->id}}" alt="" width="40px" height="40px" class="rounded-xl mr-4">
                                
                                <h2 class="font-bold">Leave a comment!</h2>
                            </header>
                            <div>
                                <textarea name="body" id="" rows="5" class="w-full border-none focus:outline-none focus:ring" placeholder="write something"></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="text-white bg-blue-500 px-10 py-1 rounded-2xl hover:bg-blue-400">Post</button>
                            </div>
                        </form>
                    </section>
                @endauth
                @foreach ($post->comments as $comment)
                    <x-comment :comment="$comment"></x-comment>
                @endforeach
            </article>
    </main>
</x-guest-layout>