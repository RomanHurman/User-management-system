<?php
  include 'back.php';
?>
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
          <?php } ?>
        </tbody>
      </table>