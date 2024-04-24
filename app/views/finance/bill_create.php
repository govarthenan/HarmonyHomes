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
        <div class="billing-heading">Issue monthly bills</div>
        <div class="billing-container">
          <form action="upload_csv.php" method="POST"> 
            <div class="elec-container">
              <label for="waterFile">Water Data (CSV):</label>
              <div class="file-upload-wrapper">
                   <input type="file" id="file-input" name="electricityFile" accept=".csv" required hidden />
                   <label for="file-input" class="file-input-label">Choose File</label>
                   <span id="file-name">No file chosen...</span>
                </div>
            </div>  
             <div class="elec-container">
              <label for="waterFile">Water Data (CSV):</label>
              <div class="file-upload-wrapper">
                   <input type="file" id="file-input" name="electricityFile" accept=".csv" required hidden />
                   <label for="file-input" class="file-input-label">Choose File</label>
                   <span id="file-name">No file chosen...</span>
                </div>
             </div>
              <button type="submit" class="uploadButton">Upload Files</button>
        </div>
    </div>
  </div>
  <script src="index.js"></script>
  </body>
</html>