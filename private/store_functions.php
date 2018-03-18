<?php require_once('private/cart_functions.php');
    initialize_cart('3');

if(is_post_request()) {
  $results = get_available_store_items();
  while($row=mysqli_fetch_array($results)){
    $item = $row['item_id'];
    if(isset($_POST['item'.$item])){
      add_item($item);
    }
  }
}


function populate_store(){
  global $current_user;
  $results = get_available_store_items();
  echo "<form method='post' action='#'>";
    echo "<div class='row 150%'>";
      while($row=mysqli_fetch_array($results)){
        display_store_item($row);
      }
    echo "</div>";
  echo "</form>";
}


function display_store_item($item){
  echo "<div class='4u 12u(mobile)'>";
    echo "<section class='highlight'>";
      echo "<a href='#' class='image featured'><img src='$item[file_path]' alt=''></a>";
      echo "<h3><a href='#'>$item[name]</a></h3>";
      echo "<h5>Price: $$item[price]</h5>";
      echo "<br />";
      echo "<input class='button style1' name='item$item[item_id]' type='submit' value='Add to Cart'></input>";
    echo "</section>";
  echo "</div>";
}

?>
