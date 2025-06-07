<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<div class="searchwrapper">

    <input type="text" name="input" id="live_search" placeholder="Search Benificiaries" autocomplete="off">
</div>
<div id="result" >
    <table class="tableBen" id="table">
        <thead>
        <tr>
            <th>Benificiary Name</th>
            <th>Address</th>
            <th>Telephone Number</th>
            <th>Members</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['search'] as $search): ?>
            <tr>
                <td><?php echo $search->B_Name; ?></td>
                <td><?php echo $search->B_Address; ?></td>
                <td><?php echo $search->B_Tpno; ?></td>
                <td><?php echo $search->B_Members; ?></td>
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
                        url: "<?php echo URLROOT; ?>/BenSearchs/searchBen",
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



<?php require APPROOT . '/views/inc/footer.php'; ?>
