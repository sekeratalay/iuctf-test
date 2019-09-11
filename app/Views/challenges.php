<?= $this->extend("admin/templates/base") ?>

<?= $this->section('content') ?>
	<?php foreach($categories as $cat): ?>
		<?php if(isset($cat['challenges']) === true):?>
			<div class="card mb-3 challenge">
				<div class="card-header"><?= esc($cat['name']) ?></div>
				<div class="card-body">
					<div class="row">
						<?php foreach($cat['challenges'] as $ch): ?>
							<div class="col-xl-3 col-sm-6 my-2" data-toggle="modal" data-target="#challenge-modal" data-whatever="@mdo">
								<div class="card text-white <?= in_array($ch['id'], $solves)? 'bg-success':'bg-danger' ?>">
									<div class="card-body">
										<div class="mr-5 ch-name"><?= esc($ch['name']) ?></div>
										<div class="ch-id" style="display: none"><?= esc($ch['id']) ?></div>
										<div class="ch-des" style="display: none"><?= esc($ch['description']) ?></div>
										<div class="ch-m-a" style="display: none"><?= esc($ch['max_attempts']) ?></div>
									</div>
									<a class="card-footer text-white clearfix small z-1">
										<span class="float-left ch-point"><?= esc($ch['point']) ?> Puan</span>
									</a>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		<?php endif ?>
	<?php endforeach ?>

	<div class="modal fade" id="challenge-modal">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-ch-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
					<p class="modal-ch-des"></p>
					<p class="modal-ch-m-a"></p>
					<p class="modal-ch-point"></p>
				</div>
				<div class="modal-footer justify-content-between">
					<div class="w-100">
						<form class="" action="/flagsubmit" method="post">
							<div class="form-row">
								<div class="col-9">
									<input type="text" name="flag" class="form-control" placeholder="Flag gir">
									<input type="hidden" name="ch-id" class="ch-id">
								</div>
								<div class="col-3">
									<button type="submit" class="btn btn-secondary btn-block">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('#challenge-modal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			console.log(button);
			console.log(this);
			$(this).find(".modal-ch-title").text(button.find(".ch-name").text());
			$(this).find(".modal-ch-des").text(button.find(".ch-des").text());
			$(this).find(".modal-ch-m-a").text(button.find(".ch-m-a").text());
			$(this).find(".modal-ch-point").text(button.find(".ch-point").text());
			$(this).find(".ch-id").val(button.find(".ch-id").text());
		});

		$('#challenge-modal').on('hide.bs.modal', function () {
			$(this).find(".modal-ch-title").text("");
			$(this).find(".modal-ch-des").text("");
			$(this).find(".modal-ch-m-a").text("");
			$(this).find(".modal-ch-point").text("");
			$(this).find(".ch-id").val("");
		});
	</script>
<?= $this->endSection() ?>