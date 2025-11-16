<?php

namespace Modules\Setups\app\Http\Controllers;

use App\DataTables\Setups\ModulesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Setups\Modules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ModulesDataTable $dataTable)
    {
        return $dataTable->render('setups::modules.index');
    }

    public function modulesCreate() {
        return view("setups::modules.create");
    }

    public function modulesStore(Request $request) {
        $request->validate([
            'txtModule' => ['required', 'min:2','unique:modules,name'],
            'txtModuleKh' => ['required', 'min:2'],
            'txtModuleOrder' => ['nullable', 'integer', 'min:0'],
            'txtModuleIcon' => ''
        ]);
        DB::beginTransaction();
        try {
            Modules::create([
                'name' => $request->txtModule,
                'name_kh' => $request->txtModuleKh,
                'slug' => Str::slug($request->txtModule),
                'order' => $request->txtModuleOrder,
                'is_border_bottom' => true,
                'icon' => $request->txtModuleIcon
            ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();
            if ($request->submit == 'save') {
                return redirect()->route('modules.index');
            }
            return redirect()->route('modules.create');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'បញ្ហា')
                ->flash();
            return redirect()->route('modules.index');
        }
    }

    public function modulesEdit($id) {
        $module = Modules::where('id', $id)->first();
        return view("setups::modules.edit")->with("module", $module);
    }

    public function modulesUpdate(Request $request, $id) {
        $request->validate([
            'txtModule' => ['required', 'min:2','unique:modules,name,'.$id],
            'txtModuleKh' => ['required', 'min:2'],
            'txtModuleOrder' => ['nullable', 'integer', 'min:0'],
            'txtModuleIcon' => ''
        ]);
        DB::beginTransaction();
        try {
            Modules::where("id", $id)
                ->update([
                    'name' => $request->txtModule,
                    'name_kh' => $request->txtModuleKh,
                    'slug' => Str::slug($request->txtModule),
                    'order' => $request->txtModuleOrder,
                    'is_border_bottom' => true,
                    'icon' => $request->txtModuleIcon
                ]);
            DB::commit();
            flash()
                ->translate('km')
                ->option('timeout', 2000)
                ->success('success_msg', 'update')
                ->flash();
            return redirect()->route('modules.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'បញ្ហា')
                ->flash();
            return redirect()->route('modules.index');
        }
    }

    public function modulesDestroy($id) {
        Modules::where("id", $id)->delete();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->error('delete_msg', 'delete')
            ->flash();
        return redirect()->route('modules.index');
    }

    public function modulesRestore($id) {
        Modules::where("id", $id)->withTrashed()->restore();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->success('restore_msg', 'restore')
            ->flash();
        return redirect()->route('modules.index');
    }
}
