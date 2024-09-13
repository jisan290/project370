const dashboard_button = document.getElementById('glowD');
const add_products_button = document.getElementById('glowp');


const dashboard_box = document.getElementById('dashboard_box');
const add_products_box = document.getElementById('add_products_box');


function toAddproducts() {
    dashboard_box.style.display = "none";
    add_products_box.style.display = "block";



}
function toDashboard() {
    add_products_box.style.display = "none";
    dashboard_box.style.display = "block";
}