<?php
include('private/Bitpay/create_invoice.php');

if(isset($_SESSION['current_user_id'])){
  $current_user = $_SESSION['current_user_id'];
}
else{
  $current_user = 0;
}
$check_status = false;
$pending_invoice_id = '';

if(is_post_request()) {
  if(isset($_POST['checkout'])){
    $invoice_ret = checkout_cart_items();
    $invoice_id = $invoice_ret->getId();
    echo "<script> bitpay.setApiUrlPrefix('https://test.bitpay.com');";
    echo "bitpay.showInvoice('$invoice_id');";
    echo "</script>";
    $pending_payment = true;
    $pending_id = $invoice_id;
    $ret = find_user_by_id($current_user);
    $buyername = $ret['first_name'] . " " . $ret['last_name'];
    $buyeremail = $ret['email'];
?>
    <script type="text/javascript">
        pending("<?php echo $pending_id;?>", "<?php echo $buyername;?>", "<?php echo $buyeremail;?>");
    </script>
<?php
  }
  else{
    $s = get_user_carts($current_user);
    while($row=mysqli_fetch_array($s)){
      $item = $row['itemId'];
      if(isset($_POST['cart'.$item])){
        remove_item($item);
      }
    }
  }

}



function initialize_cart(){
  global $current_user;
  $ret = find_user_by_id($current_user);
  set_buyer_info($ret['first_name'], $ret['last_name'], $ret['email'], $ret['address'], $ret['city'], $ret['state'], $ret['zipcode'], 'US');
}

function add_item($item){
  global $current_user;
  $incart = false;
  $s = get_user_carts($current_user);
  $incart = item_in_cart($current_user, $item);

  if(!$incart){
    insert_cart_item($current_user, $item);
  }
  else{
    update_cart_item($current_user, $item);

  }

}


function remove_item($item_id){
  global $current_user;
  delete_cart_item($current_user, $item_id);
}

function populate_cart(){
  global $current_user;
  $s = get_user_carts($current_user);
  $subtotal = 0;
  while($row=mysqli_fetch_array($s)){
    display_cart_item($row);
    $subtotal += ($row['itemPrice'] * $row['itemQuantity']);
  }
  $subtotal = number_format($subtotal, 2);
  $bit_total = number_format($subtotal / getRate(), 6);
  if($subtotal > 0){
    echo "<div class='feature-list'>";
    echo "<div class='row'>";
      echo "<div class='7u 12u(mobile)'>";
          echo "<p></p>";
      echo "</div>";
      echo "<div class='3u 12u(mobile)'>";
          echo "<font size=5 color='red'><b>Subtotal:</b> $$subtotal</font></br>";
          echo "<font size=5 color='orange'><b>BTC:</b> $bit_total</font>";
      echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<ul class='actions actions-centered'>";
    echo "<form method='post' action='#'>";
      echo "<input class='button style3' name='checkout' type='submit' id='checkout_button' value='Check Out'></input>";
    echo "</form>";
  }
  else{
    echo "<p align='center'><font size=5 color='lightgrey'><b>Your Cart Is Empty.</b> </font></p>";
  }

}


function display_cart_item($item){
  $seller_info = find_user_by_id($item['seller']);
  // echo "<div class='cart-border'>";
    echo "<div class='feature-list'>";

                echo "<div class='row'>";
              echo "<div class='3u 12u(mobile)'>";
                  echo "<img src='$item[itemPath]' alt='' style=width:200px>";
              echo "</div>";

              echo "<div class='4u 12u(mobile)'>";
                  echo "<font size=6><b> $item[itemName]</b></font><br/>";
                  echo "<font size=5><b>Seller:</b> $seller_info[username]</font><br/>";
                  $uppercase_status = ucwords($item['itemStatus']);
                  if(strcasecmp($item['itemStatus'], 'Available') == 0)
                    echo "<font size=4 color='green'><b>Status:</b>$uppercase_status</font><br/>";
                  if(strcasecmp($item['itemStatus'], 'Unavailable') == 0)
                    echo "<font size=4 color='red'><b>Status:</b>$uppercase_status</font><br/>";

              echo "</div>";

              echo "<div class='3u 12u(mobile)'>";
                  echo "<font size=5 color='red'><b>Price:</b> $$item[itemPrice]</font><br/>";
                  echo "<font size=5 color='grey'><b>Qty:</b> $item[itemQuantity]</font><br/><br/>";
                  echo "<form method='post' action='#'>";
                    echo "<input class='button style1' name='cart$item[itemId]' type='submit' value='Remove'></input>";
                  echo "</form>";
              echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
              echo "<div class='12u 12u(mobile)'>";
              echo "<section>";

              echo "</section>";
              echo "</div>";
            echo "</div>";


    echo "</div>";
  //echo "</div>";
}

function build_invoice(){
  global $current_user;
  $s = get_user_carts($current_user);
  $subtotal = 0;
  $items = '';
  while($row=mysqli_fetch_array($s)){
    $items .= $row['itemName']. " Qty.". (string)$row['itemQuantity']. " | ";
    $subtotal += ($row['itemPrice'] * $row['itemQuantity']);
  }
  $ret = find_user_by_id($current_user);
  set_buyer_info($ret['first_name'], $ret['last_name'], $ret['email'], $ret['address'], $ret['city'], $ret['state'], $ret['zipcode'], 'US');
  set_item_info(1234, $items, $subtotal);
}

function checkout_cart_items(){
  if(is_logged_in()){
    build_invoice();
    $retId = sendInvoice('order');
    return $retId;
  }
  else{
    redirect_to("login.php");
  }
}



?>
