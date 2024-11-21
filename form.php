<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registration</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="background">
        <div class="form-container">
            <h1>Formulir Registration</h1>
            
            <form id="registrationForm" method="POST" action="process.php" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required minlength="3" required placeholder="Please Input Full Name">
                    <div class="error" id="nameError"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="exmaple@gmail.com">
                    <div class="error" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" min="10" max="100" required>
                    <div class="error" id="ageError"></div>
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <div class="error" id="genderError"></div>
                </div>

                <div class="form-group">
                    <label for="textfile">Upload Text File</label>
                    <input type="file" id="textfile" name="textfile" accept=".txt" required>
                    <div class="error" id="fileError"></div>
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            let hasError = false;

            // Validate Name
            const name = document.getElementById('name').value;
            if (name.length < 3) {
                document.getElementById('nameError').innerText = "Name must be at least 3 characters.";
                hasError = true;
            } else {
                document.getElementById('nameError').innerText = "";
            }

            // Validate File
            const fileInput = document.getElementById('textfile');
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                if (file.size > 1048576) {
                    document.getElementById('fileError').innerText = "File size must not exceed 1MB.";
                    hasError = true;
                } else {
                    document.getElementById('fileError').innerText = "";
                }
            } else {
                document.getElementById('fileError').innerText = "File is required.";
                hasError = true;
            }

            if (hasError) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
