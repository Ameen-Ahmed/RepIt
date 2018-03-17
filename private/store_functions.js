
function add_to_cart(item_info, button) {
    button.value = "Adding...";
    button.disabled = true;
    $.ajax({
         type: "POST",
         url: "private/test.php",
         data: {
           add_item : item_info
         },
         success:function(data) {
           button.value = "Added to Cart";
         }
    });

 }
