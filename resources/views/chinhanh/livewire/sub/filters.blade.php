<!-- Filters -->
<div class="mb-0 px-4 pt-0">
	<div class="form-row justify-content-between">

		<div class="col-md-auto mb-2">
			<label class="form-label"></label>
			<div class="col text-md-left mb-1 px-0 text-center">
				@if ($hr->hasAnyPermission(['add-chinhanh']))
					<button type="button" class="btn btn-success waves-effect" wire:click.prevent="add_chinhanh" wire:loading.attr="disabled" thotam-blockui><span class="fas fa-plus-circle mr-2"></span>Thêm</button>
				@endif
			</div>
		</div>

		<div class="col-md-auto mb-2">
			<div class="form-row justify-content-between">

				<div class="col-12 col-md-auto text-md-right px-0 text-center" wire:ignore>
					<label class="form-label"></label>
					<div class="d-none" id="datatable-buttons">
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
