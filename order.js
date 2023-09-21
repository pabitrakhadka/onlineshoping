

const buttons = document.querySelectorAll('.shop_btn');
buttons.forEach(element => {
    element.addEventListener("click", function (e) {
        location.href = 'checkUser.php' + `?id=${e.target.getAttribute("data-id")}`;
    })
});

const edit = document.querySelectorAll('.edit_product');
edit.forEach(element => {

    element.addEventListener('click', function (e) {
        location.href = '/project/project/admin/editproduct.php' + `?id=${e.target.getAttribute('data-product_id')}`
    })
})