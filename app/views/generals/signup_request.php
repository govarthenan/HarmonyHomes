<?php 
require('sidenav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../gm_style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="main-content">
        <div class="gm-signup-request-container">
            <div class="sign-up-request-heading">Sign Up Requests</div>
            <div class="table-body">
                <table>
                    <tr>
                        <th class="sign-up-request-heading-table">Name</th>
                        <th class="sign-up-request-heading-table">Resident ID</th>
                        <th class="sign-up-request-heading-table">Action</th>
                    </tr>
                    <tr>
                            <td>j.Silva</td>
                            <td>W 3/16</td>
                        <td><button class="viewButton">View</button></td>
                    </tr>
                    <tr class="description-row" style="display:none;">
                        <td colspan="3" style="padding-left: 10%;">
                          <div class="resident-name-lable"><b>Name:</b><span class="resident-name">J.Silva</span></div>
                          <div class="resident-nic-lable"><b>NIC-no:</b><span class="resident-nic-no">19751123457643</span></div>
                          <div class="resident-nic-pic-lable"><b>NIC attachment:</b><span class="resident-nic-pic"></span></div>
                          <div class="accept-decline-buttons">
                            <button id="acceptButton">Accept</button>
                            <button id="declineButton">Decline</button>
                          </div>
                        </td>
                    </tr>
                    <tr>
                        <td>H.R Perera</td>
                        <td>S 2/04</td>
                        <td><button class="viewButton">View</button></td>
                    </tr>
                    <tr class="description-row" style="display:none;">
                        <td colspan="3" style="padding-left: 10%;">
                        <div class="resident-name-lable"><b>Name:</b><span class="resident-name">J.Silva</span></div>
                          <div class="resident-nic-lable"><b>NIC-no:</b><span class="resident-nic-no">19751123457643</span></div>
                          <div class="resident-nic-pic-lable"><b>NIC attachment:</b><span class="resident-nic-pic"></span></div>
                          <div class="accept-decline-buttons">
                            <button id="acceptButton">Accept</button>
                            <button id="declineButton">Decline</button>
                          </div>
                        </td>
                    </tr>
                    <tr>
                          <td>A.C.K Karunarathna</td>
                          <td>S 4/07</td>
                        <td><button class="viewButton">View</button></td>
                    </tr>
                    <tr class="description-row" style="display:none;">
                        <td colspan="3" style="padding-left: 10%;">
                        <div class="resident-name-lable"><b>Name:</b><span class="resident-name">J.Silva</span></div>
                          <div class="resident-nic-lable"><b>NIC-no:</b><span class="resident-nic-no">19751123457643</span></div>
                          <div class="resident-nic-pic-lable"><b>NIC attachment:</b><span class="resident-nic-pic"></span></div>
                          <div class="accept-decline-buttons">
                            <button id="acceptButton">Accept</button>
                            <button id="declineButton">Decline</button>
                          </div>
                        </td>
                    </tr>

                    
                    
                </table>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.viewButton').click(function() {
            $(this).closest('tr').next('.description-row').toggle();  // Toggle the visibility of the next description row
        });
    });
    </script>
</body>
</html>

