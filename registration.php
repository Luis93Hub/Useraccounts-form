<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
    <title>User registration | PHP</title>
</head>

<body class="bg-slate-800">
    <div class="flex justify-center pt-20">
        <div class="w-full max-w-xs">
            <form action="registration.php" method="post">
                <div class="container">
                    <div>
                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            <h1 class="flex justify-center">Registration User</h1>
                            <p class="flex justify-center">Fill up the form with correct values.</p>
                            <div class="text-orange-700">
                                <label for="firstname"><b>First name:</b></label>
                                <input class="placeholder:italic placeholder:text-slate-400 " type="text" id="firstname" name="firstname" required>

                                <label for="lastname"><b>Last Name</b></label>
                                <input type="text" id="lastname" name="lastname" required>

                                <label for="email"><b>Email Address</b></label>
                                <input type="email" id="email" name="email" required>

                                <label for="phonenumber"><b>Phone Number</b></label>
                                <input type="number" id="phonenumber" name="phonenumber" required>

                                <label for="password"><b>Password</b></label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="pt-6 flex justify-center">
                                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" id="register" name="create" value="Sing up">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        const registerButton = document.getElementById('register');
        registerButton.addEventListener('click', (e) => {
            e.preventDefault();

            const params = {
                firstname: document.getElementById('firstname').value,
                lastname: document.getElementById('lastname').value,
                email: document.getElementById('email').value,
                phonenumber: document.getElementById('phonenumber').value,
                password: document.getElementById('password').value
            }

            fetch('process.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(params)
                })
                .then(response => response.json())
                .then(result => {
                    Swal.fire({
                        'title': 'Registration Result',
                        'text': result.message,
                        'icon': result.status ? 'success' : 'error'
                    })
                })
                .catch(err => {
                    Swal.fire({
                        'title': 'Errors',
                        'text': 'There were erros while saving the data.',
                        'icon': 'error'
                    })
                })

        });
    </script>
</body>

</html>