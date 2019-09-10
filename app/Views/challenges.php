<?= $this->extend("admin/templates/base") ?>

<?= $this->section('content') ?>
	<?php foreach($categories as $cat): ?>
		<?php if(isset($cat['challenges']) === true):?>
			<div class="card mb-3 challenge">
				<div class="card-header"><?= esc($cat['name']) ?></div>
				<div class="card-body">
					<div class="row">
						<?php foreach($cat['challenges'] as $ch): ?>
							<div class="col-xl-3 col-sm-6 mb-3">
								<div class="card text-white bg-primary o-hidden h-100">
									<div class="card-body">
										<div class="mr-5"><?= esc($ch['name']) ?></div>
									</div>
									<a class="card-footer text-white clearfix small z-1">
										<span class="float-left"><?= esc($ch['point']) ?> Puan</span>
									</a>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		<?php endif ?>
	<?php endforeach ?>

	<div class="modal" id="challenge-modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
					<p>Modal body text goes here.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Save changes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('.challenge').click(function () {
			$('#challenge-modal').modal('show');
			// $('#challenge-modal').trigger('focus')
			$('#challenge-modal').on('shown.bs.modal', function () {
			})
		})
	</script>
<?= $this->endSection() ?>