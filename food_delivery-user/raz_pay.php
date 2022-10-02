<button>Pay</button>
<button>Don't Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_d90TgNSDwHNbwJ", // Enter the Key ID generated from the Dashboard
    "amount": "5000000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    // "order_id": "order_Ef80WJDPBmAeNt", //Pass the `id` obtained in the previous step
    "account_id": "acc_Ef7ArAsdU5t0XL",
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
