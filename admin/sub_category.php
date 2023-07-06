<?php
include_once './header.php';
?>
<main id="main" class="main">
    <div class="admin-content-container">
        <div class="d-flex justify-content-around">
            <h2 class="admin-heading">All Sub Categories</h2>
            <a class="add-new btn btn-danger" href="add_sub_category.php"> Add New </a>
        </div>

        <?php
        $limit = 10;
        $db = new Database;
        $db->select('sub_categories', '*', 'categories ON sub_categories.cat_parent = categories.cat_id', null, 'sub_categories.sub_cat_id DESC', $limit);
        $result = $db->getResult();
        //  print_r($result);
        // $db->select('categories','*',null,null,null,null,null);
        ?>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Title</th>
                <th>Category</th>
                <th>Show in Header</th>
                <th>Show in Footer</th>
                <th>Action</th>
            </thead>
            <tbody>

                <?php
                if (count($result) > 0) {
                    foreach ($result as $key => $row) {
                ?>

                        <tr>
                            <td><?= $row['sub_cat_title']; ?></td>
                            <!-- <td><?= $row['']; ?></td> -->

                            <td>

                        <?= $row['cat_title'];?>
                            </td>
                            <!-- Toggle Buttton for showing in header -->

                            <td>

                                <?php
                                if ($row['show_in_header'] == 1) {
                                ?>

                                    <input type="checkbox" class="toggle-checkbox showCat_Header" data-id="<?= $row['sub_cat_id']; ?>" checked />
                                <?php
                                } else {
                                ?>
                                    <input type="checkbox" class="toggle-checkbox showCat_Header" data-id="<?= $row['sub_cat_id']; ?>" />
                                <?php
                                }
                                ?>
                            </td>

                            <!-- Toggle Buttton for showing in Footer -->

                            <td>
                                <?php
                                if ($row['show_in_footer'] == 1) {

                                ?>

                                    <input type="checkbox" class="toggle-checkbox showCat_Footer" data-id="<?= $row['sub_cat_id']; ?>" checked />

                                <?php
                                } else {
                                ?>
                                    <input type="checkbox" class="toggle-checkbox showCat_Footer" data-id="<?= $row['sub_cat_id']; ?>" />

                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a class="text-primary" href="edit_sub_category.php?id=<?= $row['sub_cat_id']; ?>"><i class="fas fa-edit"></i></a> &nbsp;
                                <a class="delete_sub_cat text-danger" href="javascript:void();" data-id="<?= $row['sub_cat_id']; ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                    <?php
                    }
                } else {

                    ?>

                    <tr>
                        <td>No Sub Category is found</td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="pagination-outer">

        </div>
    </div>


</main>

<?php include './footer.php' ?>