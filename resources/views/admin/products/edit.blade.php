@extends("layout")

@section('title')

@endsection

@section('contents')
<form method="POST" class="mt-5" action="{{ route('admin.products.update',[ 'product' => $data->id]) }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->name}}" name="name">
        @error('name')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div>
        <label>Price</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->price}}" name="price">
        @error('price')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div>
        <label>Quantity</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->quantity}}" name="quantity">
        @error('quantity')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div>
        <label>Category</label>
        <select name="category_id" class="mt-3 form-control">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <span class="text-danger">{{ $message}}</span>
         @enderror
    </div>
    <div>
        <label>Image</label>
        {{-- <img src="{{ $data->image}}" alt=""> --}}
        <img src="{{ $data->image}}" alt="" style="width:300px; height:300px; display:block;">
     <input type="file" name="anhmoi">
        {{-- <input type="file"> --}}
        @error('image')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    
    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection


