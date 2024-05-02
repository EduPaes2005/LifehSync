    <header>
        <div class="buttons">
            <button id="homeButton"><a href="logout.php"></a></button>
            <button id="muteButton"></button>
            <button id="shareButton"></button>
            <button id="weatherButton"></button>
            <div id="weatherTime">
                <p id="weather">19°C</p>
            </div>
            <button id="fullscreenButton"></button>
            <div class="container">
                <button class="toggle-button" id="settingsButton"></button>
                <div class="ferramentabar">
                    <button id="theme-toggle"></button><br>
                    <button onclick="toggleLanguage()" id="lang-toggle"></button><br>
                    <button id="socialMedia-toggle"></button>
                    <button id="help-toggle"></button>
                        <div id="language-options" style="display: none;">
                            <button id="langBack" onclick="toggleLanguage()"></button>
                            <button id="pt" onclick="portugueseLang()"></button>
                            <button id="en" onclick="englishLang()"></button>
                            <button id="es" onclick="spanishLang()"></button>
                        </div>
                </div>
            </div>
        </div>
        <h1>LifehSync</h1>
        <div class="rainbow-line"></div>
    </header>

    <div class="notif">
        <span class="welcome_text">Hey! <?php echo $username; ?><br>Bem-vindo de volta! 👋</span>
        <span class="loader"></span>
    </div>