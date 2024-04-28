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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <style>
    .hidden-column {
      display: none;
    }
  </style>
</head>

<body>

  <div class="main-content">
    <div class="fac-issue-content">
      <div class="issue-heading"> Issues Overview</div>
      <div class="table-body">

         <table>

          <tr class="issue-table-head">
            <th>Date</th>
            <th class="hidden-column">Issue ID</th>
            <th>Floor Number</th>
            <th>Door Number</th>
            <th>Issue</th>
            <th>Technician</th>
            <th>Assign</th>
          </tr>
          <?php foreach ($data['issues_data'] as $index => $issues): ?>
            <tr >
              <td><?php echo $issues->Date; ?></td>
              <td class="hidden-column"><?php echo $issues->issue_id; ?></td>
              <td><?php echo $issues->floor_number; ?></td>
              <td><?php echo $issues->Issuetype; ?></td>
              <td><?php echo $issues->door_number; ?></td>
              <td><?php echo $issues->Issuetype; ?></td>
              <td><a href="<?php echo URL_ROOT . '/facilities/assignTechnician/' . $issues->issue_id ?>"><button
                    class="assignButton">Assign</button></td></a>
            </tr>
          <?php endforeach; ?>


        </table> 

      </div>
    </div>

    <!-- Technician Assignment Modal -->
    <div id="assignmentModal" class="modal" style="display: none;">
      <div class="modal-content">
        <span class="close" onclick="closeModal('assignmentModal')">&times;</span>
        <div class="assign-tech-heading">Assign Technician</div>
        <form id="assignTechForm">
          <label for="techTypeSelect">Technician Type:</label>
          <select id="techTypeSelect" name="techType">
            <option value="electrician">Electrician</option>
            <option value="plumber">Plumber</option>
          </select>

          <label for="techSelect">Choose a Technician:</label>
          <select id="techSelect" name="technician">
          </select>

          <label for="description">Description:</label>
          <textarea id="description" name="description" rows="4"></textarea>

          <input type="hidden" id="issueId" name="issueId" value="">
          <button type="submit" class="assign-tech">Assign Technician</button>
        </form>
      </div>
    </div>
    <script src="<?php echo URL_ROOT . '/js/script.js'; ?>"></script>
</body>

</html>