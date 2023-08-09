<!-- About-->
<section class="resume-section" id="about">
                <div class="resume-section-content">
                <h3 class="mb-0 text-primary">IT SERVICE SYSTEM</h3>
                    <h1 class="mb-0">
                    <?php echo $_SESSION['musername'] ?>   ,
                        <span class="text-primary">    <?php echo $_SESSION['office'] ?> </span>
                    </h1>
                    <div class="subheading mb-5">
                    <?php echo $_SESSION['membername'] ?> · แผนก <?php echo $_SESSION['dename'] ?> ·
                    <?php if ($_SESSION['office'] == 'CJL') { ?>
                        <a href="#">CHOWJUNG LOOKMARK COMPANY LIMITED</a>
                    <?php }elseif ($_SESSION['office'] == 'CJP') {?>
                        <a href="#">CJ PREMIUM CO., LTD.</a>
                    <?php }else { ?>
                        <a href="#">CJ AUTO CHOWJUNGLOOKMARK CO., LTD.</a>
                    <?php } ?>
                    </div>
                    <p class="lead mb-5">At present,    IT Manager has seen the importance of data collection, computer
equipment and repair of computer equipment, because Company has a lot of
computer equipment. This makes it dificult to find or monitor documents and data stored in
Microsoft Excel. This causes delays in data access, which may cause consequences
From this problem, IT Manager had an idea to develop an application to notify when a computer
needs to be fixed for case study at Chowjung Lookmark Co.,LTD and Affiliates.
this process can organize the data and fix problems. It is efficient and is less
stressful for employees.</p>
                    <!--<div class="social-icons">
                        <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
                    </div>-->
                </div>
            </section>