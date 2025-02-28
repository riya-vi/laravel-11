<x-app-layout>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="card mt-5 px-10">
            <h2 class="card-header p-3"><i class="fa fa-star"></i> List of Products</h2>
            <div card-body>
                <table class="table table-bordered mt-4">
                    <tr>
                        <th colspan="8">
                            <form action="">
                                <input type="text" name="search" placeholder="Search..">
                                <button type="button" class="btn btn-success active float-end" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                    + Add Product
                                </button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>product Image</th>
                        <th>Name</th>
                        <th>Owner Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Desciption</th>
                        <th>Action</th>
                    </tr>

                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}} </td>
                        <td>
                            <img src="{{$product->image ?? asset('product-default.png')}}" alt="{{$product->name}}" width="50px">
                        </td>
                        <td>{{$product->name}} </td>
                        <td>
                            {{$product->user->name}}
                        </td>
                        <td>{{$product->quantity}} </td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('products.show',$product->id)}}" class="btn btn-outline-primary btn-sm" role="button" aria-pressed="true"> show</a>

                                <button type="button" class="btn btn-outline-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editProductModal"
                                    data-id="{{$product->id}}"
                                    data-name="{{$product->name}}"
                                    data-quantity="{{$product->quantity}}"
                                    data-price="{{$product->price}}"
                                    data-description="{{$product->description}}">Edit</button>

                                <button type="submit" class="btn btn-outline-danger btn-sm " onclick="return confirm('Are you sure ,You want to delete this product?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
        {{ $products->links() }}
    </div>

    <!-- Edit Product modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editProductForm" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            {{-- <img src="{{$product->image}}" alt="{{$product->name}}" class="rounded mx-auto d-block" width="100"> --}}
                        </div>
                        <div class="mb-3">
                            <label for="name" data-bs-dismiss="modal" class="col-form-label">Product Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" data-bs-dismiss="modal" class="col-form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div class="mb-3">
                            <label for="price" data-bs-dismiss="modal" class="col-form-label">Price:</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="description" data-bs-dismiss="modal" class="col-form-label">Desciption:</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <strong>Image:</strong>
                            <input type="file" name="image" id="image">
                            <!-- <input type="hidden" id="currentImage" name="currentImage"> -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: black;">Close</button>
                    <button type="submit" class="btn btn-primary" style="color: black;" id="saveEditButton">Save changes</button>
                </div>

            </div>
        </div>
    </div>

    <!-- add product modal  -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"> + Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="addProductForm" enctype="multipart/form-data">
                        @csrf
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="form-group ">
                            <label for="name">Product Name: </label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="categories">Category: </label>
                            <select name="categories"  id="categories" multiple>
                                <option value=""> Select Category </option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="quantity">Quantity: </label>
                            <input type="number" name="quantity" id="quantity" class="form-control" />
                        </div>
                        <div class="form-group ">
                            <label for="price">Price: </label>
                            <input type="number" name="price" id="price" class="form-control" />
                        </div>
                        <div class="form-group ">
                            <label for="description">Description: </label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" id="image">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: black;">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveProductButton" style="color: black;">Save</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script type="text/javascript">
    $(document).ready(function() {
        $('#editProductModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var quantity = button.data('quantity');
            var price = button.data('price');
            var description = button.data('description');
            // var productImage = button.data('image') ;

            var actionUrl = "{{ route('products.update', ':id') }}";
            actionUrl = actionUrl.replace(':id', id);
            $('#editProductForm').attr('action', actionUrl);

            $('#name').val(name);
            $('#quantity').val(quantity);
            $('#price').val(price);
            $('#description').val(description);
            // $('#currentImage').val(productImage) ;
        });

        $('#saveEditButton').on('click', function(e) {
            e.preventDefault();
            // var editFormData = $('#editProductForm').serialize();
            // console.log(editFormData) ;
            var editFormData = new FormData($('#editProductForm')[0]);
            var imageInput = $('#image')[0];
            if (imageInput.files.length > 0) {
                editFormData.append('image', imageInput.files[0]);
            }

            var actionUrl = $('#editProductForm').attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                contentType: false,
                processData: false,
                data: editFormData,
                success: function(response) {
                    $('#editProductModal').modal('hide');
                    window.location.reload()
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    $('.print-error-msg').find('ul').html('');
                    $('.print-error-msg').css('display', 'block');
                    $.each(errors, function(key, value) {
                        $('.print-error-msg').find('ul').append('<li>' + value + '</li>');
                    });
                }
            });
        })
    })
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#saveProductButton').on('click', function(e) {
            e.preventDefault();

            var addFormData = new FormData($('#addProductForm')[0]);

            // console.log(addFormData) ;

            $.ajax({
                url: "{{route('products.store')}}",
                type: "POST",
                contentType: false,
                processData: false,
                data: addFormData,
                success: function(response) {
                    $("#addProductModal").modal('hide');
                    window.location.reload();
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    $('.print-error-msg').find('ul').html('');
                    $('.print-error-msg').css('display', 'block');
                    $.each(errors, function(key, value) {
                        $('.print-error-msg').find('ul').append('<li>' + value + '</li>');
                    });
                }
            })
        })
    })
</script>