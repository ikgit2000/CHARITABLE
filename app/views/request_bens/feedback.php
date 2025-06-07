<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ben.php'; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT ?>/css/benificiary/feedback.css">


<div class="background-image"></div>
<div class="feedback-form">
    <h2>Feedback Form</h2>
    <form  method="POST" action="<?php echo URLROOT ?>/request_bens/feedback/<?php echo $data['id']?>">
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="Feedback" name="Feedback" ></textarea>
        </div>
        <div class="form-group">
            <label for="satisfaction">Satisfaction:</label>
            <div class="satisfaction-options">
                <label>
                    <input type="radio" name="satisfaction" value="satisfied" required>
                    Satisfied
                </label>
                <label>
                    <input type="radio" name="satisfaction" value="dissatisfied" required>
                    Dissatisfied
                </label>
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
<div class="imageBot"><img src="<?php echo URLROOT ?>/img/feedback.svg" </div>
<script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

