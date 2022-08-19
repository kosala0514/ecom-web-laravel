@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Add Product</h1>
                <hr/>
            </div>
            <div class="col-lg-12 content-container mt-5 mb-5">
                <form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="mb-3 col-lg-6">
                        <label for="formControllerInput" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Ex:- iPhone X" required>
                      </div>
                      <div class="mb-3 col-lg-6">
                        <label for="formControllerInput" class="form-label">Product Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Ex:- 65000.00" required>
                      </div>
                      <div class="mb-3 col-lg-12">
                        <label for="formFileSm" class="form-label">Product Image</label>
                        <input class="form-control dropify" name="images" type="file" accept="image/jpg, image/jpeg, image/png" required>
                      </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-outline-info" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
                </form>
                <hr/>
            </div>
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Product Details</h1>
                <hr/>
                <div class="row mt-5 mb-5">
                        @foreach ($items as $key => $item)
                        <div class="col-lg-4">
                        <div class="card mb-3" style="width: 18rem;height: 22rem;">
                            <img style="width: 18rem;height: 22rem;" src="{{ config('images.access_path') }}/{{ $item->image->name }}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Name : {{ $item->name }}</h5>
                              <p class="card-text">Price(Rs) : {{ $item->price }}</p>
                              <p class="card-text">Status :
                                @if ($item->status == 0)
                                            <span > Inactive </span>
                                        @else
                                            <span > Active </span>
                                        @endif
                              </p>
                                        <a class="btn btn-success" href="{{ route('product.status', $item->id) }}">Status</a>
                                        <a class="btn btn-info" href="javascript:void(0)" ><i onclick="itemEditModal({{ $item->id }})">Edit</i></a>
                                        <a class="btn btn-danger" href="{{ route('product.delete', $item->id) }}">Delete</a>

                            </div>
                        </div>
                    </div>
                        @endforeach

                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="edititem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Update Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="itemEditContent">

        </div>
      </div>
    </div>
  </div>

@endsection

@push('css')
    <style>
        .page-title{
            padding: 15px;
            color: rgb(28, 11, 44);
            font-size:1.5rem;
        }
        .content-container{
            padding: 15px;
        }
    </style>
@endpush

@push('js')
<script>
    function itemEditModal(item_id){
        var data = {
            item_id:item_id,
        };
        $.ajax({
            url: "{{ route('product.edit') }}",
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType:'',
            data:data,
            success: function (response){
                $('#edititem').modal('show');
                $('#itemEditContent').html(response);
            }
        });
    }
</script>
@endpush
