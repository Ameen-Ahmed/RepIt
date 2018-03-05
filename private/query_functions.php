<?php

// signups

function find_all_signups() {
    global $db;

    $sql = "SELECT * FROM siteusers ";
    //$sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_signup_by_id($id) {
    global $db;

    $sql = "SELECT * FROM siteusers ";
    $sql .= "WHERE id='" . db_escape($db,$id) . "'";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $signup = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $signup; // returns an assoc. array
}

function validate_signup($signup) {
    $errors = [];


    //First Name
    if(is_blank($signup['firstname'])) {
        $errors[] = "First Name cannot be left blank.";
    }
    elseif(!has_length($signup['firstname'], ['min' => 1, 'max' => 35])) {
        $errors[] = "First Name must be between 1 and 35 characters.";
    }
    elseif(!has_only_letters($signup['firstname'])){
        $errors[] = "First Name must only use letters";
    }

    //Last Name
    if(is_blank($signup['lastname'])) {
        $errors[] = "Last Name cannot be left blank.";
    }
    elseif(!has_length($signup['lastname'], ['min' => 1, 'max' => 35])) {
        $errors[] = "Last Name must be between 1 and 35 characters.";
    }
    elseif(!has_only_letters($signup['lastname'])){
        $errors[] = "Last Name must only use letters";
    }

    // Username
    if(is_blank($signup['username'])) {
        $errors[] = "Username cannot be left blank.";
    }
    elseif(!has_length($signup['username'], ['min' => 2, 'max' => 35])) {
        $errors[] = "Username must be between 2 and 35 characters.";
    }
    elseif(!has_unique_user_name($signup['username'], "0")){
         $errors[] = "Username must be unique.";
    }

    // Email
    if(is_blank($signup['email'])) {
        $errors[] = "Email cannot be left blank.";
    }
    elseif(!has_length($signup['email'], ['min' => 2, 'max' => 35])) {
        $errors[] = "Email must be between 2 and 35 characters.";
    }
    elseif(!has_valid_email_format($signup['email'])){
        $errors[] = "Email must be a valid email address.";
    }

    // Address
    if(is_blank($signup['address'])) {
        $errors[] = "Address cannot be left blank.";
    }
    elseif(!has_length($signup['address'], ['min' => 4, 'max' => 55])) {
        $errors[] = "Address must be between 4 and 55 characters.";
    }
    if(!has_valid_address_format($signup['address']) {
        $errors[] = "Address may contain no symbols except # and . ";
    }

    // City
    if(is_blank($signup['city'])) {
        $errors[] = "City cannot be left blank";
    }
    elseif(!has_length($signup['city'], ['min' => 2, 'max' => 20])) {
        $errors[] = "City must be between 2 and 20 characters";
    }
    if(!has_valid_address_format($signup['address']) {
        $errors[] = "City may contain no symbols except - ";
    }


    // State
    if(is_blank($signup['state'])) {
        $errors[] = "You must choose a state";
    }

    // Zipcode
    if(is_blank($signup['zipcode'])) {
        $errors[] = "Zipcode cannot be left blank.";
    }
    elseif(!has_length($signup['zipcode'], ['exactly' => 5])) {
        $errors[] = "Zipcode must be exactly 5 characters.";
    }
    if(!has_only_numbers){
        $errors[] = "Zipcodes may only have numbers.";
    }


    // Password
    if(is_blank($signup['password'])) {
        $errors[] = "Password cannot be left blank.";
    }
    elseif(!has_length($signup['password'], ['min' => 2, 'max' => 30])) {
        $errors[] = "Password must be between 2 and 30 characters.";
    }
    elseif(!has_password_match($signup['password'], $signup['confirm_password'])){
        $errors[] = "Both password fields must match.";
    }

    return $errors;
}


function insert_signup($signup) {
    global $db;

    $errors = validate_signup($signup);
    if(!empty($errors)) {
        return $errors;
    }
    $sql = "INSERT INTO siteusers ";
    $sql.= "(first_name, last_name, email, username, address, state, city, zipcode, password) ";
    $sql.= "VALUES (";
    $sql.= "'" . db_escape($db, $signup['firstname']) . "', ";
    $sql.= "'" . db_escape($db, $signup['lastname']) . "', ";
    $sql.= "'" . db_escape($db, $signup['email']) . "', ";
    $sql.= "'" . db_escape($db, $signup['username']) . "', ";
    $sql.= "'" . db_escape($db, $signup['address']) . "', ";
    $sql.= "'" . db_escape($db, $signup['state']) . "', ";
    $sql.= "'" . db_escape($db, $signup['city']) . "', ";
    $sql.= "'" . db_escape($db, $signup['zipcode']) . "', ";
    $sql.= "'" . password_hash(db_escape($db, $signup['password']), PASSWORD_DEFAULT) . "'";
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


function update_signup($signup) {
    global $db;

    $errors = validate_signup($signup);
    if(!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE signups SET ";
    $sql .= "menu_name='" . db_escape($db, $signup['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $signup['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $signup['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $signup['id']) . "' ";
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

function delete_signup($id) {
    global $db;

    $sql = "DELETE FROM signups ";
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


function find_all_state_abrr() {
    global $db;

    $sql = "SELECT state_abbr FROM states";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

