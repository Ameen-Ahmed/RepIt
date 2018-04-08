<?php

if(isset($_SESSION['current_user_id'])){
  $current_user = $_SESSION['current_user_id'];
}
else{
  $current_user = 0;
}
$check_status = false;
$pending_invoice_id = '';

if(is_post_request()) {
  $s = get_user_carts($current_user);
  while($row=mysqli_fetch_array($s)){
    $item = $row['itemId'];
    if(isset($_POST['cart'.$item])){
      remove_item($item);
    }
  }
}



function initialize_cart(){
  global $current_user;
  $ret = find_user_by_id($current_user);
  //set_buyer_info($ret['first_name'], $ret['last_name'], $ret['email'], $ret['address'], $ret['city'], $ret['state'], $ret['zipcode'], 'US');
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
  $items = '';
  while($row=mysqli_fetch_array($s)){
    display_cart_item($row);
    $subtotal += ($row['itemPrice'] * $row['itemQuantity']);
    $items .= $row['itemName']. " Qty.". (string)$row['itemQuantity']. " | ";
  }
  $subtotal = number_format($subtotal, 2);
  //$bit_total = number_format($subtotal / getRate(), 6);
  if($subtotal > 0){
    echo "<div class='feature-list'>";
    echo "<div class='row'>";
      echo "<div class='7u 12u(mobile)'>";
          echo "<p></p>";
      echo "</div>";
      echo "<div class='3u 12u(mobile)'>";
          echo "<font size=5 color='red'><b>Subtotal:</b> $$subtotal</font></br>";
          // echo "<font size=5 color='orange'><b>BTC:</b> $bit_total</font>";
      echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<ul class='actions actions-centered'>";

    //set_buyer_info($ret['first_name'], $ret['last_name'], $ret['email'], $ret['address'], $ret['city'], $ret['state'], $ret['zipcode'], 'US');
    if(is_logged_in()){
      $ret = find_user_by_id($current_user);
      $bname = $ret['first_name'] . ' ' . $ret['last_name'];
      echo'  <form action="https://test.bitpay.com/checkout" method="post" >
      <input type="hidden" name="action" value="checkout" />
      <input type="hidden" name="posData" value="" />';
      echo "<input type='hidden' name='posData' value='' />";
      echo "<input type='hidden' name='redirectURL' value='http://localhost/RepIt/shopping_cart.php'/>";
      echo "<input type='hidden' name='price' value='$subtotal' />";
      echo "<input type='hidden' name='orderID' value='order' />";
      echo "<input type='hidden' name='itemDesc' value='$items' />";
      echo "<input type='hidden' name='physical' value='true' />";
      echo "<input type='hidden' name='buyerName' value='$bname' />";
      echo "<input type='hidden' name='buyerEmail' value='$ret[email]' />";
      echo "<input type='hidden' name='buyerAddress1' value='$ret[address]' />";
      echo "<input type='hidden' name='buyerCity' value='$ret[city]' />";
      echo "<input type='hidden' name='buyerState' value='$ret[state]' />";
      echo "<input type='hidden' name='buyerZip' value='$ret[zipcode]' />";
      echo "<input type='hidden' name='buyerCountry' value='US' />";
      echo '<input type="hidden" name="data" value="gMCfANQ3fR9Dp9/AcXVGU3rz0jk6v2r/59x1KJbd/poF14Jf10BGtgg3jZm2gTl33gU6i6MJqLV7Io20KXBuCRE1TBYYfx/cTOub4I7Ilfk=" />
      <input class="button style3" name="checkout" type="submit" value="Check Out" alt="BitPay, the easy way to pay with bitcoins." >
      </form>';
    }
    else{
      echo'  <form action="login.php" method="get" >
      <input class="button style3" name="checkout" type="submit" value="Check Out" alt="Login First" >
      </form>';
    }
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
                  echo "<font size=6><b><u>$item[itemName]</u></b></font><br/>";
                  echo "<font size=4><b>Seller:</b> $seller_info[username]</font><br/>";
                  echo "<font size=4><b>Size:</b> $item[itemSize]</font><br/>";
                  $uppercase_status = ucwords($item['itemStatus']);
                  if(strcasecmp($item['itemStatus'], 'Available') == 0)
                    echo "<font size=4 color='green'><b>Status: </b>$uppercase_status</font><br/>";
                  if(strcasecmp($item['itemStatus'], 'Unavailable') == 0)
                    echo "<font size=4 color='red'><b>Status: </b>$uppercase_status</font><br/>";

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




?>
