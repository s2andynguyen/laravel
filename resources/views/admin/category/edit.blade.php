@extends('admin.main')
@section('head')
    <script src="/ckeditor5-build-classic/ckeditor.js"></script>
@endsection
@section('content')
    <!-- form start -->
    <form action="" method="post">
      <div class="card-body">
        <div class="form-group">
          <label for="">Tên danh mục:</label>
          <input type="text" name="name" value="{{ $categoryItem->name }}" class="form-control" placeholder="Nhập tên danh mục...">
        </div>
        <div class="form-group">
            <label for="">Danh mục:</label>
            <br>
            <select class="form-select" name="parent_id" aria-label="Default select example">
                <option value="0" {{ $categoryItem->id==0? 'selected':'' }}>Danh mục cha</option>
                @foreach ($category as $cate)
                  <option value="{{ $cate->id }}" 
                    {{ $categoryItem->parent_id==$cate->id? 'selected':'' }}
                >{{ $cate->name }}</option>
                @endforeach
              </select>
        </div>
        <div class="form-group">
            <label for="">Mô tả:</label>
            <textarea type="text" name="description" class="form-control"
            >{{ $categoryItem->description }}</textarea>
          </div>
        <div class="form-group">
            <label for="">Mô tả chi tiết:</label>
            <textarea type="text" id="content" name="content" class="form-control"
            >{{ $categoryItem->description }}</textarea>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
      </div>
      @csrf
    </form>
@endsection
@section('footer')
    <script>
        ClassicEditor
        .create( document.querySelector( '#content' ), {
            height: '300px'
        })
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection