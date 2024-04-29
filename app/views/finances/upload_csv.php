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
        <div class="billing-container-finance">
            <?php
            // call all flash messages
            flash('error_csv_only_accepted');
            flash('error_invalid_month');
            flash('error_invalid_year');
            flash('error_invalid_billing_type');
            flash('error_missing_column');
            flash('error_csv_parsing');
            flash('csv_record_success');
            flash('csv_record_error');
            flash('error_csv_record');
            flash('error_csv_record_exists');
            ?>

            <div class="billing-heading">Issue monthly bills</div>
            <div class="billing-container">

                <!-- water form -->
                <div class="elec-container">
                    <form enctype="multipart/form-data" action="<?php echo URL_ROOT . '/finances/csvUpload' ?>" method="POST">
                        <div class="water-cont">
                            <label for="waterFile" class="warter-lable">Water Data (CSV):</label>
                            <div class="file-upload-wrapper">
                                <input type="file" id="file-water-csv" name="billing_data" accept=".csv" required hidden />
                                <label for="file-water-csv" class="file-input-label">Choose File</label>
                                <span id="name-water-csv">No file chosen...</span>
                            </div>
                        </div>

                        <div class="water-cont">
                        <label for="waterFile" class="waterFile">Select year :</label>
                        <!-- year input -->
                        <input type="number" name="year" id="year" min="<?php echo date('Y') ?>" max="<?php echo date('Y') + 1 ?>" required placeholder="Year" />
                        </div>

                        <div class="water-cont">
                        <label for="waterFile" class="waterFile">Select month :</label>
                        <!-- month input -->
                        <select name="month" required>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        </div>

                        
                        <!-- billing type indicator, hidden input -->
                        <input type="hidden" name="billing_type" value="water" />

                        <button type="submit" class="uploadButton">Upload Files</button>
                    </form>
                </div>

                <!-- electricity form -->
                <div class="elec-container">
                
                    <form enctype="multipart/form-data" action="<?php echo URL_ROOT . '/finances/csvUpload' ?>" method="POST">
                    <div class="water-cont">
                        <label for="waterFile" class="warter-lable">Electricity Data (CSV):</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="file-power-csv" name="billing_data" accept=".csv" required hidden />
                            <label for="file-power-csv" class="file-input-label">Choose File</label>
                            <span class="csv-file-name" id="name-power-csv">No file chosen...</span>
                        </div>
                    </div>

                    <div class="water-cont">
                        <label for="waterFile" class="waterFile">Select year:</label>
                        <!-- year input -->
                        <input type="number" name="year" id="year" min="<?php echo date('Y') ?>" max="<?php echo date('Y') + 1 ?>" required placeholder="Year" />
                        </div>

                    <div class="water-cont">
                        <label for="waterFile" class="waterFile">Select month :</label>
                        <!-- month input -->
                        <select name="month" required>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        </div>

                        
                        <!-- billing type indicator, hidden input -->
                        <input type="hidden" name="billing_type" value="power" />
                        <button type="submit" class="uploadButton">Upload Files</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL_ROOT . '/js/index.js' ?>"></script>
</body>

</html>