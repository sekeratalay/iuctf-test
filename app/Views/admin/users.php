<?= $this->extend("admin/templates/base") ?>

<?= $this->section('content') ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Kullanıcılar</li>
    </ol>

    <div>
        <a class="btn btn-primary" href="/admin/users/new">Ekle</a>
    </div>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>team_id</th>
                            <th>username</th>
                            <th>name</th>
                            <th>email</th>
                            <th>auth_code</th>
                            <th>is banned</th>
                            <th>is verified</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach($users as $user): ?>
                        <tr>
                            <td><?= esc($user["id"]) ?></td>
                            <td><?= esc($user["team_id"]) ?></td>
                            <td><?= esc($user["username"]) ?></td>
                            <td><?= esc($user["name"]) ?></td>
                            <td><?= esc($user["email"]) ?></td>
                            <td><?= esc($user["auth_code"]) ?></td>
                            <td><?= esc($user["is_banned"]) ?></td>
                            <td><?= esc($user["is_verified"]) ?></td>
                            <td><?= esc($user["created_at"]) ?></td>
                            <td><?= esc($user["updated_at"]) ?></td>
							<td><button class="btn btn-danger btn-block">Delete</button></td>
							<td><button class="btn btn-info btn-block">Update</button></td>
                        </tr>
					<?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>    
<?= $this->endSection() ?>