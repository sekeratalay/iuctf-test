<?= $this->extend("admin/templates/base") ?>

<?= $this->section('content') ?>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Categories</li>
	</ol>

	<!-- Area Chart Example-->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Kategori Ekle</div>
		<div class="card-body">
			<form action="/admin/categoryadd" method="post">
				<div class="form-group">
					<label for="name">İsmi Giriniz</label>
					<input type="name" name="name" class="form-control" id="name" placeholder="İsim giriniz">
				</div>
				<div class="form-group">
					<label for="description">Açıklama</label>
					<textarea class="form-control" name="description" id="description" rows="3" placeholder="Açıklama giriniz"></textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
		</div>
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>created</th>
                            <th>udated</th>
                            <th>delete</th>
                            <th>update</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach($categories as $cat): ?>
                        <tr>
                            <td><?= esc($cat["id"]) ?></td>
                            <td><?= esc($cat["name"]) ?></td>
                            <td><?= esc($cat["description"]) ?></td>
                            <td><?= esc($cat["created_at"]) ?></td>
                            <td><?= esc($cat["updated_at"]) ?></td>
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