<div wire:ignore.self class="modal fade" id="delete_chinhanh_modal" tabindex="-1" role="dialog" aria-labelledby="delete_chinhanh_modal" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content py-2">
			<div class="modal-header">
				<h4 class="modal-title text-danger"><span class="fa-solid fa-code-branch mr-3"></span>{{ $modal_title }}</h4>
				<button type="button" wire:click.prevent="cancel()" thotam-blockui class="close" data-dismiss="modal" wire:loading.attr="disabled" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			@if ($deleteStatus)
				<div class="modal-body">
					<div class="container-fluid mx-0 px-0">
						<form>
							<div class="row">

								<div class="col-12 text-danger font-weight-semibold mb-3">
									Bạn sẽ xóa chi nhánh có thông tin như sau, việc xóa là KHÔNG THỂ khôi phục,bạn có chắc chắn?
								</div>

								@include('thotam-plus::chinhanh.livewire.modal.details.basic_info')

							</div>
						</form>
					</div>
				</div>
			@endif

			<div class="modal-footer mx-auto">
				<button wire:click.prevent="cancel()" thotam-blockui class="btn btn-info" wire:loading.attr="disabled" data-dismiss="modal">Đóng</button>
				<button wire:click.prevent="delete_chinhanh_action()" thotam-blockui class="btn btn-danger" wire:loading.attr="disabled">Xác nhận</button>
			</div>

		</div>
	</div>

</div>
