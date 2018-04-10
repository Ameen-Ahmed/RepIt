<?php require_once("private/initialize.php");
require_login();

if(is_post_request()) {
    $errors= [];
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $tmp = explode('.', $file_name);

    if($file_size > 2097152) {
        $errors[]='File size must be less than 2 MB';
    }

    if(empty($errors)) {
        move_uploaded_file($file_tmp, "images/" . $file_name);
    }
    else {
        print_r($errors);
    }
    $item = [];
    $item['owner_id'] = $_SESSION['user_id'];
    $item['name'] = $_POST['name'] ?? '';
    $item['price'] = $_POST['price'] ?? '';
    $item['size'] = $_POST['size'] ?? '';
    $item['status'] = $_POST['status'] ?? '';
    $item['description'] = $_POST['description'] ?? '';
    $item['item_condition'] = $_POST['item_condition'] ?? '';
    $item['file_path'] = 'images/' . $file_name;

    $result = insert_item($item);

    if($result === true) {
        echo "HERE";
        $item['id'] = mysqli_insert_id($db);
        redirect_to(url_for('membership.php'));

    }
    else{
        $errors = $result;
    }

} else {
    $item['owner_id'] = '';
    $item['name'] = '';
    $item['price'] = '';
    $item['size'] = '';
    $item['status'] = '';
    $item['description'] = '';
    $item['item_condition'] = '';
    $item['file_path'] = '';

}

$page_title = 'Add Item';
?>

<?php include_once('private/shared/header.php');?>
<head>
    <title>$page_title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body class="homepage">
    <div id="page-wrapper">
        <!-- Header -->
        <div id="header-wrapper" class="wrapper">
            <div id="header">
                <!-- Nav -->
                <?php include_once('private/shared/navigation.php');?>

                <span style="color:red; font-size:1.2em;"><?php echo display_errors($errors)?></span>
                <!-- Footer -->
                <div id="footer-wrapper" class="wrapper">
                    <div class="title"><font size=5>Add Item</font></div>
                    <div id="footer" class="container">
                        <div class="row 150%">
                            <div class="2u 12u(mobile)">

                            </div>
                            <div class="8u 12u(mobile)">
                                <!-- Contact Form -->
                                <section>
                                    <form method="post" action="new_item.php" enctype = "multipart/form-data">
                                        <div class="row 50%">
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="name" id="name" placeholder="Name" value="<?php echo h($item['name']); ?>" />
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="price" id="price" placeholder="Price" value="<?php echo h($item['price']); ?>" />
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="size" id="size" placeholder="Size" value="<?php echo h($item['size']); ?>" />
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="item_condition" id="item_condition" placeholder="Item Condition" value="<?php echo h($item['item_condition']); ?>" />
                                            </div>
                                            <div class="12u 12u(mobile)">
                                                <textarea type="text" name="description" id="description" placeholder=" Item Description" value="<?php echo h($item['description']); ?>" ></textarea>
                                            </div>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                                            <label>Upload Item Image:</label>
                                            <input type = "file" name = "image" />
                                        </div>
                                        <div class="row">
                                            <div class="12u">
                                                <ul class="actions">
                                                    <li><input type="submit" class="style1" value="Add" /></li>
                                                    <li><input type="reset" class="style2" value="Cancel" /></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <?php require_once('private/shared/footer.php');?>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/skel-viewport.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
</body>
</html>
