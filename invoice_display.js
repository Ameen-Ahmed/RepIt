function payment_request(order, item, description, price) {
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
           }
      });
 }
