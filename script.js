document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('productForm');
    const tableContainer = document.getElementById('productTable');

    function loadData() {
        fetch('fetch.php')
            .then(response => response.text())
            .then(data => tableContainer.innerHTML = data);
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch('save.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(() => {
            form.reset();
            loadData();
        });
    });

    loadData();
});
