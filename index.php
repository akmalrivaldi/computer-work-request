<?php 
session_start();

if ( !isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}
    require ('function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
 .menu-box {
            border: 1px solid #ccc;
            background-color: #82def5;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            margin-bottom: 15px;
            color: black; 
            text-decoration: none; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 180px;
            width: 100%; 
        }

        .menu-box:hover {
            transform: scale(1.05);
            transition: 500ms ease;
            background-color: black;
            opacity: 0.7;
            color: white;
            cursor: pointer;
        }

        .menu-box h5 {
            color: black;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .menu-box:hover h5 {
            color: white; 
        }

        .menu-image {
            width: 80px;
            height: 80px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .col-sm-6 {
                max-width: 50%;
                flex: 0 0 50%; 
            }
        }
    </style>

    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<div class="container mt-4">
        <h1 class="mb-4">Dashboard</h1>
    
        <!-- Container for menu boxes -->
        <div class="row g-3" id="menuContainer">
            <?php
            $menus = json_decode(file_get_contents('menus.json'), true);

            $menuCount = 0;
            foreach ($menus as $menu) {
                $menuCount++;
                $hiddenClass = $menuCount > 6 ? 'hidden-menu' : '';
                echo "
                    <div class='col-12 col-sm-6 col-md-4'>
                        <a href='{$menu['url']}' class='menu-box $hiddenClass'>
                            <img src='{$menu['image']}' alt='Menu Image' class='menu-image'>
                            <h5>{$menu['title']}</h5>
                        </a>
                    </div>
                ";
            }
            ?>
        </div>

        <!-- See more button -->
        <button id="seeMoreBtn" class="btn btn-primary mt-3" style="display: <?= $menuCount > 6 ? 'block' : 'none'; ?>;" onclick="showMoreMenus()">See More</button>
        <!-- Add new menu button -->
        <a href="add_menu.php" class="btn btn-success mt-3">Add New Menu</a>
        <a href="logout.php" class="btn btn-danger mt-3" onclick="return confirm('are you sure to logout?')">logout <i data-feather="log-out"></i></a>

    </div>

    <script>
        function showMoreMenus() {
            const hiddenMenus = document.querySelectorAll('.hidden-menu');
            hiddenMenus.forEach(menu => menu.classList.remove('hidden-menu'));
            document.getElementById('seeMoreBtn').style.display = 'none'; // Hide the button after all menus are shown
        }
    </script>
    <script>
      feather.replace();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
