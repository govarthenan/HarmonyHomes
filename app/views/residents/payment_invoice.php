<?php
include(APP_ROOT . '/views/inc/resident_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>" />
</head>

<body onload="randerDate()">
    <div class="main-content">
        <div class="finance-invoice-container">
            <div class="finance-invoice-container-border">
                <div class="invoice-heading">Invoice</div>
                <div class="invoice-container">
                    <div class="invoice-lable">
                        <div class="res_id_invoice">Residence ID </div>
                        <div class="elec_invoice">Electricity </div>
                        <div class="water_invoice">Water </div>
                        <div class="maintenance_invoice">Maintenance </div>
                        <div class="repair_invoice">Repair </div>
                    </div>
                    <div class="invoice-values">
                        <div class="res_id_value">: 1100</div>
                        <div class="elec_value">: 2500</div>
                        <div class="water_value">: 3400</div>
                        <div class="maintenance_value">: 4000</div>
                        <div class="repair_value">: 100000</div>
                    </div>
                </div>
                <div class="total-container">
                    <div class="total_invoice">Total </div>
                    <div class="total_value">: 200000</div>
                </div>

                <div class="send-container">
                    <button class="payButton-invoice">Pay</button>
                </div>
            </div>
        </div>
    </div>
</body>