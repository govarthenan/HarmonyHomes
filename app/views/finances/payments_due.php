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
                                <th>Aparment No.</th>
                                <th>Month</th>
                                <th>Payments</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($data['payments'] as $payment) : ?>
                                <?php
                                // calculate total, and whether row should be displayed
                                $payment_total = 0;

                                if (($payment->water > 0) && ($payment->water_paid == 0)) {
                                    $payment_total += $payment->water;
                                    $water_amount = $payment->water;
                                }

                                if (($payment->power > 0) && ($payment->power_paid == 0)) {
                                    $payment_total += $payment->power;
                                    $power_amount = $payment->power;
                                }

                                if (($payment->maintenance > 0) && ($payment->maintenance_paid == 0)) {
                                    $payment_total += $payment->maintenance;
                                    $maintenance_amount = $payment->maintenance;
                                }

                                if ($payment_total == 0) {
                                    continue;
                                }
                                ?>

                                <tr>
                                    <td><?php echo $payment->floor . '/' . $payment->door; ?></td>
                                    <td><?php echo $payment->month . '/' . $payment->year; ?></td>
                                    <!-- print payment items -->
                                    <td>
                                        <?php
                                        if (($payment->water > 0) && ($payment->water_paid == 0)) {
                                            echo 'Water: ' . $payment->water . ' Rs' . '<br>';
                                        }

                                        if (($payment->power > 0) && ($payment->power_paid == 0)) {
                                            echo 'Electricity: ' . $payment->power .  ' Rs' . '<br>';
                                        }

                                        if (($payment->maintenance > 0) && ($payment->maintenance_paid == 0)) {
                                            echo 'Maintenance: ' . $payment->maintenance .  ' Rs' . '<br>';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $payment_total . ' Rs'; ?></td>
                                    <td><button class="viewButton-up">View</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>


            <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>