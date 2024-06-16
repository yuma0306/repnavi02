document.addEventListener("DOMContentLoaded", () => {
    redirectToPage();
});

const redirectToPage = () => {
    const selectors = Array.from(document.getElementsByClassName('js-select-redirect'));
    selectors.forEach(selector => {
        selector.addEventListener('change', function() {
            const value = selector.value;
            value && (window.location.href = value);
        });
    });
}
