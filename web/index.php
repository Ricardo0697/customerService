<?php

require_once __DIR__.'/../vendor/autoload.php';

use model\Customer;

?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Customers</title>
    <meta name="description" content="Add and show customers">
</head>

<body>
    <div id="pageload">
        <?= 'Page loaded at '.date('Y-m-d H:i:s').substr((string) microtime(), 1, 8) ?>
    </div>

    <h2>Add Customer</h2>

    <form id="add_customer_form" action="/customer/create.php" method="post">
        <fieldset>
            <legend>Name:</legend>

            <label for="firstName">First:</label>
            <input id="firstName" type="text" name="firstName" placeholder="First Name"/>
        </fieldset>

        <fieldset>
            <label for="lastName">Last:</label>
            <input id="lastName" type="text" name="lastName" placeholder="Last Name"/>
        </fieldset>

        <fieldset>
            <label for="phone">Phone:</label>
            <input id="phone" type="text" name="phone" placeholder="Phone"/>
        </fieldset>

        <fieldset>
            <label for="address">Address</label>
            <textarea id="address" name="address" placeholder="Address"></textarea>
        </fieldset>

        <input type="submit" value="Add"/>
    </form>
    <hr/>
    <h2>Show Customers</h2>

    <div>
        <table id="customers">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>&nbsp;</th>
                <tr>
            </thead>
            <tbody>
                <?php foreach (Customer::findAll() as $customer) { ?>
                    <?php if (count($customer->addresses()) === 0) { ?>
                        <?php echo "\n" ?>
                        <tr> 
                            <td><?= $customer->firstName ?></td>
                            <td><?= $customer->lastName ?></td>
                            <td><?= $customer->phone ?></td>
                            <td></td>
                            <td>
                                <button>Delete User</button>
                            </td>
                        </tr>
                    <?php } else { ?>
                        <?php foreach ($customer->addresses() as $address) { ?>
                            <?php echo "\n" ?>
                            <tr>
                                <td><?= $customer->firstName ?></td>
                                <td><?= $customer->lastName ?></td>
                                <td><?= $customer->phone ?></td>
                                <td><?= $address->address ?></td>
                                <td>
                                    <button>Delete User</button>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/js/customers.js"></script>
</body>
</html>