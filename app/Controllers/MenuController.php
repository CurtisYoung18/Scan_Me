<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class MenuController extends BaseController
{
    public function __construct()
    {
        helper('url'); 
        $this->session = session();
    }

    /**
     * Displays the home page.
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Displays the dashboard page.
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Displays the menu items.
     */
    public function displayMenu()
    {
        $menuModel = new \App\Models\MenuModel();
        $menu = $menuModel->findAll(); // Fetch all menu items
        return view('showmenu', ['menu' => $menu]); // Pass menu items to 'showmenu' view
    }

    /**
     * Manages (adds or edits) a menu item.
     *
     * @param int|null $id The ID of the menu item to edit, or null for adding a new item.
     */
    public function manageMenuItem($id = null)
    {
        $menuModel = new \App\Models\MenuModel();
        
        if (!empty($_POST)) { // Check if the form is submitted
            $data = [
                'name' => $this->request->getPost('name'),
                'category' => $this->request->getPost('category'),
                'price' => $this->request->getPost('price'),
                'summary' => $this->request->getPost('summary'),
                'image' => $this->request->getPost('image'),
            ];

            if (!$menuModel->validate($data)) { // Validate the input data
                return redirect()->to('/showmenu')->with('error', 'Invalid input data');
            }

            $isNew = $id === null; // Check if it's a new menu item
            if ($isNew) { // Insert a new menu item
                if ($menuModel->insert($data)) {
                    $this->session->setFlashdata('success', 'New dish added successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to add new dish. Please try again.');
                }
            } else { // Update an existing menu item
                if ($menuModel->update($id, $data)) {
                    $this->session->setFlashdata('success', 'Menu item updated successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update menu item. Please try again.');
                }
            }

            return redirect()->to('/showmenu');
        }

        $menu = ($id === null) ? null : $menuModel->find($id); // Find menu item if ID provided
        return view('editmenu', ['menu' => $menu]); // Pass menu item to 'editmenu' view
    }

    /**
     * Deletes a menu item.
     *
     * @param int $id The ID of the menu item to delete.
     */
    public function deleteMenuItem($id)
    {
        $menuModel = new \App\Models\MenuModel();
        if ($menuModel->delete($id)) { // Attempt to delete the item
            $this->session->setFlashdata('success', 'Menu item deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete menu item. Please try again.');
        }

        return redirect()->to('/showmenu');
    }

    /**
     * Manages users.
     */
    public function manageUsers()
    {
        $model = new \App\Models\UserModel();
        $search = $this->request->getGet('search');
    
        if (!empty($search)) { // If a search term is provided
            $conditions = [];
            foreach ($model->allowedFields as $field) { // Create search conditions for each field
                $conditions[] = "$field LIKE '%$search%'";
            }
            $whereClause = implode(' OR ', $conditions); // Combine conditions with OR
            $users = $model->where($whereClause)->orderBy('name', 'ASC')->findAll(); // Fetch matching users
        } else {
            $users = $model->orderBy('name', 'ASC')->findAll(); // Fetch all users if no search term
        }
    
        $data['users'] = $users;
        return view('manageUsers', $data);
    }

    /**
     * Displays user information.
     *
     * @param int $user_id The ID of the user.
     */
    public function user($user_id)
    {
        $userModel = new \App\Models\UserModel();
        $addressModel = new \App\Models\AddressModel();
        $roleModel = new \App\Models\RoleModel();

        $data['user'] = $userModel->find($user_id); // Fetch user by ID
        
        if (!$data['user']) { // Throw exception if user not found
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User Not Found');
        }

        $data['address'] = $addressModel->where('user_id', $user_id)->first(); // Fetch user's address
        $data['role'] = $roleModel->where('user_id', $user_id)->findAll(); // Fetch user's roles

        return view('userinfo', $data);
    }

    /**
     * Adds or edits a user.
     *
     * @param int|null $id The ID of the user to edit, or null for adding a new user.
     */
    public function addedit($id = null)
    {
        $model = new \App\Models\UserModel();
    
        if (!empty($_POST)) { // If the form is submitted
            $data = $this->request->getPost(); // Get form data
    
            if ($id === null) { // If adding a new user
                if ($model->insert($data)) { // Insert the user
                    $this->session->setFlashdata('success', 'User added successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to add user. Please try again.');
                }
            } else { // If editing an existing user
                if ($model->update($id, $data)) { // Update the user
                    $this->session->setFlashdata('success', 'User updated successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update user. Please try again.');
                }
            }
    
            return redirect()->to('manageUsers');
        }
    
        $data['user'] = ($id === null) ? null : $model->find($id); // Fetch user if ID provided
        return view('addedit', $data);
    }

    /**
     * Deletes a user.
     *
     * @param int $id The ID of the user to delete.
     */
    public function delete($id)
    {
        $model = new \App\Models\UserModel();

        if ($model->delete($id)) { // Attempt to delete the user
            $this->session->setFlashdata('success', 'User deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete user. Please try again.');
        }

        return redirect()->to('/manageUsers');
    }

    /**
     * Displays the QR code page.
     */
    public function qrcode()
    {
        $tablesModel = new \App\Models\TablesModel();
        $tables = $tablesModel->findAll(); // Fetch all tables
        $data['tables'] = $tables; 
        
        $qrcode = session()->get('qrcode');
        if ($qrcode) {
            $data['qrcode'] = $qrcode;
            session()->remove('qrcode');

            $tableNumber = session()->get('tableNumber') ?? $this->request->getPost('tableNumber'); // Get the table number
            $data['tableNumber'] = $tableNumber;
        }
        
        return view('qrcode', $data);
    }

    /**
     * Deletes a table.
     *
     * @param int $table_id The ID of the table to delete.
     */
    public function deleteTable($table_id)
    {
        $tablesModel = new \App\Models\TablesModel();
        if ($tablesModel->delete($table_id)) { // Attempt to delete the table
            $this->session->setFlashdata('success', 'Table deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete table. Please try again.');
        }

        return redirect()->to('/qrcode');
    }

    /**
     * Adds a new table.
     */
    public function addTable()
    {
        $tablesModel = new \App\Models\TablesModel();

        $tableNumber = $this->request->getPost('tableNumber');
        $createdAt = $this->request->getPost('createdAt');

        if (empty($tableNumber)) { // Check if table number is empty
            $this->session->setFlashdata('error', 'Table number is required.');
            return redirect()->to('/qrcode');
        }

        if (empty($createdAt)) { // Check if creation time is empty
            $this->session->setFlashdata('error', 'Table creation time is required.');
            return redirect()->to('/qrcode');
        }

        $data = [
            'table_id' => $tableNumber,
            'tableNumber' => $tableNumber,
            'createdAt' => $createdAt,
        ];

        if ($tablesModel->insert($data)) {
            $this->session->setFlashdata('success', 'Table added successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to add table. Please try again.');
        }

        return redirect()->to('/qrcode');
    }

    /**
     * Generates a QR code for a table.
     */
    public function generateQrCode()
    {
        $tableNumber = $this->request->getPost('tableNumber');
        
        $tablesModel = new \App\Models\TablesModel();
        $table = $tablesModel->find($tableNumber); // Find the table by number
        
        if ($table) {
            $options = new \chillerlan\QRCode\QROptions(
                [
                    'eccLevel' => \chillerlan\QRCode\QRCode::ECC_M,
                    'outputType' => \chillerlan\QRCode\QRCode::OUTPUT_IMAGE_PNG,
                    'version' => 5,
                ]
            );
            
            $logoOptions = [
                'src' => '/var/www/menuscan/public/img/logo.png',
                'width' => 60,
                'height' => 60,
            ];
            
            $qrcodeUrl = 'https://infs3202-d2649fe5.uqcloud.net/menuscan/placeorder/'. $tableNumber; // URL to place order on the table
            $qrcode = (new \App\Libraries\QRCodeWithLogo($options, $logoOptions))->render($qrcodeUrl);
            
            session()->set('qrcode', $qrcode);
            session()->set('tableNumber', $tableNumber);
            
            return redirect()->to('/qrcode'); // Redirect to the QR code page with the generated QR code
        } else {
            session()->setFlashdata('error', 'Table number does not exist. Please add the table first.'); // Set error message
            return redirect()->to('/qrcode');
        }
    }

    /**
     * Displays the order form for a table.
     *
     * @param int|null $tableNumber The table number.
     */
    public function showOrderForm($tableNumber = null)
    {
        if ($tableNumber === null) {
            return redirect()->to('/error'); // Redirect to error page if table number is not provided
        }

        $menuModel = new \App\Models\MenuModel();
        $menuItems = $menuModel->findAll(); // Fetch all menu items

        $data['menuItems'] = $menuItems;
        $data['tableNumber'] = $tableNumber;

        return view('placeorder', $data);
    }


    /**
     * Submits an order for a table.
     *
     * @param int|null $tableNumber The table number.
     */
    public function submitOrder($tableNumber = null)
    {
        if ($tableNumber === null) {
            return redirect()->to('/error');
        }

        $tablesModel = new \App\Models\TablesModel();
        $table = $tablesModel->find($tableNumber); // Find the table by number

        if (!$table) {
            return redirect()->to('/error'); // Redirect to error page if table not found
        }

        $selectedItems = $this->request->getPost('menu_items'); // Get the selected menu items

        $orderModel = new \App\Models\OrderModel();
        $orderData = [
            'table_id' => $tableNumber,
            'order_status' => 'pending',
            'createdAt' => date('Y-m-d H:i:s'),
        ];

        $orderId = $orderModel->insert($orderData);

        $orderItemModel = new \App\Models\OrderItemModel();
        foreach ($selectedItems as $itemId) { // Insert each selected menu item as an order item
            $orderItemData = [
                'order_id' => $orderId,
                'menu_id' => $itemId,
            ];
            $orderItemModel->insert($orderItemData);
        }

        // Retrieve the order details
        $order = $orderModel->find($orderId);
        $orderItems = $orderItemModel->where('order_id', $orderId)->findAll();

        // Retrieve menu names for each order item
        $menuModel = new \App\Models\MenuModel();
        foreach ($orderItems as &$orderItem) {
            $menuItem = $menuModel->find($orderItem['menu_id']);
            $orderItem['menu_name'] = $menuItem['name'];
        }

        // Pass the order details to the orderSuccess view
        $data['order'] = $order;
        $data['orderItems'] = $orderItems;

        return view('orderSuccess', $data);
    }

    /**
     * Displays the order page.
     */
    public function order()
    {
        $orderModel = new \App\Models\OrderModel();
        $orderItemModel = new \App\Models\OrderItemModel();
        $menuModel = new \App\Models\MenuModel();

        // Retrieve all orders
        $orders = $orderModel->findAll();

        // Retrieve order items and menu details for each order
        foreach ($orders as &$order) {
            $orderItems = $orderItemModel->where('order_id', $order['order_id'])->findAll();
            
            foreach ($orderItems as &$orderItem) {
                $menuItem = $menuModel->find($orderItem['menu_id']);
                $orderItem['menu_name'] = $menuItem['name'];
                $orderItem['menu_price'] = $menuItem['price'];
            }
            
            $order['order_items'] = $orderItems;
        }

        $data['orders'] = $orders;
        return view('order', $data);
    }

    /**
     * Displays the order success page.
     */
    public function orderSuccess()
    {
        return view('orderSuccess');
    }

    /**
     * Marks an order as done.
     *
     * @param int $orderId The ID of the order.
     */
    public function markOrderAsDone($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        
        // Update the order status to 'done'
        $orderData = [
            'order_status' => 'done'
        ];
        
        if ($orderModel->update($orderId, $orderData)) {
            $this->session->setFlashdata('success', 'Order marked as done.');
        } else {
            $this->session->setFlashdata('error', 'Failed to mark order as done. Please try again.');
        }
        
        return redirect()->to('/order');
    }

    /**
     * Displays the details of an order.
     *
     * @param int $orderId The ID of the order.
     */
    public function orderDetails($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $orderItemModel = new \App\Models\OrderItemModel();
        $menuModel = new \App\Models\MenuModel();
        $tablesModel = new \App\Models\TablesModel();
    
        $data['order'] = $orderModel->getOrderById($orderId); // Fetch the order details
    
        $orderItems = $orderItemModel->where('order_id', $orderId)->findAll(); // Fetch the order items
        foreach ($orderItems as &$orderItem) {
            $menuItem = $menuModel->find($orderItem['menu_id']);
            $orderItem['menu_name'] = $menuItem['name'];
            $orderItem['menu_price'] = $menuItem['price'];
        }
    
        $data['order']['order_items'] = $orderItems; // Attach order items to order
    
        // Get the table number from the tables model
        $table = $tablesModel->find($data['order']['table_id']);
        $data['order']['table_number'] = $table['tableNumber']; // Attach table number to order
    
        return view('orderDetails', $data);
    }
}