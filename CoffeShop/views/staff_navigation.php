<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Coffee Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if($_SESSION['_auth_'] == 'true'){?>
                <?php if($_SESSION['_roleid_'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link" href="staff_manage_users.php">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="staff_manage_customers.php">View Customers</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Bills
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="staff_manage_table_bills.php">Table Bills</a></li>
                        <li><a class="dropdown-item" href="staff_manage_coffee_bills.php">Coffee Bills</a></li>
                    </ul>
                </li>
                <?php }?>
                <?php if($_SESSION['_roleid_'] == 3){?>
                <li class="nav-item">
                    <a class="nav-link" href="staff_manage_orders.php">Manage Orders <span id="order_count_notify"
                            class="badge bg-danger"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="staff_manage_stock.php">Manage Stock</a>
                </li>
                <?php }?>
                <?php }?>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-danger" href="database/logout.php" type="button">Log Out</a>
            </form>
        </div>
    </div>
</nav>