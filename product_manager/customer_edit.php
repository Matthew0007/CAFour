<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Customer</h1>
    <form action="index.php" method="post" id="add_customer_form">

        <input type="hidden" name="action" value="update_customers">

        <input type="hidden" name="customer_id"
               value="<?php echo $customers['customer_id']; ?>">

        <label>Customer_name:</label>
        <input type="customer_id" name="customer_name"
               value="<?php echo $customers['customer_name']; ?>">
        <br>

        <label>Product ID:</label>
        <input type="input" name="product_id"
               value="<?php echo $customers['productID']; ?>">
        <br>
        

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_products">View Product List</a></p>

</main>
<?php include '../view/footer.php'; ?>