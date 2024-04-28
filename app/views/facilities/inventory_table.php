<?php 
include (APP_ROOT . '/views/inc/facility_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/general_style.css' ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  </head>
  <body>
    
    <div class="main-content">
    <div class="fac-inventory-content">
      <div class="inventory_heading"><b>Inventory Overview</b> </div>
      <div class="inventory_add">
      <button onclick="openModal('inventoryModal')" class="add-btn"> <i class="fa-solid fa-plus"></i> <b>Add</b></button>
      </div>

    <div class="table-body">
      
    <table>
                           <tr class="inventory_table_head">
                            <th>ID</th>
                            <th>Inventory Type</th>
                            <th>Count</th>
                            <th>View</th>
                            <th>Delete</th> 
                            </tr>
                            <?php foreach ($data['inventory_detail'] as $index => $inventory): ?>
                            <tr>
                                <td>
                                <?php echo $inventory->inventory_id; ?></td>
                                <td><?php echo $inventory->inventory_type; ?></td>
                                <td><?php echo $inventory->count; ?></td>
                                <td><a href="<?php echo URL_ROOT . '/facilities/inventoryView/' . $inventory->inventory_id; ?>">
                                  <button class="view-Button"> View</button></a></td>
                                <!-- <td><button class="update_Button">Update</button></td> -->
                                <td><a href="<?php echo URL_ROOT . '/facilities/inventoryDelete/' . $inventory->inventory_id; ?>">
                                  <button class="deleteButton" type="submit" > Delete</button></td>

                                
                            </tr>
                            <?php endforeach; ?>
                          </table>
            <!-- inventory adding model -->
      <div id="inventoryModal" class="inventorymodal" style="display: none;">
        <div class="inventorymodal-content">
          <span class="close" onclick="closeModal('inventoryModal')">&times;</span>
          <div class="update-inventory-heading">Add New Inventory</div>
          <form id="updateInventoryForm" method="post" action="<?php echo URL_ROOT . '/facilities/inventoryCreate' ?>">
            <!-- <label for="inventory-type">ID:</label>
            <textarea id="inventory-type" name="inventory-type" rows="1"></textarea> -->

            <label for="inventory-type">Inventory Type:</label>
            <textarea id="inventory-type" name="inventory-type" rows="1"></textarea>

            <label for="inventory-type">Count:</label>
            <textarea id="inventory-count" name="inventory-count" rows="1"></textarea>

            <button type="submit" class="update_Button-inve-add">Update</button>
          </form>
        </div>
      </div>
    <!-- no need this three div -->
    
    </div>
    <<script src="<?php echo URL_ROOT . '/js/inventory.js'; ?>">
</script>
  </body>
</html>
