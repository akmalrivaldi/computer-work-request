<?php
session_start();

if ( !isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the title from the form
    $title = $_POST['title'];
    $url = $_POST['url'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $imageUploadPath =  '../'. $imageName;

        // Move uploaded file to the uploads directory
        move_uploaded_file($imageTmpPath, $imageUploadPath);

        // Save menu details to a JSON file (in a real app, this could be a database)
        $menu = [
            'title' => $title,
            'image' => $imageUploadPath,
            'url' => $url
        ];

        // Read existing menus
        $menus = json_decode(file_get_contents('menus.json'), true);

        // Add new menu to the list
        $menus[] = $menu;

        // Save updated menu list
        file_put_contents('menus.json', json_encode($menus));

        // Redirect back to the dashboard
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Add New Menu</h1>

        <!-- Form to add new menu -->
        <form action="add_menu.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Menu Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" name="url" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Menu Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
