<?php
include(APP_ROOT . '/views/inc/finance_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/finance_style.css'; ?>" />
</head>

<body onload="randerDate()">
    <div class="main-content">
        <div class="payment-overview-container-finance">
            <div class="payment-overview-heading">Payment Overview</div>
            <div class="payment-filter">
                <div class="topbar-payment-filter">
                    <a href="<?php echo URL_ROOT . '/finances/paymentsOverview' ?>">All</a>
                    <a href="<?php echo URL_ROOT . '/finances/paymentsDue' ?>">Up-Comming payments</a>
                    <a href="<?php echo URL_ROOT . '/finances/paymentsOverdue' ?>">Overdue payments</a>
                    <a href="<?php echo URL_ROOT . '/finances/paymentsLog' ?>">Payments log</a>
                </div>
            </div>
            <div id="all-payments-content" class="payment-details">
                <div class="payment-details-table-container">
                    <div class="table-body">
                        <table>
                            <tr class="payment-table-head">
                                <th>Payment ID</th>
                                <th>Resident ID</th>
                                <th>Date</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>S 2/4</td>
                                <td>2024.05.02</td>
                                <td>Maintenance fees</td>
                                <td><button class="viewButtonlog">View</button></td>


                            </tr>

                            <tr>
                                <td>1</td>
                                <td>S 2/4</td>
                                <td>2024.05.02</td>
                                <td>Maintenance fees</td>
                                <td><button class="viewButtonlog">View</button></td>


                            </tr>

                            <tr>
                                <td>1</td>
                                <td>S 2/4</td>
                                <td>2024.05.02</td>
                                <td>Maintenance fees</td>
                                <td><button class="viewButtonlog">View</button></td>


                            </tr>

                            <tr>
                                <td>1</td>
                                <td>S 2/4</td>
                                <td>2024.05.02</td>
                                <td>Maintenance fees</td>
                                <td><button class="viewButtonlog">View</button></td>


                            </tr>

                            <tr>
                                <td>1</td>
                                <td>S 2/4</td>
                                <td>2024.05.02</td>
                                <td>Maintenance fees</td>
                                <td><button class="viewButtonlog">View</button></td>


                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>