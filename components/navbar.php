<nav class="navbar bg-body-tertiary shadow-sm mb-3">
    <div class="container">
        <a class="navbar-brand" href="/">News Portal</a>

        <?php if (isset($_SESSION["login"])) : ?>
            <div class="dropdown">
                <button class="btn btn-link text-decoration-none text-dark-emphasis dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome, <?= $_SESSION['username'] ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard/">Dashboard</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form class="dropdown-item" method="post" action="/logout">
                            <button class="btn btn-link text-decoration-none text-danger p-0 m-0" type="submit" name="logout">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        <?php else : ?>
            <a href="/login" class="btn btn-primary">Login</a>
        <?php endif; ?>
    </div>
</nav>