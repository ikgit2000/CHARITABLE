<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ben.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/form.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<body>
    <!-- =============== Navigation ================ -->




            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">

                
                <!-- <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Description</h5>
                        <input name="Donation_Description" type="text" class="input" value="<?php echo $data['Donation_Description']; ?>" >
                        <div class=warn> <?php echo $data['Donation_Description_err']; ?></div> 
                       </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Donation quantity</h5>
                        <input type="text" name="Donation_Quantity" class="input "  value="<?php echo $data['Donation_Quantity']; ?>">
                        
                        <div class=warn><?php echo $data['Donation_Quantity_err']; ?></div> 
                    </div>
                    
                </div>
                
                    
                    <div class="input-div one ">
                        <div class="i">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <div class="div">
                            <h5>Donation type</h5>
                            <input type="text" name="Donation_Type" class="input"  value="<?php echo $data['Donation_Type'];?>">
                           <div class=warn> <?php echo $data['Donation_Type_err']; ?></div> 
                        </div>
                        </div>
                        <div class="input-div one ">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Donation priority</h5>
                                <input type="text" name="Donation_Priority" class="input" value="<?php echo $data['Donation_Priority'];?>" >
                                 <div class=warn><?php echo $data['Donation_Priority_err']; ?></div> 
                            </div>
                            </div> -->
                           
                
<!--                
                <input type="submit" class="btn" value="submit">
                
            </form> -->
            <form action="<?php echo URLROOT; ?>/request_bens/add" method="POST">
                    <div class="container">

                        <h2><p>Complete Request Adding Form</p></h2>
                        <hr>
                <div class="content-sidebar">
                    <div class="content">
                        <div class="des">
                            <label for="Donation Description"> <h3><b>Donation Description</b></h3>(please enter keywords)</label>
                    </div>
                    </div>
                    <div class="data">
                        <textarea id="subject" name="Donation_Description" value="<?php echo $data['Donation_Description'];  ?>" ></textarea>
                        <div class=warn> <?php if(isset($data['Donation_Description_err'])) echo $data['Donation_Description_err']; ?></div> 
                                 
                    </div>

                        <div class="content">
                            <div class="des">
                                <h3> <label for="Donation Details"><b>Donation Details</b></label></h3>
                            </div>
                        </div>
                    <div class="data">
                        <textarea id="subject" name="Donation_Details" value="<?php echo $data['Donation_Details']; ?>" ></textarea>
                        <div class=warn> <?php if(isset($data['Donation_Details_err'])) echo $data['Donation_Details_err']; ?></div>

                    </div>
                    <div class="content">
                        <h3><label for="Donation Type"><b>Donation type</b></label></h3>
                    </div>
                    <div class="data">
                        <select  name="Donation_Type">
                            <option value="Dry Rations">Dry rations</option>
                            <option value="Clothes">Clothes</option>
                            <option value="Medicine">Medicine</option>
                            <option value="Sanitary items">Sanitary items</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                        

                    <div class="content">
                        <h3><label for="Donation Priority"><b>Donation Priority</b></label></h3>
                    </div>
                    <div class="data">
                        <select  name="Donation_Priority">
                            <option value="High">High</option>
                            <option value="Normal">Normal</option>
                            </select>
                    </div>
                    <div class="content">
                        <label for="Donation Quantity"><h3>Donation Quantity</h3></label>
                    </div>
                    <div class="data">
                      <input type="text" name="Donation_Quantity" placeholder="Donation Quantity" value="<?php echo $data['Donation_Quantity']; ?>">
                        <div class=warn> <?php if(isset($data['Donation_Quantity_err'])) echo $data['Donation_Quantity_err']; ?></div>
                    </div>

                </div>
                        <div class="button-center">
                <input type="submit" class="button" value="submit" onclick="checkAddFormSubmission(event)">
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
            
        </div>
        

    </div>
    <script>
        function checkAddFormSubmission(event) {
            event.preventDefault(); // Prevent the form from being submitted

            const form = event.target.closest('form'); // Find the closest form element

            swal.fire({
                title: " you sure want to add request?",
                text: "You have to edit the request if you want to change it later, before someone accept it.",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#395B64",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        // Continue with the form submission
                        form.submit();
                    } else {
                        // Stop the form submission
                        swal.fire("Cancelled", "Form submission cancelled.", "error");
                    }
                });
        }
    </script>
    <script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>