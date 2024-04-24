<?php
include(APP_ROOT . '/views/inc/technician_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/technician_style.css'; ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <div class="main-content">
    <div class="fac-inventory-content">
      <div class="inventory_heading">
        <div>Inventory Overview</div>
      </div>

      <div class="table-body">

        <table>
          <tr class="inventory_table_head">
            <th>ID</th>
            <th>Inventory Type</th>
            <th>Count</th>

          </tr>
          <tr>
            <td>I01</td>
            <td>Tables</td>
            <td>5</td>

          </tr>

          <tr>
            <td>I05</td>
            <td>Air Conditioner</td>
            <td>10</td>

          </tr>

          <tr>
            <td>I03</td>
            <td>Electronic Devices</td>
            <td>6</td>

          </tr>

          <tr>
            <td>I07</td>
            <td>Sink & Strainer</td>
            <td>3</td>

          </tr>

          <tr>
            <td>I10</td>
            <td>Electrical Switches & Outlets</td>
            <td>15</td>

          </tr>
          <tr>
            <td>I10</td>
            <td>Electrical Switches & Outlets</td>
            <td>15</td>

          </tr>
        </table>

      </div>

    </div>
  </div>


</body>
</html>