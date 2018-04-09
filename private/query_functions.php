<?php

// Users ---------------------------------------------------------------

function find_all_users() {
    global $db;

    $sql = "SELECT * FROM siteusers ";
    //$sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_user_by_id($id) {
    global $db;

    $sql = "SELECT * FROM siteusers ";
    $sql .= "WHERE id='" . db_escape($db,$id) . "'";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user; // returns an assoc. array
}

function find_user_by_username($username) {
    global $db;

    $sql = "SELECT * FROM siteusers ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
}

function validate_user($user) {
    $errors = [];


    //First Name
    if(is_blank($user['firstname'])) {
        $errors[] = "First Name cannot be left blank.";
    }
    elseif(!has_length($user['firstname'], ['min' => 1, 'max' => 35])) {
        $errors[] = "First Name must be between 1 and 35 characters.";
    }
    elseif(!has_only_letters($user['firstname'])){
        $errors[] = "First Name must only use letters";
    }

    //Last Name
    if(is_blank($user['lastname'])) {
        $errors[] = "Last Name cannot be left blank.";
    }
    elseif(!has_length($user['lastname'], ['min' => 1, 'max' => 35])) {
        $errors[] = "Last Name must be between 1 and 35 characters.";
    }
    elseif(!has_only_letters($user['lastname'])){
        $errors[] = "Last Name must only use letters";
    }

    // Username
    if(is_blank($user['username'])) {
        $errors[] = "Username cannot be left blank.";
    }
    elseif(!has_length($user['username'], ['min' => 2, 'max' => 35])) {
        $errors[] = "Username must be between 2 and 35 characters.";
    }
    elseif(!has_unique_user_name($user['username'], "0")){
        $errors[] = "Username must be unique.";
    }

    // Email
    if(is_blank($user['email'])) {
        $errors[] = "Email cannot be left blank.";
    }
    elseif(!has_length($user['email'], ['min' => 2, 'max' => 35])) {
        $errors[] = "Email must be between 2 and 35 characters.";
    }
    elseif(!has_valid_email_format($user['email'])){
        $errors[] = "Email must be a valid email address.";
    }

    // Address
    if(is_blank($user['address'])) {
        $errors[] = "Address cannot be left blank.";
    }
    elseif(!has_length($user['address'], ['min' => 4, 'max' => 55])) {
        $errors[] = "Address must be between 4 and 55 characters.";
    }
    if(!has_valid_address_format($user['address'])) {
        $errors[] = "Address may contain no symbols except # and . ";
    }

    // City
    if(is_blank($user['city'])) {
        $errors[] = "City cannot be left blank";
    }
    elseif(!has_length($user['city'], ['min' => 2, 'max' => 20])) {
        $errors[] = "City must be between 2 and 20 characters";
    }
    if(!has_valid_city_format($user['city'])) {
        $errors[] = "City may contain no symbols except - ";
    }


    // State
    if(is_blank($user['state'])) {
        $errors[] = "You must choose a state";
    }

    // Zipcode
    if(is_blank($user['zipcode'])) {
        $errors[] = "Zipcode cannot be left blank.";
    }
    elseif(!has_length($user['zipcode'], ['exactly' => 5])) {
        $errors[] = "Zipcode must be exactly 5 characters.";
    }
    if(!has_only_numbers($user['zipcode'])){
        $errors[] = "Zipcodes may only have numbers.";
    }


    // Password
    if(is_blank($user['password'])) {
        $errors[] = "Password cannot be left blank.";
    }
    elseif(!has_length($user['password'], ['min' => 2, 'max' => 30])) {
        $errors[] = "Password must be between 2 and 30 characters.";
    }
    elseif(!has_password_match($user['password'], $user['confirm_password'])){
        $errors[] = "Both password fields must match.";
    }

    return $errors;
}


