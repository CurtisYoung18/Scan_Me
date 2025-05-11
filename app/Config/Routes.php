<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// nav bar and main page
$routes->get('/', 'MenuController::home'); // Default page without login or login as user
$routes->get('/dashboard', 'MenuController::dashboard'); // Adminpanel page after login as admin 


// Tables and QR code page
$routes->get('/qrcode', 'MenuController::qrcode'); // This is "manage tables" in the UI
$routes->post('qrcode', 'MenuController::generateQrCode');
// Edit table
$routes->get('/deleteTable/(:num)', 'MenuController::deleteTable/$1');
$routes->post('/addTable', 'MenuController::addTable'); 


// Place order
$routes->get('/placeorder/(:num)', 'MenuController::showOrderForm/$1'); // Display the order form
$routes->post('/placeorder/(:num)', 'MenuController::submitOrder/$1'); // Submit the order
$routes->get('/orderSuccess', 'MenuController::orderSuccess'); // User will be redirected here after placing an order successfully


// Order management
$routes->get('/order', 'MenuController::order'); // Show all orders
$routes->get('/markOrderAsDone/(:num)', 'MenuController::markOrderAsDone/$1'); // The advanced function to mark an order as done
$routes->get('orderDetails/(:num)', 'MenuController::orderDetails/$1'); // Show the details of an order


// Menu management
$routes->get('/showmenu', 'MenuController::displayMenu'); // Display the menu
$routes->match(['GET', 'POST'], 'showmenu/(:num)', 'MenuController::manageMenuItem/$1'); // Edit a menu item
$routes->match(['GET', 'POST'], 'showmenu/', 'MenuController::manageMenuItem'); // Add a new menu item
$routes->get('deleteMenuItem/(:num)', 'MenuController::deleteMenuItem/$1'); // Delete a menu item


// User management where can be accessed by admin only through dashboard "USER MANAGEMENT"!!!
$routes->group('manageUsers', function($routes) {
    $routes->get('/', 'MenuController::manageUsers'); // Display all users
    $routes->match(['get', 'post'], 'addedit', 'MenuController::addedit'); // Add a user
    $routes->match(['get', 'post'], 'addedit/(:num)', 'MenuController::addedit/$1'); // Edit a user
    $routes->get('delete/(:num)', 'MenuController::delete/$1'); // Delete a user
});

// user info
$routes->get('/user/(:num)', 'MenuController::user/$1');


// Auth routes
$routes->get('/login/google', 'Auth::google_login'); // Google login route
$routes->get('/login/callback', 'Auth::google_callback');  // Callback route after Google auth
$routes->get('/logout', 'Auth::logout'); // Logout route

