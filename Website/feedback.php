<?php 
include('header.php');
?>

<style>
/*=========== FEEDBACK FORM ========= */
.star-rating {
    font-size: 0;
    transform: rotateY(180deg);
    float: left;
    position: relative;
}

.star-rating input {
    display: none; /* Hide the default radio input */
}

.star-rating label {
    display: inline-block;
    font-size: 2rem;
    cursor: pointer;
    color: #161515a4;
}

.star-rating input:checked + label,
.star-rating input:checked ~ label {
    color: #ffc107; /* Change color for checked (selected) stars */
}

.feedback input {
    width: 80%;
}

.feedback textarea {
    width: 90%;
}

/*=========== FEEDBACK FORM ========= */
</style>

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/contact-page-title-bg.jpg);">
    <div class="container">
        <h1>Feedback</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Feedback</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Feedback Form -->
<div class="container p-5 feedback" style="background-color: rgba(248, 248, 248, 0.367);">
    <h2 style="color:rgb(62, 115, 140); font-weight: 750; font-size: 30px;" class="sy-zoo my-5">GIVE US YOUR VALUABLE FEEDBACK!</h2>
    <form id="feedbackForm" method="POST" action="feedback.php"> <!-- Move the form tag to wrap all input fields -->
        <div class="row">
            <div class="col-6">
                <label for="fname">Enter Your First Name</label>
                <input type="text" class="form-control" name="fname" id="fname" required>
                <span id="fnameerr" style="color: red;"></span>
            </div>
            <div class="col-6">
                <label for="lname">Enter Your Last Name</label>
                <input type="text" class="form-control" name="lname" id="lname" required>
                <span id="lnameerr" style="color: red;"></span>
            </div>
        </div>

        <label for="emailadd" class="mt-4">Enter Your Email Address</label>
        <input type="text" name="emailadd" id="emailadd" class="form-control" required>
        <span id="emailerr" style="color: red;"></span>

        <label for="rating" style="display: block;" class="mt-4">Give Us Rating!</label>
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5">&#9733;</label>
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4">&#9733;</label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3">&#9733;</label>
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2">&#9733;</label>
            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1">&#9733;</label>
        </div>

        <textarea class="form-control mt-4" name="message" id="message" rows="5" placeholder="Give us Your Valuable Feedback" required></textarea>

        <button class="btn btn-primary mt-4" type="button" onclick="submitFeedback()">Send Feedback</button>
    </form>
</div>

<script>
    // Validate Email
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(String(email).toLowerCase());
    }

    // Validate Name (Only letters)
    function validateName(name) {
        const re = /^[a-zA-Z]+$/;
        return re.test(String(name));
    }

    // Function to Submit Feedback
    function submitFeedback() {
        const fname = document.getElementById('fname').value;
        const lname = document.getElementById('lname').value;
        const email = document.getElementById('emailadd').value;
        const rating = document.querySelector('input[name="rating"]:checked');
        const message = document.getElementById('message').value;
        let isValid = true;

        // Clear previous error messages
        document.getElementById('fnameerr').textContent = '';
        document.getElementById('lnameerr').textContent = '';
        document.getElementById('emailerr').textContent = '';

        // Validate First Name
        if (fname === "" || !validateName(fname)) {
            document.getElementById('fnameerr').textContent = "First name is required and should contain only letters.";
            isValid = false;
        }

        // Validate Last Name
        if (lname === "" || !validateName(lname)) {
            document.getElementById('lnameerr').textContent = "Last name is required and should contain only letters.";
            isValid = false;
        }

        // Validate Email
        if (email === "" || !validateEmail(email)) {
            document.getElementById('emailerr').textContent = "Valid email is required.";
            isValid = false;
        }

        // Validate Rating
        if (!rating) {
            document.getElementById('emailerr').textContent = "Rating is required.";
            isValid = false;
        }

        // Validate Feedback Message
        if (message === "") {
            document.getElementById('emailerr').textContent = "Please provide your feedback message.";
            isValid = false;
        }

        if (isValid) {
            // If form is valid, submit it
            document.getElementById('feedbackForm').submit();
        }
    }
</script>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Get form data
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['emailadd']);
    $rating = mysqli_real_escape_string($con, $_POST['rating']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Validate the input (server-side)
    if (empty($fname) || empty($lname) || empty($email) || empty($rating) || empty($message)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit();
    }

    // Prepare and insert the feedback into the database
    $query = "INSERT INTO feedback (fname, lname, email, rating, message) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($con, $query)) {
        // Bind parameters and execute
        mysqli_stmt_bind_param($stmt, 'sssis', $fname, $lname, $email, $rating, $message);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Thank you for your feedback!'); window.location.href = 'thank_you.php';</script>";
        } else {
            echo "<script>alert('There was an error submitting your feedback. Please try again.'); window.history.back();</script>";
        }
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error preparing the query.'); window.history.back();</script>";
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<?php
include('footer.php');
?>
