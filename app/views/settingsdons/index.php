<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/form.css">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBijs3YopDeNYhNj_8QSqo0Gh3-JoMU54&libraries=places"></script>


<!-- ================ Order Details List ================= -->
<div class="details">
    <div class="recentOrders" >
        <div class="cardHeader">
            <a href="<?php echo URLROOT; ?>/settingsdons/viewProfile" class="btn">Back</a>
        </div>
        <form class="forms" action="<?php echo URLROOT; ?>/settingsdons/index" method="POST">
            <div class="container-nav" >
                <h1>Update Profile</h1>
                <hr>
                <div class="content-sidebar" >
                    <div class="content">
                        <div class="des">
                            <h3><label for="Name"><b>Name</b></label></h3>
                        </div>
                    </div>
                    <div class="data">
                        <input type="text" name="D_Name" placeholder="Name" value="<?php echo $data['D_Name']; ?>"></input>
                        <div class=warn> <?php if (isset($data['D_Name_err'])) echo $data['D_Name_err']; ?></div>


                    </div>
                    <!--<div class="content">
                        <label for="address"><h3>Address</h3></label>
                    </div>
                    <div class="data">
                        <input type="text" name="D_Address" placeholder="Address"
                               value="<?php /*echo $data['D_Address']; */?>">
                        <div class=warn> <?php /*if (isset($data['D_Address_err'])) echo $data['D_Address_err']; */?></div>
                    </div>-->
                <div class="content">
                    <label for="telephone_number"><h3>Telephone Number</h3></label>
                </div>
                <div class="data">
                    <input type="text" name="D_Tel_No" placeholder="Telephone number"
                           value="<?php echo $data['D_Tel_No']; ?>">
                    <div class=warn> <?php if (isset($data['D_Tel_No_err'])) echo $data['D_Tel_No_err']; ?></div>
                </div>


                <div class="content">
                        <label for="address"><h3>Address</h3></label>
                    </div>
                    <div class="data">
                        <input type="text" name="D_Address" placeholder="Address"
                               value="<?php echo $data['D_Address']; ?>">
                        <div class=warn> <?php if (isset($data['D_Adress'])) echo $data['D_Address']; ?></div>
                        <div class="space" style="height: 500px; margin=20px;">
                            <div id="map" style="height: 400px; width: 100%; margin: 20px;">

                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBijs3YopDeNYhNj_8QSqo0Gh3-JoMU54&callback=Function.prototype"></script>
                                <script>
                                    function initMap() {
                                        var colombo = {lat: 6.9271, lng: 79.8612};
                                        var map = new google.maps.Map(document.getElementById('map'), {
                                            zoom: 12,
                                            center: colombo

                                        });
                                        var marker = new google.maps.Marker({
                                            position: colombo,
                                            map: map,
                                            draggable: true
                                        });
                                        google.maps.event.addListener(marker, 'dragend', function(event) {
                                            document.getElementById("latitude").value = event.latLng.lat();
                                            document.getElementById("longitude").value = event.latLng.lng();
                                        });
                                    }
                                    var autocomplete = new google.maps.places.Autocomplete(
                                        document.getElementById('autocomplete'),
                                        {types: ['geocode']});
                                </script>
                            </div>
                            <input type="hidden" id="latitude" name="latitude"><br>
                            <input type="hidden" id="longitude" name="longitude"><br>
                        </div>
                    </div>
                </div>

                <input type="submit" class="button button1" value="submit">
            </div>

        </form>
    </div>
</div>
</div>
</div>

<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
