<?php
include(APP_ROOT . '/views/inc/facility_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/facility_style.css' ?>" />
</head>

<body>
    <div class="main-content">
        <div class="view-inventory-landing">
            <div class="inventory-column-new">

                <div class="new-inventory-container">
                    <div class="column">
                        <div class="nested-grid">
                            <div class="form-column-view">
                                <h4>ID:</h4>
                            </div>
                            <div class="form-column-view-subject">
                                <h4>Inventory Type:</h4>
                            </div>

                            <div class="form-count-column">
                                <h4>Count:</h4>
                            </div>


                        </div>
                    </div>
                    <div class="column">
                        <div class="nested-grid-inventory">
                            <?php $inventory = $data['inventory_details']; ?>
                            <form action="<?php echo URL_ROOT . '/facilities/inventoryCountUpdate/' . $inventory->inventory_id; ?>" method="post">

                                <div class="form-column-view">
                                    <div class="submitted-answers">
                                        <p style="padding:1%"><?php echo $inventory->inventory_id; ?></p>
                                    </div>
                                </div>

                                <div class="form-column-view">
                                    <div class="submitted-answers">
                                        <p style="padding:1%"><?php echo $inventory->inventory_type; ?> </p>
                                    </div>
                                </div>


                                <div class="form-column-view">
                                    <div class="submitted-answers">
                                        <textarea id="updatedCount" name="updatedCount" rows="4"></textarea>
                                    </div>
                                    <div class="update-button">
                                        <button type="submit" class="inventory-update-btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>

</body>

</html>