<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- AOS - Animate On Scroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- Custom JavaScript -->
<script>
    // Initialize AOS
    AOS.init();

    // Navbar color change on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Function to join an initiative
    function joinInitiative(initiativeId) {
        alert(`You have joined initiative #${initiativeId}!`);
    }

    // Function to open the modal with initiative data
function joinInitiative(initiativeId) {
// Example initiative data
const initiatives = {
    1: { name: 'Clean Ocean Initiative', description: 'Working to remove plastic from oceans and promoting sustainable practices.' },
    2: { name: 'Education for All', description: 'Providing educational resources to children in underserved communities.' },
    3: { name: 'Tech for Seniors', description: 'Teaching digital literacy skills to senior citizens to keep them connected.' },
    4: { name: 'Urban Gardens', description: 'Creating community gardens in urban spaces to promote sustainable food systems.' }
};

// Get initiative details based on ID
const initiative = initiatives[initiativeId];

// Set the modal content dynamically
document.getElementById('initiativeName').innerText = initiative.name;
document.getElementById('initiativeDescription').innerText = initiative.description;

// Show the modal
document.getElementById('joinModal').style.display = 'block';
}

// Function to close the modal
function closeModal() {
document.getElementById('joinModal').style.display = 'none';
}

// Function to confirm joining the initiative
function confirmJoin() {
const message = document.getElementById('joinMessage').value;
const initiativeName = document.getElementById('initiativeName').innerText;
alert(`You have successfully joined the "${initiativeName}" initiative!\n\nMessage: ${message}`);
closeModal(); // Close the modal after confirmation
}

    // Function to view a user's initiatives
    function viewUserInitiatives(userId) {
        const user = users.find(u => u.id === userId);
        const userInitiatives = initiatives.filter(i => user.initiatives.includes(i.id));

        const modalTitle = document.getElementById('userInitiativesModalTitle');
        const modalBody = document.getElementById('userInitiativesModalBody');

        modalTitle.textContent = `${user.name}'s Initiatives`;

        modalBody.innerHTML = '';
        if (userInitiatives.length > 0) {
            const list = document.createElement('ul');
            list.className = 'list-group';

            userInitiatives.forEach(initiative => {
                const item = document.createElement('li');
                item.className = 'list-group-item d-flex justify-content-between align-items-center';
                item.innerHTML = `
                    ${initiative.title}
                    <span class="badge bg-primary rounded-pill">Active</span>
                `;
                list.appendChild(item);
            });

            modalBody.appendChild(list);
        } else {
            modalBody.innerHTML = '<p>This user hasn\'t joined any initiatives yet.</p>';
        }

        const modal = new bootstrap.Modal(document.getElementById('userInitiativesModal'));
        modal.show();
    }

      // Search functionality
    //   document.getElementById('searchInput').addEventListener('input', function(e) {
    //     const searchTerm = e.target.value.toLowerCase();

    //     if (searchTerm.trim() === '') {
    //         populateInitiatives();
    //         return;
    //     }

    //     const filtered = initiatives.filter(initiative => {
    //         const titleMatch = initiative.title.toLowerCase().includes(searchTerm);
    //         const descriptionMatch = initiative.description.toLowerCase().includes(searchTerm);
    //         const tagMatch = initiative.tags.some(tag => tag.toLowerCase().includes(searchTerm));

    //         return titleMatch || descriptionMatch || tagMatch;
    //     });

    //     populateInitiatives(filtered);

    //     // Provide feedback if no results
    //     const container = document.getElementById('initiativesContainer');
    //     if (filtered.length === 0) {
    //         container.innerHTML = '<div class="col-12 text-center"><p>No initiatives found matching your search.</p></div>';
    //     }
</script>
