<x-app-layout>
    <x-slot name="header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- {{$user->name}}さん、こんにちは！        --}}
    </div>

    <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
        <!-- 現在の本 -->
       @if (count($task) > 0)
          @foreach ($task as $tasks)
              <x-collection books_id="{{ $tasks->books_id }}">{{ $tasks->item_name }}</x-collection>
          @endforeach
        @endif
   </div>
    <form method="post" action="{{route('book_store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4"> 
            <select name="books_id" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($task as $tasks)
                    <option value="{{$tasks->id}}">{{$tasks->item_name}}</option>
                @endforeach
            </select>
        </div> 
        <x-primary-button class="bg-lime-500 hover:bg-lime-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            送信する
        </x-primary-button> 
    </form>    




 </x-app-layout>