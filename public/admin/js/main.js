// thiết lập CSRF-TOKEN để sử dụng method post
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// thực hiện gửi ajax delete
function handleRemove(id, url) {
    if (confirm("Bạn muốn xóa danh mục này?")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: url,
            success: function (result) {
                if (result.error === false) {
                    location.reload();
                } else {
                    alert(result.message);
                }
            },
        });
    }
}

// thực hiện gửi ajax xóa sản phẩm trong giỏ hàng
function handleRemoveAlert(id, url) {
    Swal.fire({
        title: "Bạn muốn xóa sản phẩm khỏi giỏ hàng?",
        text: "Sản phẩm sẽ bị xóa khỏi giỏ hàng!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                datatype: "JSON",
                data: { id },
                url: url,
                success: function (result) {
                    if (result.error === false) {
                        location.reload();
                    } else {
                        alert(result.message);
                    }
                }
            });
        }
    });
}

// thực hiện gửi ajax để filter sản phẩm trong trang admin 
function handleFilter() {
    var id = $("#admin-soft").val();
    if (id !== "") {
        window.location.href = "/admin/product/list/filter/" + id;
    } else {
        window.location.href = "/admin/product/list";
    }
}

// Thực hiện gửi ajax load file hình ảnh
$("#uploadfile").change(function () {
    const form = new FormData();
    form.append("file", $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        dataType: "JSON",
        data: form,
        url: "/admin/product/upload",
        success: function (result) {
            if (result.error == false) {
                $("#image-show").html(
                    '<a target="_blank" href="'+result.url+'"><img width="100px" src="'+result.url+'"></a>'
                );
                $("#fileimage").val(result.url);
            } else {
                alert("upload file lỗi");
            }
        },
    });
});
