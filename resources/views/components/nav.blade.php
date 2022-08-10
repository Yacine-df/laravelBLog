<nav class="flex items-center justify-between w-full p-4 mt-2">
    @if (Route::has('login'))
        <div class="font-bold ">
            <a href="/"><span class="text-blue-600">My</span>BLog</a>
        </div>
        <div class="w-64">
            @auth
                <div x-data="{show:false}" @click.away="show = false" class=" m-2 border-none relative">
                    <button @click='show =! show' class="flex items-center py-2 pl-3 pr-9 text-sm w-full  text-left font-bold">
                        Welcome, {{auth()->user()->name}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                          </svg>
                    </button>
                    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-32 z-50 overflow-auto max-h-52 text-sm">
                            <a href="/dashboard" class="block hover:bg-blue-500 hover:text-white pl-2">Dashboard</a>
                            <form action="/logout" method="post" class="block hover:bg-blue-500 hover:text-white pl-2">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                    </div>
                </div>
            @endauth
            @guest
            <a href="{{ route('login') }}" class="font-bold mr-2">Login</a>
            <a href="{{ route('register') }}" class="bg-blue-500 text-white w-16 py-2 px-4 rounded-full">New Here !, Subscribe</a> 
            @endguest
            
        </div>
    @endif
</nav>