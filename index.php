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
      <div class="col-12">
      <table class="table table-bordered mt-2">
        <thead>
          <th><input type="checkbox" id="select_all"> </th>
          <th>FirstName</th>
          <th>LastName</th>
          <th>Role</th>
          <th>Status</th>
          <th>Actions</th>
        </thead>
        <tbody>
          <?php foreach ($result as $res) { ?>
          <tr id="<?= $res->id; ?>"> 
          <td><input type="checkbox" class="us_checkbox" data-sample-id="<?= $res->id; ?>"></td>
            <td><?php echo $res->name; ?></td>
            <td><?php echo $res->last; ?></td>
            <td><?php echo $res->role; ?></td>
            <td><?php echo $res->status; ?></td>
            <td><a href="?id=<?php echo $res->id; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target ="#edit<?php echo $res->id; ?>"><i class="fa fa-edit">edit</i></a>
            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target ="#delete<?php echo $res->id; ?>"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <!-- Modal edit-->
          <div class="modal fade" id="edit<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Change User: <?php echo $res->name; ?> <?php echo $res->last; ?> <?php echo $res->role; ?> <?php echo $res->status; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="?id=<?php echo $res->id; ?>" method="post">
                    <div class="form-group">
                      <small>FirstName</small>
                      <input type="text" class="form-control" name="name" value="<?php echo $res->name; ?>">
                    </div>
                    <div class="form-group">
                      <small>LastName</small>
                      <input type="text" class="form-control" name="last" value="<?php echo $res->last; ?>">
                    </div>
                    <div class="form-group">
                    <label for="role">Role:</label>
                      <select name="role" id="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                      </select>
                    </div>
                    <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="status">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Status:</label>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="edit">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal edit-->
          <!-- Modal delete-->
          <div class="modal fade" id="delete<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete User: <?php echo $res->name; ?> <?php echo $res->last; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                <form action="?id=<?php echo $res->id; ?>" method="post">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                  </form>
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
        <form action="back.php" method="post">
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
            <select name="role" id="role">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="status" value="Active">
        <label class="form-check-label" for="flexSwitchCheckDefault">Status:</label>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add">Save</button>
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