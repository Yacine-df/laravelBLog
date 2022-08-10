<x-nav></x-nav>
<header>
    <div class="text-lg text-center mb-6">
        <p>Welcome To our Blog where you find always <span class="text-blue-500">Updates!</span></p>
    </div>
    <div class="md:flex justify-center items-center ">
        
            <div x-data="{show:false}" @click.away="show = false" class="rounded-full bg-gray-200 m-2 border-none relative">
                <button @click='show =! show' class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                    Categories
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-4 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52">
                    @foreach ($categories as $category)
                        <a href="/?category={{$category->slug}}" class="block hover:bg-blue-500 hover:text-white pl-2">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
            {{-- <select name="categories" id="" class="rounded-full bg-gray-200  m-2 border-none font-bold">
                <option value="">choose category</option>
            </select> --}}

        <div class="relative">
            <form action="" method="get" class="pr-4">
                <input name="search" type="search" placeholder="Search" class="font-bold rounded-full bg-gray-200 m-2 pl-8 border-none w-full">
            </form>
            <div class="absolute top-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 mt-4 ml-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>
</header>