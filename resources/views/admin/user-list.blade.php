<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="card mt-5 px-10">
            <h2 class="card-header p-3"><i class="fa fa-star"></i> List of Products</h2>
            <div card-body>
                <table class="table table-bordered mt-4">
                    <tr>
                        <th colspan="8">
                            <form action="" method="post">
                                <input type="text" name="search" id="search" placeholder="Search..">
                            </form> 
                        </th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Status</th>
                    </tr>

                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}} </td>
                        <td>{{$user->name}} </td>
                        <td>{{$user->email}} </td> 
                        <td>
                            <form method="post" action="{{ route('admin.users.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-{{ $user->active ? 'success' : 'danger' }} active">
                                    {{ $user->active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
        {{ $users->links() }}
    </div>

</x-app-layout>
