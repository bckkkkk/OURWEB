<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('修改活動內容') }}
        </h2>
    </x-slot>
	
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 m-6 text-center">
                     @if($errors->any())
						<div class = "error p-3 bg-red-150 text-white font-thin rounded">
							<ul>
								@foreach($errors -> all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>

					@endif

					<form action = "{{ route('articles.update', $article) }}" method = "post" enctype="multipart/form-data">  
						@csrf
						@method('patch')
						<div class="field my-2 ">
							<lable for="" class="mb-2"> {{__("標題")}}</lable>
							<input type = "text" value="{{ $article -> title }}" name = "title" class = "w-2/5 border-gray-300 p-2 mx-2">

						</div>

						<div class="flex-auto ">
							<div class="field my-2" ><p>{{__("內文")}}</p></div>
							<div class="field my-2" >
								<lable for="" class="mb-2"> {{__("")}} </lable>
								<textarea name = "content" rows = "20" class = "w-4/5 m-auto border-gray-300 p-2 " >{{ $article -> content }}</textarea>

							</div>
						</div>
						
						<div class="flex-auto ">
							<div class="field my-2" ><p>{{__("簡介")}}</p></div>
							<div class="field my-2 " >
								<lable for="" class="mb-2"> {{__("")}} </lable>
								<textarea name = "summary" rows = "5" class = "w-4/5 m-auto border-gray-300 p-2" >{{ $article -> summary }}</textarea>

							</div>
						</div>
						
						<div class="flex-auto ">
							<div class="field my-2" ><p>{{__("活動海報")}}</p></div>
							<div class="field my-2 " >
								<lable for="" class="mb-2"> {{__("")}} </lable>
								<img src="{{ asset('storage/' . $article->image) }}" />
								<input type="file" name="image" >
							</div>
						</div>

						<div class="grid gap-6 mb-6 md:grid-cols-6">
							<div class="col-span-0 lg:col-span-1"></div>
							<div class="field my-2 col-span-2 ">
								<lable for=""> {{__("報名開始")}} </lable>
								<input type = "date" value="{{ $article -> start_time }}" name = "start_time" class = "border-gray-300 p-2 mx-2">

							</div>

							<div class="field my-2 col-span-2 ">
								<lable for=""> {{__("報名結束")}} </lable>
								<input type = "date" value="{{ $article -> end_time }}" name = "end_time" class = "border-gray-300 p-2 mx-2">

							</div>
						</div>

						<div class="grid gap-6 mb-6 md:grid-cols-6">
							<div class="col-span-0 lg:col-span-1"></div>
							<div class="field my-2 col-span-2 ">
								<lable for=""> {{__("活動開始")}} </lable>
								<input type = "date" value="{{ $article -> start_time_event }}" name = "start_time_event" class = "border-gray-300 p-2 mx-2">

							</div>

							<div class="field my-2 col-span-2 ">
								<lable for=""> {{__("活動結束")}} </lable>
								<input type = "date" value="{{ $article -> end_time_event }}" name = "end_time_event" class = "border-gray-300 p-2 mx-2">

							</div>
						</div>

						<div class="field my-2 ">
							<lable for="" class="mb-2"> {{__("人數上限")}} </lable>
							<input type = "text" value="{{  $article -> maximum }}" name = "maximum" class = "w-3/12 border-gray-300 p-2 mx-2" placeholder="{{ __('請填入數字(若無可空白)') }}">

						</div>

						<div class="flex mt-4 space-x-6 justify-center">
							<div class="actions">
								<button type = "submit" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("修改活動內容")}} </button>

							</div>
							<div class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 ">	
								<a href = "{{route('dashboard')}}" > {{__("取消修改")}} </a>
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
