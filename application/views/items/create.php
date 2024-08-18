<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            box-sizing: border-box;
        }
        h2 {
            margin-top: 0;
            color: #333;
            margin-bottom: 20px; /* Menambahkan margin bawah untuk memberi jarak dengan form */
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px; /* Padding ditingkatkan untuk kenyamanan */
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px; /* Padding ditingkatkan untuk tombol */
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Item</h2>
        <form method="post" action="<?= site_url('ItemsController/store'); ?>">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required />

            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>

            <input type="submit" value="Create Item" />
        </form>
        <a href="<?= site_url('ItemsController'); ?>" class="back-link">Back</a>
    </div>
</body>
</html>
