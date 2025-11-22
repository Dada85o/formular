<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="script/script.js" defer></script>
</head>
<body>
    <main>
        <section>
            <div class="form">
                <div class="form-header">
                    <img src="img/apexlogo.png" alt="LogoApex">
                    <h2>Welcome back</h2>
                </div>

                <form id="loginForm">
                    <div class="form-main">
                        <div class="form-main-inputs">
                            <div class="form-main-inputs-label">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                <label>Username <span style="color:red">*</span></label>
                            </div>
                            <input type="text" id="username" placeholder="Zadej své uživatelské jméno" required>
                        </div>

                        <div class="form-main-inputs">
                            <div class="form-main-inputs-label">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                <label>Password <span style="color:red">*</span></label>
                            </div>
                            <input type="password" id="password" placeholder="Zadej své heslo" required>
                        </div>
                    </div>

                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 1 1 9 0v3.75M4.5 21h15a2.25 2.25 0 0 0 2.25-2.25V12a2.25 2.25 0 0 0-2.25-2.25H4.5A2.25 2.25 0 0 0 2.25 12v6.75A2.25 2.25 0 0 0 4.5 21Z" />
                        </svg>
                        Sign in
                    </button>
                </form>

                <div class="form-footer">
                    <a href="register.php">
                        <span>Ještě nemáš účet?</span>
                        Create an account
                    </a>
                </div>

                <div id="message" style="margin-top: 20px; text-align: center; font-weight: bold;"></div>
            </div>
        </section>
    </main>
</body>
</html>