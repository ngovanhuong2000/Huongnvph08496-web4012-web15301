@extends("layout")

@section('title')
{{-- , 'Create User' --}}
@endsection

@section('contents')
<form method="POST" class="mt-5" action="{{ route('admin.products.store') }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{ old('name')}}">
        @error('name')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div>
        <label>Price</label>
        <input class="mt-3 form-control" type="number" name="price" value="{{ old('price')}}">
        @error('price')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div>
        <label>Quantity</label>
        <input class="mt-3 form-control" type="number" name="quantity" value="{{ old('quantity')}}">
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
        <input class="mt-3 form-control" type="file" name="image" value="{{ old('image')}}">
        @error('image')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    {{-- <div>
        <label for="">Gender</label>
        <select name="gender">
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>
    </div>
    <div>
        <label for="">Role</label>
        <select name="role">
            <option value="0">User</option>
            <option value="1">Admin</option>
        </select>
    </div> --}}
    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection


