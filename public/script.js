
function showSection(sectionID) {

    const allSections = document.querySelectorAll('.content, .homecontent');
    

    allSections.forEach(section => {
        section.style.display = 'none';
    });

   
    const activeSection = document.getElementById(sectionID);
    if(activeSection) {
        activeSection.style.display = 'block';
    }
}

document.getElementById('logo').addEventListener('click', function() {

    showSection('home');
});


document.getElementById('clrbtn').addEventListener('click', function() {
    const inputs = document.querySelectorAll('input[type="text"]');
    inputs.forEach(input => input.value = '');
});


window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'success') {
        const toast = document.getElementById('success-toast');
        toast.classList.remove('toast-hidden');
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.classList.add('toast-hidden'), 500);
        }, 3000);
        window.history.replaceState({}, document.title, window.location.pathname);
    }
}

function confirmDelete() {
    const id = document.getElementById('delete-id').value;
    return confirm("Are you sure you want to delete student with ID: " + id + "? This cannot be undone.");
}

document.addEventListener('DOMContentLoaded', function() {
    
    
    const updateForm = document.getElementById('update-form');
    if (updateForm) {
        updateForm.addEventListener('submit', function(e) {
            const id = document.getElementById('update-id').value;
            if (id.trim() === "") {
                e.preventDefault();
                alert("Please enter a valid Student ID.");
            }
        });
    }

    const deleteForm = document.getElementById('delete-form');
    if (deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            const id = document.getElementById('delete-id').value;
            if (id.trim() === "") {
                e.preventDefault();
                alert("Please enter a valid Student ID to delete.");
            }
        });
    }
});