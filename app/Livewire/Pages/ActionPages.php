<?php

namespace App\Livewire\Pages;

use App\Models\Setups\PageActions;
use App\Models\Setups\Pages;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActionPages extends Component
{
    public $id;
    public $actionType;
    public $routeName;
    public $actionName;
    public $actionNameKh;
    public $order;

    public function mount() {
        $param = request()->id;
        $this->id = $param;
    }

    public function render()
    {

        $page = Pages::where("id", $this->id)->first();
        $actionPages = PageActions::withTrashed()->where("page_id", $this->id)->orderBy("position", 'ASC')->get();
        return view('livewire.pages.action-pages')
            ->with("id", $this->id)
            ->with("actionPages", $actionPages)
            ->with("page", $page);
    }

    public function saveAction() {
        DB::beginTransaction();
        try {
            PageActions::create([
                "page_id" => $this->id,
                "name" => $this->actionName,
                "name_kh" => $this->actionNameKh,
                "route_name" => $this->routeName,
                "type" => $this->actionType,
                "position" => $this->order,
                "icon" => "",
            ]);
            $this->actionName = '';
            DB::commit();
            flash()
                ->translate('km')
                ->option('timeout', 2000)
                ->success('success_msg', 'update')
                ->flash();
            //$this->reset
        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'បញ្ហា')
                ->flash();
        }
    }
}
