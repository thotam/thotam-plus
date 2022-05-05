<div>
	<!-- Filters and Add Buttons -->
	@include('thotam-plus::chinhanh.livewire.sub.filters')

	<!-- Incluce các modal -->
	@include('thotam-plus::chinhanh.livewire.modal.add_edit_chinhanh_modal')
	{{-- @include('thotam-plus::chinhanh.livewire.modal.view_chinhanh_modal') --}}
	@include('thotam-plus::chinhanh.livewire.modal.delete_chinhanh_modal')

	<!-- Styles -->
	@include('thotam-plus::chinhanh.livewire.sub.style')
</div>
