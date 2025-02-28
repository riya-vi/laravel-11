<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Category') }}
        </h2>
    </x-slot>

    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    <div class="container">
        <div class="card mt-5 px-10">
            <h2 class="card-header p-3"><i class="fa fa-star"></i> List of categories</h2>
            <div card-body>
                <table class="table table-bordered mt-4">
                    <tr>
                        <th colspan="5">
                            <form action="">
                                <input type="text" name="search" placeholder="Search..">
                                <a href="{{route('categories.create')}}"
                                    class="btn btn-success active float-end">
                                    + Add Category
                                </a>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}} </td>
                        <td>{{$category->name}} </td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="" class="btn btn-outline-primary btn-sm" role="button" aria-pressed="true"> show</a>

                                <button type="button" class="btn btn-outline-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editProductModal"
                                    data-id=""
                                    data-name=""
                                    data-quantity=""
                                    data-price=""
                                    data-description="">Edit</button>

                                <button type="submit" class="btn btn-outline-danger btn-sm " onclick="return confirm('Are you sure ,You want to delete this Category?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>



</x-app-layout>