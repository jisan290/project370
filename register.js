const sellerbutton = document.getElementById('seller');
const customerbutton = document.getElementById('customer');


const sellerbox = document.getElementById('sellerbox');
const customerbox = document.getElementById('customerbox');


function forCustomer() {


    sellerbox.style.display = "none";
    customerbox.style.display = "block";


};

function forSeller() {

    sellerbox.style.display = "block";
    customerbox.style.display = "none";

};
