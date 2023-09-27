<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('修改名單') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white semibold shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-4 text-gray-900 ">
                    <div class="relative overflow-x-auto">
                        <table class="table-fixed w-full text-left dark:text-gray-400">
                            <thead class=" text-gray-900 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-2">{{ __("姓名") }}</th>
                                    <th scope="col" class="px-6 py-2">{{ __("信箱") }}</th>
                                    <th scope="col" class="px-6 py-2">{{ __(" ") }}</th>
                                    <th scope="col" class="px-6 py-2">{{ __(" ") }}</th>
                                    <th scope="col" class="px-6 py-2">{{ __("出席") }}</th>
                                    <th scope="col" class="px-6 py-2">{{ __("請假") }}</th>
                                    <th scope="col" class="px-6 py-2">{{ __("缺席") }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action = "{{ route('checks.store') }}" method = "post">  
		@csrf
		
	@foreach($blackfalse as $user)
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white  shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-4 text-gray-900 ">
                    <div class="relative overflow-x-auto">
                        <table class="table-fixed w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead>

                            </thead>
                            <tbody>

									<tr scope="row" class="px-6 py-4 text-gray-900">
                                        <td class="px-6 py-2 "> {{ $user -> name }} </td>
                                        <td class="px-6 py-2 "> {{ $user -> email }} </td>
                                        <td class="px-6 py-2 "> {{ __(" ") }} </td>
                                        <td class="px-6 py-2 "> {{ __(" ") }} </td>
                                        <td class="px-6 py-2 "><input type="radio" value="present" name="attend[]" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"></td>
                                        <td class="px-6 py-2 "><input type="radio" value="rest" name="attend[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"></td>
                                        <td class="px-6 py-2 "><input type="radio" value="absent" name="attend[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"></td>
                                        <input type="hidden" name="user_id[]" value="{{$user->id}}">
									</tr>
								
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <input type="hidden" name="article" value="{{$article->id}}">
    <div class="flex mt-4 space-x-6 justify-center">
		<div class="actions">
            <button type="submit" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("修改權限")}} </button>
		</div>
		<div class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 ">	
			<a href = "{{route('allow.index')}}" > {{__("取消修改")}} </a>
		</div>
	</div>


    </form>

</x-app-layout>