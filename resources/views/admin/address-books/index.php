
<?php 
    $address_books = \WeDevs\Academy\Models\AddressBook::all();
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>




<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Address Book', WD_TRANSLATE ) ?></h1>

    <a href="<?php echo admin_url('admin.php?page=wedevs-academy&action=create') ?>" class="page-title-action">Add New</a>
</div>

<table class="table table-dark table-striped" style="width: 98%; margin-top: 20px">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($address_books as $address_book): ?>
            <tr>
                <td><?php _e($address_book->name, WD_TRANSLATE); ?></td>
                <td><?php _e($address_book->phone, WD_TRANSLATE); ?></td>
                <td><?php _e($address_book->address, WD_TRANSLATE); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>