function insert_user($user) {
    global $db;

    $errors = validate_user($user);
    if(!empty($errors)) {
        return $errors;
    }
    $sql = "INSERT INTO siteusers ";
    $sql.= "(first_name, last_name, email, username, address, state, city, zipcode, password) ";
    $sql.= "VALUES (";
    $sql.= "'" . db_escape($db, $user['firstname']) . "', ";
    $sql.= "'" . db_escape($db, $user['lastname']) . "', ";
    $sql.= "'" . db_escape($db, $user['email']) . "', ";
    $sql.= "'" . db_escape($db, $user['username']) . "', ";
    $sql.= "'" . db_escape($db, $user['address']) . "', ";
    $sql.= "'" . db_escape($db, $user['state']) . "', ";
    $sql.= "'" . db_escape($db, $user['city']) . "', ";
    $sql.= "'" . db_escape($db, $user['zipcode']) . "', ";
    $sql.= "'" . password_hash(db_escape($db, $user['password']), PASSWORD_DEFAULT) . "'";
    $sql.= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_user($user) {
    global $db;

    $errors = validate_user($user);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE users SET ";
    $sql .= "menu_name='" . db_escape($db, $user['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $user['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $user['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $user['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function delete_user($id) {
    global $db;

    $sql = "DELETE FROM siteusers ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


// States ------------------------------------------------------------------------

function find_all_state_abrr() {
    global $db;

    $sql = "SELECT state_abbr FROM states";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

// Store -------------------------------------------------------------------------

function get_available_store_items() {
    global $db;
    $sql = "SELECT siteusers.username AS username,
    siteproducts.description AS itemDescription, siteproducts.status AS itemStatus,
    siteproducts.price AS itemPrice, siteproducts.name AS itemName,
    siteproducts.owner_id AS seller,siteproducts.file_path AS itemPath,
    siteproducts.item_id AS itemId, siteproducts.item_condition AS itemCondition,
    siteproducts.size AS itemSize
    FROM siteproducts ";
    $sql .= "INNER JOIN siteusers ON siteproducts.owner_id = siteusers.id ";
    $sql .= "WHERE LOWER(status) =LOWER('Available') ";
    //die(mysqli_error($db));

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function get_items_by_user_id($id, $type){
    global $db;
    $sql = "SELECT * FROM siteproducts ";
    if ($type == "Seller"){
        $sql.= "WHERE owner_id = '" . $id . "'";
    }
    else if($type == "Buyer"){
        $sql.= "WHERE buyer = '" . $id . "'";
    }

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}


// Carts -------------------------------------------------------------------------------

function get_user_carts($user_id) {
    global $db;
    $sql = "SELECT usercarts.quantity AS itemQuantity, siteusers.username AS username,
    siteproducts.description AS itemDescription, siteproducts.status AS itemStatus,
    siteproducts.price AS itemPrice, siteproducts.name AS itemName,
    siteproducts.owner_id AS seller,siteproducts.file_path AS itemPath,
    siteproducts.item_id AS itemId, siteproducts.item_condition AS itemCondition,
    siteproducts.size AS itemSize 
    FROM usercarts ";
    $sql .= "INNER JOIN siteusers ON usercarts.user_id = siteusers.id ";
    $sql .= "INNER JOIN siteproducts ON usercarts.item_id = siteproducts.item_id ";
    $sql .= "WHERE siteusers.id = '" . db_escape($db,$user_id) . "'";
    //die(mysqli_error($db));

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result; // returns an assoc. array
}

function delete_cart_item($user_id, $item_id) {
    global $db;

    $sql = "DELETE FROM usercarts ";
    $sql .= "WHERE user_id='" . db_escape($db, $user_id) . "' AND item_id='" . db_escape($db, $item_id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function insert_cart_item($user_id, $item_id) {
    global $db;


    $sql = "INSERT INTO usercarts ";
    $sql.= "(user_id, item_id, quantity)";
    $sql.= "VALUES ('" . db_escape($db, $user_id) . "', '" . db_escape($db, $item_id) . "', 1)";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_cart_item($user_id,$item_id) {
    global $db;


    $sql = "UPDATE usercarts SET ";
    $sql .= "quantity = quantity + 1 ";
    $sql .= "WHERE user_id ='" . db_escape($db, $user_id) . "' AND item_id = '" . db_escape($db, $item_id) . "'";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function item_in_cart($user_id, $item_id){
  global $db;
  $sql = "SELECT 1 FROM usercarts WHERE user_id = $user_id AND item_id = $item_id";
  //$sql .= "WHERE user_id ='" . db_escape($db, $user_id) . "' AND item_id = '" . db_escape($db, $item_id) . "'";

  $result = mysqli_query($db, $sql);
  // For UPDATE statements, $result is true/false
  if($result && mysqli_num_rows($result) > 0) {
      return true;
  }
  else {
      return false;
  }
}
