<?php
  require '../assets/php/connect.php'; // Pastikan file connect.php sudah termasuk koneksi ke database

  $query = "SELECT category, SUM(balance) AS total_balance
            FROM trans
            GROUP BY category";

  $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Transaction Summary by Category</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }
      .container {
        width: 50%;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
      }
      .container h2 {
        text-align: center;
        margin-bottom: 20px;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }
      table, th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
      }
      th {
        background-color: #f2f2f2;
      }

      .btn {
        display: flex;
        justify-content: center;
        margin: 20px;
        text-decoration: none;
      }
    </style>
</head>
<body>
    <div class="container">
        <h2>Transaction Summary by Category</h2>
        <table>
          <tr>
            <th>Category</th>
            <th>Total Balance</th>
          </tr>

          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row["category"]; ?></td>
            <td><?php echo $row["total_balance"]; ?></td>
          </tr>
          <?php } ?>
        </table>

        <a href="financial.php" class="btn">
            <button>
              Back
            </button>
          </a>
    </div>
</body>
</html>
