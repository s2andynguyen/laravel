@extends('admin.main')

@section('content')
    <!-- form start -->
    <div class="px-3">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 20px;">ID</th>
                    <th>Category name</th>
                    <th>Mô tả</th>
                    <th>Slug</th>
                    <th>Update</th>
                    <th style="width: 90px;">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @php use App\Lib\Helper; @endphp
                {!! Helper::getCategory($category) !!}
            </tbody>
        </table>

    </div>
    

@endsection

