function payment_request(order, item, description, price, button) {
      button.value = "Loading...";
      $.ajax({
           type: "POST",
           url: 'ajax.php',
           data: {
             orderId : order,
             itemCode : item,
             itemDescription : description,
             itemPrice : price
           },
           success:function(data) {
             bitpay.setApiUrlPrefix("https://test.bitpay.com");
             bitpay.showInvoice(data);
             setTimeout(function() {button.value = "Buy Now";}, 3000);
           }
      });

 }
