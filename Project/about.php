<?php
require 'layout/init.inc';
require 'layout/nav.inc';
print ('

<section id="about" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>About Us</h2>
                <p class="text-justify" >Welcome to FMI Gym, your ultimate destination for fitness and well-being! We are dedicated to helping individuals of all fitness levels achieve their goals and lead healthier lifestyles.
                <br>
                At FMI Gym, we believe in the power of community and support. Our team of experienced trainers and staff members are here to guide and motivate you every step of the way. Whether you&apos;re looking to build muscle, lose weight, improve your cardiovascular health, or simply enhance your overall well-being, we have the resources and expertise to help you succeed. 
                <br>
                Our state-of-the-art facilities are equipped with the latest fitness equipment and amenities to provide you with a comfortable and enjoyable workout experience. From cardio machines and strength training equipment to group fitness classes and personal training sessions, we offer a wide range of options to suit your preferences and fitness goals.
                <br>
                But FMI Gym is more than just a place to work out – its a community where you can connect with like-minded individuals who share your passion for health and fitness. Whether you&apos;re sweating it out in a group fitness class, pushing yourself to new limits in the weight room, or simply enjoying a post-workout smoothie at our juice bar, you&apos;ll find a supportive and welcoming environment at our gym.
                <br>
                Join us today and take the first step towards a healthier, happier you. Together, we&apos;ll achieve greatness!</p>
                
                <div class="social-links">
                    <a href="https://www.facebook.com/zafer.bayraktarov" target="_blank" class="btn btn-outline-primary"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/Zafer0323" target="_blank"  class="btn btn-outline-info"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/zaferbayraktarov/ target="_blank" " class="btn btn-outline-danger"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="img\about_photo.jpg" class="img-fluid rounded-circle" alt="About Us Image">
            </div>
        </div>
    </div>
</section>

'
);


require 'layout/footer.inc';
?>