<?php
include(APP_ROOT . '/views/inc/resident_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>" />
</head>

<body onload="randerDate()">
    <div class="main-content">
        <div class="new-complaint-landing">
            <div class="complaint-column-new">
                <div class="complaint-type">
                    <div class="new-complaint-log">
                        <img src="<?php echo URL_ROOT . '/resources/complaint/one-finger-tap.svg' ?>" class="select-complaint-img" />
                        <span class="complaint-type-title">My Complaint</span>
                    </div>

                    <div class="new-complaint-new">
                    <img src="<?php echo URL_ROOT . '/resources/complaint/hand-held-tablet-writing.svg' ?>" class="new-complaint-img" />
                        <span class="complaint-type-title">New Complaint</span>
                    </div>
                </div>
                <div class="new-complaint-container">
                    <div class="column-new-complaint">
                        <div class="nested-grid-new-complaint">
                            <div class="form-column-new-complaint">
                                <h4>Complaint type:</h4>
                            </div>
                            <div class="form-column-new-complaint">
                                <h4>Subject:</h4>
                            </div>
                            <div class="form-column-new-complaint">
                                <h4>Description:</h4>
                            </div>

                            <div class="attachment-column">
                                <h4>Attachments:</h4>
                            </div>

                        </div>
                    </div>
                    <div class="column-new-complaint">
                        <form name="complaintForm" method="post" class="new-complaint-form" action="<?php echo URL_ROOT. '/residents/complaintAdd' ?>">
                            <div class="nested-grid-new-complaint">
                                <div class="form-column-new-complaint">
                                    <select id="items" name="topic" required>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Security">Security</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-column-new-complaint">
                                    <input type="text" id="shortAnswer" name="subject" required>
                                </div>
                                </div>

                                <div class="form-column-new-complaint">
                                    <textarea id="answer" name="description" rows="8" required></textarea>
                                </div>

                                <div class="submit-column">
                                    <button type="reset" class="cancel-btn">Cancel</button>
                                    <button type="submit" class="submit-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>