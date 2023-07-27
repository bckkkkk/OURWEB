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
                    <div class="text-center">
                        <h1 class = 'font-thin text-3xl'> {{ $article->title }}</h1>
                        <p class = "text-lg text-gray-700 p-2 overflow-wrap overflow-wrap--anywhere">
                            {{ $article -> content }}
                        </P>
                    </div>
					
					<form method="POST" action="{{ route('joiners.store') }}">  
						@csrf
						<div class="field my-2">
							<lable for=""> {{__("note")}}</lable>
							<input type = "text" value="{{ old('note') }}" name = "note" class = "border-gray-300 p-2">

						</div>

						<div class="field my-2" >
							<lable for=""> {{__("phone")}} </lable>
							<textarea name = "phone" cols = "30" rows = "10" class = "border-gray-300 p-2" >{{ old('phone') }}</textarea>

						</div>
						
						<div class="field my-2" >
							<lable for=""> {{__("birthday")}} </lable>
							<input type="date" name = "birthday" cols = "30" rows = "2" class = "border-gray-300 p-2" >{{ old('birthday') }}</textarea>

						</div>

						<div class="field my-2">
							<lable for=""> {{__("ID_number")}} </lable>
							<input type = "text" value="{{ old('ID_number') }}" name = "ID_number" class = "border-gray-300 p-2">

						</div>

						<div class="flex">
							<div class="actions">
								<button type = "submit" name="article_id" value="{{ $article->id}}" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300"> join </button>
						</div>
					</form>

					<a href = "{{route('articles.index')}}"> 回文章列表 </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
