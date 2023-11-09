// thực hiện gửi ajax để load thêm sản phẩm trang home
function loadMore() {
    const page = $("#homepage").val();
    const price = getParams()?? '';
    $.ajax({
        type: 'POST',
        dataType: "JSON",
        data: { page, price },
        url: "/home/load-product",
        success: function(result) {
            if(result.html != ''){
                $('#product__wrapper').append(result.html);
                $("#homepage").val(+page+1); 
                console.log('homepage :>> ', $("#homepage").val());
            } else {
                $('#btn__loadmore').css('display', 'none');
            }
        }
    })
}

// Hàm lấy param filter price từ url
function getParams() {
    var queryString = window.location.search;
    queryString = queryString.slice(1);

    var queryParams = queryString.split('&');
    var params = {};
    queryParams.forEach(function(param) {
        var parts = param.split('=');
        var key = decodeURIComponent(parts[0]);
        var value = decodeURIComponent(parts[1]);
        params[key] = value;
    });
    
    var price = params['price'];
    return price;
}

