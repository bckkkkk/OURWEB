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

						<div class="form-group">
							<lable for="" class="mb-2"> {{__("標籤類別")}}</lable>
							<input type="text" data-role="tagsinput" name="tags" class="form-control tags w-3/12 border-gray-300 p-2 mx-2" placeholder="{{ __('請以#作為每一標籤的開頭') }}" value="{{ $articletag }}">
							@if ($errors->has('tags'))
								<span class="text-danger">{{ $errors->first('tags') }}</span>
							@endif
						</div>

						<div class="flex-auto ">
							<div class="field mt-4 " ><p>{{__("活動海報")}}</p></div>
							<div class="field my-2 " >
								<div class="flex justify-center items-center ">
									<img src="{{ asset('storage/' . $article->image) }}" onerror="this.onerror=null; this.src='{{asset('storage/images/icon/imageNotFound.png')}}';" class="max-w-md h-auto"/>
								</div>
							    <div class="inline-flex items-center justify-center w-full">
								<hr class="w-64 h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">
								<span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">{{ __('預覽修改') }}</span>
								</div>
							<div class="field mt-2" >
							<lable for="" class="field my-2"> {{__("")}} </lable>
							<div id="images-container"></div>
							<div class="flex w-full justify-center field my-2">
								<div id="multi-upload-button"
									class="inline-flex items-center px-4 py-2 bg-gray-600 border border-gray-600 rounded-l font-semibold cursor-pointer text-sm text-white tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">
									修改檔案
								</div>
								<div class="w-4/12 lg:w-3/12 border border-gray-300 rounded-r-md flex items-center justify-between">
									<span id="multi-upload-text" class="p-2"></span>
									<button id="multi-upload-delete" class="hidden" onclick="removeMultiUpload()">
										<svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3"
											viewBox="0 0 320 512">
											<path
													d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
										</svg>
									</button>
								</div>
							</div>
							<input type="file" name="image" id="multi-upload-input" accept="image/*" class="hidden" multiple/>

							<script>
								//all ids and some classes are importent for this script

								multiUploadButton = document.getElementById("multi-upload-button");
								multiUploadInput = document.getElementById("multi-upload-input");
								imagesContainer = document.getElementById("images-container");
								multiUploadDisplayText = document.getElementById("multi-upload-text");
								multiUploadDeleteButton = document.getElementById("multi-upload-delete");

								multiUploadButton.onclick = function () {
									multiUploadInput.click(); // this will trigger the click event
								};

								multiUploadInput.addEventListener('change', function (event) {

									if (multiUploadInput.files) {
										let files = multiUploadInput.files;

										// show the text for the upload button text filed
										multiUploadDisplayText.innerHTML = files.length + ' files selected';

										// removes styles from the images wrapper container in case the user readd new images
										imagesContainer.innerHTML = '';
										imagesContainer.classList.remove("m-auto", "max-w-md", "h-auto", "object-top");

										// add styles to the images wrapper container
										imagesContainer.classList.add("m-auto", "max-w-md", "h-auto", "object-top");

										// the delete button to delete all files
										multiUploadDeleteButton.classList.add("z-100", "p-2", "my-auto");
										multiUploadDeleteButton.classList.remove("hidden");

										Object.keys(files).forEach(function (key) {

											let file = files[key];

											// the FileReader object is needed to display the image
											let reader = new FileReader();
											reader.readAsDataURL(file);
											reader.onload = function () {

												// for each file we create a div to contain the image
												let imageDiv = document.createElement('div');
												imageDiv.classList.add("h-64", "mb-3", "w-full", "p-3", "rounded-lg", "bg-cover", "bg-center");
												imageDiv.style.backgroundImage = 'url(' + reader.result + ')';
												imagesContainer.appendChild(imageDiv);
											}
										})
									}
								})

								function removeMultiUpload() {
									imagesContainer.innerHTML = '';
									imagesContainer.classList.remove("m-auto", "max-w-md", "h-auto", "object-top");
									multiUploadInput.value = '';
									multiUploadDisplayText.innerHTML = '';
									multiUploadDeleteButton.classList.add("hidden");
									multiUploadDeleteButton.classList.remove("z-100", "p-2", "my-auto");
								}
							</script>

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
