<section id="agent-profile" class="agent-profile section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="stats-section" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-center mb-4">Clients that trust us</h2>
            
            <!-- Bootstrap Carousel Implementation -->
            <div id="clientCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-inner">
                    <!-- First Slide with 4 clients -->
                    <div class="carousel-item active">
                        <div class="row text-center">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        @php
                                            $initials = '';
                                            $words = explode(' ', 'Kane Construction');
                                            foreach ($words as $word) {
                                                if (!empty($word)) {
                                                    $initials .= strtoupper(substr($word, 0, 1));
                                                }
                                            }
                                        @endphp
                                        <div class="initials-badge" style="width: 60px; height: 60px; background-color: #077f46; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin: 0 auto;">{{ $initials }}</div>
                                    </div>
                                    <div class="stat-label">Kane Construction</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        @php
                                            $initials = '';
                                            $words = explode(' ', 'Broad Construction');
                                            foreach ($words as $word) {
                                                if (!empty($word)) {
                                                    $initials .= strtoupper(substr($word, 0, 1));
                                                }
                                            }
                                        @endphp
                                        <div class="initials-badge" style="width: 60px; height: 60px; background-color: #077f46; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin: 0 auto;">{{ $initials }}</div>
                                    </div>
                                    <div class="stat-label">Broad Construction</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        @php
                                            $initials = '';
                                            $words = explode(' ', 'Woollam Construction');
                                            foreach ($words as $word) {
                                                if (!empty($word)) {
                                                    $initials .= strtoupper(substr($word, 0, 1));
                                                }
                                            }
                                        @endphp
                                        <div class="initials-badge" style="width: 60px; height: 60px; background-color: #077f46; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin: 0 auto;">{{ $initials }}</div>
                                    </div>
                                    <div class="stat-label">Woollam Construction</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        @php
                                            $initials = '';
                                            $words = explode(' ', 'Aizer Group');
                                            foreach ($words as $word) {
                                                if (!empty($word)) {
                                                    $initials .= strtoupper(substr($word, 0, 1));
                                                }
                                            }
                                        @endphp
                                        <div class="initials-badge" style="width: 60px; height: 60px; background-color: #077f46; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin: 0 auto;">{{ $initials }}</div>
                                    </div>
                                    <div class="stat-label">Aizer Group</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Second Slide with 4 more clients -->
                    <div class="carousel-item">
                        <div class="row text-center">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        @php
                                            $initials = '';
                                            $words = explode(' ', 'Better Build');
                                            foreach ($words as $word) {
                                                if (!empty($word)) {
                                                    $initials .= strtoupper(substr($word, 0, 1));
                                                }
                                            }
                                        @endphp
                                        <div class="initials-badge" style="width: 60px; height: 60px; background-color: #077f46; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin: 0 auto;">{{ $initials }}</div>
                                    </div>
                                    <div class="stat-label">Better Build Construction</div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#clientCarousel" data-bs-slide="prev" style="width: 5%; opacity: 1;">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #077f46; border-radius: 50%; padding: 10px; width: 25px; height: 25px; background-size: 15px;"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#clientCarousel" data-bs-slide="next" style="width: 5%; opacity: 1;">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #077f46; border-radius: 50%; padding: 10px; width: 25px; height: 25px; background-size: 15px;"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                
                <div class="carousel-indicators position-relative mt-3">
                    <button type="button" data-bs-target="#clientCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color: #077f46;"></button>
                    <button type="button" data-bs-target="#clientCarousel" data-bs-slide-to="1" aria-label="Slide 2" style="background-color: #077f46;"></button>
                </div>
            </div>
        </div>
    </div>
</section>
