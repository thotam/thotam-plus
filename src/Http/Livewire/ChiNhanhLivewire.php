<?php

namespace Thotam\ThotamPlus\Http\Livewire;

use Auth;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Thotam\ThotamHr\Models\HR;
use Thotam\ThotamPlus\Models\ChiNhanh;

class ChiNhanhLivewire extends Component
{
    /**
     * Các biển sự kiện
     *
     * @var array
     */
    protected $listeners = ['edit_chinhanh', 'delete_chinhanh', 'view_chinhanh'];

    /**
     * Các biến sử dụng trong Component
     *
     * @var mixed
     */
    public $hr;
    public $modal_title, $toastr_message;

    public $giamdoc_arrays = [];
    public $chinhanh, $chinhanh_id, $name, $tag, $diachi, $giamdocs;

    /**
     * @var bool
     */
    public $addStatus = false;
    public $viewStatus = false;
    public $editStatus = false;
    public $deleteStatus = false;

    /**
     * Validation rules
     *
     * @var array
     */
    protected function rules()
    {
        return [
            'name' => 'required|string',
            'tag' => 'required|string',
            'diachi' => 'required|string',
            'giamdocs' => 'nullable|array',
            'giamdocs.*' => 'nullable|exists:hrs,key',
        ];
    }

    /**
     * Custom attributes
     *
     * @var array
     */
    protected $validationAttributes = [
        'name' => 'tên chi nhánh/văn phòng',
        'tag' => 'tag',
        'diachi' => 'địa chỉ',
        'giamdocs' => 'giám đốc',
        'giamdocs.*' => 'giám đốc',
    ];


    /**
     * cancel
     *
     * @return void
     */
    public function cancel()
    {
        $this->dispatchBrowserEvent('unblockUI');
        $this->dispatchBrowserEvent('hide_modals');
        $this->dispatchBrowserEvent('dt_draw');
        $this->reset();
        $this->addStatus = false;
        $this->viewStatus = false;
        $this->editStatus = false;
        $this->deleteStatus = false;
        $this->resetValidation();
        $this->mount();
    }

    /**
     * On updated action
     *
     * @param  mixed $propertyName
     * @return void
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('thotam-plus::chinhanh.livewire.chinhanh-livewire');
    }

    /**
     * mount data
     *
     * @return void
     */
    public function mount()
    {
        $this->hr = Auth::user()->hr;
    }

    /**
     * add_chinhanh
     *
     * @return void
     */
    public function add_chinhanh()
    {
        if (!$this->hr->hasAnyPermission(["add-chinhanh"])) {
            $this->dispatchBrowserEvent('toastr', ['type' => 'warning', 'title' => "Thất bại", 'message' => "Bạn không có quyền thực hiện hành động này"]);
            $this->cancel();
            return null;
        }

        $this->chinhanh = null;

        $this->addStatus = true;
        $this->modal_title = "Thêm Chi nhánh";
        $this->toastr_message = "Thêm Chi nhánh thành công";

        $this->dispatchBrowserEvent('unblockUI');
        $this->dispatchBrowserEvent('show_modal', "#add_edit_chinhanh_modal");
    }

