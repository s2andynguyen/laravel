@extends('admin.main')
@section('head')
    <script src="/ckeditor5-build-classic/ckeditor.js"></script>
@endsection
@section('content')
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}"
                placeholder="Nhập tên sản phẩm...">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Giá sản phẩm:</label>
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" 
                        placeholder="Nhập giá sản phẩm...">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Giá sale (option):</label>
                        <input type="number" name="price_sale" class="form-control" value="{{ $product->price_sale?$product->price_sale:0 }}" 
                            placeholder="Nhập giá sale sản phẩm nếu sale...">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Chọn danh mục:</label>
                <br>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <option selected value="">Chọn danh mục:</option>
                    @foreach ($category as $cate)
                        <option {{ $product->category_id==$cate->id?'selected':'' }} value="{{ $cate->id }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Mô tả:</label>
                <textarea type="text" name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Chi tiết:</label>
                <textarea type="text" id="content" name="content" class="form-control">{{ $product->content }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label" for="uploadfile">Ảnh sản phẩm (450x450 pixel):</label>
                <input class="form-control form-control-sm" id="uploadfile" type="file" >
            
                <div id="image-show" class="mt-3">
                    <a href="{{$product->image}}" target="_blank">
                        <img src="{{$product->image}}" alt="" width="100px">
                    </a>
                </div>
                <input type="hidden" id="fileimage" name="file" value="{{$product->image}}">
              </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                height: '300px'
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
