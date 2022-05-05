<div class='action-div icon-4 d-flex justify-content-around mx-1 px-0 text-center'>

	{{-- @if ($hr->hasAnyPermission(['view-chinhanh']))
        <div class='col-1 action-icon-w-50 action-icon' thotam-livewire-method='view_chinhanh' thotam-model-id='{{ $chinhanh->id }}'><i class='text-info fas fa-search'></i></div>
    @endif --}}

	@if ($hr->hasAnyPermission(['edit-chinhanh']))
		<div class='col-1 action-icon-w-50 action-icon' thotam-livewire-method='edit_chinhanh' thotam-model-id='{{ $chinhanh->id }}'><i class='text-indigo fas fa-edit'></i></div>
	@endif

	@if ($hr->hasAnyPermission(['delete-chinhanh']))
		<div class='col-1 action-icon-w-50 action-icon' thotam-livewire-method='delete_chinhanh' thotam-model-id='{{ $chinhanh->id }}'><i class='text-danger fas fa-trash-alt'></i></div>
	@endif

</div>
