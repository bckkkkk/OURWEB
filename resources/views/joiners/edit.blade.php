<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$article->title}}
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

                    
                    <div class = "text-lg text-gray-700 py-2 px-6 whitespace-pre-wrap leading-relaxed text-left">
                        {{ $article -> summary }}
                    </div>
                    

					<form action = "{{ route('joiners.update', $article) }}" method = "post">  
						@csrf
                        @method('patch')
						<div class="field my-2">
							<lable for="" > {{__("生日")}} </lable>
							<input type = "date" disabled value="{{ $article -> pivot -> birthday }}" name = "birthday" class = "border-gray-300 p-2 mx-2 disabled:bg-slate-50 disabled:text-slate-500">

						</div>

						<div class="flex-auto ">
							<div class="field my-2" ><p>{{__("身分證字號")}}</p></div>
							<div class="field my-2 ">
								<lable for="" class="mb-2"> {{__("")}}</lable>
								<input type = "text" disabled value="{{ $article -> pivot -> ID_number }}" name = "ID_number" class = "w-2/5 border-gray-300 p-2 mx-2 disabled:bg-slate-50 disabled:text-slate-500">

							</div>
						</div>
						
						<div class="flex-auto ">
							<div class="field my-2" ><p>{{__("電話號碼")}}</p></div>
							<div class="field my-2 ">
								<lable for="" class="mb-2" > {{__("")}}</lable>
								<input type = "text" disabled value="{{ $article -> pivot -> phone }}" name = "phone" class = "w-2/5 border-gray-300 p-2 mx-2 placeholder-gray-300 disabled:bg-slate-50 disabled:text-slate-500" placeholder="{{ __('ex:0912345678') }}">

							</div>
						</div>

                        <div class="flex-auto ">
							<div class="field my-2" ><p>{{__("備註")}}</p></div>
							<div class="field my-2" >
								<lable for="" class="mb-2"> {{__("")}} </lable>
								<textarea name = "note" rows = "5" class = "w-4/5 m-auto border-gray-300 p-2 placeholder-gray-300" placeholder="{{ __('有甚麼話想對主辦方說的嗎...') }}">{{ $article -> pivot -> note }}</textarea>

							</div>

						</div>


						<div class="flex mt-4 space-x-6 justify-center">
							<div class="actions">
								<button class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("確定修改")}} </button>
							</div>
							<div class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 ">	
								<a href = "{{route('dashboard')}}" > {{__("取消修改")}} </a>
							</div>
							<form method="POST" action="{{ route('joiners.destroy', $article) }}">
                                @csrf
                                @method('delete')
                    			<button type = "submit" class = "px-3 py-1 rounded bg-red-150 text-white hover:bg-red-250"> {{__("取消報名")}} </button>

                            </form>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
