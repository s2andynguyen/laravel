
<ul class="fontend-sidebar__wrapper">
    @php
        use App\Lib\Helper;
        use App\Models\Category;
        $mycate = Category::orderbyDesc('id')->get();
    @endphp
    
    {!! Helper::mainCategory($mycate) !!}
</ul>