// Form validation
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', event => {
        let isValid = true;
        form.querySelectorAll('input[required], select[required]').forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('invalid');
            } else {
                input.classList.remove('invalid');
            }
        });

        if (!isValid) {
            event.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
});

// Search functionality
const searchInput = document.getElementById('query');
const searchResults = document.getElementById('search-results');

searchInput.addEventListener('input', () => {
    const query = searchInput.value.trim().toLowerCase();
    const rows = searchResults.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        const name = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
        if (name.includes(query)) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
});

// Confirm medicine removal
const removeMedicineForm = document.getElementById('remove-medicine-form');

removeMedicineForm.addEventListener('submit', event => {
    const confirmation = confirm('Are you sure you want to remove this medicine?');
    if (!confirmation) {
        event.preventDefault();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const makeSaleForm = document.getElementById('make-sale-form');
    if (makeSaleForm) {
        makeSaleForm.addEventListener('submit', function(event) {
            const medicineSelect = document.getElementById('medicine');
            const quantityInput = document.getElementById('quantity');

            if (!medicineSelect.value || !quantityInput.value) {
                event.preventDefault();
                alert('Please select a medicine and enter a quantity.');
            }
        });
    }
});