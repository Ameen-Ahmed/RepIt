;function payment_request(order, item, description, price, button) {
    button.value = "Loading...";
    button.disabled = true;
    $.ajax({
         type: "POST",
         url: "invoice_creation.php",
         data: {
           orderId : order,
           itemCode : item,
           itemDescription : description,
           itemPrice : price
         },
         success:function(data) {
           bitpay.setApiUrlPrefix("https://test.bitpay.com");
           bitpay.showInvoice(data);
           setTimeout(function() {button.value = "Buy Now"; button.disabled = false;}, 3000);
         }
    });

 }

 function remove(item_id,button) {
     button.value = "Removing...";
     button.disabled = true;
     $.ajax({
          type: "POST",
          url: "private/test.php",
          data: {
            remove : item_id
          },
          success:function(data) {
            button.value = data;
          }
     });

  }
