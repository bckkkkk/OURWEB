<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('文章列表') }}
        </h2>
    </x-slot>
	
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class = 'font-semibold text-3xl  text-center'> {{ $article->title }}</h1>
                    <p class = "text-lg text-gray-700 p-2 ">
                        {{ $article -> content }}
                    </P>

					<a href = "{{route('articles.index')}}"> 回文章列表 </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
