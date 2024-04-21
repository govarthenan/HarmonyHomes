<?php
include('technician_sidenav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/technician_style.css'; ?>" />
</head>

<body onload="randerDate()">
    <div class="main-content">
        <div class="technician-dashboard-container">
            <div class="tech-dashboard-row-1">
                <div class="tech-content-box-1">
                    <div class="tech-welcome-msg-container">
                        <div class="tech-welcome-msg"> Monthly Summary</div>
                    </div>
                    <div class="tech-dasboard-tiles-container">
                        <div class="tech-total-task-tile">
                            <div class="tasks">
                                <img src="<?php echo URL_ROOT . '/resources/technician/total-task.svg'?>" class="total-task-icon">
                            </div>
                            <div class="Number-task">
                                <div class="task-name">
                                    Total
                                </div>
                                <div class="task-count-total">
                                    8
                                </div>
                            </div>
                        </div>
                        <div class="tech-ongoing-task-tile">
                            <div class="tasks">
                                <img src="<?php echo URL_ROOT . '/resources/technician/ongoing-task.svg'?>" class="ongoing-task-icon">
                            </div>
                            <div class="Number-task">
                                <div class="task-name">
                                    Ongoing
                                </div>
                                <div class="task-count-ongoing">
                                    2
                                </div>
                            </div>
                        </div>
                        <div class="tech-completed-task-tile">
                            <div class="tasks">
                                <img src="<?php echo URL_ROOT . '/resources/technician/completed-task.svg'?>" class="completed-task-icon">
                            </div>
                            <div class="Number-task">
                                <div class="task-name">
                                    Completed
                                </div>
                                <div class="task-count-completed">
                                    6
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tech-announcment-container">
                    <div class="tech-welcome-msg"> Announcment</div>
                    <div class="tech-announcment-tile">
                        <div class="tech-announcment-heading">Staff meeting</div>
                        <div class="announcment-sender">by General Manager</div>
                    </div>
                    <div class="tech-announcment-tile">
                        <div class="tech-announcment-heading">Staff meeting</div>
                        <div class="announcment-sender">by General Manager</div>
                    </div>
                </div>
            </div>
            <div class="tech-dashboard-row-2">
                <div class="new-tasks-assigned">
                    <div class="new-tasks-heading">New Tasks</div>
                    <div class="new-task-container">
                        <div class="issue-id-column">
                            <div class="issue-id-heading">Issue ID</div>
                            <div class="issue-id">1</div>
                        </div>
                        <div class="task-name-column">
                            <div class="task-name-heading">Task Name</div>
                            <div class="assigned-task-name">bghdgfy</div>
                        </div>
                        <div class="view-button-column">
                            <div class="action-name-heading">Action</div>
                            <button class="viewButton">View</button>
                        </div>
                    </div>
                    <div class="new-task-container">
                        <div class="issue-id-column">
                            <div class="issue-id-heading">Issue ID</div>
                            <div class="issue-id">1</div>
                        </div>
                        <div class="task-name-column">
                            <div class="task-name-heading">Task Name</div>
                            <div class="assigned-task-name">bghdgfy</div>
                        </div>
                        <div class="view-button-column">
                            <div class="action-name-heading">Action</div>
                            <button class="viewButton">View</button>
                        </div>
                    </div>
                    <div class="new-task-container">
                        <div class="issue-id-column">
                            <div class="issue-id-heading">Issue ID</div>
                            <div class="issue-id">1</div>
                        </div>
                        <div class="task-name-column">
                            <div class="task-name-heading">Task Name</div>
                            <div class="assigned-task-name">bghdgfy</div>
                        </div>
                        <div class="view-button-column">
                            <div class="action-name-heading">Action</div>
                            <button class="viewButton">View</button>
                        </div>
                    </div>
                </div>
                <div class="chat"></div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL_ROOT . '/js/index.js'; ?>" ></script>
</body>

</html>