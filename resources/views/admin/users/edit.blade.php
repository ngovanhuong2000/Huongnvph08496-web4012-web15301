@extends("layout")

@section('title')
{{-- , 'Create User' --}}
@endsection

@section('contents')
<form method="POST" class="mt-5" action="{{ route('admin.users.update',[ 'user' => $data->id]) }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-2 form-control" type="text" value="{{ $data->name}}" name="name">
        @error('name')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Email</label>
        <input class="mt-2 form-control" type="text" value="{{ $data->email}}" name="email">
        @error('email')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Address</label>
        <input class="mt-2 form-control" type="text" value="{{ $data->address}}" name="address">
        @error('address')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Gender</label>
        <select name="gender" class="ml-20">
            <option {{$data->gender == 1 ? "selected" : ""}} value="1">Male</option>
            <option {{$data->gender == 0 ? "selected" : ""}} value="0">Female</option>
        </select>
        @error('gender')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Role</label>
        <select name="role">
            <option {{$data->gender == 0 ? "selected" : ""}} value="0">User</option>
            <option {{$data->gender == 1 ? "selected" : ""}} value="1">Admin</option>
        </select>
        @error('role')
        <span class="text-danger">{{ $message}}</span>
        @enderror
    </div>
    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection


