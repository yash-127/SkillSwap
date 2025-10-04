document.addEventListener('DOMContentLoaded', () => {
    let isLoggedIn = false;

    const authModal = document.getElementById('auth-modal');
    const closeModalBtn = document.getElementById('close-modal-btn');
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const showSignupLink = document.getElementById('show-signup');
    const showLoginLink = document.getElementById('show-login');

     const openAuthModal = (showSignup = false) => {
        authModal.classList.remove('hidden');
        setTimeout(() => authModal.classList.add('visible'), 10);
        switchToSignup(showSignup);
    };

    const closeAuthModal = () => {
        authModal.classList.remove('visible');
        setTimeout(() => authModal.classList.add('hidden'), 300);
    };

    const switchToSignup = (isSignup) => {
        loginForm.style.display = isSignup ? 'none' : 'block';
        signupForm.style.display = isSignup ? 'block' : 'none';
    };
    
    closeModalBtn.addEventListener('click', closeAuthModal);
    authModal.addEventListener('click', (e) => { if (e.target === authModal) closeAuthModal(); });
    showSignupLink.addEventListener('click', (e) => { e.preventDefault(); switchToSignup(true); });
    showLoginLink.addEventListener('click', (e) => { e.preventDefault(); switchToSignup(false); });

   
 const handleNavigation = (e) => {
        const link = e.currentTarget;
        if (link.classList.contains('requires-auth') && !isLoggedIn) {
            e.preventDefault();
            openAuthModal(link.classList.contains('signup-btn') || link.dataset.targetSignup === 'true');
            return;
        }

       
    };
    window.addEventListener('popstate', () => showPage(window.location.pathname));
    document.querySelectorAll('.nav-link, .connect-btn').forEach(link => link.addEventListener('click', handleNavigation));
    
    

});

function showSkeleton(type) {
    const mainContent = $('#main-content');
    let skeletonHTML = '';

    if (type === 'post') {
        skeletonHTML = `
        <br><br><br>
            <div class="skeleton-wrapper"><br>
                <div class="skeleton-header"></div>
                <div class="skeleton-line long"></div>
                <div class="skeleton-line medium"></div>
                <div class="skeleton-line short"></div>
                <div class="skeleton-block"></div>
                <div class="skeleton-block"></div>
            </div>
        `;
    } else if (type === 'connect') {
        skeletonHTML = `
            <div class="skeleton-wrapper">
                <div class="skeleton-header large"></div>
                <div class="skeleton-line long"></div>
                <div class="skeleton-line medium"></div>
                <div class="skeleton-line short"></div>
                <div class="skeleton-chat">
                    <div class="skeleton-bubble left"></div>
                    <div class="skeleton-bubble right"></div>
                    <div class="skeleton-bubble left"></div>
                </div>
            </div>
        `;
    }

    mainContent.html(skeletonHTML);
}

function homepage() {
     showSkeleton('post');
    $('#main-content').load('homepage.php');
}

function postpage() {
    showSkeleton('post');
    $('#main-content').load('post.php');
}

function connectpage(taskCode) {
    // Show skeleton first
    showSkeleton('post');

    // Load connect.php via AJAX and pass taskCode as GET parameter
    $('#main-content').load('connect.php', { id: taskCode });
}

function profile() {
    showSkeleton('post');
    $('#main-content').load('profile.php');
}



