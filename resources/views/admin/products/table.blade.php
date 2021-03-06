@section('title','List Product | Admin')
@extends('.admin.layouts.table')
@section('title_table','Products table')
@section('custom_style_level_2')
   .Product_Action{
        min-width:120px;
   }
   .show_avatar {
   height: 50px;
   width: 50px;
   object-fit: cover;
   border-radius: 5px;
   }
@endsection

@section('option_filter')
    <div class="form-group col-sm-4" style="padding: 0 1px">
        <select name="brand_s" id="" class="form-control sorted2">
            <option value="0">Brands</option>
            @foreach($brands as $item)
                <option {{$item->id == $brand_s ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-4" style="padding: 0 1px">
        <select name="category_s" id="" class="form-control sorted2">
        <option value="0">Category</option>
            @foreach($categories as $item)
                <option {{$item->id == $category_s ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-4" style="padding: 0 1px">
        <select name="status" id="" class="form-control sorted2">
            <option value="0">Status</option>
            <option {{$status == \App\Enums\Status::ACTIVE ?'selected' :'' }} value="{{\App\Enums\Status::ACTIVE}}">Active</option>
            <option {{$status == \App\Enums\Status::IN_ACTIVE ?'selected' :'' }} value="{{\App\Enums\Status::IN_ACTIVE}}">In Active</option>

        </select>
    </div>
@endsection

@section('filter_form')
    <div class="form-group col-sm-5">
        <input value="{{$key_search != null ? $key_search : ''}}" type="text" class="form-control" placeholder="Enter keyword" name="search">
    </div>
    <div class="form-group col-sm-4">
        <button class="btn btn-primary">Search</button>
        <a href="{{route('list_product')}}" class="btn btn-danger">Clear filter</a>
    </div>
    <div class="form-group col-sm-3">
        <select name="sort" id="" class="form-control sorted">
            <option value="" hidden>S???p x???p</option>
            <option {{$sort ==  \App\Enums\Sort::SORT_ID_ASC ? 'selected' : ''}} value="{{\App\Enums\Sort::SORT_ID_ASC}}">ID t??ng d???n</option>
            <option {{$sort ==  \App\Enums\Sort::SORT_ID_DESC ? 'selected' : ''}} value="{{\App\Enums\Sort::SORT_ID_DESC}}">ID gi???m d???n</option>
            <option {{$sort ==  \App\Enums\Sort::SORT_NAME_ASC ? 'selected' : ''}} value="{{\App\Enums\Sort::SORT_NAME_ASC}}">T??n A - Z</option>
            <option {{$sort ==  \App\Enums\Sort::SORT_NAME_DESC ? 'selected' : ''}} value="{{\App\Enums\Sort::SORT_NAME_DESC}}">T??n Z - A</option>
            <option {{$sort ==  \App\Enums\Sort::SORT_CREATED_AT_ASC ? 'selected' : ''}} value="{{\App\Enums\Sort::SORT_CREATED_AT_ASC}}">C?? nh???t tr?????c</option>
            <option {{$sort ==  \App\Enums\Sort::SORT_CREATED_AT_DESC ? 'selected' : ''}} value="{{\App\Enums\Sort::SORT_CREATED_AT_DESC}}">M???i nh???t tr?????c</option>
        </select>
    </div>
@endsection
@section('table_head')
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Thumbnail</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Status</th>
        <th>Created At</th>
        <th class="text-center Product_Action">Actions</th>
    </tr>
@endsection
@section('table_body')
    @foreach($list as $item)
        <tr class="gradeX">
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>
                <img class="show_avatar" src="{{$item->thumbnail}}" alt="">
            </td>
            <td>{{$item->price}}</td>
            <td>{{$item->discount}}</td>
            <td>{{\App\Models\Brand::find($item->brand_id)->name}}</td>
            <td>{{\App\Models\Categories::find($item->category_id)->name}}</td>
            <td>
                <label class="switch">
                    <input onchange="changeStatus({{$item->id}})" type="checkbox" {{$item->status == \App\Enums\Status::ACTIVE ? 'checked' : '' }}>
                    <span class="slider round"></span>
                </label>
            </td>
            <td>{{$item->created_at}}</td>
            <td class="actions text-center">
                <a href="{{route('edit_product',$item->id)}}" class="on-default edit-row text-primary"><i class="fa fa-pencil"></i></a>
                <a onclick="return confirm('B???n c?? ch???c mu???n x??a s???n ph???m n??y , Ch???n OK t???t c??? option li??n quan c??ng s??? ???????c x??a ??i')" href="{{route('delete_product',$item->id)}}" class="on-default remove-row text-danger"><i class="fa fa-trash-o"></i></a>
                <a href="#" class="on-default remove-row text-dark"><i class="fa fa-info-circle"></i></a>
            </td>
        </tr>
    @endforeach
@endsection

