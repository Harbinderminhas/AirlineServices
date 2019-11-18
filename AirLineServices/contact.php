
<!DOCTYPE html>
<html lang="zxx">
   <head>
       <?php
       include "headerfiles.html";
       ?>
   </head>
   <body>
   <?php
   include "publicHeader.php";
   ?>
      <!-- banner -->

      <!--//banner -->
      <!--contact-->
      <div class="contact" id="contact">
         <div class="container">
            <h3 class="title">Contact</h3>
            <div class="col-md-6 contact-us">
               <form action="#" method="post">
                  <div class="styled-input">
                     <input type="text" name="Name" placeholder="Name" required="">
                  </div>
                  <div class="styled-input">
                     <input type="email" name="Email" placeholder="Email" required=""> 
                  </div>
                  <div class="styled-input">
                     <input type="text" name="phone" placeholder="phone" required="">
                  </div>
                  <div class="styled-input">
                     <textarea name="Message" placeholder="Message" required=""></textarea>
                  </div>
                  <div>
                     <div class="click">
                        <input type="submit" value="SEND">
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-6 contactright">
               <h3>Contact Address</h3>
               <div class="footer_grid_left">
                  <div class="contact_footer_grid_left">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>
                  </div>
                  <p>3481 Melrose Place, Beverly Hills, <span>New York City 90210.</span></p>
               </div>
               <div class="footer_grid_left">
                  <div class="contact_footer_grid_left">
                     <i class="fa fa-phone" aria-hidden="true"></i>
                  </div>
                  <p>+(000) 123 4565 32 <span>+(010) 123 4565 35</span></p>
               </div>
               <div class="footer_grid_left">
                  <div class="contact_footer_grid_left">
                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                  </div>
                  <p><a href="mailto:info@example.com">info@example1.com</a> 
                     <span><a href="mailto:info@example.com">info@example2.com</a></span>
                  </p>
               </div>
            </div>
            <div class="clearfix"> </div>
         </div>
      </div>
      <div class="address_mail_footer_grids">
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3539.812628729253!2d153.014155!3d-27.4750921!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a0835840a2f%3A0xdd5e3f5c208dc0e1!2sMelbourne+St%2C+South+Brisbane+QLD+4101%2C+Australia!5e0!3m2!1sen!2sin!4v1492257477691"></iframe>
      </div>
      <!--//contact-->
   <?php
   include "footer.php";
   ?>
   </body>
</html>