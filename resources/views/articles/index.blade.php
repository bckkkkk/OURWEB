<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('文章列表') }}
        </h2>
    </x-slot>
	
	<a href = "{{route('articles.create')}}"> 新增文章</a>

	@foreach($articles as $article)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href = "{{ route('articles.show', $article) }}"> {{ $article->title }} </a> 
                    <p class = "text-lg text-gray-700 p-2">
						{{ $article->summary }}
					</P>
					<div class = "flex">
					<a class = "mr-2" href = "{{route('articles.edit', $article)}}"> 編輯 </a>
					<form action = "{{ route('articles.destroy', $article) }}" method = "post">
                    @csrf 
                    @method('delete')
                    <button type = "submit" class = "px-2 bg-red-500 text-red-100"> 刪除 </button>
                </form>
                </div>
            </div>
        </div>
    </div>
	@endforeach
</x-app-layout>
