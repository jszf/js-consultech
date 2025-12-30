<?php 
    $pageTitle = "Contact Us | JsConsult iT Solutions"; 
    include 'includes/header.php'; 
?>



<!-- SITE CONTENT -->
    <div class="wrapper">
        <section class="titlebar">
            <h1 class="page-title"><span>Contact </span>us</h1>
            <div id="particles-js"></div>
        </section>
        
        <hr class="col-md-6 bottom_60">

        <div class="cont">
            <section class="contact col-md-8 offset-md-2 top_90">
			<?php if(isset($_GET['sent'])): ?>
        <?php if($_GET['sent'] == '1'): ?>
            <p style="text-align:center; color:green; font-weight:bold;">
                Thank you! Your message was sent successfully.
            </p>
        <?php else: ?>
            <p style="text-align:center; color:red; font-weight:bold;">
                Sorry, something went wrong. Please try again later.
            </p>
        <?php endif; ?>
    <?php endif; ?>
                <div class="contact-info text-center">
                    <p>Block 10, Makerere Hill Road </p> 
                    <a href="mailto:hello@jsconsultech.com"> hello@jsconsultech.com</a> 
                    <p>+256 709 747 834</p>
                </div>
                <div class="contact-form">
                <form action="./send_email.php" method="POST">
                    <input class="inp" type="text" name="name" placeholder="Name" required>
                    <input class="inp" type="email" name="email" placeholder="Email" required>
                    <textarea class="col-md-12 form-message" name="message" placeholder="Message" rows="6" required></textarea>
                    
                    <div class="text-center top_30">
                        <button type="submit" class="site-btn2">Submit</button>
                    </div>
                </form>                    
            </div>

            </section>

        </div> <!-- cont end -->
    </div> <!-- wrapper end -->


<?php include 'includes/footer.php'; ?>