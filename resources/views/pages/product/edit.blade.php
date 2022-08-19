<form action="{{ route('product.update', $item->id) }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-lg-8">
        <div class="form-group">
            <input type="text" name="name" value="{{ $item->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" name="price" value="{{ $item->price }}" class="form-control" required>
        </div>
    </div>
    <div class="col-lg-4">
        <button class="btn btn-success" type="submit">
            Update
        </button>
    </div>
</div>
</form>
