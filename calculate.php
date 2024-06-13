<!DOCTYPE html>
<html>
<head>
    <title>Calculation Results</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Product Selling Price Results</h2>
    <table border="1">
        <tr>
            <th>Product Name</th>
            <th>Buying Price</th>
            <th>VAT Amount</th>
            <th>Total General Expense</th>
            <th>Profit Margin</th>
            <th>Selling Price</th>
        </tr>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $products = $_POST['product'];

            foreach ($products as $product) {
                $name = htmlspecialchars($product['name']);
                $buying_price = floatval($product['buying_price']);
                $vat = floatval($product['vat']);
                $expenses = floatval($product['expenses']);
                $profit = floatval($product['profit']);

                // Calculate the VAT amount
                $vat_amount = $buying_price * ($vat / 100);

                // Calculate the total general expenses
                $total_expense = $buying_price * ($expenses / 100);

                // Calculate the profit margin
                $profit_margin = $buying_price * ($profit / 100);

                // Calculate the selling price
                $selling_price = $buying_price + $vat_amount + $total_expense + $profit_margin;

                echo "<tr>
                        <td>{$name}</td>
                        <td>{$buying_price}</td>
                        <td>{$vat_amount}</td>
                        <td>{$total_expense}</td>
                        <td>{$profit_margin}</td>
                        <td>{$selling_price}</td>
                      </tr>";
            }
        }
        ?>
    </table>
    <br>
    <a href="index.html" class="btn">Go Back</a>
</body>
</html>

