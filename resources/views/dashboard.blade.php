<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                    <h1>{{auth()->user()->name}}さんが選択している課題本</h1>
 
                    {{-- @foreach(auth()->user()->books as $book)　：エラーの為、一旦コメントアウト
                    <div class="mb-4">
                        <p>本の題名：{{$books->item_name}}</p>
                    @endforeach --}}
                </div>
                <div class="p-6 text-gray-900">
                    <h1>{{auth()->user()->name}}さんが所属しているチーム</h1>
                </div>
                <div class="p-6 text-gray-900">
                    <h1>{{auth()->user()->name}}さんの今週の課題</h1>
                </div>

            </div>
                   
        
        </div>
    </div>
</x-app-layout>
