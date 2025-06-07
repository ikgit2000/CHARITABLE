<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">

    <body onload="initMap()">

    <div class="logo">
        <img src="<?php echo URLROOT; ?>/img/logo_black.png" alt="logo">
        </div>
       
     <img class="wave" src="<?php echo URLROOT; ?>/img/signup_wave.svg">  
    <div class="container">
        <div class="img">
            <img src="<?php echo URLROOT; ?>/img/signup_bg.svg">
        </div>
        <div class="login-container">

            <form action="<?php echo URLROOT; ?>/users/signup_ben" method="POST" enctype="multipart/form-data" >

                <img class="avatar" src="<?php echo URLROOT; ?>/img/signup.svg">
                
                <h2>SignUp</h2>
                
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Organization name</h5>
                        <input name="name" type="text" class="input" value="<?php echo $data['name']; ?>" >
                        <div class=warn><?php echo $data['name_err']; ?></div>
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="text" name="email" class="input"  value="<?php echo $data['email']; ?>">
                        
                        <div class=warn><?php echo $data['email_err']; ?></div>
                    </div>
                    
                </div>
                <div class="input-div two ">
                    <div class="i">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <div class="div">
                        <h5> Beneficiary Type</h5>
                        <div class="select-wrapper">
                        <select name="B_Type">
                            <option value="Elder Home">Elder Home</option>
                            <option value="Children Home">Children home</option>
                            <option value="Disabled Institute">Disabled Institute</option>
                            <option value="Other">Other</option>
                        </select>
                        </div>

<!--                        <input type="tel" name="telephone_number" pattern="[0-9]{10}" class="input" value="--><?php //echo $data['telephone_number'];?><!--"  >-->
                        <div class=warn><?php echo $data['B_Type_err']; ?></div>
                    </div>
                </div>
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-mobile"></i>
                    </div>
                    <div class="div">
                        <h5>Telephone number</h5>
                        <input type="tel" name="telephone_number" pattern="[0-9]{10}" class="input" value="<?php echo $data['telephone_number'];?>"  >
                        <div class=warn><?php echo $data['telephone_number_err']; ?></div>
                    </div>
                    </div>
                    <div class="input-div one ">
                        <div class="i">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <div class="div">
                            <h5>Address</h5>

                            <input type="text" name="address" id="autocomplete" class="input" value="<?php echo $data['address'];?>">
                            
                            <div class=warn><?php echo $data['address_err']; ?></div>
                        </div>
                        </div>
                       <div class="space" style="height: 500px; margin=20px;">
                           <div id="map" style="height: 400px; width: 100%; margin: 20px;">


                               <script>
                                   function initMap() {
                                       var mapOptions = {
                                           zoom: 12,
                                           draggable: true // Enable dragging of the map
                                       };

                                       // Create a new map with the options
                                       var map = new google.maps.Map(document.getElementById('map'), mapOptions);

                                       // Create a marker with draggable set to true
                                       var marker = new google.maps.Marker({
                                           map: map,
                                           draggable: true
                                       });

                                       // Get the user's current location
                                       if (navigator.geolocation) {
                                           navigator.geolocation.getCurrentPosition(function(position) {
                                               var initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                                               map.setCenter(initialLocation); // Center the map on the user's location
                                               marker.setPosition(initialLocation); // Set the marker position to the user's location
                                               document.getElementById("latitude").value = position.coords.latitude;
                                               document.getElementById("longitude").value = position.coords.longitude;
                                           });
                                       } else {
                                           // Handle geolocation error
                                           alert("Geolocation is not supported by this browser.");
                                       }

                                       // Update the latitude and longitude when the marker is dragged
                                       google.maps.event.addListener(marker, 'dragend', function(event) {
                                           document.getElementById("latitude").value = event.latLng.lat();
                                           document.getElementById("longitude").value = event.latLng.lng();
                                       });
                                       if ("geolocation" in navigator) {
                                           console.log("Geolocation is supported");
                                       } else {
                                           console.log("Geolocation is not supported");
                                       }
                                   }
                               </script>
                               <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCykzd2-mQTQdSMQNh8PxrWAnDBgqjf_Xg&libraries=places"></script>

                           </div>
                           <input type="hidden" id="latitude" name="latitude"><br>
                           <input type="hidden" id="longitude" name="longitude"><br>
                       </div>
                        
                        <div class="input-div one ">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Create password</h5>
                                <input type="password" name="password" class="input" value="<?php echo $data['password'];?>" >
                                <div class=warn><?php echo $data['password_err']; ?></div>
                            </div>
                            </div>
                            <div class="input-div one ">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="div">
                                    <h5>Confirm password</h5>
                                    <input type="password" name="confirm_password" class="input" value="<?php echo $data['password'];?>" >
                                    <div class=warn><?php echo $data['confirm_password_err']; ?></div>
                                </div>
                                
                                </div>


                                 <!--profile image-->


                <div class="form-drag-area">
                    <div class="icon">
                        <img src="<?php echo URLROOT; ?>/img/components/imageUpload/placeholder-icon.png" alt="placeholder-icon" width="90px" height="90px" id="profile_image_placeholder">
                    </div>

                    <div class="right-content">
                        <div class="description">Drag and drop</div>
                        <div class="form-upload">
                            <input type="file" name="profile_image" id="profile_image" style="display: none">
                            Browse File
                        </div>
                    </div>
                </div>

                <div class="form-validation">
                    <div class="profile-image-validation">
                        <img src="<?php echo URLROOT; ?>/img/components/imageUpload/green-tick-icon.png" alt="green-tick" width="15px" height="15px">
                        Select a profile picture
                    </div>
                </div>


                <!--legal doc image-->
                <div class="form1-drag-area">
                    <div class="icon">
                        <img src="<?php echo URLROOT; ?>/img/components/imageUpload/placeholder-icon.png" alt="placeholder-icon" width="90px" height="90px" id="document_placeholder">
                    </div>

                    <div class="right-content">
                        <div class="description1">Drag and drop</div>
                        <div class="form1-upload">
                            <input type="file" name="document" id="document" style="display: none">
                            Upload proof of organization's identity
                        </div>
                    </div>
                </div>

                <div class="form1-validation">
                    <div class="document-validation">
                        <img src="<?php echo URLROOT; ?>/img/components/imageUpload/green-tick-icon.png" alt="green-tick" width="15px" height="15px">
                        Select a document
                    </div>
                </div>

                
               
                <input type="submit" class="btn" value="Register">
                <a href="<?php echo URLROOT; ?>/users/login_ben"> already have an account login</a>
            </form>
            
        </div>
        

    </div>

    <!--javascript for profile image-->
<script src="<?php echo URLROOT; ?>/js/components/imageUpload/imageUpload.js"></script>
<script src="<?php echo URLROOT; ?>/js/components/imageUpload/documentUpload.js"></script>
  
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>