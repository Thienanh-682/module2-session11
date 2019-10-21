<?php
namespace controller;

use Model\Customer;
use Model\CustomerDB;
use Model\DBConnection;

class CustomerController
{
    public $customerDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=my_databases", "root", "thieanh01");
        $this->customerDB = new CustomerDB($connection->connect());
    }

    public function add()
    {
        include 'view/add.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = new Customer($name, $email, $address);
            $this->customerDB->create($customer);
            $message = 'Customer created';
            header("Location: index.php");
        }
    }
    public function index()
    {
        $customers = $this->customerDB->getAll();
        include 'view/list.php';
    }
}