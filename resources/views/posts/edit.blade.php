<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Post : '. $post->title) }}
        </h2> 
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl sm:mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/dashboard/post/{{$post->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <!-- Title -->
                        <div>
                            <x-label for="title" :value="__('title')" />
            
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $post->title)" required autofocus />
                            @error('title')
                                <p class="text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <!-- slug -->
                        <div class="mt-4">
                            <x-label for="slug" :value="__('slug')" />
            
                            <x-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug', $post->slug)" required autofocus />
                            @error('slug')
                                <p class="text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <!-- thumbnail -->
                        <div class="mt-4">
                            <x-label for="thumbnail" :value="__('thumbnail')" />
            
                            <div class="flex items-center">
                                <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail', $post->thumbnail)"/>
                                <div class="mt-2">
                                    <img src="{{$post->thumbnail == NULL ? "https://img.freepik.com/free-vector/abstract-digital-technology-background-with-network-connection-lines_1017-25552.jpg" : asset('/storage/'.$post->thumbnail)}}" alt="" srcset="" width="100">
                                </div>
                            </div>
                            @error('thumbnail')
                                <p class="text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <!-- excerpt -->
                        <div class="mt-4">
                            <x-label for="excerpt" :value="__('excerpt')" />
            
                            <x-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt" :value="old('excerpt',$post->excerpt)" required />
                            @error('excerpt')
                                <p class="text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
            
                        <!-- body -->
                        <div class="mt-4">
                            <x-label for="body" :value="__('body')" />
            
                            <textarea id="body" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="body" placeholder="{{old('body',$post->body)}}" required >{{old('body',$post->body)}}</textarea>
                            @error('body')
                                <p class="text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        {{-- category --}}
                        <div class="mt-4">
                            <select name="category_id" id="category_id" class="rounded-xl">
                                @foreach (\App\Models\category::all() as $category)
                                    <option value="{{$category->id}} {{old('category_id') == $category->id ? 'selected' : ''}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                            <x-button class="mt-4 bg-blue-500 hover:bg-blue-400">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>