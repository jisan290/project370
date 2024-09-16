const dashboard_button = document.getElementById('glowD');
const add_products_button = document.getElementById('glowp');


const dashboard_box = document.getElementById('dashboard_box');
const add_products_box = document.getElementById('add_products_box');
const view_products_box = document.getElementById('products');
const upload_p_box = document.getElementById('upload-form');

function toAddproducts() {
    dashboard_box.style.display = "none";
    upload_p_box.style.display = "none";
    view_products_box.style.display = "none";
    add_products_box.style.display = "block";



}
function toDashboard() {

    add_products_box.style.display = "none";
    upload_p_box.style.display = "none";
    view_products_box.style.display = "none";

    dashboard_box.style.display = "block";
}
function toViewproducts() {

    add_products_box.style.display = "none";
    upload_p_box.style.display = "none";
    dashboard_box.style.display = "none";
    view_products_box.style.display = "block";

}
function toUploadpp() {
    add_products_box.style.display = "none";
    dashboard_box.style.display = "none";
    view_products_box.style.display = "none";
    upload_p_box.style.display = "block";


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
