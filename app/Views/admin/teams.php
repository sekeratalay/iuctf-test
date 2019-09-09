<?= $this->extend("admin/templates/base") ?>

<?= $this->section('content') ?>
    <ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Takımlar</li>
	</ol>

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
                            <th>leader_id</th>
                            <th>name</th>
                            <th>auth_code</th>
                            <th>is_banned</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach($teams as $team): ?>
                        <tr>
                            <td><?= esc($team["id"]) ?></td>
                            <td><?= esc($team["leader_id"]) ?></td>
                            <td><?= esc($team["name"]) ?></td>
                            <td><?= esc($team["auth_code"]) ?></td>
                            <td><?= esc($team["is_banned"]) ?></td>
                            <td><?= esc($team["created_at"]) ?></td>
                            <td><?= esc($team["updated_at"]) ?></td>
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