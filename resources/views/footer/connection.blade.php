<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('聯絡我們') }}
    </h2>
</x-slot>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 m-6">

					<form action="{{ route('mails.store') }}" method="post" >  
						@csrf

                        <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                                姓名
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input type="text" value="{{ old('name') }}" name="name" class="block w-full focus:bg-white" required>
                        </div>
                        </div>

                        <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                                信箱
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input type="text" value="{{ old('email') }}" name="email" class="block w-full focus:bg-white" required>
                        </div>
                        </div>

                        <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                                標題
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input type="text" value="{{ old('subject') }}" name="subject" class="block w-full focus:bg-white" required>
                        </div>
                        </div>

                        <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                                內文
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <textarea class="form-textarea block w-full focus:bg-white" id="my-textarea" value="" rows="8" name ="content" required>{{ old('content') }}</textarea>
                            <p class="py-2 text-sm text-gray-600">請盡量詳述您的問題</p>
                        </div>
                        </div>

						<div class="actions text-right">
							<button type="submit" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("確定送出")}} </button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>