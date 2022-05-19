<?php
    include 'db.php';
    $name = $_POST['name'];
    $last = $_POST['last'];
    $get_id = $_GET['id'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    if ($status == false) {
        $status = '<i class="fa fa-circle"></i>';
    } else if ($status == true){
        $status = '<i class="fa fa-circle active-circle"></i>';
    }
    //Create 
    if (isset($_POST['add'])) {
        $sql = ("INSERT INTO users (name,last,role,status) VALUES(?,?,?,?)");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $last, $role, $status]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
    //Read 
    $sql = $pdo->prepare("SELECT * FROM users");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);

    //Update 
    if (isset($_POST['edit'])) {
        $sql = ("UPDATE users  SET name=?, last=?, role=?, status=? WHERE id=?");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $last, $role, $status, $get_id]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        }
        //Delete
    if (isset($_POST['delete'])) {
        $sql = ("DELETE  FROM users WHERE id=?");
        $query = $pdo->prepare($sql);
        $query->execute([$get_id]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        }
        // Remove users id
        if(isset($_POST['id'])) {
            $id= $_POST['id'];
            $sql = "DELETE FROM users WHERE id in ($id)";
            $query = $pdo->prepare($sql);
            $query->execute([$id]);
            if ($query) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
        // Change status active
        if(isset($_POST['sample-id'])) {
           $ids = $_POST['sample-id'];
           $status = '<i class="fa fa-circle active-circle"></i>';
            $sql = "UPDATE users SET status= ? WHERE id in ($ids)";           
            $query = $pdo->prepare($sql);
            $query->execute([$status]);
            if ($query) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
         //Change status not_active
            if(isset($_POST['samp-id'])) {
                $ids = $_POST['samp-id'];
                $status = '<i class="fa fa-circle"></i>';
                $sql = "UPDATE users SET status= ? WHERE id in ($ids)";            
                $query = $pdo->prepare($sql);
                $query->execute([$status]);
                if ($query) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            }
?>