<?php 


function view($view_path)
{

    $path = rtrim($view_path, '.php');


    $path = str_replace('.', '/', $path);
    $path = str_replace('//', '/', $path);

    
    $path = $path . '.php';
    $path = WD_ACADEMY_VIEWS . '/' . $path;
    
    $path = str_replace('/', DIRECTORY_SEPARATOR, $path);




    if( file_exists($path) ) {
        include $path;
    } else {

        echo "<h1 style='text-align: center; margin-top: auto; margin-bottom: auto; color: gray; font-weight: 600; font-size: 34px;'>
                <p style='margin-top: 42vh; color: #497a9b; font-size: 16px; margin-bottom: 15px;'>
                    <span style='border: 1px solid #497a9b; border-radius: 3px; padding: 2px 20px 4px 20px; margin-bottom: 24px;'>$view_path</span>
                </p>
                404, View Not Found!
            </h1>";
    }
    die;
}



function dd($data, $is_exit = true)
{
    echo '<pre style="background: #1d2327; padding: 20px; border-radius: 5px; width: 95%; border-top: 4px solid #1e91d8; color: white; font-size: 15px; white-space: pre-wrap; word-break: break-all; max-width: 100%;">';
    print_r($data);
    echo '</pre>';

    if($is_exit)
    {
        die();
    }
}

function request()
{
    $data = ( $_POST ?? $_GET) ?? [];

    if ( empty($data) ) {
        return (object) [];
    }


    return (object) $data;
}