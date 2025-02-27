<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

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

<script>
    $('#search').on('keyup', function() {
        search();
    });
    search();

    function search() {
        var keyword = $('#search').val();
        $.post('{{ route("admin.user.search") }}', {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword: keyword
            },
            function(data) {
                table_post_row(data);
                console.log(data);
            });
    }
    // table row with ajax
    function table_post_row(res) {
        let htmlView = '';
        if (res.users.length <= 0) {
            htmlView += `
       <tr>
          <td colspan="4">No data.</td>
      </tr>`;
        }
        for (let i = 0; i < res.users.length; i++) {
            htmlView += `
        <tr>
           <td>` + (i + 1) + `</td>
              <td>` + res.users[i].name + `</td>
               <td>` + res.users[i].email + `</td>
        </tr>`;
        }
        $('tbody').html(htmlView);
    }
</script>