<?php 
include(APP_ROOT . '/views/inc/general_side_nav.php');
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
    <div class="fac-issue-content">
      <div class="issue-heading"> Issues Overview</div>
    <div class="table-body">
      
    <table>
                           <tr class="issue-table-head">
                            <th>Date</th>
                            <th>Resident ID</th>
                            <th>Issue</th>
                            <th>Technician</th>
                            <th>Mark As Read</th>
                            </tr>
                            <tr>
                                <td>2024/01/28</td>
                                <td>S 2/4</td>
                                <td>AC Repairs</td>
                                <td>Shan</td>
                                <td><button class="assignButton"><i class="fa-solid fa-check"></i></button></td>
                              
                                
                            </tr>

                            <tr>
                                <td>2024/02/03</td>
                                <td>W 3/6</td>
                                <td>Clogged Sink</td>
                                <td>Umai</td>
                                <td><button class="assignButton"><i class="fa-solid fa-check"></i></button></td>
    
                            </tr>

                            <tr>
                                <td>2024/02/25</td>
                                <td>S 4/7</td>
                                <td>Hot Water Issue</td>
                                <td>Himash</td>
                                <td><button class="assignButton"><i class="fa-solid fa-check"></i></button></td>
                             
                            </tr>

                            <tr>
                                <td>2024/03/03</td>
                                <td>W 1/6</td>
                                <td>Electrical Issues</td>
                                <td>Gova</td>
                                <td><button class="assignButton"><i class="fa-solid fa-check"></i></button></td>
                             
                            </tr>

                            <tr>
                                <td>2024/03/27</td>
                                <td>S 3/6</td>
                                <td>Water Leaks </td>
                                <td>Thusi</td>
                                <td><button class="assignButton"><i class="fa-solid fa-check"></i></button></td>
                           
                            </tr>
                          </table>
            
    </div>
    </div>
  </body>
</html>
