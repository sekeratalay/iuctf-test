<?= $this->extend("admin/templates/base") ?>

<?= $this->section('content') ?>
    <!-- Area Chart Example-->
    <div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Challenge Ekle</div>
		<div class="card-body">
			<form action="/admin/users" method="post">
                <div class="form-group">
					<label for="team_id">Kategori Seçiniz</label>
					<select name="team_id" class="form-control" id="team_id">
                        <?php foreach($teams as $team): ?>
                            <option value="<?= esc($team["id"]) ?>"><?= esc($team["name"]) ?></option>
                        <?php endforeach; ?>
                    </select>
				</div>
				<div class="form-group">
					<label for="username">Kullanıcı adı giriniz</label>
					<input type="text" name="username" class="form-control" id="username" placeholder="Kullanıcı adı">
				</div>
                <div class="form-group">
					<label for="password">Parola Giriniz</label>
					<input type="password" name="password" class="form-control" id="password" placeholder="Parola">
				</div>
                <div class="form-group">
					<label for="password-confirm">Parola Tekrar</label>
					<input type="password" name="password-confirm" class="form-control" id="password-confirm" placeholder="Parola tekrar">
				</div>
                <div class="form-group">
					<label for="name">İsim Giriniz</label>
					<input type="text" name="name" class="form-control" id="name" placeholder="İsminiz">
				</div>
                <div class="form-group">
					<label for="email">Email Giriniz</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="Email">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
		</div>
	</div>
<?= $this->endSection() ?>