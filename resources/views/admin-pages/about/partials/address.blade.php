<div class="card">
    <div class="card-header">
        <h3 class="card-title">Address</h3>
    </div>
    <div class="card-body">
        <div class="accordion" id="about_address_details">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Country
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#about_address_details"
                    style="">
                    <div class="accordion-body">
                        {{ $about->country }}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        City
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#about_address_details">
                    <div class="accordion-body">
                        {{ $about->city }}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Location
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#about_address_details">
                    <div class="accordion-body">
                        {{ $about->address ?? 'No address available' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
