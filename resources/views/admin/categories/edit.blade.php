@extends("layout")

@section('title')

@endsection

@section('contents')
<form method="POST" class="mt-5" action="{{ route('admin.categories.update',[ 'category' => $data->id]) }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->name}}" name="name">
        @error('name')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection


