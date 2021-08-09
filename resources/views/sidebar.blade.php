<div>
    @auth
    <div style="padding-top:110px ">
        <a class="btn btn-info" href="{{ route('admin.categories.index')}}" style="display:block;"> Category</a>
        <a class="btn btn-info mt-3" href="{{ route('admin.products.index')}}" style="display:block;"> Product</a>
        <a class="btn btn-info mt-3" href="{{ route('admin.users.index')}}" style="display:block;"> Users</a>
    </div>
    @endauth
</div>