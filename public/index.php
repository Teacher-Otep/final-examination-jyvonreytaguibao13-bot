<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link   rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
    <img src="logo.jpg" id="logo" style="cursor: pointer;">
    <button class="navbarbuttons" onclick="showSection('create')">Create</button>
    <button class="navbarbuttons" onclick="showSection('read')">Read</button>
    <button class="navbarbuttons" onclick="showSection('update')">Update</button>
    <button class="navbarbuttons" onclick="showSection('delete')">Delete</button>
</nav>
    <section id="home" class="homecontent"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <section id="create" class="content">
        <h1 class="contenttitle"> Insert New Student </h1>

    <form action="insert.php" method="POST">
        <label for="surname" class="label">Surname</label>
        <input type="text" name="surname" id="surname" class="field" required><br/>

        <label for="name" class="label">Name</label>
        <input type="text" name="name" id="name" class="field" required><br/>

        <label for="middlename" class="label">Middle name</label>
        <input type="text" name="middlename" id="middlename" class="field"><br/>

        <label for="address" class="label">Address</label>
        <input type="text" name="address" id="address" class="field"><br/>

        <label for="contact" class="label">Mobile Number</label>
        <input type="text" name="contact" id="contact" class="field"><br/>

        <div id="btncontainer">
            <button type="button" id="clrbtn" class="btns">Clear Fields</button><br/>
            <button type="submit" id="savebtn" class="btns">Save</button>
        </div>

        <div id="success-toast" class="toast-hidden">
            Registration Successful!
        </div>
    </form>   

    </section>

<br/><br/><br/><br/>

    <section id="read" class="content" style="display:none;">
    <h1 class="contenttitle">View Students</h1>
    <?php
    require_once 'db.php';

    try {
        $stmt = $pdo->query("SELECT * FROM students");

        if ($stmt->rowCount() > 0) {
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Middle Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                  </tr>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['surname']}</td>
                        <td>{$row['middlename']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['contact_number']}</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No records found.</p>";
        }

    } catch (PDOException $e) {
        echo "<p>Error fetching data.</p>";
    }
    ?>
</section>
    <section id="update" class="content" style="display:none;">
    <h1 class="contenttitle">Update Student</h1>
    <form action="insert.php" method="POST">
        <label for="update_id" class="label">Student ID</label>
        <input type="number" name="id" id="update_id" class="field" required><br/>
        <button type="submit" class="btns">Update</button>
    </form>
</section>
   <section id="delete" class="content" style="display:none;">
    <h1 class="contenttitle">Delete Student</h1>
    <form action="delete.php" method="POST">
        <label for="delete_id" class="label">Student ID</label>
        <input type="number" name="id" id="delete_id" class="field" required><br/>
        <button type="submit" class="btns" style="background-color: #4d5fff; color: white;">Delete</button>
    </form>
</section>
    <script src="script.js"></script>
</body>
</html>