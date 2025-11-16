<?php

namespace Modules\Setups\app\Http\Controllers;

use App\DataTables\Setups\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('setups::users.index');
    }

    public function create() {
        $role = Roles::orderBy('id', 'ASC')->pluck('name_kh', 'id')->toArray();
        return view("setups::users.create")->with("role", $role);
    }

    public function store(Request $request) {
        $request->validate([
            'username' => ['required', 'min:4', 'unique:users,username'],
            'password' => ['required', 'min:6', 'confirmed'],
            'cboRole' => ['required']
        ]);

        DB::beginTransaction();
        try {
            User::create([
                'username' => $request->username,
                'email' => $request->username.'@gmail.com',
                'password' => bcrypt($request->password),
                'image' => 'no-image.png',
                'locale' => 'kh',
                'status' => true,
                'role_id' => $request->cboRole
            ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();
            if ($request->submit == 'save') {
                return redirect()->route('setups.users.index');
            }
            return redirect()->route('setups.users.create');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'បញ្ហា')
                ->flash();
            return redirect()->route('setups.users.index');
        }
    }

    public function edit($id) {
        $user = User::find($id);
        $role = Roles::orderBy('id', 'ASC')->pluck('name_kh', 'id')->toArray();
        return view("setups::users.edit")->with("role", $role)->with("user", $user);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'username' => ['required', 'min:4', 'unique:users,username,'.$id],
            'cboRole' => ['required']
        ]);

        if ($request->password !== null) {
            $request->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);
        }

        DB::beginTransaction();
        try {
            if ($request->password !== null) {
                User::where("id", $id)
                ->update([
                    'username' => $request->username,
                    'email' => $request->username.'@gmail.com',
                    'password' => bcrypt($request->password),
                    'image' => 'no-image.png',
                    'locale' => 'kh',
                    'status' => true,
                    'role_id' => $request->cboRole
                ]);
            } else {
                User::where("id", $id)
                    ->update([
                        'username' => $request->username,
                        'email' => $request->username.'@gmail.com',
                        'image' => 'no-image.png',
                        'locale' => 'kh',
                        'status' => true,
                        'role_id' => $request->cboRole
                    ]);
            }

            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('success_msg', 'success')
                ->flash();

            return redirect()->route('setups.users.index');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'បញ្ហា')
                ->flash();
            return redirect()->route('setups.users.index');
        }
    }

    public function destroy($id) {
        User::where("id", $id)->delete();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->error('delete_msg', 'delete')
            ->flash();
        return redirect()->route('setups.users.index');
    }

    public function restore($id) {
        User::where("id", $id)->withTrashed()->restore();
        flash()
            ->translate('km')
            ->option('timeout', 2000)
            ->success('restore_msg', 'restore')
            ->flash();
        return redirect()->route('setups.users.index');
    }

    public function password() {
        return view("setups::users.password");
    }

    public function passwordChange(Request $request) {
        $request->validate([
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        DB::beginTransaction();
        try {
            User::where("id", Auth::user()->id)
                ->update([
                    'password' => bcrypt($request->password),
                ]);
            DB::commit();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->success('password.change', 'success')
                ->flash();

            return redirect()->route('dashboard.index');

        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            flash()
                ->translate('kh')
                ->option('timeout', 2000)
                ->error($bug, 'បញ្ហា')
                ->flash();
            return redirect()->route('dashboard.index');
        }
    }
}
