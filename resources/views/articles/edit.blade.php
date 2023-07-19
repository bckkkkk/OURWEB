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
                     @if($errors->any())
						<div class = "error p-3 bg-red-500 text-red-100 font-thin rounded">
							<ul>
								@foreach($errors -> all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>

					@endif

					<form action = "{{ route('articles.update', $article) }}" method = "post">  
						@csrf
						@method('patch')
						<div class="field my-2">
							<lable for=""> {{__("標題")}}</lable>
							<input type = "text" value="{{ $article -> title }}" name = "title" class = "border-gray-300 p-2">

						</div>


						<div class="field my-2" >
							<lable for=""> {{__("內文")}} </lable>
							<textarea name = "content" cols = "30" rows = "10" class = "border-gray-300 p-2" >{{ $article -> content }}</textarea>

						</div>
						
						<div class="field my-2" >
							<lable for=""> {{__("簡介")}} </lable>
							<textarea name = "summary" cols = "30" rows = "2" class = "border-gray-300 p-2" >{{ $article -> summary }}</textarea>

						</div>

						<div class="field my-2">
							<lable for=""> {{__("開始時間")}} </lable>
							<input type = "date" value="{{ $article -> start_time }}" name = "start_time" class = "border-gray-300 p-2">

						</div>

						<div class="field my-2">
							<lable for=""> {{__("結束時間")}} </lable>
							<input type = "date" value="{{ $article -> end_time }}" name = "end_time" class = "border-gray-300 p-2">

						</div>

						<div class="flex">
							<div class="actions">
								<button type = "submit" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300"> 修改文章 </button>

							</div>
							<a href = "{{route('articles.index')}}"> 取消修改 </a>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
