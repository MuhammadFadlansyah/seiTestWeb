<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items List</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
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
            width: 80%;
            max-width: 800px;
            box-sizing: border-box;
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        .actions {
            margin-bottom: 20px;
        }
        .actions a {
            text-decoration: none;
            color: #007bff;
            padding: 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s;
        }
        .actions a:hover {
            background-color: #007bff;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            text-decoration: none;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            background-color: #007bff;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Items List</h2>
        <div class="actions">
            <a href="<?= site_url('ItemsController/create'); ?>" class="btn">Add New Item</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama Lokasi</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="itemsTableBody">
                <!-- Data akan dimuat di sini -->
            </tbody>
        </table>
    </div>

    <script>
        // Fungsi untuk menghapus item
        function deleteItem(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                fetch(`http://localhost:8080/seitest/lokasi/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    alert('Item deleted successfully');
                    // Reload page or remove item from table
                    location.reload();
                })
                .catch(error => {
                    console.error('Error deleting item:', error);
                    alert('Error deleting item. Please try again later.');
                });
            }
        }

        // Fungsi untuk memuat data item dari API
        document.addEventListener('DOMContentLoaded', function() {
            fetch('http://localhost:8080/seitest/lokasi')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const tableBody = document.getElementById('itemsTableBody');
                    tableBody.innerHTML = ''; // Kosongkan isi tabel sebelumnya

                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.nama_lokasi}</td>
                            <td>${item.negara}</td>
                            <td>${item.provinsi}</td>
                            <td>${item.kota}</td>
                            <td>${new Date(item.created_at).toLocaleString()}</td>
                            <td>
                                <a href="<?= site_url('ItemsController/edit/'); ?>${item.id}" class="btn btn-edit">Edit</a>
                                <a href="#" onclick="deleteItem(${item.id})" class="btn btn-delete">Delete</a>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    const tableBody = document.getElementById('itemsTableBody');
                    tableBody.innerHTML = '<tr><td colspan="6">Error fetching data. Please try again later.</td></tr>';
                });
        });
    </script>
</body>
</html>
