<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert"
    @if (empty($permanent)) data-auto-close="true" @endif>
    <i
        class="bi bi-{{ $type === 'success' ? 'check-circle' : ($type === 'danger' ? 'exclamation-triangle' : 'info-circle') }} me-2"></i>
    {{ $message ?? $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert[data-auto-close="true"]');

        alerts.forEach(alert => {
            const timeout = 5000;

            setTimeout(() => {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }, timeout);
        });
    });
</script>
