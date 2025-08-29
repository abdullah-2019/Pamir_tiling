@php
    $formattedStatus = str_replace('_', ' ', $row->status);
    $formattedStatus = ucwords($formattedStatus);
    
    $statusConfig = [
        'active' => [
            'class' => 'badge bg-success',
            'icon' => 'bi-check-circle-fill'
        ],
        'locked' => [
            'class' => 'badge bg-warning text-dark',
            'icon' => 'bi-lock-fill'
        ],
        'pending' => [
            'class' => 'badge bg-info',
            'icon' => 'bi-clock-fill'
        ],
        'suspended' => [
            'class' => 'badge bg-danger',
            'icon' => 'bi-x-circle-fill'
        ],
        'inactive' => [
            'class' => 'badge bg-secondary',
            'icon' => 'bi-dash-circle-fill'
        ],
        'verified' => [
            'class' => 'badge bg-primary',
            'icon' => 'bi-shield-check'
        ]
    ];
    
    $config = $statusConfig[strtolower($row->status)] ?? [
        'class' => 'badge bg-light text-dark',
        'icon' => 'bi-question-circle'
    ];
@endphp

<span class="{{ $config['class'] }} d-inline-flex align-items-center">
    <i class="bi {{ $config['icon'] }} me-1"></i>
    {{ $formattedStatus }}
</span>