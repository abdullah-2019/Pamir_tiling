<!-- resources/views/components/application-logo.blade.php -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" {{ $attributes }} role="img" aria-label="Brand logo">
  <defs>
    <style>
      .green { fill: #24B000; } /* adjust if needed */
      .blue  { fill: #1487E3; } /* adjust if needed */
    </style>
    <!-- Base diamonds (centered on 100,100) -->
    <!-- Big diamond radius (center to vertex) -->
    <polygon id="big" points="100,28 172,100 100,172 28,100"/>
    <!-- Inner diamond size -->
    <polygon id="inner" points="0,-16 16,0 0,16 -16,0"/>
    <!-- Diagonal gap shape (a strip along the TL–BR diagonal) -->
    <!-- This is used as a clipping mask to remove a band from each big diamond. -->
    <path id="gap-strip" d="
      M 0,0
      L 200,200
      L 200,200
      L 0,0
      Z" />
    <!-- Create two half-space clips based on the diagonal, offset by gap -->
    <!-- We will build explicit clip paths so the green keeps only the TL side minus strip, and blue keeps the BR side minus strip. -->
    <clipPath id="clip-tl">
      <!-- TL half-plane polygon (covers above-left of the diagonal) -->
      <polygon points="-50,0 0,-50 200,150 150,200"/>
    </clipPath>
    <clipPath id="clip-br">
      <!-- BR half-plane polygon (covers below-right of the diagonal) -->
      <polygon points="50,200 200,50 250,100 100,250"/>
    </clipPath>
    <!-- Gap strip: a band along the diagonal with fixed width -->
    <clipPath id="clip-gap">
      <!-- Create the band as a thick stroked diagonal line turned into a clip -->
      <path d="M -20,-20 L 220,220" stroke="black" stroke-width="10" fill="none" stroke-linecap="butt"/>
    </clipPath>
  </defs>

  <!-- GREEN diamond: keep TL side, subtract diagonal gap -->
  <g clip-path="url(#clip-tl)">
    <use href="#big" class="green"/>
  </g>
  <!-- Cut the gap out of green by overlaying with blend via white fill using the gap clip -->
  <g clip-path="url(#clip-gap)">
    <rect x="0" y="0" width="200" height="200" fill="#ffffff"/>
  </g>

  <!-- BLUE diamond: keep BR side, subtract diagonal gap -->
  <g clip-path="url(#clip-br)">
    <use href="#big" class="blue"/>
  </g>
  <g clip-path="url(#clip-gap)">
    <rect x="0" y="0" width="200" height="200" fill="#ffffff"/>
  </g>

  <!-- Inner diamond: slightly offset along diagonal, white outline only -->
  <g transform="translate(106,106) rotate(45)">
    <use href="#inner" fill="none" stroke="#FFFFFF" stroke-width="8" stroke-linejoin="round"/>
  </g>
</svg>