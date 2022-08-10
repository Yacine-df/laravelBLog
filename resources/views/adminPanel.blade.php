<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <section class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                <div class="bg-blue-400 mx-2 px-4 py-2 rounded-xl shadow-md text-white">
                    Posts : {{\App\Models\post::all()->count()}}
                </div>
                <div class="bg-green-400 mx-2 px-4 py-2 rounded-xl shadow-md text-white">
                    All Users : {{\App\Models\User::all()->count()}}
                </div>
                <div class="bg-red-400 mx-2 px-4 py-2 rounded-xl shadow-md text-white">
                    Active Posts: {{\App\Models\post::where('active','=',true)->count()}}
                </div>
                <div class="bg-purple-400 mx-2 px-4 py-2 rounded-xl shadow-md text-white">
                    Unactivate Posts:  {{\App\Models\post::where('active','=',false)->count()}}
                </div>
            </section>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                     <x-admin-Posts-table title='All Active Posts' action='inactive' :posts="\App\Models\post::where('active', '=', true)->filter(request(['search']))->paginate(5)"></x-admin-Posts-table>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                     <x-admin-Posts-table title='All Inactive Posts' action='active'  :posts="\App\Models\post::where('active', '=', false)->filter(request(['search']))->paginate(5)"></x-admin-Posts-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>