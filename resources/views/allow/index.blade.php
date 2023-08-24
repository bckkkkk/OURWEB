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
                                    <th scope="col" class="px-6 py-3">{{ __("權限") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("姓名") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("信箱") }}</th>

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
    <form action = "{{ route('allow.store') }}" method = "post">  
		@csrf
		
	@foreach($users as $user)
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
										<td class="px-6 py-2 "> 
											<select class="" name="allow[]">
												<option value="manager" {{ ($user -> allow == "manager")? 'selected':'' }}> {{__("manager")}} </option>
												<option value="organizer" {{ ($user -> allow == "organizer")? 'selected':'' }}> {{__("organizer")}} </option>
												<option value="joiner" {{ ($user -> allow == "joiner")? 'selected':'' }}> {{__("joiner")}} </option>
											</select>
											<input type="hidden" name="user_id[]" value="{{$user->id}}">
										</td>
										<td class="px-6 py-2 "> {{ $user -> name }} </td>
                                        <td class="px-6 py-2 "> {{ $user -> email }} </td>

									</tr>
								
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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