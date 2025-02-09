<?php
include('header.php');
?>
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/contact-page-title-bg.jpg);">
    <div class="container">
        <h1>Contact</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Contact</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<section id="contact" class="contact section">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Address</h3>
                        <p>Aptech Learning, Karachi</p>
                    </div>
                </div><!-- End Info Item -->
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>+48 123 456 789</p>
                    </div>
                </div><!-- End Info Item -->
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>info@srselectronics.com</p>
                    </div>
                </div><!-- End Info Item -->
            </div>
            <div class="col-lg-7">
                <form id="contactForm" method="post" class="php-email-form" action="submitform.php" onsubmit="return validateForm()">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required="">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="message" id="message" rows="6" placeholder="Message" required=""></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div><!-- End Contact Form -->
        </div>
    </div>
</section><!-- /Contact Section -->
<script>
function validateForm() {
    // Get form fields
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;
    
    // Regex patterns for validation
    var namePattern = /^[a-zA-Z\s]+$/;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    
    // Check if all fields are filled
    if (name == "" || email == "" || subject == "" || message == "") {
        displayError("All fields are required.");
        return false;
    }
    
    // Check name format
    if (!namePattern.test(name)) {
        displayError("Please enter a valid name. Only alphabetic characters and spaces are allowed.");
        return false;
    }
    
    // Check email format
    if (!emailPattern.test(email)) {
        displayError("Please enter a valid email address.");
        return false;
    }
    
    return true;
}

function displayError(error) {
    var errorMessage = document.querySelector('.error-message');
    errorMessage.innerHTML = error;
    errorMessage.classList.add('d-block');
    setTimeout(function() {
        errorMessage.classList.remove('d-block');
    }, 3000);
}
</script>
<?php
include('footer.php');
?>
