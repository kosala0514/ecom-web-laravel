@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title"> Item</h1>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="product name..." required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="price" class="form-control" placeholder="product price..." required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-success" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-lg-12">
                <div>
                    <table class="table table-dark table-striped mt-5">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                              <tr>
                                <td scope="row">{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <span > Inactive </span>
                                    @else
                                        <span > Active </span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{ route('product.delete', $item->id) }}">Delete</a>
                                    <a class="btn btn-info" href="{{ route('product.status', $item->id) }}">Status</a>
                                    <a class="btn btn-info" href="javascript:void(0)" ><i onclick="itemEditModal({{ $item->id }})">Edit</i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </table>
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
            padding: 15vh;
            color: rgb(28, 11, 44);
            font-size:2rem;
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
