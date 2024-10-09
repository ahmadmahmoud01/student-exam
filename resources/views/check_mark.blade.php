<!DOCTYPE html>
<html>

<head>
    <title>Check Exam Mark</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom button styles */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Custom card styles */
        .card {
            border-radius: 10px;
        }

        .card h3 {
            color: #343a40;
        }
    </style>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <h3 class="text-center mb-4">Check Your Exam Mark</h3>

                <form id="check-mark-form" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="studentCode" class="form-label">Enter Your Code</label>
                        <input type="text" id="studentCode" name="student_code" class="form-control" required>
                        <div class="invalid-feedback">
                            Please enter your code.
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Check Mark</button>
                    </div>
                </form>

                <div class="mt-4">
                    <div id="result" class="alert alert-info d-none"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('check-mark-form').addEventListener('submit', function(e) {
            e.preventDefault();
            let studentCode = document.getElementById('studentCode').value;

            // Clear previous result
            document.getElementById('result').classList.add('d-none');

            // Make an AJAX request to check the student's mark
            fetch('/check', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                    },
                    body: JSON.stringify({
                        student_code: studentCode
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    let result = document.getElementById('result');
                    result.classList.remove('d-none');

                    if (data.success) {
                        result.classList.replace('alert-info', 'alert-success');
                        result.innerHTML = `Your mark: <strong>${data.mark}</strong>`;
                    } else {
                        result.classList.replace('alert-info', 'alert-danger');
                        result.innerText = 'Code not found or invalid.';
                    }
                })
                .catch(err => console.error('Error:', err));
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
