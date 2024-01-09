<?php include_once('includes/header.php'); ?>
<div class="container1">
    <h2 class="login-title">Contact Us</h2>
    <form id="contactForm">
        <div class="form">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" placeholder="First Name">
                <div id="firstNameError" class="error"></div>

            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last Name">

            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email">

            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="my-select" id="message" name="message" rows="6"
                    placeholder="Leave a message..."></textarea>

                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php include_once('includes/footer.php'); ?>