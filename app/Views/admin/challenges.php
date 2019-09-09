<?= $this->extend("admin/templates/base") ?>

<?= $this->section('content') ?>

    <!-- Area Chart Example-->
    <div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Challenge Ekle</div>
		<div class="card-body">
			<form action="/admin/challenges" method="post">
                <div class="form-group">
					<label for="category_id">Kategori Seçiniz</label>
					<select name="category_id" class="form-control" id="category_id">
                        <?php foreach($categories as $category): ?>
                            <option value="<?= esc($category["id"]) ?>"><?= esc($category["name"]) ?></option>
                        <?php endforeach; ?>
                    </select>
				</div>
				<div class="form-group">
					<label for="name">İsmi Giriniz</label>
					<input type="name" name="name" class="form-control" id="name" placeholder="İsim giriniz">
				</div>
				<div class="form-group">
					<label for="description">Açıklama</label>
					<textarea class="form-control" name="description" id="description" rows="3" placeholder="Açıklama giriniz"></textarea>
				</div>
                <div class="form-group">
					<label for="point">Puan</label>
					<input type="number" name="point" class="form-control" id="point" placeholder="Puan">
				</div>
                <div class="form-group">
					<label for="max_attempts">Max Deneme Sayısı</label>
					<input type="number" name="max_attempts" class="form-control" id="max_attempts" placeholder="Max deneme sayısı">
				</div>
                <div class="form-group">
					<label for="type">Tip</label>
					<select name="type" class="form-control" id="type">
                        <option value="static">Statik</option>
                        <option value="dynamic">Dinamik</option>
                    </select>
				</div>
                <div class="form-group">
					<label for="is_active">Tip</label>
					<select name="is_active" class="form-control" id="is_active">
                        <option value="0">Pasif</option>
                        <option value="1">Aktif</option>
                    </select>
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
                            <th>id</th>
                            <th>category_id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>point</th>
                            <th>max_attempts</th>
                            <th>type</th>
                            <th>is_active</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach($challenges as $challenge): ?>
                        <tr>
                            <td><?= esc($challenge["id"]) ?></td>
                            <td><?= esc($challenge["category_id"]) ?></td>
                            <td><?= esc($challenge["name"]) ?></td>
                            <td><?= esc($challenge["description"]) ?></td>
                            <td><?= esc($challenge["point"]) ?></td>
                            <td><?= esc($challenge["max_attempts"]) ?></td>
                            <td><?= esc($challenge["type"]) ?></td>
                            <td><?= esc($challenge["is_active"]) ?></td>
                            <td><?= esc($challenge["created_at"]) ?></td>
                            <td><?= esc($challenge["updated_at"]) ?></td>
							<td><button class="btn btn-danger btn-block">Delete</button></td>
							<td><a class="btn btn-info btn-block" href="/admin/challenges/<?= esc($challenge["id"]) ?>">Detail</a></td>
                        </tr>
					<?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

<?= $this->endSection() ?>