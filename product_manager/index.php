<?php

require('../model/database.php');
require('../model/product_db.php');
require('../model/customer_db.php');
require('../model/category_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

if ($action == 'list_products') {
    // Get the current category ID
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    $customer_id = filter_input(INPUT_GET, 'customer_id', FILTER_VALIDATE_INT);


    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    if ($customer_id == NULL || $customer_id == FALSE) {
        $customer_id = 1;
    }

    // Get product and category data
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $customer_name = get_customers_name($customer_id);
    $customers = get_customers();
    $products = get_products_by_category($category_id);


    // Display the product list
    include('product_list.php');
} 
else if ($action == 'show_edit_form') {
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    if ($product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id.";
        include('../errors/error.php');
    } 
    
    else {
        $product = get_product($product_id);
        include('product_edit.php');
    }
} else if ($action == 'update_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    // Validate the inputs
    if ($product_id == NULL || $product_id == FALSE || $category_id == NULL ||
            $category_id == FALSE || $code == NULL || $name == NULL ||
            $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_product($product_id, $category_id, $code, $name, $price);

        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
    }
} 
else if ($action == 'update_customers') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $product_id_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $customer_name = filter_input(INPUT_POST, 'code');

    // Validate the inputs
    if ($product_id == NULL || $product_id == FALSE || $customer_id == NULL ||
            $customer_id == FALSE || $customer_name == NULL || $customer_name == FALSE) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_product($product_id, $category_id, $code, $name, $price);

        // Display the Customer List page for the current category
        header("Location: .?customer_id=$customer_id");
    }
}
else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else {
        delete_product($product_id);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('product_add.php');
} else if ($action == 'add_product') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if ($category_id == NULL || $category_id == FALSE || $code == NULL ||
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_product($category_id, $code, $name, $price);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('category_list.php');
} else if ($action == 'list_customers') {
    $customers = get_customers();
    include('customer_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} else if ($action == 'add_customers') {
    $name = filter_input(INPUT_POST, 'name');
    $id = filter_input(INPUT_POST, 'id');

    // Validate inputs
    if ($name == NULL || $id = NULL) {
        $id = 100;
        $name = "test";
        $error = "Invalid customer name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_customers($name, $id);
        header('Location: .?action=list_customers');  // display the Category List page
    }
} 
else if ($action == 'delete_customers') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    delete_customers($customers_id);
    header('Location: .?action=list_customers');      // display the Category List page
} 
else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
}
?>