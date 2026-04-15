document.addEventListener('DOMContentLoaded', () => {
    // Clean up toasts after 5 seconds
    setInterval(() => {
        const toasts = document.querySelectorAll('.custom-toast');
        toasts.forEach(toast => {
            if (!toast.dataset.removing && Date.now() - toast.dataset.time > 5000) {
                removeToast(toast);
            }
        });
    }, 1000);
});

function createToast(type, message) {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = `custom-toast toast-${type}`;
    toast.dataset.time = Date.now();
    
    toast.innerHTML = `
        <div class="d-flex align-items-center">
            <span class="me-3">${getIcon(type)}</span>
            <span>${message}</span>
        </div>
        <button type="button" class="btn-close ms-3" onclick="removeToast(this.parentElement)"></button>
    `;

    container.appendChild(toast);
}

function removeToast(toast) {
    toast.dataset.removing = "true";
    toast.style.transform = 'translateX(100%)';
    toast.style.opacity = '0';
    toast.style.transition = 'all 0.3s ease';
    setTimeout(() => toast.remove(), 300);
}

function getIcon(type) {
    switch(type) {
        case 'success': return '<i class="bi bi-check-circle-fill text-success fs-4"></i>';
        case 'danger': return '<i class="bi bi-x-circle-fill text-danger fs-4"></i>';
        case 'info': return '<i class="bi bi-info-circle-fill text-info fs-4"></i>';
        case 'warning': return '<i class="bi bi-exclamation-triangle-fill text-warning fs-4"></i>';
        default: return '<i class="bi bi-bell-fill fs-4"></i>';
    }
}
