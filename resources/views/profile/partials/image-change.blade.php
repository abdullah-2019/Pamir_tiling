<section>
    <div class="profile-card">
        {{-- current avatar --}}
        <label class="avatar-wrapper" for="avatarInput">
            <img id="avatarPreview"
                src="{{ Auth::user()->image ? Storage::url(Auth::user()->image) : asset('images/default.png') }}"
                alt="profile">
            <span class="overlay">
                <svg viewBox="0 0 24 24" width="32" height="32">
                    <path
                        d="M9 2L7.17 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-3.17L15 2H9zm4 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-6a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                </svg>
            </span>
        </label>

        {{-- hidden file picker --}}
        <input type="file" id="avatarInput" accept="image/*" hidden>

        {{-- upload button (shown only after file selected) --}}
        <button id="uploadBtn" class="btn-upload" style="display:none;">Upload</button>
    </div>
</section>

@push('styles')
    <style>
        .profile-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .avatar-wrapper {
            position: relative;
            cursor: pointer;
        }

        .avatar-wrapper img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            object-fit: cover;
            transition: .3s;
        }

        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .35);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: .3s;
        }

        .avatar-wrapper:hover .overlay {
            opacity: 1;
        }

        .btn-upload {
            padding: .6rem 1.8rem;
            background: #0d6efd;
            color: #fff;
            border: none;
            border-radius: .3rem;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-upload:disabled {
            opacity: .6;
            cursor: not-allowed;
        }
    </style>
@endpush

@push('scripts')
    <script>
        const input = document.getElementById('avatarInput');
        const preview = document.getElementById('avatarPreview');
        const upload = document.getElementById('uploadBtn');
        const userImageNav = document.getElementById('user-image-nav');
        const userImageProfile = document.getElementById('user-image-profile');
        input.addEventListener('change', () => {
            const file = input.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                upload.style.display = 'inline-block';
            }
        });

        upload.addEventListener('click', async () => {
            const file = input.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('image', file);

            upload.disabled = true;
            upload.textContent = 'Uploading…';

            const res = await fetch('{{ route('profile.image') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            if (res.ok) {
                const {
                    image_url
                } = await res.json();
                preview.src = image_url;
                userImageNav.src = image_url;
                userImageProfile.src = image_url;
                upload.style.display = 'none';
                input.value = ''; // reset picker
                alert("Image Changed Successfully.");
            } else {
                alert('Upload failed');
            }
            upload.disabled = false;
            upload.textContent = 'Upload';
        });
    </script>
@endpush
