<?php

function confirm($result)
{
    global $connection;

    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

}

function insert_categories()
{
    global $connection;

    if (isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];

        $query = "INSERT INTO category(cat_title) ";
        $query .= "VALUE('{$cat_title}')";

        $create_category_query = mysqli_query($connection, $query);

        if (!$create_category_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
    }
}

function findAllCategories()
{
    global $connection;

    $query = "SELECT * FROM category";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td>
    <a href='categories.php?edit={$cat_id}'><i class='fa-solid fa-pen text-warning mr-3'></i></a>
    <a href='categories.php?delete={$cat_id}'><i class='fa-solid fa-trash-can text-danger'></i></a>

    </td>";
        echo "<tr>";
    }
}

function deleteCategories()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM category WHERE cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}
