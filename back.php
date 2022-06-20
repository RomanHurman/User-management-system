<?php
    include 'db.php';
    $name = $_POST['name'];
    $last = $_POST['last'];
    $get_id = $_GET['id'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    
    if ($status == false) {
        $status = '<i class="fa fa-circle"></i>';
    } 
    else if ($status == true){
        $status = '<i class="fa fa-circle active-circle"></i>';
    }
    
    if ($role == false) {
        $role = 'user';
    } 
    else if ($role == true){
        $role = 'admin';
    }
    
    if (isset($_POST['add'])) {
        $sql = ("INSERT INTO users (name,last,role,status) VALUES(?,?,?,?)");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $last, $role, $status]);
    }
    //Read 
    $sql = $pdo->prepare("SELECT * FROM users");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);

        // Remove users id
        if(isset($_POST['id'])) {
            $id= $_POST['id'];
            $sql = "DELETE FROM users WHERE id in ($id)";
            $query = $pdo->prepare($sql);
            $query->execute([$id]);
        }
        // Change status active
        if(isset($_POST['sample-id'])) {
           $ids = $_POST['sample-id'];
           $status = '<i class="fa fa-circle active-circle"></i>';
            $sql = "UPDATE users SET status= ? WHERE id in ($ids)";           
            $query = $pdo->prepare($sql);
            $query->execute([$status]);
        }
         //Change status not_active
        if(isset($_POST['samp-id'])) {
                $ids = $_POST['samp-id'];
                $status = '<i class="fa fa-circle"></i>';
                $sql = "UPDATE users SET status= ? WHERE id in ($ids)";            
                $query = $pdo->prepare($sql);
                $query->execute([$status]);
            }

            if(isset($_POST['del-id'])) {
                $del_id = $_POST['del-id'];
                $sql = "DELETE FROM users WHERE id in ($del_id)";
                $query = $pdo->prepare($sql);
                $query->execute([$del_id]);
            }

            if(isset($_POST['upd-id'])) {
                $upd_id = $_POST['upd-id'];
                $sql = "SELECT FROM users WHERE id in ($upd_id)";
                $query = $pdo->prepare($sql);
                $query->execute([$upd_id]);
            }

            //edit
            if (isset($_POST['update'])) {
                $upd_id = $_POST['update'];
                $sql = ("UPDATE users  SET name=?, last=?, role=?, status=? WHERE id in ($upd_id)");
                $query = $pdo->prepare($sql);
                $query->execute([$name,$last,$role,$status]);
                } 
?>