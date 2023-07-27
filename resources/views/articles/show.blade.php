<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('活動內容') }}
        </h2>
    </x-slot>
	
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class = 'font-semibold text-3xl py-6 text-center'> {{ $article->title }}</h1>
                    <p class = "text-lg text-gray-700 py-2 px-6 whitespace-pre-wrap leading-relaxed">
                        {{ $article -> content }}
                    </P>

					<a href = "{{route('dashboard')}}"> 回活動列表 </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
