
           
            
      

<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/form.css">
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="<?php echo URLROOT; ?>/img/logo_white.png">
                        </span>
                         <span class="title"></span> 
                    </a>
                </li>

                <li id="#" >
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="title">Requests</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-comment"></i>
                        </span>
                        <span class="title">Stats</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                        <span class="title">Calender</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-cog"></i>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_id'])) : ?>

                <li>
                    <a href="<?php echo URLROOT;?>/users/logout">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
                <?php endif; ?>
                
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fas fa-bars"></i>
                </div>

               
                <div class="user">
                   <i class="fas fa-user"></i>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            

               

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>

                    </div>
                    <!-- <form action="<?php echo URLROOT; ?>/request_bens/edit/<?php echo $data['Donation_ID'];?>" method="GET">
             
                
                <h2>Edit posts</h2>
                
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Description</h5>
                        <input name="Donation_Description" type="text" class="input" value="<?php echo $data['Donation_Description']; ?>" >
                        <div class=warn> <?php if(isset($data['Donation_Description_err'])) echo $data['Donation_Description_err']; ?></div>  
                       </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Donation quantity</h5>
                        <input type="text" name="Donation_Quantity" class="input" value="<?php echo $data['Donation_Quantity']; ?>">
                        
                        <div class=warn><?php if (isset($data['Donation_Quantity_err'])) echo $data['Donation_Quantity_err']; ?></div> 
                    </div>
                    
                </div>
                
                    
                    <div class="input-div one ">
                        <div class="i">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <div class="div">
                            <h5>Donation type</h5>
                            <input type="text" name="Donation_Type" class="input"  value="<?php echo $data['Donation_Type'];?>">
                           <div class=warn> <?php if (isset($data['Donation_Type_err'])) echo $data['Donation_Type_err']; ?></div> 
                        </div>
                        </div>
                        <div class="input-div one ">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Donation priority</h5>
                                <input type="text" name="Donation_Priority" class="input" value="<?php echo $data['Donation_Priority'];?>" >
                                 <div class=warn><?php if (isset($data['Donation_Priority_err'])) echo $data['Donation_Priority_err']; ?></div> 
                            </div>
                            </div>
                           
                
               
                <input type="submit" class="btn" value="submit">
                
            </form> -->
          
              
                <form class="forms" action="<?php echo URLROOT; ?>/request_bens/edit/<?php echo $data['Donation_ID'];?>" method="GET">
                    <div class="container">
                        <h1>Edit</h1>
                        <p>Edit request</p>
                        <hr>
                <div class="content-sidebar">
                    <div class="content">
                        <div class="des">
                        <h3> <label for="Donation Description"><b>Donation Description</b></label></h3>
                    </div>
                    </div>
                    <div class="data">
                        <textarea id="subject" name="Donation_Description" value="<?php echo $data['Donation_Description']; ?>" ><?php echo $data['Donation_Description']; ?></textarea>
                        <div class=warn> <?php if(isset($data['Donation_Description_err'])) echo $data['Donation_Description_err']; ?></div>
                                 
                    </div>
                    <div class="content">
                        <div class="des">
                            <h3> <label for="Donation Details"><b>Donation Details</b></label></h3>
                        </div>
                    </div>
                    <div class="data">
                        <textarea id="subject" name="Donation_Details" value="<?php echo $data['Donation_Details']; ?>" ><?php echo $data['Donation_Details'] ?> </textarea>
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
                    </div>

                </div>
                <input type="submit" class="button button1" value="submit" onclick="checkAddFormSubmission(event)">
                </div>
            </div>
        </div>
    </div>

                  

    
<script src="<?php echo URLROOT; ?>/js/beneficiary/alertben.js"></script>
 <script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>