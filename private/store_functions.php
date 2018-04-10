<?php require_once('private/cart_functions.php');

if(is_post_request()) {
  $results = get_available_store_items();
  while($row=mysqli_fetch_array($results)){
    $item = $row['itemId'];
    if(isset($_POST['item'.$item])){
      add_item($item);
    }
  }
}

function populate_store(){
  global $current_user;
  $results = get_available_store_items();
  $num_elements = mysqli_num_rows($results);
  if($num_elements >= 3){
    $num_elements = 3;
  }
  echo "<form method='post' action='#'>";
    echo "<div class='row 150%'>";
    getRate();
    while($row=mysqli_fetch_array($results)){
      display_store_item($row, $num_elements);
    }
    echo "</div>";
  echo "</form>";
}

function display_store_item($item, $num){
  $btc_price = number_format(($item['itemPrice'] / $GLOBALS['rate']),6);
  echo "<div class='". (12/$num) . "u 12u(mobile)'>";
    echo "<section class='highlight'>";
    echo "<div id='clickables$item[itemId]'>";
      echo "<div id='itemClick$item[itemId]' onclick='dynamicEvent($item[itemId])'><a href='javascript:void(0);' class='image featured'><img src='$item[itemPath]' alt='$item[itemName]' title='$item[itemName]'></a></div>";
      echo "<div id='itemClick$item[itemId]' onclick='dynamicEvent($item[itemId])'> <font size=5><b><h3 id='myItemName'><a href='javascript:void(0);'>$item[itemName]</a></h3></b></font></div>";
      echo "<h5>Price: <font color='red'>$$item[itemPrice]</font></h5>";
      echo "<h5>BTC: <font color='orange'>$btc_price</font></h5>";
      echo "<br />";
      echo "<input class='button style1' name='item$item[itemId]' type='submit' value='Add to Cart'></input>";
      echo '';
    echo "</div>";
    echo "</section>";
  echo "</div>";
  echo"<div id='myModal$item[itemId]' class='modal'>";
  echo '    <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" style="color:#e97770">&times;</span>';
  echo "      <h2 style='color:black'>$item[itemName]</h2>";
  echo ' </div>
        <div class="modal-body">
          <div class="grid-container">';

    echo"        <div class='pic'><img src='$item[itemPath]' style='width:175px'></div>";
    echo"        <div class='info'>
                  Seller: <font color='black'>$item[username]</font> </br></br>
                  Price: <font color='red'>$$item[itemPrice]</font> </br></br>
                  BTC: <font color='orange'>$btc_price</font> </br></br>
                  Size: <font color='grey'>$item[itemSize]</font> </br></br>
                  Condition: <font color='black'>$item[itemCondition]</font> </div>";
    echo"        <div class='desc'><p>Details: <font color='black'>$item[itemDescription]</font> </p></div>";
    echo '     </div>
        </div>
        <div class="modal-footer">
          </br></br>
        </div>
      </div>
    </div>';
}

?>
