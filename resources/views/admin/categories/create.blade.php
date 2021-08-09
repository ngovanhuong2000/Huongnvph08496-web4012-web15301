@extends("layout")

@section('title')
{{-- , 'Create User' --}}
@endsection

@section('contents')
<form method="POST" class="mt-5" action="{{ route('admin.categories.store') }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name">
        @error('name')
        <span class="text-danger">{{ $message}}</span>
    @enderror
    </div>
    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection


