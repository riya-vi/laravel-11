<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Create Category
                    </div>
                    <div class="float-end">
                        <a href="
                        @if(Auth::user()->role == 'admin')
                        {{ route('admin.products.category') }}
                         @else
                        {{ route('user.products') }}
                        @endif
                        " class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('categories.store')}}" method="post">
                        @csrf 
                        <label for="name">Category Name :</label>
                        <input type="text" id="name" name="name">
                        <button type="submit" class="btn btn-primary btn-sm active">Save</button>
                    </form>
                </div>
            </div>
        </div>


</x-app-layout>