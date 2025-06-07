<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/schedulereq.css">


<body>

<div class="details">
    <div class="cardHeader">
        <h1>Choose A Beneficiary</h1>

    </div>
    <div class="recentOrders">
        <div class="cardHeader">
            <h2></h2>
        </div>
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone No</th>
                <th>E-mail</th>
                <th>Quantity</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <?php foreach ($data['names'] as $name): ?>
                <td> <?php echo $name->B_Id; ?></td>
                <td><?php echo $name->B_Name; ?></td>
                <td><?php echo $name->B_Address; ?></td>
                <td><?php echo $name->B_Tpno; ?></td>
                <td><?php echo $name->B_Email; ?></td>
                <td><?php echo $name->B_Members; ?></td>
                <td ><a href="<?php echo URLROOT; ?>/schedulereq_dons/add/<?php echo $name->B_Id; ?>"
                       >Select</a></td>
                <td><a href="<?php echo URLROOT; ?>/profilebens/index/<?php echo $name->B_Id; ?>" >View
                        Profile</a></td>

            </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>

