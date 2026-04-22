// Login form validation
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            
            if (username === '' || password === '') {
                e.preventDefault();
                alert('Please fill in all fields!');
                return false;
            }
        });
    }
    
    // Auto-focus username field
    const usernameField = document.getElementById('username');
    if (usernameField) {
        usernameField.focus();
    }
    
    // Add enter key support for login
    document.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            const loginForm = document.getElementById('loginForm');
            if (loginForm && loginForm.checkValidity()) {
                loginForm.submit();
            }
        }
    });
});

// Dashboard animations
function animateDashboard() {
    const cards = document.querySelectorAll('.feature-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 200);
    });
}

if (document.querySelector('.dashboard-body')) {
    animateDashboard();
}