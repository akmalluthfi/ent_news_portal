<?php

require './functions.php';

guestMiddleware();

if (isset($_POST['register'])) {
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ];

    if (register($data) > 0) {
        echo "
			<script>
				alert('registered user successfully!');
				document.location.href = 'login';
			</script>
		";
    } else {
        echo "
			<script>
				alert('registered user failed!');
				document.location.href = 'register';
			</script>
		";
    }
}

?>

<?php require './components/header.php' ?>

<div class="container">
    <div class="row vh-100 align-items-center justify-content-center">
        <div class="col" style="max-width: 400px">

            <a href="/" class="text-decoration-none text-body-emphasis">
                <h2 class="text-center fw-normal mb-3">News Portal</h2>
            </a>

            <div class="card border-0 shadow p-3">
                <div class="card-body">
                    <h1 class="mb-3">Register</h1>
                    <form method="POST" action="" class="mb-3">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="*********" required>
                        </div>

                        <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
                    </form>

                    <p class="fs-6 fw-light text-body-secondary ">
                        Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require './components/footer.php' ?>