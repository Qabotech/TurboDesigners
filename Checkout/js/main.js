
var total =
paypal.Buttons({
    style: {
        color: 'blue'
    },
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: x
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            $('#Place').trigger("click");
        })
    },
    onCancel: function(data) {
        window.location.replace("../Checkout")
    }
}).render('#paypal-payment-button');

