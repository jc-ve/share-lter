<div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Username</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>

                        <?php
$query = "SELECT * FROM users";
$select_users = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];

    echo "<tr>";
    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$user_firstname</td>";

    // $query = "SELECT * FROM category WHERE cat_id = $post_category_id";
    // $select_categories_id = mysqli_query($connection, $query);

    // while ($row = mysqli_fetch_assoc($select_categories_id)) {
    //     $cat_id = $row['cat_id'];
    //     $cat_title = $row['cat_title'];
    //     echo "<td>$cat_title</td>";
    // }

    echo "<td>$user_lastname</td>";
    echo "<td>$user_email</td>";

    echo "<td>$user_role</td>";
    echo "<td>

    <a href='users.php?change_to_admin=$user_id'>
    <i class='fa-solid fa-hammer text-success mr-2'></i>
    </a>

    <a href='users.php?change_to_sub=$user_id'>
    <i class='fa-solid fa-user text-warning mr-2'></i>
    </a>

    <a href='users.php?source=edit_user&edit_user={$user_id}'>
    <i class='fa-solid fa-user-pen text-secondary mr-2'></i>
    </a>


    <a href='users.php?delete=$user_id'>
    <i class='fa-solid fa-trash-can text-danger'></i>
    </a>
    </td>";
    echo "</tr>";
}
?>

                      </tbody>
                    </table>
                    </div>

<?php
if (isset($_GET['change_to_admin'])) {

    $the_user_id = $_GET['change_to_admin'];

    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
    $change_admin_query = mysqli_query($connection, $query);
    header("Location: users.php");

}
?>

<?php
if (isset($_GET['change_to_sub'])) {

    $the_user_id = $_GET['change_to_sub'];

    $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $the_user_id";
    $change_subscriber_query = mysqli_query($connection, $query);
    header("Location: users.php");

}
?>

<?php
if (isset($_GET['delete'])) {

    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_user_query = mysqli_query($connection, $query);
    header("Location: users.php");

}
?>



