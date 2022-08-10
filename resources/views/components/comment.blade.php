@props(['comment'])
<section class="lg:grid lg:grid-cols-12 gap-4 mt-5 mx-2">
    <article class="col-span-6 col-start-7 flex bg-gray-100 border border-gray-200 rounded-xl p-6">
        <div class="flex-shrink-0 ">
            <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="" width="60px" height="60px" class="rounded-xl mr-4">
        </div>
        <div>
            <header>
                <h3 class="font-bold">{{$comment->author->name}}</h3>
                <p class="mb-4 font-semibold text-xs">Published 
                    <time>{{$comment->created_at->diffForHumans()}}</time>
                </p>
                <p>
                    {{$comment->body}}
                </p>
            </header>
        </div>
    </article>
</section>