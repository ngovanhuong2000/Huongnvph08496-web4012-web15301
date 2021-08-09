@extends("layout")

@section('title')
    Quản lý products
@endsection

@section('contents')    

<div>
    <form action="" method="" class="row col-6">
        <div class="col-10">
            <input class="form-control col-4 d-inline" type="text" name="keyword" value="{{ old('keyword')}}">
            <button class="btn btn-primary col-4 mt-2">Tìm kiếm</button>
        </div>
    </form>
</div>


<div class="row mb-2 mt-4">


    <div class="col-6">
        {{-- <a class="btn btn-success" href="{{ route('admin.products.create')}}" > Create</a> --}}
        <button class="btn btn-success" role="button" data-toggle="modal" data-target="#modal_create">Create</button>
        <div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
           <div class="modal-dialog" role="document">
              <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                 <div class="modal-body">
                    <form method="POST" id="form_create" action="{{ route('admin.products.store') }}">
                        @csrf
                        <div>
                           <label>Name</label>
                           <input class="mt-3 form-control" type="text" name="name" value="{{ old('name')}}">
                        </div>
                        <div>
                           <label>Price</label>
                           <input class="mt-3 form-control" type="number" name="price" value="{{ old('price')}}">
                        </div>
                        <div>
                           <label>Quantity</label>
                           <input class="mt-3 form-control" type="number" name="quantity" value="{{ old('quantity')}}">
                        </div>
                        {{-- <div>
                           <label>Category_id</label>
                           <input class="mt-3 form-control" type="text" name="category_id" value="{{ old('category_id')}}">
                        </div> --}}


                        <div>
                            <label>Category</label>
                            <select name="category_id" class="mt-3 form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id, old('category_id')}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message}}</span>
                             @enderror
                        </div>



                        <div>
                           <label>Image</label>
                           <input class="mt-3 form-control" type="file" name="image" value="{{ old('image')}}">
                        </div>
                        <div class="mt-3">
                            <button class="mt-3 btn btn-primary">Create</button>
                            <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                         </div>
                     </form>
                 </div>
                 <div class="modal-footer">
                 </div>
              </div>
           </div>
        </div> 
     </div>




    {{-- <div class="col-6">
        <a href="{{ route('admin.products.create')}}" class="btn btn-success"> Create</a>
    </div> --}}

    <div class="col-6"></div>
</div>
    @if (!empty($data))
    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <td>Id</td>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Category_id</td>
                <td>Image</td>
                <td colspan="2" class="content">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="text-center">
                <td>{{ $item->id}}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->price}}</td>
                <td>{{ $item->quantity}}</td>
                <td>
                    @foreach($categories as $category)
                        {{ $item->category_id == $category->id ? $category->name : ''}}
                    @endforeach
                </td>
                {{-- <td><img src="{{URL::to('storage/'.$item->image)}}" alt=""></td> --}}
                <td><img src="{{ $item->image}}" alt="" style="width:200px;heigth:200px;"></td>
                {{-- <img src="/img/{{$item->image}}" alt="" width="150" height="auto"> --}}
                {{-- <td>{{ $item->image}}</td> --}}
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.products.edit', ['product' => $item->id]) }}">Update</a>
                </td>
                <td>
                    <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id}}">Delete</button>
                    <div class="modal fade" id="confirm_delete_{{ $item->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                Xác nhận xóa bản ghi này?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <form method="POST" action="{{ route('admin.products.delete', [ 'product' => $item->id])}}">
                                
                                @csrf
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h2>Không có dữ liệu</h2>
@endif

        


   
@endsection