<?php
include(APP_ROOT . '/views/inc/facility_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/general_style.css' ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>

</head>

<body>

  <div class="main-content">
    <div class="fac-inventory-content">
      <div class="inventory_heading">
        <div>Inventory Overview</div>
      </div>
      <div class="inventory_add">
        <button onclick="openModal('inventoryModal')" class="add-btn"><i class="fa-solid fa-plus"></i> <b>Add</b></button>
      </div>

      <div class="table-body">

        <table>
          <tr class="inventory_table_head">
            <th>ID</th>
            <th>Inventory Type</th>
            <th>Count</th>
            <th>Action</th>
          </tr>
          <tr>
            <td>I01</td>
            <td>Tables</td>
            <td>5</td>
            <td><button onclick="openModal('inventoryUpdateModal')" class="update_Button">Update</button>
              <button class="deleteButton">Delete</button>
            </td>


          </tr>

          <tr>
            <td>I05</td>
            <td>Air Conditioner</td>
            <td>10</td>
            <td><button onclick="openModal('inventoryUpdateModal')" class="update_Button">Update</button>
              <button class="deleteButton">Delete</button>
            </td>
          </tr>

          <tr>
            <td>I03</td>
            <td>Electronic Devices</td>
            <td>6</td>
            <td><button onclick="openModal('inventoryUpdateModal')" class="update_Button">Update</button>
              <button class="deleteButton">Delete</button>
            </td>
          </tr>

          <tr>
            <td>I07</td>
            <td>Sink & Strainer</td>
            <td>3</td>
            <td><button onclick="openModal('inventoryUpdateModal')" class="update_Button">Update</button>
              <button class="deleteButton">Delete</button>
            </td>
          </tr>

          <tr>
            <td>I10</td>
            <td>Electrical Switches & Outlets</td>
            <td>15</td>
            <td><button onclick="openModal('inventoryUpdateModal')" class="update_Button">Update</button>
              <button class="deleteButton">Delete</button>
            </td>
          </tr>
          <tr>
            <td>I10</td>
            <td>Electrical Switches & Outlets</td>
            <td>15</td>
            <td><button onclick="openModal('inventoryUpdateModal')" class="update_Button">Update</button>
              <button class="deleteButton">Delete</button>
            </td>
          </tr>
        </table>

      </div>
      <!-- inventory adding model -->
      


      <div id="inventoryModal" class="inventorymodal" style="display: none;">
        <div class="inventorymodal-content">
          <span class="close" onclick="closeModal('inventoryModal')">&times;</span>
          <div class="update-inventory-heading">Update Inventory</div>
          <form id="updateInventoryForm">
            <label for="inventory-type">Name:</label>
            <textarea id="inventory-type" name="inventory-type" rows="1"></textarea>

            <label for="inventory-type">Count:</label>
            <textarea id="inventory-count" name="inventory-count" rows="1"></textarea>

            <!--add that increase the count bar here"-->


            <script>
              function increaseCount() {
                var countInput = document.getElementById('count');
                var currentCount = parseInt(countInput.value, 10);
                countInput.value = currentCount + 1;
              }

              function decreaseCount() {
                var countInput = document.getElementById('count');
                var currentCount = parseInt(countInput.value, 10);
                countInput.value = currentCount - 1;
              }
            </scrip>

            <button type="submit" class="update_Button-inve-add">Update</button>
          </form>
        </div>
      </div>

      <!-- inventory updating model -->
      


      <div id="inventoryUpdateModal" class="inventoryUpdateModal" style="display: none;">
        <div class="inventoryUpdateModal-content">
          <span class="close" onclick="closeModal('inventoryUpdateModal')">&times;</span>
          <div class="update-inventory-heading">Update Inventory</div>
          <form id="updateInventoryForm">
            <label for="inventory-type">Name:</label>
            <textarea id="inventory-type" name="inventory-type" rows="1"></textarea>


            <p>add that increase and decrease the count bar here"</p>


            <script>
              function increaseCount() {
                var countInput = document.getElementById('count');
                var currentCount = parseInt(countInput.value, 10);
                countInput.value = currentCount + 1;
              }

              function decreaseCount() {
                var countInput = document.getElementById('count');
                var currentCount = parseInt(countInput.value, 10);
                countInput.value = currentCount - 1;
              }
            </script>

            <button type="submit" class="update_Button-inve-add">Update</button>
          </form>
        </div>
      </div>

      <script src="index.js"></script>
</body>

</html>