@props(['posts', 'title', 'action'])
<div class="bg-white p-8 rounded-md w-full">
    <div class=" flex items-center justify-between pb-6">
        <div>
            <h2 class="text-gray-600 font-semibold">{{$title}}</h2>
        </div>
                <div class="flex items-center justify-between">
                    <form action="" method="get">
                        <div class="flex bg-gray-100 items-center px-6 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input name="search" type="search" placeholder="Search" class="bg-gray-100 border-none ml-1 block focus:outline-none"  placeholder="search...">
                        </div>
                    </form>
                </div>
    </div>
    <div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                title
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Category
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                interactions
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Created at
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Created by
                            </th>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="w-full h-full flex content-start">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$post->title}}
                                                </p>
                                            </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div>
                                        {{$post->Category->name}}
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 text-center hover:bg-blue-400whitespace-no-wrap">
                                            {!!$post->comments->count() !!}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$post->created_at}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$post->author->name}}
                                    </p>
                                </td>
                                @if ($post->active == true)
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                            </span>
                                            <span class="relative">Active</span>
                                        </span>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button class="bg-blue-500 hover:bg-blue-400 px-2 py-1 m-1 text-white rounded-xl w-16"><a href="/dashboard/post/{{$post->id}}/inactive">Inactive</a></button>
                                        <button class="bg-red-500 hover:bg-red-400 px-2 py-1 m-1 text-white rounded-xl w-16"><a href="/dashboard/post/{{$post->id}}/delete">Delete</a></button>
                                    </td>
                                @else
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-red-200 opacity-50 rounded-full">
                                            </span>
                                            <span class="relative">Inactive</span>
                                        </span>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button class="bg-blue-500 hover:bg-blue-400 px-2 py-1 m-1 text-white rounded-xl w-16"><a href="/dashboard/post/{{$post->id}}/active">Active</a></button>
                                        <button class="bg-red-500 hover:bg-red-400 px-2 py-1 m-1 text-white rounded-xl w-16"><a href="/dashboard/post/{{$post->id}}/delete">Delete</a></button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                        {{$posts->links()}}

                </div>
            </div>
        </div>
    </div>