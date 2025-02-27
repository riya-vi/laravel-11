<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Category') }}
        </h2>
    </x-slot>

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Category
                    </div>
                    <div class="float-end">
                        <a href="
                        @if(Auth::user()->role == 'admin')
                        {{ route('products.index') }}
                         @else
                        {{ route('user.products') }}
                        @endif
                        " class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                @foreach($categories as $category)
                <div class="card-body">
                {{$category->name}}
                </div>
                @endforeach

            </div>
        </div>
    </div>



</x-app-layout>