    /**
     * save_chinhanh
     *
     * @return void
     */
    public function save_chinhanh()
    {
        if (($this->addStatus && !$this->hr->hasAnyPermission(["add-chinhanh"])) || ($this->editStatus && !$this->hr->hasAnyPermission(["edit-chinhanh"]))) {
            $this->dispatchBrowserEvent('unblockUI');
            $this->dispatchBrowserEvent('toastr', ['type' => 'warning', 'title' => "Thất bại", 'message' => "Bạn không có quyền thực hiện hành động này"]);
            return null;
        }

        $this->dispatchBrowserEvent('unblockUI');
        $this->validate([
            'name' => 'required|string',
            'tag' => 'required|string',
            'diachi' => 'required|string',
            'giamdocs' => 'nullable|array',
            'giamdocs.*' => 'nullable|exists:hrs,key',
        ]);
        $this->dispatchBrowserEvent('blockUI');

        try {
            $this->chinhanh = ChiNhanh::updateOrCreate(
                ['id' => $this->chinhanh?->id],
                [
                    "name" => $this->name,
                    "tag" => mb_strtoupper($this->tag),
                    "diachi" => $this->diachi,
                ]
            );


            if (is_array($this->giamdocs) && count($this->giamdocs)) {
                $this->chinhanh->giamdocs()->sync($this->giamdocs);
            }

            $this->chinhanh->update([
                'active' => true,
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->dispatchBrowserEvent('unblockUI');
            $this->dispatchBrowserEvent('toastr', ['type' => 'warning', 'title' => "Thất bại", 'message' => implode(" - ", $e->errorInfo)]);
            return null;
        } catch (\Exception $e2) {
            $this->dispatchBrowserEvent('unblockUI');
            $this->dispatchBrowserEvent('toastr', ['type' => 'warning', 'title' => "Thất bại", 'message' => $e2->getMessage()]);
            return null;
        }

        //Đẩy thông tin về trình duyệt
        $this->dispatchBrowserEvent('dt_draw');
        $toastr_message = $this->toastr_message;
        $this->cancel();
        $this->dispatchBrowserEvent('toastr', ['type' => 'success', 'title' => "Thành công", 'message' => $toastr_message]);
    }

    /**
     * edit_chinhanh
     *
     * @param  mixed $chinhanh
     * @return void
     */
    public function edit_chinhanh(ChiNhanh $chinhanh)
    {
        $this->chinhanh = $chinhanh;

        if (!$this->hr->hasAnyPermission(["edit-chinhanh"])) {
            $this->dispatchBrowserEvent('toastr', ['type' => 'warning', 'title' => "Thất bại", 'message' => "Bạn không có quyền thực hiện hành động này"]);
            $this->cancel();
            return null;
        }

        $this->chinhanh = $this->chinhanh;
        $this->name = $this->chinhanh->name;
        $this->tag = $this->chinhanh->tag;
        $this->diachi = $this->chinhanh->diachi;
        $this->giamdocs = $this->chinhanh->giamdocs->pluck('key')->toArray();
        $this->giamdoc_arrays = $this->chinhanh->giamdocs->pluck('hoten', 'key')->toArray();

        $this->editStatus = true;
        $this->modal_title = "Chỉnh sửa chi nhánh";
        $this->toastr_message = "Chỉnh sửa chi nhánh thành công";

        $this->dispatchBrowserEvent('unblockUI');
        $this->dispatchBrowserEvent('show_modal', "#add_edit_chinhanh_modal");
    }

    /**
     * delete_chinhanh
     *
     * @param  mixed $chinhanh
     * @return void
     */
    public function delete_chinhanh(ChiNhanh $chinhanh)
    {
        $this->chinhanh = $chinhanh;

        if (!$this->hr->hasAnyPermission(["delete-chinhanh"])) {
            $this->dispatchBrowserEvent('toastr', ['type' => 'warning', 'title' => "Thất bại", 'message' => "Bạn không có quyền thực hiện hành động này"]);
            $this->cancel();
            return null;
        }

        $this->deleteStatus = true;
        $this->modal_title = "Xóa chi nhánh";
        $this->toastr_message = "Xóa chi nhánh thành công";

        $this->dispatchBrowserEvent('unblockUI');
        $this->dispatchBrowserEvent('show_modal', "#delete_chinhanh_modal");
    }

    /**
     * delete_chinhanh_action
     *
     * @return void
     */
    public function delete_chinhanh_action()
    {
        if (!$this->hr->hasAnyPermission(["delete-chinhanh"])) {
            $this->dispatchBrowserEvent('toastr', ['type' => 'warning', 'title' => "Thất bại", 'message' => "Bạn không có quyền thực hiện hành động này"]);
            $this->dispatchBrowserEvent('unblockUI');
            return null;
        }

        //action
        try {
            $this->chinhanh->update([
                'active' => false,
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->dispatchBrowserEvent('unblockUI');
            $this->dispatchBrowserEvent('toastr', ['type' => 'warning', 'title' => "Thất bại", 'message' => implode(" - ", $e->errorInfo)]);
            return null;
        } catch (\Exception $e2) {
            $this->dispatchBrowserEvent('unblockUI');
            $this->dispatchBrowserEvent('toastr', ['type' => 'warning', 'title' => "Thất bại", 'message' => $e2->getMessage()]);
            return null;
        }

        //Đẩy thông tin về trình duyệt
        $this->dispatchBrowserEvent('dt_draw');
        $toastr_message = $this->toastr_message;
        $this->cancel();
        $this->dispatchBrowserEvent('toastr', ['type' => 'success', 'title' => "Thành công", 'message' => $toastr_message]);
    }
}
