// script/script.js
document.addEventListener('DOMContentLoaded', function () {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');
    const messageDiv = document.getElementById('message');

    // ========== REGISTRACE ==========
    if (registerForm) {
        registerForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            messageDiv.textContent = '';

            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('confirm_password').value;
            const terms = document.getElementById('terms').checked;

            if (!username || !password || !confirm) {
                messageDiv.style.color = '#ff6b6b';
                messageDiv.textContent = 'Vyplň všechna pole!';
                return;
            }
            if (!/^[a-zA-Z0-9]+$/.test(username)) {
                messageDiv.style.color = '#ff6b6b';
                messageDiv.textContent = 'Username smí obsahovat jen písmena a číslice!';
                return;
            }
            if (password.length < 6) {
                messageDiv.style.color = '#ff6b6b';
                messageDiv.textContent = 'Heslo musí mít alespoň 6 znaků!';
                return;
            }
            if (password !== confirm) {
                messageDiv.style.color = '#ff6b6b';
                messageDiv.textContent = 'Hesla se neshodují!';
                return;
            }
            if (!terms) {
                messageDiv.style.color = '#ff6b6b';
                messageDiv.textContent = 'Musíš souhlasit s podmínkami!';
                return;
            }

            try {
                const res = await fetch('process-register.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ username, password })
                });
                const data = await res.json();

                messageDiv.style.color = data.success ? '#51cf66' : '#ff6b6b';
                messageDiv.textContent = data.message;

                if (data.success) {
                    setTimeout(() => { window.location.href = 'login.php'; }, 2000);
                }
            } catch (err) {
                messageDiv.style.color = '#ff6b6b';
                messageDiv.textContent = 'Chyba serveru';
            }
        });
    }

    // ========== PŘIHLÁŠENÍ ==========
    if (loginForm) {
        loginForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            messageDiv.textContent = '';

            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;

            if (!username || !password) {
                messageDiv.style.color = '#ff6b6b';
                messageDiv.textContent = 'Vyplň všechna pole!';
                return;
            }

            try {
                const res = await fetch('process-login.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ username, password })
                });
                const data = await res.json();

                messageDiv.style.color = data.success ? '#51cf66' : '#ff6b6b';
                messageDiv.textContent = data.message;

                if (data.success) {
                    setTimeout(() => { window.location.href = 'dashboard.php'; }, 1500);
                }
            } catch (err) {
                messageDiv.style.color = '#ff6b6b';
                messageDiv.textContent = 'Chyba serveru';
            }
        });
    }
});