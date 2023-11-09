

// Hàm tăng số lượng sp tại trang detail
function detailIncrease(id) {
    let inputQty = document.querySelector(`.product-quanlity-${id}`);
    inputQty.value = Number(inputQty.value)+1
}

// Hàm giảm số lượng sp tại trang detail
function detailDecrease(id) {
    let inputQty = document.querySelector(`.product-quanlity-${id}`);
    if(inputQty.value <= 1)
    inputQty.value = Number(inputQty.value)-1
}

// Hàm tăng số lượng sp tại giỏ hàng
function increaseQty(id,price, price_sale) {
    let inputQty = document.querySelector(`.product-quanlity-${id}`);
    let viewTotal = document.querySelector(`.view-total-product-${id}`);
    
    inputQty.value = Number(inputQty.value)+1;

    let result = totalProcduct(id,price, price_sale)
    viewTotal.innerHTML = formatCurrency(result);
}

// Hàm giảm số lượng sp tại giỏ hàng
function decreaseQty(id,price, price_sale) {
    let inputQty = document.querySelector(`.product-quanlity-${id}`);
    let viewTotal = document.querySelector(`.view-total-product-${id}`);
    
    if(!(inputQty.value <= 1))
    inputQty.value = Number(inputQty.value)-1;

    let result = totalProcduct(id,price, price_sale)
    viewTotal.innerHTML = formatCurrency(result);
}

// Hàm thực hiện submit form của trang product detail
function productDetailSubmit() {
    const detailForm = document.querySelector('.detail-product__form');
    detailForm.submit();
}

// Hàm tính tổng thành tiền của sản phẩm
function totalProcduct(id,price, price_sale) {
    let inputQty = document.querySelector(`.product-quanlity-${id}`);
    let total = 0;
    if(!price_sale) {
        total = Number(inputQty.value) * price;
    } else {
        total = Number(inputQty.value) * price_sale;
    }
    return total
}

// Hàm thực hiện định dạng tiền tệ sau khi tính thành tiền bằng js
function formatCurrency(numbers) {
    numbers = numbers.toString();
    result = [];
    num = 0
    for(let i = numbers.length-1; i>=0; i--) {
        num++;
        result.unshift(numbers.charAt(i));
        if(i!=0 &&num%3==0){
            result.unshift(',');
        }
    } 
    return result.join('')+'đ';
}

// Hàm tiến hành submit form-cart để update
function submitFormCart() {
    const formCart = document.querySelector('.form-cart-product')
    formCart.submit();
}