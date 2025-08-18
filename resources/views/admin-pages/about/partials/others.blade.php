<div class="card">
    <div class="card-header">
        <h3 class="card-title">Other</h3>
    </div>
    <div class="card-body">
        <div class="accordion" id="about_other_detials">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Company Creation Date
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#about_other_detials"
                    style="">
                    <div class="accordion-body">
                        {{ $about->company_creation_date }}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Awards
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#about_other_detials">
                    <div class="accordion-body">
                        {{ $about->awards }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-primary float-start">
            Edit
        </a>
    </div>
</div>
