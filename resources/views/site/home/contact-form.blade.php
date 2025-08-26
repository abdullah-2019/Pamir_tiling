<form action="{{route('contact.store')}}" class="property-search-form" method="POST">
    @csrf
    <div class="search-grid">

        <div class="search-field">
            <label for="first-name" class="field-label">First Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your first name" required>
            <i class="bi bi-person field-icon"></i>
        </div>

        <div class="search-field">
            <label for="last-name" class="field-label">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>
            <i class="bi bi-person field-icon"></i>
        </div>

        <div class="search-field">
            <label for="email" class="field-label">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <i class="bi bi-envelope field-icon"></i>
        </div>

        <div class="search-field">
            <label for="phone" class="field-label">Contact Number</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone" required>
            <i class="bi bi-telephone field-icon"></i>
        </div>

        <div class="search-field">
            <label for="subject" class="field-label">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="Enter the subject" required>
            <i class="bi bi-chat-left-text field-icon"></i>
        </div>

        <div class="search-field">
            <label for="body" class="field-label">How can we help?</label>
            <textarea id="help" name="message" rows="4" placeholder="How we can help you?" required></textarea>
            <i class="bi bi-question-circle field-icon"></i>
        </div>

    </div>

    <button type="submit" class="search-btn">
        <span>Submit</span>
    </button>
</form>
