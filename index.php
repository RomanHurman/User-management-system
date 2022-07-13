<?php
  include 'back.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Users table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
  <div class="container">
    <h3>Users-Table</h3>
    <div class="row">
    <div class="alert alert-warning" role="alert">
      Please select Users!!
    </div>
    <div>
    <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-user-plus fa-2x"></i></button>
            <select id="state">
              <option id="active" value="Active">Active</option>
              <option id="not_active" value="Not_active">Not_active</option>
              <option id="remove1" value="Delete">Delete</option>
            </select>
            <button type="submit" class="btn btn-primary" id="ok">Ok</button>
          </div>
      <div class="col-12" id="content">
      <table class="table table-bordered mt-2">
        <thead>
          <th><input type="checkbox" id="select_all"> </th>
          <th>Name</th>
          <th>Role</th>
          <th>Status</th>
          <th>Actions</th>
        </thead>
        <tbody>
          <?php foreach ($result as $res) { ?>
          <tr id="<?= $res->id; ?>"> 
          <td><input type="checkbox" class="us_checkbox" data-sample-id="<?= $res->id; ?>"></td>
            <td><?php echo $res->name; ?> <?php echo $res->last; ?></td>
            <td><?php echo $res->role; ?></td>
            <td><?php echo $res->status; ?></td>
            <td>
              <button class="btn btn-success" id="btn_edit" data-upd-id="<?= $res->id; ?>" data-upd-name="<?= $res->name; ?>" data-upd-last="<?= $res->last; ?>"><span class="fa fa-edit">edit</span></button>

            <button class="btn btn-danger" id="btn_delete" data-del-id="<?= $res->id; ?>"><span class="fa fa-trash"></span></button>
            </td>
          </tr>
         <!-- Modal edit-->
     <div class="modal" id="update">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Update Form</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
            <input type="hidden" class="form-control my-2" name="upd-id" id="upd-id" value="">
            <label>First Name</label>
              <input type="text" class="form-control my-2"  name="upd-name" id="upd-name" placeholder="Change First Name">
              <label>Last Name</label>
              <input type="text" class="form-control my-2" name="upd-last" id="upd-last" placeholder="Change Last Name">
              <div class="form-group">
          <label for="role">Role:</label>
            <select name="role" id="rol">
              <option value="0">User</option>
              <option value="1">Admin</option>
            </select>
          </div>
            <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" role="switch" id="stats" name="stats" value="">
        <label class="form-check-label" for="stats">Status:</label>
    </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_update">Save Changes</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
          <!-- Modal edit-->
          <!-- Modal delete-->
          <div class="modal" id="delete">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Delete User</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p> Do You Want to Delete this User ?</p>
            <button type="button" class="btn btn-success" id="btn_delete_record">Delete Now</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
          <!-- Modal delete-->
          <?php } ?>
        </tbody>
      </table>
      </div>
    </div>
    <div>
    <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-user-plus fa-2x"></i></button>
            <select id="stat">
              <option id="online" value="Online">Active</option>
              <option id="not_online" value="Not_online">Not_active</option>
              <option id="clear" value="Del">Delete</option>
            </select>
            <button type="submit" class="btn btn-primary" id="oki">Ok</button>
          </div>
  </div>
<!-- Modal create-->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
          <label>First Name:</label>
          <input type="text" id="name" class="form-control" name="name"/>
        </div>
          <div class="form-group">
          <label>Last Name:</label>
            <input type="text" id="last" class="form-control" name="last">
          </div>
          <div class="form-group">
          <label for="role">Role:</label>
            <select name="role" id="rols">
              <option value="0">User</option>
              <option value="1">Admin</option>
            </select>
          </div>
          <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="">
        <label class="form-check-label" for="status">Status:</label>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-dark">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal create-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="/script/script.js"></script>
</body>
</html>