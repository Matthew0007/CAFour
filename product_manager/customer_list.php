<?php include '../view/header.php'; ?>
<main>

    <h1>Customer List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Product ID</th>

        </tr>
        <?php foreach ($customers as $customer) : ?>
        <tr>
            <td><?php echo $customer['customer_name']; ?></td>
            <td><?php echo $customer['productID']; ?> </td>
            <td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_formm">
                    <input type="hidden" name="product_id"
                           value="<?php echo $customer['productID']; ?>">
                    <input type="hidden" name="customer_id"
                           value="<?php echo $customer['customer_id']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <form id="delete_product_form" action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_customers">
                    <input type="hidden" name="customer_id" value="<?php echo $customer['customer_id']; ?>">
                    
<!--                    <input type="submit" value="Delete">-->
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

<!--    <h2>Add Customer</h2>
    <form id="add_customer_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_customers">

        <label>Name:</label>
        <input type="input" name="name">
        <label>id:</label>
        <input type="input" name="id">
        <input type="submit" value="Add">
    </form>-->

    <p><a href="index.php?action=list_products">List Products</a></p>

</main>
<?php include '../view/footer.php'; ?>
