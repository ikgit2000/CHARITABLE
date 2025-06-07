<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/schedulereq.css">


<div class="container" >

    <div class="calender-container">
<!--        <h1><?php /*echo $data['requests']->B_Name; */?></h1>
-->  <div class="calendar">
      <div id="calendar"></div>
      <div id="event-details" class="popup"></div>

      <br>
      <h4><span class="blue-box"></span>   Fully or partialy requested but Not Accepted yet.</h4>
      <h4><span class="green-box"></span>   Fully or partialy requested and Fully or Partialy Accepted.</h4>
      <h4><span class="red-box"></span>   Fully or partialy requested and Fully Accepted. You can't request for this.</h4>

  </div>
</div>
<div class="form-container-req">
<div class="form-inner" id="meal-entry">
<form action="<?php echo URLROOT; ?>/schedulereq_dons/add/<?php echo $data['B_id']; ?>" autocomplete="off" method="POST">
<div class="heading-req">
<h2>RESERVE A MEAL</h2>
</div>

<div class="form">

<div class="input">
<input type="text" name="Food_Type" id="Food_Type"  class="input-field-req" value = "<?php echo $data['Food_Type']; ?>" autocomplete="off"/>
<label>Food Type</label>
<div class="warn"><?php echo $data['Food_Type_err']; ?></div>
</div>

<div class="input">
<input type="text" name="Donation_Quantity" id="Donation_Quantity"  class="input-field-req" value = "<?php echo $data['Donation_Quantity']; ?>" autocomplete="off"/>
<label>Donation Quantity</label>
<div class="warn"><?php echo $data['Donation_Quantity_err']; ?></div>
</div>

<div class="input">
<label>Date</label>
<input type="date" name="D_Date" id="D_Date"  class="input-field-req" value = "<?php echo $data['D_Date']; ?>" autocomplete="off" />
<div class="warn"><?php echo $data['D_Date_err']; ?></div>
</div>

<div class="input">
<label>Time</label><br>
<select class="dropdown" name="Time" id="Time">
  <option value="breakfast">Breakfast</option>
  <option value="lunch">Lunch</option>
  <option value="dinner">Dinner</option>
  </select>
<div class="warn"><?php echo $data['Time_err']; ?></div>
</div>

<input type="submit" value="Submit" class="btn">

</div>

</form>
</div>

</div>
</div>
</div>
  </div>
  </div>

  <script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>