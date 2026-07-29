



<!-- Language switcher -->
<div class="language-switcher me-3">
    <div class="translate-wrapper">
        <select id="language-select" class="form-select form-select-sm custom-translator-select" onchange="changeLanguage(this.value)">
            <option value="en">English</option>
            <option value="sw">Kiswahili</option>
        </select>
    </div>
</div>


<script>
    function changeLanguage(lang) {
        localStorage.setItem('selectedLanguage', lang);

        if (lang === 'en') {
            // Set translation to English
            document.cookie = 'googtrans=/auto/en; path=/;';
            document.cookie = `googtrans=/auto/en; path=/; domain=${window.location.hostname}`;
            console.log("Switched to EN - Cookie set to auto detect and translate to English");
        } else if (lang === 'sw') {
            // Set translation to Swahili
            document.cookie = 'googtrans=/auto/sw; path=/;';
            document.cookie = `googtrans=/auto/sw; path=/; domain=${window.location.hostname}`;
            console.log("Switched to SW - Cookie set to auto detect and translate to Swahili");
        }

        // Reload once after language change
        location.reload();
    }

    document.addEventListener('DOMContentLoaded', function () {
        const lang = localStorage.getItem('selectedLanguage') || 'en';
        const select = document.getElementById('language-select');
        if (select) select.value = lang;
        
        const cookieLang = getCookieValue('googtrans');
        console.log('LocalStorage:', lang, '| Cookie:', cookieLang);
        
        // Check if translator needs to be initialized
        if (lang === 'en' && (!cookieLang || !cookieLang.endsWith('/en'))) {
            document.cookie = 'googtrans=/auto/en; path=/;';
            document.cookie = `googtrans=/auto/en; path=/; domain=${window.location.hostname}`;
        } else if (lang === 'sw' && (!cookieLang || !cookieLang.endsWith('/sw'))) {
            document.cookie = 'googtrans=/auto/sw; path=/;';
            document.cookie = `googtrans=/auto/sw; path=/; domain=${window.location.hostname}`;
        }
    });

    function getCookieValue(name) {
        const match = document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)');
        return match ? decodeURIComponent(match.pop()) : '';
    }

    // Optional debug tool
    function clearTranslation() {
        localStorage.removeItem('selectedLanguage');
        ['','.' + window.location.hostname].forEach(domain => {
            document.cookie = 'googtrans=; Max-Age=0; path=/;';
            document.cookie = `googtrans=; Max-Age=0; path=/; domain=${domain};`;
        });
        console.log("Cleared all translation cookies & localStorage.");
        location.reload();
    }
</script>