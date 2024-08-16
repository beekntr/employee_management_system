document.addEventListener('DOMContentLoaded', function() {
    const loadingScreen = document.getElementById('loading-screen');
    const minLoadTime = 2000; // Minimum loading time in milliseconds (3 seconds)
    const startTime = Date.now();

    function hideLoadingScreen() {
      const elapsedTime = Date.now() - startTime;
      if (elapsedTime < minLoadTime) {
        // If less than minimum time has passed, wait for the remainder
        setTimeout(hideLoadingScreen, minLoadTime - elapsedTime);
      } else {
        // Fade out and remove the loading screen
        loadingScreen.style.opacity = '0';
        setTimeout(() => {
          loadingScreen.style.display = 'none';
        }, 500);
      }
    }

    // Start hiding process when the window is fully loaded
    window.addEventListener('load', hideLoadingScreen);
  });
 document.addEventListener('DOMContentLoaded', () => {
    const modeToggle = document.getElementById('mode-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    // Apply saved theme on page load
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