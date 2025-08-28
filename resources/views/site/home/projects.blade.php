<section id="featured-agents" class="featured-agents section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Projects</h2>
        <p>View our smaple tiling projects. Each installation represents our commitment to quality materials, expert
            installation, and customer satisfaction</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">

            @foreach ($projects as $project)
                @php
                    $firstImage =
                        collect($project->images ?? [])
                            ->filter()
                            ->first() ?? 'assets/site/img/placeholder.webp';

                    $imgUrl = asset($firstImage);
                @endphp

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="featured-agent">
                        <div class="agent-wrapper">
                            <div class="agent-photo">
                                <img src="{{ $imgUrl }}" alt="{{ $project->clinet_name }}" class="img-fluid">
                                <div class="overlay-info">
                                    <div class="contact-actions">
                                        <span class="contact-btn email open-fullscreen" title="Full screen"
                                            data-image="{{ $imgUrl }}">
                                            <i class="bi bi-arrows-fullscreen"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="agent-details">
                                <span class="position">{{ $project->clinet_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
            <a href="{{ route('projects.page') }}" class="discover-all-agents">
                <span>Discover All Projects</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

    </div>

</section>


<!-- Fullscreen Image Modal -->
<div class="modal fade" id="fullscreenImageModal" tabindex="-1" aria-labelledby="fullscreenImageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="btn btn-close btn-close-white position-absolute top-0 end-0 m-3"
                data-bs-dismiss="modal" aria-label="Close"></button>
            <img id="fullscreenImage" src="" alt="Project Image" class="img-fluid w-100 rounded-3 shadow-lg"
                style="object-fit:contain; background:#000;">
        </div>
    </div>
</div>
