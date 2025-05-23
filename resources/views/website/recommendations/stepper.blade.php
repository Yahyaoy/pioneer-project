<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Initiative Recommendations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 2rem;
        }

        .stepper-wrapper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stepper-item {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .stepper-item::before {
            position: absolute;
            content: "";
            border-bottom: 2px solid #ccc;
            width: 100%;
            top: 20px;
            left: -50%;
            z-index: 2;
        }

        .stepper-item::after {
            position: absolute;
            content: "";
            border-bottom: 2px solid #ccc;
            width: 100%;
            top: 20px;
            left: 50%;
            z-index: 2;
        }

        .stepper-item:first-child::before {
            display: none;
        }

        .stepper-item:last-child::after {
            display: none;
        }

        .stepper-item.active {
            font-weight: bold;
        }

        .stepper-item.completed .step-counter {
            background-color: #4CAF50;
        }

        .step-counter {
            position: relative;
            z-index: 5;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ccc;
            margin-bottom: 6px;
            color: #fff;
        }

        .step-name {
            font-size: 14px;
        }

        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76,175,80,0.25);
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .interest-tags {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
        }

        .form-check {
            padding: 1rem;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            transition: all 0.3s ease;
        }

        .form-check:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="stepper-wrapper mb-5">
                            <div class="stepper-item" data-step="1">
                                <div class="step-counter">1</div>
                                <div class="step-name">Location</div>
                            </div>
                            <div class="stepper-item" data-step="2">
                                <div class="step-counter">2</div>
                                <div class="step-name">Participants</div>
                            </div>
                            <div class="stepper-item" data-step="3">
                                <div class="step-counter">3</div>
                                <div class="step-name">Interests</div>
                            </div>
                            <div class="stepper-item" data-step="4">
                                <div class="step-counter">4</div>
                                <div class="step-name">Results</div>
                            </div>
                        </div>

                        <form id="recommendationForm">
                            <!-- Step 1: Location -->
                            <div class="step-content" id="step1">
                                <h3 class="text-center mb-4">Select Location</h3>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="location" id="location" placeholder="Enter your preferred location">
                                </div>
                            </div>

                            <!-- Step 2: Max Participants -->
                            <div class="step-content d-none" id="step2">
                                <h3 class="text-center mb-4">Maximum Participants</h3>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-lg" name="max_participants" id="maxParticipants" min="1" placeholder="Enter maximum number of participants">
                                </div>
                            </div>

                            <!-- Step 3: Interests -->
                            <div class="step-content d-none" id="step3">
                                <h3 class="text-center mb-4">Select Your Interests</h3>
                                <div class="form-group">
                                    <div class="interest-tags">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="interests[]" value="education">
                                            <label class="form-check-label">Education</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="interests[]" value="environment">
                                            <label class="form-check-label">Environment</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="interests[]" value="technology">
                                            <label class="form-check-label">Technology</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="interests[]" value="health">
                                            <label class="form-check-label">Health</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="interests[]" value="community">
                                            <label class="form-check-label">Community</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="interests[]" value="arts">
                                            <label class="form-check-label">Arts</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Results -->
                            <div class="step-content d-none" id="step4">
                                <h3 class="text-center mb-4">Recommended Initiatives</h3>
                                <div id="loadingSpinner" class="loading-spinner">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2">Finding the best matches for you...</p>
                                </div>
                                <div id="recommendationsContainer" class="row g-4">
                                    <!-- Results will be loaded here -->
                                </div>
                            </div>

                            <div class="mt-4 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary btn-lg px-4" id="prevBtn" style="display: none;">Previous</button>
                                <button type="button" class="btn btn-primary btn-lg px-4" id="nextBtn">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentStep = 1;
        const totalSteps = 4;

        document.addEventListener('DOMContentLoaded', function() {
            updateStepperState();

            document.getElementById('nextBtn').addEventListener('click', function() {
                if (currentStep < totalSteps) {
                    if (validateStep(currentStep)) {
                        if (currentStep === 3) {
                            // Submit form and show results
                            submitForm();
                        } else {
                            nextStep();
                        }
                    }
                }
            });

            document.getElementById('prevBtn').addEventListener('click', function() {
                if (currentStep > 1) {
                    prevStep();
                }
            });
        });

        function validateStep(step) {
            switch(step) {
                case 1:
                    return document.getElementById('location').value.trim() !== '';
                case 2:
                    return document.getElementById('maxParticipants').value > 0;
                case 3:
                    return document.querySelectorAll('input[name="interests[]"]:checked').length > 0;
                default:
                    return true;
            }
        }

        function nextStep() {
            document.getElementById(`step${currentStep}`).classList.add('d-none');
            currentStep++;
            document.getElementById(`step${currentStep}`).classList.remove('d-none');
            updateStepperState();
        }

        function prevStep() {
            document.getElementById(`step${currentStep}`).classList.add('d-none');
            currentStep--;
            document.getElementById(`step${currentStep}`).classList.remove('d-none');
            updateStepperState();
        }

        function updateStepperState() {
            const stepperItems = document.querySelectorAll('.stepper-item');
            stepperItems.forEach((item, index) => {
                const step = index + 1;
                item.classList.remove('active', 'completed');
                if (step === currentStep) {
                    item.classList.add('active');
                } else if (step < currentStep) {
                    item.classList.add('completed');
                }
            });

            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            prevBtn.style.display = currentStep === 1 ? 'none' : 'inline-block';
            nextBtn.textContent = currentStep === 3 ? 'Get Recommendations' : 'Next';
        }

        function submitForm() {
            const formData = new FormData(document.getElementById('recommendationForm'));

            // Get all checked interests
            const checkedInterests = Array.from(document.querySelectorAll('input[name="interests[]"]:checked'))
                .map(checkbox => checkbox.value);

            const jsonData = {
                location: document.getElementById('location').value.trim(),
                max_participants: parseInt(document.getElementById('maxParticipants').value),
                interests: checkedInterests // Ensure interests is always an array
            };

            // Show loading state
            const nextBtn = document.getElementById('nextBtn');
            const originalBtnText = nextBtn.textContent;
            nextBtn.disabled = true;
            nextBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';

            fetch('/recommendations', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => {
                        try {
                            // Try to parse as JSON first
                            const json = JSON.parse(text);
                            throw new Error(json.message || `Server error: ${response.status}`);
                        } catch (e) {
                            // If not JSON, handle as text
                            throw new Error(`Server error: ${response.status}. ${text.substring(0, 100)}`);
                        }
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    displayRecommendations(data.recommendations);
                    nextStep();
                } else {
                    throw new Error(data.message || 'Failed to get recommendations');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Create a more user-friendly error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger mt-3';
                errorDiv.role = 'alert';
                errorDiv.innerHTML = `
                    <h4 class="alert-heading">Error Getting Recommendations</h4>
                    <p>${error.message || 'An unexpected error occurred. Please try again.'}</p>
                    <hr>
                    <p class="mb-0">Please verify your selections and try again. If the problem persists, contact support.</p>
                `;

                // Insert error message before the form buttons
                const formButtons = document.querySelector('.mt-4');
                formButtons.parentNode.insertBefore(errorDiv, formButtons);

                // Auto-dismiss error after 5 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            })
            .finally(() => {
                // Reset button state
                nextBtn.disabled = false;
                nextBtn.textContent = originalBtnText;
            });
        }

        function displayRecommendations(recommendations) {
            const container = document.getElementById('recommendationsContainer');
            container.innerHTML = '';

            if (!recommendations || recommendations.length === 0) {
                container.innerHTML = `
                    <div class="col-12">
                        <div class="no-results">
                            <h4>No Matching Initiatives Found</h4>
                            <p>Try adjusting your preferences to see more results.</p>
                            <button onclick="prevStep()" class="btn btn-outline-primary mt-3">
                                Adjust Preferences
                            </button>
                        </div>
                    </div>
                `;
                return;
            }

            recommendations.forEach(initiative => {
                container.innerHTML += `
                    <div class="col-md-6 mb-4">
                        <div class="card recommendation-card h-100">
                            <img src="${initiative.image_url || 'https://via.placeholder.com/400x200'}"
                                 class="recommendation-image"
                                 alt="${initiative.title}">
                            <div class="card-body">
                                <h5 class="card-title">${initiative.title}</h5>
                                <p class="card-text">${initiative.description}</p>
                                <div class="mb-3">
                                    ${initiative.interest_type ?
                                        `<span class="interest-tag">${initiative.interest_type}</span>` : ''}
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-primary badge-custom">
                                        <i class="fas fa-map-marker-alt me-1"></i> ${initiative.location}
                                    </span>
                                    <span class="participant-count">
                                        <i class="fas fa-users me-1"></i> ${initiative.participants_count} participants
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <a href="/initiatives/${initiative.id}" class="btn btn-primary w-100">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function submitForm() {
            // Show loading spinner
            document.getElementById('loadingSpinner').style.display = 'block';
            document.getElementById('recommendationsContainer').style.display = 'none';

            const formData = new FormData(document.getElementById('recommendationForm'));

            // Get all checked interests
            const checkedInterests = Array.from(document.querySelectorAll('input[name="interests[]"]:checked'))
                .map(checkbox => checkbox.value);

            const jsonData = {
                location: document.getElementById('location').value.trim(),
                max_participants: parseInt(document.getElementById('maxParticipants').value),
                interests: checkedInterests // Ensure interests is always an array
            };

            // Show loading state
            const nextBtn = document.getElementById('nextBtn');
            const originalBtnText = nextBtn.textContent;
            nextBtn.disabled = true;
            nextBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';

            fetch('/recommendations', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => {
                        try {
                            // Try to parse as JSON first
                            const json = JSON.parse(text);
                            throw new Error(json.message || `Server error: ${response.status}`);
                        } catch (e) {
                            // If not JSON, handle as text
                            throw new Error(`Server error: ${response.status}. ${text.substring(0, 100)}`);
                        }
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    displayRecommendations(data.recommendations);
                    nextStep();
                } else {
                    throw new Error(data.message || 'Failed to get recommendations');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Create a more user-friendly error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger mt-3';
                errorDiv.role = 'alert';
                errorDiv.innerHTML = `
                    <h4 class="alert-heading">Error Getting Recommendations</h4>
                    <p>${error.message || 'An unexpected error occurred. Please try again.'}</p>
                    <hr>
                    <p class="mb-0">Please verify your selections and try again. If the problem persists, contact support.</p>
                `;

                // Insert error message before the form buttons
                const formButtons = document.querySelector('.mt-4');
                formButtons.parentNode.insertBefore(errorDiv, formButtons);

                // Auto-dismiss error after 5 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            })
            .finally(() => {
                // Hide loading spinner and show results
                document.getElementById('loadingSpinner').style.display = 'none';
                document.getElementById('recommendationsContainer').style.display = 'block';
                // Reset button state
                nextBtn.disabled = false;
                nextBtn.textContent = originalBtnText;
            });
        }
    </script>

    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>
