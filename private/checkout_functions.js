

function pending(invoice_id) {
     $.ajax({
          type: "POST",
          url: "private/cart_functions.php",
          data: {
            check : invoice_id
          },
          success:function(data) {
            setInterval(function(){console.log(data); pending(invoice_id);}, 3000);
          }
     });
}
