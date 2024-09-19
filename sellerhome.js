const dashboard_button = document.getElementById('glowD');
const add_products_button = document.getElementById('glowp');


const dashboard_box = document.getElementById('dashboard_box');
const add_products_box = document.getElementById('add_products_box');
const view_products_box = document.getElementById('products');
const upload_p_box = document.getElementById('upload-form');
const account_info_box = document.getElementById('account-info');
const account_edit_box = document.getElementById('edit-form');
const stock_out_box = document.getElementById('stockout-products');
const view_orders_box = document.getElementById('ordered-products');

function toAddproducts() {
    dashboard_box.style.display = "none";
    upload_p_box.style.display = "none";
    view_products_box.style.display = "none";
    view_orders_box.style.display = "none";
    account_info_box.style.display = "none";
    stock_out_box.style.display = "none";
    account_edit_box.style.display = 'none';
    add_products_box.style.display = "block";



}
function toDashboard() {

    add_products_box.style.display = "none";
    upload_p_box.style.display = "none";
    view_products_box.style.display = "none";
    account_info_box.style.display = "none";
    account_edit_box.style.display = 'none';
    stock_out_box.style.display = "none";
    view_orders_box.style.display = "none";
    dashboard_box.style.display = "block";
}
function toViewproducts() {
    account_edit_box.style.display = 'none';
    add_products_box.style.display = "none";
    upload_p_box.style.display = "none";
    dashboard_box.style.display = "none";
    account_info_box.style.display = "none";
    stock_out_box.style.display = "none";
    view_orders_box.style.display = "none";
    view_products_box.style.display = "block";

}
function toUploadpp() {
    add_products_box.style.display = "none";
    account_info_box.style.display = "none";
    dashboard_box.style.display = "none";
    view_products_box.style.display = "none";
    stock_out_box.style.display = "none";
    account_edit_box.style.display = 'none';
    view_orders_box.style.display = "none";

    upload_p_box.style.display = "block";



}

function toAccountinfo() {
    add_products_box.style.display = "none";
    account_edit_box.style.display = 'none';
    dashboard_box.style.display = "none";
    view_products_box.style.display = "none";
    upload_p_box.style.display = "none";
    stock_out_box.style.display = "none";
    view_orders_box.style.display = "none";

    account_info_box.style.display = "block";

}

function toStockoutProducts() {
    add_products_box.style.display = "none";

    dashboard_box.style.display = "none";
    view_products_box.style.display = "none";
    upload_p_box.style.display = "none";
    account_info_box.style.display = "none";
    view_orders_box.style.display = "none";
    stock_out_box.style.display = "block";



}


function toViewOrders() {
    add_products_box.style.display = "none";

    dashboard_box.style.display = "none";
    view_products_box.style.display = "none";
    upload_p_box.style.display = "none";
    account_info_box.style.display = "none";
    stock_out_box.style.display = "none";
    view_orders_box.style.display = "block";



}

function toggleEditForm() {
    if (account_info_box.style.display === 'none') {
        account_info_box.style.display = 'block';
        account_edit_box.style.display = 'none';
    } else {
        account_info_box.style.display = 'none';
        account_edit_box.style.display = 'block';




        document.getElementById('edit-name').value = document.getElementById('profile-name').textContent;

        document.getElementById('edit-email').value = document.getElementById('profile-email').textContent;
        document.getElementById('edit-password').value = '';
        document.getElementById('edit-phone').value = document.getElementById('profile-phone').textContent;
        document.getElementById('edit-address').value = document.getElementById('profile-address').textContent;

    }





}
let count = 0;
function update_ra() {

    count++
    document.getElementById('ra').textContent = `[${count}]`;
    setTimeout(() => {
        document.getElementById('ra').textContent = `[0]`;


    }, 900000);


}
let stock_state = document.getElementById('stock-value').innerHTML;

if (stock_state !== '0') {
    setInterval(toggleColor, 500);


} else {
    clearInterval;
}

const textElement = document.getElementById('stock-value');
let isRed = true;


function toggleColor() {
    if (isRed) {
        textElement.style.color = 'white';
    } else {
        textElement.style.color = 'red';
    }
    isRed = !isRed;
}









var div = document.getElementById('profileimage');


var hasImage = div.querySelector('img') !== null;

// if (!hasImage) {
//     var formHtml = `
//         <form method="POST" enctype="multipart/form-data">
//             <input type="file" name="image" />
//             <button type="submit" class="ppsubmit" name="submit">Submit</button>
//         </form>
//     `;


//     div.innerHTML = formHtml;
//     div.style.paddingTop = '35px';
//     div.style.paddingRight = '15px';
//     div.style.paddingBottom = '20px';
//     div.style.paddingLeft = '25px';
// }
