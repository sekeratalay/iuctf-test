<?= $this->extend("admin/templates/base") ?>

<?= $this->section('content') ?>

    <!-- Area Chart Example-->
    <div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Challenge Düzenle</div>
		<div class="card-body">
			<form action="/admin/challenges/<?= $challenge['id'] ?>" method="post">
                <div class="form-group">
					<label for="category_id">Kategori Seçiniz</label>
					<select name="category_id" class="form-control" id="category_id">
                        <?php foreach($categories as $category): ?>
                            <option <?= $challenge['category_id'] === $category["id"] ? 'selected':'' ?>
                            value="<?= esc($category["id"]) ?>"><?= esc($category["name"]) ?></option>
                        <?php endforeach; ?>
                    </select>
				</div>
				<div class="form-group">
					<label for="name">İsmi Giriniz</label>
					<input value="<?= $challenge['name'] ?>" type="name" name="name" class="form-control" id="name" placeholder="İsim giriniz">
				</div>
				<div class="form-group">
					<label for="description">Açıklama</label>
					<textarea class="form-control" name="description" id="description" rows="3" placeholder="Açıklama giriniz"><?= $challenge['description'] ?></textarea>
				</div>
                <div class="form-group">
					<label for="point">Puan</label>
					<input value="<?= $challenge['point'] ?>" type="number" name="point" class="form-control" id="point" placeholder="Puan">
				</div>
                <div class="form-group">
					<label for="max_attempts">Max Deneme Sayısı</label>
					<input value="<?= $challenge['max_attempts'] ?>" type="number" name="max_attempts" class="form-control" id="max_attempts" placeholder="Max deneme sayısı">
				</div>
                <div class="form-group">
					<label for="type">Tip</label>
					<select name="type" class="form-control" id="type">
                        <?php if($challenge['type'] === 'static'): ?>
                            <option selected value="static">Statik</option>
                            <option value="dynamic">Dinamik</option>
                        <?php else: ?>
                            <option value="static">Statik</option>
                            <option selected value="dynamic">Dinamik</option>
                        <?php endif ?>
                    </select>
				</div>
                <div class="form-group">
					<label for="is_active">Tip</label>
					<select name="is_active" class="form-control" id="is_active">
                        <?php if($challenge['is_active'] === '0'): ?>
                            <option selected value="0">Pasif</option>
                            <option value="1">Aktif</option>
                        <?php else: ?>
                            <option value="0">Pasif</option>
                            <option selected value="1">Aktif</option>
                        <?php endif ?>
                    </select>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
		</div>
	</div>

	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Flagler</div>
		<div class="card-body">
			<form action="/admin/challenges/<?= $challenge['id'] ?>/addflag" method="post">
				<div class="form-row">
					<div class="col-3">
						<select name="type" class="form-control" id="is_active">
							<option value="static">Stetic</option>
							<option value="regex">Regex</option>
						</select>
					</div>
					<div class="col-6">
						<div class="col">
							<input type="text" class="form-control" name="content" placeholder="Flag">
						</div>
					</div>
					<div class="col-3">
						<div class="col">
							<button type="submit" class="btn btn-primary btn-block">Ekle</button>
						</div>
					</div>
				</div>
			</form>

			<div class="table-responsive mt-4">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Content</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach($flags as $flag): ?>
                        <tr>
                            <td><?= esc($flag["type"]) ?></td>
                            <td><?= esc($flag["content"]) ?></td>
							<td><button class="btn btn-danger btn-block">Delete</button></td>
							<td><button class="btn btn-info btn-block">Update</button></td>
                        </tr>
					<?php endforeach ?>
                    </tbody>
                </table>
            </div>
		</div>
	</div>
<?= $this->endSection() ?>