<div class="card">
    <div class="card-header">
        <h3 class="card-title">Social Medias</h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0" role="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (is_array($about->phones))
                        @foreach ($about->phones as $phone)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                   +{{ $phone ? preg_replace('/^(\d{2})(\d{4})(\d+)$/', '$1 $2 $3', preg_replace('/[^0-9]/', '', $phone)) : '' }}
                                </td>
                                <td><span class="badge text-bg-success"> Edit </span></td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
