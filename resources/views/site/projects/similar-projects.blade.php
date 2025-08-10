<div class="similar-properties" data-aos="fade-up" data-aos-delay="650">
    <h4>Other Projects</h4>

    @forelse ($otherProjects as $op)
        @php $firstImage = data_get($op, 'images.0'); @endphp
        <div class="similar-property-item">
            @if($firstImage)
                <img src="{{ asset('assets/site/img/projects/' . $firstImage) }}" class="img-fluid" alt="{{ $op->clinet_name }}">
            @endif
            <div class="similar-info">
                <p></p>
                <h6>{{ $op->clinet_name }}</h6>
            </div>
        </div>
    @empty
        {{-- Render nothing or a message if you prefer --}}
        {{-- <p>No other projects.</p> --}}
    @endforelse
</div>