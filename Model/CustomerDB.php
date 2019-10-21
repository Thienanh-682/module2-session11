<?php

namespace Model;

class CustomerDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($customer)
    {
        $sql = "INSERT INTO customers(name, email, address) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $customer->name);
        $statement->bindParam(2, $customer->email);
        $statement->bindParam(3, $customer->address);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM customers";
        $stmt = $this->connection->query($sql);
        $result = $stmt->fetchAll();
        $customers = [];
        foreach ($result as $value) {
            $customer = new Customer($value['name'], $value['email'], $value['address']);
            $customer->id = $value['id'];
            array_push($customers, $customer);
        }
        return $customers;
    }

    public function getCustomerById($id)
    {
        $sql = "SELECT * FROM customers WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch();
        $customer = new Customer($result['name'], $result['email'], $result['address']);
        $customer->id = $result['id'];
        return $customer;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM customers WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    public function update($id, $customer)
    {
        $sql = "UPDATE customers SET name = ?, email = ?, address = ? WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $customer->name);
        $stmt->bindParam(2, $customer->email);
        $stmt->bindParam(3, $customer->address);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    }

}