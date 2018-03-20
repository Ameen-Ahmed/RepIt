<?php
include('private/Bitpay/create_invoice.php');

$current_user = '3';



function initialize_cart($owner){
  global $current_user;
  $current_user = $owner;
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
  if($subtotal > 0){
    echo "<div class='feature-list'>";
    echo "<div class='row'>";
      echo "<div class='7u 12u(mobile)'>";
          echo "<p></p>";
      echo "</div>";
      echo "<div class='3u 12u(mobile)'>";
          echo "<font size=5 color='red'><b>Subtotal:</b> $$subtotal</font>";
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
                  if($item['itemStatus'] === 'Available')
                    echo "<font size=4 color='green'><b>Status:</b> $item[itemStatus]</font><br/>";
                  if($item['itemStatus'] === 'Unavailable')
                    echo "<font size=4 color='red'><b>Status:</b> $item[itemStatus]</font><br/>";

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
  return array($items, $subtotal);
}

function checkout_cart_items(){
  $retval = build_invoice();
  $retId = sendInvoice('order', 1234, $retval[0], $retval[1]);
  return $retId;
}



?>