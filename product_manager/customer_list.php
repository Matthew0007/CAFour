<?php include '../view/header.php'; ?>
<main>

    <h1>Customer List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($customers as $customer) : ?>
        <tr>
            <td><?php echo $customer['customer_name']; ?></td>
            <td>
                <form id="delete_product_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_customer">
                    <input type="hidden" name="customer_id"
                           value="<?php echo $customer['customer_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Category</h2>
    <form id="add_customer_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_customer">

        <label>Name:</label>
        <input type="input" name="name">
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_products">List Products</a></p>

</main>
<?php include '../view/footer.php'; ?>