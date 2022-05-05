<div class="col-md-12 col-12">
	<div class="form-group">
		<label class="col-form-label text-info">Tên chi nhánh/Văn phòng:</label>
		<div>
			<span type="text" class="form-control h-auto px-2">{{ $chinhanh->name }}</span>
		</div>
	</div>
</div>

<div class="col-md-12 col-12">
	<div class="form-group">
		<label class="col-form-label text-info">Tag:</label>
		<div>
			<span type="text" class="form-control h-auto px-2">{{ $chinhanh->tag }}</span>
		</div>
	</div>
</div>

<div class="col-md-12 col-12">
	<div class="form-group">
		<label class="col-form-label text-info">Địa chỉ:</label>
		<div>
			<span type="text" class="form-control h-auto px-2">{{ $chinhanh->diachi }}</span>
		</div>
	</div>
</div>

@if ((bool) $chinhanh->giamdocs->count())
	<div class="col-12">
		<div class="form-group">
			<label class="col-form-label text-info">Ghi chú:</label>
			<div>
				<pre class="form-control thotam-pre h-auto px-2">{{ $chinhanh->giamdocs->pluck('hoten')->implode(', ') }}</pre>
			</div>
		</div>
	</div>
@endif
