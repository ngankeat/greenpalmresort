<?php

namespace Modules\Setups\app\Http\Controllers;

use App\DataTables\Setups\PagesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Setups\Modules;
use App\Models\Setups\Pages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PagesDataTable $dataTable)
    {
        //$category = FAQsCategories::withTrashed()->orderBy("order", 'ASC')->pluck('name', 'id')->toArray();
        $modulesItem = Modules::withTrashed()->orderBy("order", 'ASC')->pluck('name_kh', 'id')->toArray();
        return $dataTable->render('setups::pages.index', ['modulesItem' => $modulesItem]);
    }

    public function create() {
        $modulesItem = Modules::withTrashed()->orderBy("order", 'ASC')->pluck('name_kh', 'id')->toArray();
        return view("setups::pages.create")->with("modulesItem", $modulesItem);
    }

    public function store(Request $request) {
        $request->validate([
            'cboCategory' => '',
            'txtRoute' => ['required'],
            'txtPages' => ['required', 'min:2','unique:pages,name'],
            'txtPagesKh' => ['required', 'min:2'],
            'txtModuleOrder' => ['nullable', 'integer', 'min:0'],
            'txtModuleIcon' => ''
        ]);
        DB::beginTransaction();
        try {
            Pages::create([
                'module_id' => $request->cboCategory,
                'name' => $request->txtPages,
                'name_kh' => $request->txtPagesKh,
                'slug' => Str::slug($request->txtPages),
                'default_action' => $request->txtRoute,
                'order' => $request->txtModuleOrder,
                'icon' => $request->txtModuleIcon
            ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();
            if ($request->submit == 'save') {
                return redirect()->route('setups.pages.index');
            }
            return redirect()->route('setups.pages.create');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'បញ្ហា')
                ->flash();
            return redirect()->route('setups.pages.index');
        }
    }

    public function edit($id) {
        $modulesItem = Modules::withTrashed()->orderBy("order", 'ASC')->pluck('name_kh', 'id')->toArray();
        $row = Pages::where('id', $id)->first();
        return view("setups::pages.edit")->with("modulesItem", $modulesItem)->with("row", $row);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'cboCategory' => '',
            'txtRoute' => ['required'],
            'txtPages' => ['required', 'min:2','unique:pages,name,'.$id],
            'txtPagesKh' => ['required', 'min:2'],
            'txtModuleOrder' => ['nullable', 'integer', 'min:0'],
            'txtModuleIcon' => ''
        ]);
        DB::beginTransaction();
        try {
            Pages::where("id", $id)
            ->update([
                'module_id' => $request->cboCategory,
                'name' => $request->txtPages,
                'name_kh' => $request->txtPagesKh,
                'slug' => Str::slug($request->txtPages),
                'default_action' => $request->txtRoute,
                'order' => $request->txtModuleOrder,
                'icon' => $request->txtModuleIcon
            ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();

            return redirect()->route('setups.pages.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'បញ្ហា')
                ->flash();
            return redirect()->route('setups.pages.index');
        }
    }

    public function view($id) {
        $modulesItem = Modules::withTrashed()->orderBy("order", 'ASC')->pluck('name_kh', 'id')->toArray();
        $row = Pages::where('id', $id)->first();
        return view("setups::pages.view")->with("modulesItem", $modulesItem)->with("row", $row);
    }

    public function menus($id) {
        $row = Pages::where('id', $id)->first();
        return view("setups::pages.menus")->with("row", $row);
    }

}
