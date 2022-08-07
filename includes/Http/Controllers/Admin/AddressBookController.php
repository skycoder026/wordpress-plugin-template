<?php 

namespace WeDevs\Academy\Http\Controllers\Admin;


use WeDevs\Academy\Controller;
use WeDevs\Academy\Models\AddressBook;

/**
 * The address book handler class
 */
class AddressBookController extends Controller {

    private $action = 'index';
    

    /**
     * Initialize the class
     *
     * @return void
     */
    function __construct() 
    {
        $this->action = isset( $_GET['action'] ) ? $_GET['action'] : 'index';
    }

    /**
     * Render the address book pages
     *
     * @return void
     */
    public function render_address_book_page() {


        switch($this->action) {
            case 'create':
                $this->create_page();
                break;
            case 'edit':
                $this->edit_page();
                break;
            case 'view':
                $this->show_page();
                break;
            default:
                $this->index_page();
                break;
        }
    }

    /**
     * Render the address book index page
     *
     * @return void
     */
    public function index_page() 
    {
        return view("admin.address-books.index");

        // return view("admin/address-books/index");
        // return view("admin/address-books/index.php");
        // return view("admin.address-books.index.php");

        // echo view("admin/address-books/index");
        // echo view("admin/address-books/index.php");
        // echo view("admin.address-books.index");
        // echo view("admin.address-books.index.php");
    }

    /**
     * Render the address book create page
     *
     * @return void
     */
    public function create_page() 
    {
        return view("admin.address-books.create");
    }

    /**
     * Render the address book edit page
     *
     * @return void
     */
    public function edit_page() 
    {
        $this->render_view('edit.php');
    }

    /**
     * Render the address book view page
     *
     * @return void
     */
    public function show_page() 
    {
        $this->render_view('show.php');
    }

    /**
     * Render the address book pages
     *
     * @return void
     */
    private function render_view($view_name)
    {
        if( file_exists( "$this->view_path/$view_name" ) ){
            include "$this->view_path/$view_name";
        } else {
            echo '<h1>404, Page Not found</h1>';
        }
    }


    public function form_handler() 
    {
        
        $this->checkNonce();

        if( isset($_POST['store_address']) && $_POST['store_address'] != "") {

            $this->store();
        }
    }

    private function checkNonce()
    {
        if( ! isset($_POST['store_address']) ) {
            return;
        }

        if( ! wp_verify_nonce($_POST['_wpnonce'], 'wd_academy_create_address') ) {
            wp_die( 'Are you cheating nonse?' );
        }

        if( ! current_user_can( 'manage_options' )) {
            wp_die( 'Are you cheating?' );
        }
    }


    private function store() 
    {
        $request = request();
        
        $addressBook = AddressBook::create([
            'product_id' => random_int(1, 1000),
            'name'       => sanitize_text_field($request->name),
            'address'    => sanitize_textarea_field($request->address),
            'phone'      => sanitize_text_field($request->phone),
            'created_by' => get_current_user_id(),
            'date'       => $request->date ?? date( 'Y-m-d' ),
            'created_at' => current_time( 'mysql' ),
        ]);

        wp_redirect( admin_url('admin.php?page=wedevs-academy&action=index') );

    }
}