<?php

namespace Modules\FAQs\app\Http\Controllers;

use App\DataTables\FAQs\CategoryDataTable;
use App\DataTables\FAQs\QuestionsDataTable;
use App\DataTables\FAQs\ContactDataTable;
use App\DataTables\FAQs\GalleryDataTable;
use App\DataTables\FAQs\roomTypeDataTable;
use App\Http\Controllers\Controller;
use App\Models\FAQs\FAQsCategories;
use App\Models\FAQs\galleries;
use App\Models\FAQs\FAQsModels;
use App\Models\FAQs\FAQsContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class FAQsController extends Controller
{
    public function categoryIndex(CategoryDataTable $dataTable) {
        return $dataTable->render('faqs::category.index');
    }

    public function categoryCreate() {
        return view("faqs::category.create");
    }

    public function categoryStore(Request $request) {
        $request->validate([
            'txtCategory' => ['required', 'min:2','unique:f_a_qs_categories,name'],
            'txtModuleOrder' => ['nullable', 'integer', 'min:0'],
            'fileSound' => '',
            'fileIcon' => '',
        ]);

        $fileNameSound = "";
        if ($request->file('fileSound')) {
            $fileNameSound = hexdec(uniqid()).'.'.strtolower($request->fileSound->getClientOriginalExtension());
            $filePath = 'faqs/sounds/category/'.$fileNameSound;
            Storage::disk('public')->put($filePath, file_get_contents($request->fileSound));
        }

        $fileNameIcon = "";
        if ($request->file('fileIcon')) {
            $fileNameIcon = hexdec(uniqid()).'.'.strtolower($request->fileIcon->getClientOriginalExtension());
            $filePath = 'faqs/icons/category/'.$fileNameIcon;
            Storage::disk('public')->put($filePath, file_get_contents($request->fileIcon));
        }

        DB::beginTransaction();
        try {
            FAQsCategories::create([
                'name' => $request->txtCategory,
                'sound' => $fileNameSound,
                'order' => $request->txtModuleOrder,
                'icon' => $fileNameIcon
            ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();
            if ($request->submit == 'save') {
                return redirect()->route('faqs.category.index');
            }
            return redirect()->route('faqs.category.create');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'warning')
                ->flash();
            return redirect()->route('faqs.category.create');
        }
    }

    public function categoryEdit($id) {
        $module = FAQsCategories::where('id', $id)->first();
        return view("faqs::category.edit")->with("module", $module);
    }

    public function categoryUpdate(Request $request, $id) {
        $request->validate([
            'txtCategory' => ['required', 'min:2','unique:f_a_qs_categories,name,'.$id],
            'txtModuleOrder' => ['nullable', 'integer', 'min:0'],
            'fileSound' => '',
            'fileIcon' => '',
            'oldSound' => '',
            'oldIcon' => '',
        ]);

        $fileNameSound = "";
        if ($request->file('fileSound')) {
            $fileNameSound = hexdec(uniqid()).'.'.strtolower($request->fileSound->getClientOriginalExtension());
            $filePath = 'faqs/sounds/category/'.$fileNameSound;
            Storage::disk('public')->put($filePath, file_get_contents($request->fileSound));
        } else {
            $fileNameSound = $request->oldSound;
        }

        $fileNameIcon = "";
        if ($request->file('fileIcon')) {
            $fileNameIcon = hexdec(uniqid()).'.'.strtolower($request->fileIcon->getClientOriginalExtension());
            $filePath = 'faqs/icons/category/'.$fileNameIcon;
            Storage::disk('public')->put($filePath, file_get_contents($request->fileIcon));
        } else {
            $fileNameIcon = $request->oldIcon;
        }

        DB::beginTransaction();
        try {
            FAQsCategories::where("id", $id)
            ->update([
                'name' => $request->txtCategory,
                'sound' => $fileNameSound,
                'order' => $request->txtModuleOrder,
                'icon' => $fileNameIcon
            ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();
            return redirect()->route('faqs.category.index');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'warning')
                ->flash();
            return redirect()->route('faqs.category.create');
        }
    }

    public function categoryDestroy($id) {
        FAQsCategories::where("id", $id)->delete();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->error('delete_msg', 'delete')
            ->flash();
        return redirect()->route('faqs.category.index');
    }

    public function categoryRestore($id) {
        FAQsCategories::where("id", $id)->withTrashed()->restore();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->success('restore_msg', 'restore')
            ->flash();
        return redirect()->route('faqs.category.index');
    }

    public function questionIndex(QuestionsDataTable $dataTable) {
        $category = FAQsCategories::withTrashed()->orderBy("order", 'ASC')->pluck('name', 'id')->toArray();
        //return view("faqs::question.index")->with('category', $category);
        return $dataTable->render('faqs::question.index',['category' => $category]);
    }

    public function questionView($id) {
        $category = FAQsCategories::withTrashed()->orderBy("order", 'ASC')->pluck('name', 'id')->toArray();
        $item = FAQsModels::withTrashed()->where('id', $id)->first();
        return view("faqs::question.view")->with("category", $category)->with("item", $item);
    }

    public function questionCreate() {
        $category = FAQsCategories::withTrashed()->orderBy("order", 'ASC')->pluck('name', 'id')->toArray();
        return view("faqs::question.create")->with("category", $category);
    }

    public function questionStore(Request $request) {
        $request->validate([
            'cboCategory' => '',
            'txtQuestion' => ['required', 'min:2','unique:f_a_qs_models,name'],
            'txtAnswer' => ['required'],
            'txtModuleOrder' => ['nullable', 'integer', 'min:0'],
            'fileSound' => '',
            'fileIcon' => '',
        ]);

        $fileNameSound = "";
        if ($request->file('fileSound')) {
            $fileNameSound = hexdec(uniqid()).'.'.strtolower($request->fileSound->getClientOriginalExtension());
            $filePath = 'faqs/sounds/question/'.$fileNameSound;
            Storage::disk('public')->put($filePath, file_get_contents($request->fileSound));
        }

        $fileNameIcon = "";
        if ($request->file('fileIcon')) {
            $fileNameIcon = hexdec(uniqid()).'.'.strtolower($request->fileIcon->getClientOriginalExtension());
            $filePath = 'faqs/icons/question/'.$fileNameIcon;
            Storage::disk('public')->put($filePath, file_get_contents($request->fileIcon));
        }

        DB::beginTransaction();
        try {
            FAQsModels::create([
                'cate_id' => $request->cboCategory,
                'name' => $request->txtQuestion,
                'sound' => $fileNameSound,
                'description' => $request->txtAnswer,
                'order' => $request->txtModuleOrder,
                'icon' => $fileNameIcon,
                'num_views' => '0'
            ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();

            if ($request->submit == 'save') {
                return redirect()->route('faqs.question.index');
            }
            return redirect()->route('faqs.question.create');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'warning')
                ->flash();
            return redirect()->route('faqs.question.index');
        }
    }

    public function questionEdit($id) {
        $category = FAQsCategories::withTrashed()->orderBy("order", 'ASC')->pluck('name', 'id')->toArray();
        $item = FAQsModels::where('id', $id)->first();
        return view("faqs::question.edit")->with("category", $category)->with("item", $item);
    }

    public function questionUpdate(Request $request, $id) {
        $request->validate([
            'cboCategory' => '',
            'txtQuestion' => ['required', 'min:2','unique:f_a_qs_models,name,'.$id],
            'txtAnswer' => ['required'],
            'txtModuleOrder' => ['nullable', 'integer', 'min:0'],
            'fileSound' => '',
            'fileIcon' => '',
        ]);

        $fileNameSound = "";
        if ($request->file('fileSound')) {
            $fileNameSound = hexdec(uniqid()).'.'.strtolower($request->fileSound->getClientOriginalExtension());
            $filePath = 'faqs/sounds/question/'.$fileNameSound;
            Storage::disk('public')->put($filePath, file_get_contents($request->fileSound));
        } else {
            $fileNameSound = $request->oldSound;
        }

        $fileNameIcon = "";
        if ($request->file('fileIcon')) {
            $fileNameIcon = hexdec(uniqid()).'.'.strtolower($request->fileIcon->getClientOriginalExtension());
            $filePath = 'faqs/icons/question/'.$fileNameIcon;
            Storage::disk('public')->put($filePath, file_get_contents($request->fileIcon));
        } else {
            $fileNameIcon = $request->oldIcon;
        }

        DB::beginTransaction();
        try {
            FAQsModels::where("id", $id)
            ->update([
                'cate_id' => $request->cboCategory,
                'name' => $request->txtQuestion,
                'sound' => $fileNameSound,
                'description' => $request->txtAnswer,
                'order' => $request->txtModuleOrder,
                'icon' => $fileNameIcon
            ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();
            if ($request->submit == 'save') {
                return redirect()->route('faqs.question.index');
            }
            return redirect()->route('faqs.question.create');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'warning')
                ->flash();
            return redirect()->route('faqs.question.index');
        }
    }

    public function questionDestroy($id) {
        FAQsModels::where("id", $id)->delete();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->error('delete_msg', 'delete')
            ->flash();
        return redirect()->route('faqs.question.index');
    }

    public function questionRestore($id) {
        FAQsModels::where("id", $id)->withTrashed()->restore();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->success('restore_msg', 'restore')
            ->flash();
        return redirect()->route('faqs.question.index');
    }

    public function bannerIndex(){
        return "index";
    }

    public function bannerView(){
        return "dddddddddddd";
    }

    //for contact route
    public function contactIndex(ContactDataTable $dataTable){
         return $dataTable->render('faqs::contact.index');
    }
    public function contactCreate() {
        return view("faqs::contact.create");
    }
    public function contactStore(Request $request) {
        $request->validate([
            'txtTitle' => ['required'],
            'txtTitleKh' => ['required'],
            'txtDescrioption' => ['required'],
            'txtEmail' => ['required'],
            'txtPhone' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            FAQsContact::create([
                'title' => $request->txtTitle,
                'title_kh' => $request->txtTitleKh,
                'description' => $request->txtDescrioption,
                'email' => $request->txtEmail,
                'phone' => $request->txtPhone

            ]);

            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();
            if ($request->submit == 'save') {
                return redirect()->route('faqs.contact.index');
            }
            return redirect()->route('faqs.contact.create');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'warning')
                ->flash();
            return redirect()->route('faqs.contact.create');
        }
    }

    public function contactEdit($id) {
        $module = FAQsContact::where('id', $id)->first();
        return view("faqs::contact.edit")->with("module", $module);
    }

    public function contactUpdate(Request $request, $id){
        $request->validate([
            'txtTitle' => ['required'],
            'txtTitleKh' => ['required'],
            'txtDescrioption' => ['required'],
            'txtEmail' => ['required'],
            'txtPhone' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            FAQsContact::where("id", $id)
            ->update([
                'title' => $request->txtTitle,
                'title_kh' => $request->txtTitleKh,
                'description' => $request->txtDescrioption,
                'email' => $request->txtEmail,
                'phone' => $request->txtPhone
            ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();
            if ($request->submit == 'save') {
                return redirect()->route('faqs.contact.index');
            }
            return redirect()->route('faqs.contact.create');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'warning')
                ->flash();
            return redirect()->route('faqs.contact.index');
        }

    }

    public function galleryIndex(GalleryDataTable $dataTable){
         return $dataTable->render('faqs::gallery.index');
    }
    public function galleryCreate(){
        return view("faqs::gallery.create");
    }
    public function galleryStore(Request $request) {

       $request->validate([
            'name' => ['required'],
            'gallery'     => ['required', 'array', 'min:1'],              // <-- note: not 'gallery[]'
            'gallery.*'   => ['file', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'], // 5MB each
        ]);
       if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $key => $file) {
                if (!$file || !$file->isValid()) continue;
                $filename = time().'-'.$key.'.'.strtolower($file->getClientOriginalExtension());
                $path = $file->storeAs('faqs/icons/question', $filename, 'public');
                $icons[] = $path;
                galleries::create([
                "images" => $filename
                ]);
            }
           flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();
            if ($request->submit == 'save') {
                return redirect()->route('faqs.gallery.index');
            }
            return redirect()->route('faqs.gallery.create');
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'warning')
                ->flash();
            return redirect()->route('faqs.gallery.index');

        }
    }

    public function roomTypeIndex(roomTypeDataTable $dataTable){
         return $dataTable->render('faqs::roomType.index');
    }
    public function roomTypeCreate(){
        return view("faqs::roomType.create");
    }


}
