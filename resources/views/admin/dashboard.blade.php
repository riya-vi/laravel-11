<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
       
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                            {{--
                                {{count($totalUsers)}}
                            --}}
                            {{$totalUsers}}
                        </p>
                    </div>
                </div>
                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Products</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                            {{count($totalProducts)}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>