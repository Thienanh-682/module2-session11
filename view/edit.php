<h1>Cập nhật thông tin khách hàng</h1>
<form action="index.php?page=edit" method="post">
    <input type="hidden" name="id" value="<?php echo $customer->id?>">
    <table>
        <tr>
            <td>Name: </td>
            <td><input type="text" name="name" value="<?php echo $customer->name?>"></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input type="email" name="email" value="<?php echo $customer->email?>"></td>
        </tr>
        <tr>
            <td>Address: </td>
            <td><input type="text" name="address" value="<?php echo $customer->address?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Update"></td>
            <td><button><a href="index.php">Cancel</a></button></td>
        </tr>
    </table>
</form>
