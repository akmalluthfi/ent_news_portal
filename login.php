<?php
require './functions.php';

guestMiddleware();

if (isset($_POST['login'])) {
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ];

    if (login($data) > 0) {
        echo "
			<script>
				alert('login successfully!');
				document.location.href = '/dashboard';
			</script>
		";
    } else {
        echo "
			<script>
				alert('These credentials do not match our records.');
				document.location.href = 'login';
			</script>
		";
    }
}

?>

<?php require './components/header.php' ?>

<div class="container">
    <div class="row vh-100 align-items-center justify-content-center">
        <div class="col" style="max-width: 400px">
            <div class="card border-0 shadow p-3">
                <div class="card-body">
                    <h1 class="mb-3">Login</h1>
                    <form method="POST" action="" class="mb-3">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="*********" required>
                        </div>

                        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                    </form>

                    <p class="fs-6 fw-light text-body-secondary ">
                        Don't have an account yet? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require './components/footer.php' ?>