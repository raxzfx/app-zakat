document.getElementById('entriesSelect').addEventListener('change', function() {
    let perPage = this.value;
    let url = new URL(window.location.href);
    url.searchParams.set('per_page', perPage);
    window.location.href = url.toString();
});