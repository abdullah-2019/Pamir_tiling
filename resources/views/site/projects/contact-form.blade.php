<div class="contact-form-card mb-4" data-aos="fade-up" data-aos-delay="450">
    <h4>Get In Touch</h4>
    <form action="forms/contact.php" method="post" class="php-email-form">
        <div class="row">
            <div class="col-12 mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" required="">
            </div>
            <div class="col-12 mb-3">
                <input type="text" name="last-name" class="form-control" placeholder="Last Name" required="">
            </div>
            <div class="col-12 mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required="">
            </div>
            <div class="col-12 mb-3">
                <input type="tel" name="phone" class="form-control" placeholder="Phone Number">
            </div>
            <div class="col-12 mb-3">
                <input type="text" name="subject" class="form-control" placeholder="Subject">
            </div>
            <div class="col-12 mb-3">
                <textarea name="message" class="form-control" rows="4"
                    placeholder="Additional questions or preferred viewing times..."></textarea>
            </div>
        </div>

        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your request has been sent successfully!</div>

        <button type="submit" class="btn btn-primary w-100">Send Request</button>
    </form>
</div>
