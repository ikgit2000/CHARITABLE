

<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/ben_dashboard.css">
<?php require APPROOT . '/views/inc/navbar_ben.php'; ?>



        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <h1 style="text-align: center;margin-bottom: 20px;">Search your Request</h1>
                <div class="cardHeader">

                    <div class="search">
                        <label>
                            <input type="text" placeholder="Search here" id="live_search">

                        </label>
                    </div>
                </div>

               <div id="result" >
                <table>
                    <thead>
                    <tr>
                        <td>Request_Id</td>
                        <td>Description</td>
                        <td>Type</td>
                        <td>Quantity</td>
                        <td>Priority</td>
                        <td>Requested time</td>

                    </tr>
                    </thead>

                    <tbody>

                    <tr>

                        <?php foreach($data['search'] as $search): ?>
                        <td><?php echo $search->Donation_ID?></td>
                        <td><?php echo $search->Donation_Description; ?></td>
                        <td><?php echo $search->Donation_Type; ?></td>
                        <td><?php echo $search->Donation_Quantity; ?></td>
                        <td><?php echo $search->Donation_Priority; ?></td>
                        <td><?php echo convertTimeReadableFormat($search->Donation_Time); ?></td>
                        <td><a class="btn-dark" href="<?php echo URLROOT; ?>/request_bens/show/<?php echo $search->Donation_ID; ?>">view</a></td>
                    </tr>
                    <?php endforeach; ?>


                    </tbody>
                </table>
               </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        var debounceTimer;
                        $('#live_search').on('input', function() {
                            var input = $(this).val();
                            if (input !== '') {
                                clearTimeout(debounceTimer);
                                debounceTimer = setTimeout(function() {
                                    $.ajax({
                                        url: "<?php echo URLROOT; ?>/Request_bens/searchRequest",
                                        method: "POST",
                                        data: { input: input },
                                        success: function(data) {
                                            $('#result').html(data);

                                            if ($.trim(data) === '') {
                                                $('#result').html('');
                                            }
                                        }
                                    });
                                }, 500);
                            } else {
                                $('#result').html('');
                            }
                        });
                    });
                </script>
            </div>

</div>
</div>



<script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

