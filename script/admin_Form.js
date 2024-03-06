document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.admin_form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); 

        const region = document.querySelector('select[name="regions"]').value;
        const date = document.getElementById('date').value;
        const name = document.getElementById('name').value;
        const description = document.getElementById('description').value;

        if (!region || !date || !name || !description) {
            alert("Veuillez remplir tous les champs !");
            return;
        }

        this.submit();
    });
});
