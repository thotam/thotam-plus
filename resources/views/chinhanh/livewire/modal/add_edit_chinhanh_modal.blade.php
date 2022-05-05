<div wire:ignore.self class="modal fade" id="add_edit_chinhanh_modal" tabindex="-1" role="dialog" aria-labelledby="add_edit_chinhanh_modal" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content py-2">
			<div class="modal-header">
				<h4 class="modal-title text-success"><span class="fa-solid fa-code-branch mr-3"></span>{{ $modal_title }}</h4>
				<button type="button" wire:click.prevent="cancel()" thotam-blockui class="close" data-dismiss="modal" wire:loading.attr="disabled" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			@if ($addStatus || $editStatus)
				<div class="modal-body">
					<div class="container-fluid mx-0 px-0">
						<form>
							<div class="row">

								<div class="col-12">
									<div class="form-group">
										<label class="col-form-label text-indigo" for="name">Tên chi nhánh/Văn phòng:</label>
										<div id="name_div">
											<input type="text" class="form-control px-2" wire:model.lazy="name" id="name" style="width: 100%" placeholder="Tên chi nhánh/Văn phòng ..." autocomplete="off">
										</div>
										@error('name')
											<label class="small invalid-feedback d-inline-block pl-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</label>
										@enderror
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label class="col-form-label text-indigo" for="tag">Tag:</label>
										<div id="tag_div">
											<input type="text" class="form-control px-2" wire:model.lazy="tag" id="tag" style="width: 100%" placeholder="Tag ..." autocomplete="off">
										</div>
										@error('tag')
											<label class="small invalid-feedback d-inline-block pl-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</label>
										@enderror
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label class="col-form-label text-indigo" for="diachi">Địa chỉ:</label>
										<div id="diachi_div">
											<input type="text" class="form-control px-2" wire:model.lazy="diachi" id="diachi" style="width: 100%" placeholder="Địa chỉ ..." autocomplete="off">
										</div>
										@error('diachi')
											<label class="small invalid-feedback d-inline-block pl-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</label>
										@enderror
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label class="col-form-label text-indigo" for="giamdocs">Giám đốc chi nhánh:</label>
										<div class="select2-success" id="giamdocs_div" wire:ignore>
											<select class="form-control px-2" multiple thotam-placeholder="Giám đốc chi nhánh ..." thotam-search="10" wire:model="giamdocs" id="giamdocs" style="width: 100%" x-init="thotam_ajax_select2($el, @this, '{{ route('admin.member.select_hr') }}', 50, '{{ csrf_token() }}')">
												@if (!!count($giamdoc_arrays))
													@foreach ($giamdoc_arrays as $key => $hoten)
														<option value="{{ $key }}">[{{ $key }}] {{ $hoten }}</option>
													@endforeach
												@endif
											</select>
										</div>
										@error('giamdocs')
											<label class="small invalid-feedback d-inline-block pl-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</label>
										@enderror
									</div>
								</div>

							</div>
						</form>
					</div>
				</div>
			@endif

			<div class="modal-footer mx-auto">
				<button wire:click.prevent="cancel()" thotam-blockui class="btn btn-danger" wire:loading.attr="disabled" data-dismiss="modal">Đóng</button>
				<button wire:click.prevent="save_chinhanh()" thotam-blockui class="btn btn-success" wire:loading.attr="disabled">Xác nhận</button>
			</div>

		</div>
	</div>

</div>
