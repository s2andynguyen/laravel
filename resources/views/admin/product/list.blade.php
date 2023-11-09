@extends('admin.main')

@section('content')
    <div class="filter-product__wrapper my-3 d-flex justify-content-end align-items-center px-3">
        <div class="filter-product d-flex">
            <label for="" class="mb-0 " style="width: 280px">Lọc theo danh mục:</label>
            <select class="form-select" aria-label="Default select example" 
            name="admin-soft" id="admin-soft" onchange="handleFilter()">
                <option selected value="">All Products</option>
                @foreach ($category as $cate)
                    <option {{isset($current_cate)&&$current_cate==$cate->id?'selected':''}} value="{{ $cate->id }}">{{ $cate->name }}</option>
                @endforeach
            </select>
        </div>
        <p id="result"></p>
    </div>
    <!-- form start -->
    <div class="px-3">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th style="width: 20px;">ID</th>
                    <th>Image</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá gốc</th>
                    <th>Giá sale</th>
                    <th>Update</th>
                    <th style="width: 90px;">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @php
                    use App\Lib\Helper;
                @endphp
                @foreach ($products as $key=>$product )
                    <tr class="text-center">
                        <td>{{ $product->id }}</td>
                        <td >
                            <img src="{{ $product->image }}" alt="" width="60px" >
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ Helper::formatCurrency($product->price) }}</td>
                        <td>{{ $product->price_sale?Helper::formatCurrency($product->price_sale):'Not Sale' }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <a href="/admin/product/edit/{{$product->id}}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="handleRemove({{$product->id}}, '/admin/product/destroy')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div style="display:flex; justify-content: flex-end;">
            {!! $products->links('admin.pagination') !!}
        </div>

    </div>
    

@endsection

