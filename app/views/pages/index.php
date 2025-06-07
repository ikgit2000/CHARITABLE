<?php require APPROOT . '/views/inc/header.php'; ?>

        
    


    <body>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
        <div class="fullContainer banner" id="homeSection">
            <header>
                <div class="container">
                    <div class="logo">
                        <img src="<?php echo URLROOT; ?>/img/home/logo.png" alt="logo">
                    </div>
                
                    <nav>
                        <ul>
                        <?php if(isset($_SESSION['user_id'])) : ?>

  <h3>Welcome </h3>
  <p>You are logged in with  and your user id is <?php echo $_SESSION['user_id']; ?>  </p>
  <?php else : ?> not logged in
<?php endif; ?>

                            <li>
                                <a href="#homeSection">Home</a>
                            </li>
        

                            <li>
                                <a href="<?php echo URLROOT;?>/users/signup_dons">Donors</a>
                            </li>
        

        
                            <li>
                                <a href="<?php echo URLROOT;?>/users/signup_ben">Beneficiaries</a>
                            </li>
        



        
                            <li>
                                <a href="#aboutSection">About Us</a>
                            </li>
                            <li>
                                <a href="#">sign up</a>
                            </li>
                            <li>

                                <a href="<?php echo URLROOT; ?>/users/login">login</a>

                            </li>




                        </ul>



                    </nav>
    
                </div>

            </header>
                       <!--header ends here-->

            <div class="container">
                <h1>Together We Can <span>Help Them</span></h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem quam voluptatum beatae, est praesentium iure illum, nesciunt ab esse nihil consectetur dicta explicabo voluptas soluta eveniet eos eaque, vitae cumque?</p>
                <button>Start with a little</button>
            </div>

        </div>
                        <!--homeSection ends here -->

        <section class="fullContainer" id="aboutSection">

            <div class="container">
                <h2 class="sectionTitle">About Us </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure molestias commodi dolor necessitatibus nisi nesciunt velit, ipsam animi accusantium, vero fugiat in iusto ipsa facere inventore culpa sed. Dignissimos, enim.</p>
                <div class="cards">
                    <div class="donationBox">
                        <div class="title">Become a Donor</div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, vitae quidem. Laudantium, animi cum saepe hic id in? Quisquam corrupti odit commodi dolor ipsam architecto vitae iusto amet explicabo illo.</p>
                    <button>  <a href="<?php echo URLROOT; ?>/users/login">Donate Now</a></button>
                    </div>
                    <!--donation box ends here-->

            <div class="beneficiaryBox">
                <div class="title">Become a Beneficiary</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis officiis nemo quod sed mollitia maxime aliquam dolore voluptas. Dolor commodi voluptates aliquid, earum minima accusantium eos aspernatur ullam aperiam tempora.</p>
            <button>  <a href="<?php echo URLROOT; ?>/users/login">login</a></button>
            </div>
                    <!--donation box ends here-->

            <div class="eventHosterBox">
                <div class="title">Become an Event Hoster</div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga neque expedita itaque alias aliquid cum qui voluptatem tenetur? Expedita enim fuga deserunt molestiae, tenetur molestias eveniet fugit non commodi pariatur!</p>
                <button>  <a href="<?php echo URLROOT; ?>/users/login">login</a></button>
            </div>
                    <!--donation box ends here-->

                </div>
            </div>
        </section>
                    <!--about section ends here-->

    <section class="donorsContainer cover" id="donorsSection">
        <div class="container">
            <h1>Together you can <span>Help Them</span></h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem quam voluptatum beatae, est praesentium iure illum, nesciunt ab esse nihil consectetur dicta explicabo voluptas soluta eveniet eos eaque, vitae cumque?</p>
            <button>  <a href="<?php echo URLROOT; ?>/users/login">login</a></button>
        </div>
    </section>
                    <!--donors section ends here-->

     <section class="beneficiaryContainer cover1" id="beneficiarySection">
        <div class="container">
            <h1>Together you can <span>Help Them</span></h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem quam voluptatum beatae, est praesentium iure illum, nesciunt ab esse nihil consectetur dicta explicabo voluptas soluta eveniet eos eaque, vitae cumque?</p>
            <button>Start with a little</button>
        </div>
    </section>
                                    <!--beneficiary section ends here-->
    <section class="beventHostersContainer cover2" id="eventHostersSection">
        <div class="container">
            <h1>Together you can <span>Help Them</span></h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem quam voluptatum beatae, est praesentium iure illum, nesciunt ab esse nihil consectetur dicta explicabo voluptas soluta eveniet eos eaque, vitae cumque?</p>
            <button>Start with a little</button>
         </div>
    </section>
                    <!--event hosters section ends here-->


                                    

        


<?php if(isset($_SESSION['user_id'])) : ?>
  <h3>Welcome <?php echo $_SESSION['user_id']; ?></h3>
  <p>You are logged in with  and your user id is <?php echo $_SESSION['user_id']; ?>  </p>
  <?php else : ?> not logged in
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>