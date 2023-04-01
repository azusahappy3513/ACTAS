<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           掲示板メッセージの新規作成
       </h2>
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{$user->name}}さん、こんにちは！
       </div>
       {{-- @if(session('message'))
           {{session('message')}}
       @endif --}}
       {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
   </x-slot>
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           <div class="mx-4 sm:p-8">
            <form method="POST" action="{{ route('user_books.store') }}">
                @csrf
                
                <label for="item_name" class="col-md-6 col-form-label text-left">
                  
                </label>
                <div class="col-md-6 m-auto">
                    <input id="item_name"
                           type="text"
                           class="form-control"
                           name="item_name"
                           value="{{ old('item_name') }}"
                    />
                </div>
            
                <label for="category_id" class="col-md-6 col-form-label text-left">
                    カテゴリ
                </label>
                <div class="col-md-6 m-auto">
                    @foreach ($categories as $category)
                        <label>
                            <input type="checkbox"
                                   name="category_ids[]"
                                   value="{{ $category->id }}"
                             />
                            {{ $category->name }}
                        </label>
                    @endforeach
                </div>
            
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
       
                   {{-- <x-primary-button class="mt-4">
                       送信する
                   </x-primary-button> -- --}}
            </form>
           </div>
       </div>
   </x-app-layout>