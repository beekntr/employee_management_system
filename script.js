document.addEventListener('DOMContentLoaded', function() {
    const loadingScreen = document.getElementById('loading-screen');
    const minLoadTime = 2000; 
    const startTime = Date.now();

    function hideLoadingScreen() {
      const elapsedTime = Date.now() - startTime;
      if (elapsedTime < minLoadTime) {
        setTimeout(hideLoadingScreen, minLoadTime - elapsedTime);
      } else {
        loadingScreen.style.opacity = '0';
        setTimeout(() => {
          loadingScreen.style.display = 'none';
        }, 500);
      }
    }
    window.addEventListener('load', hideLoadingScreen);
  });
 document.addEventListener('DOMContentLoaded', () => {
    const modeToggle = document.getElementById('mode-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', currentTheme);
    if (currentTheme === 'dark') {
        modeToggle.checked = true;
    }
    
    modeToggle.addEventListener('change', () => {
        const theme = modeToggle.checked ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    });
});