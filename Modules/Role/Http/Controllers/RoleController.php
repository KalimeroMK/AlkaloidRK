<?php

    namespace Modules\Role\Http\Controllers;

    use App\Modules\Role\Requests\Update;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\DB;
    use Modules\Role\Http\Requests\Store;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    class RoleController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         */
        public function __construct()
        {
            $this->middleware('permission:role-list');
            $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        }

        /**
         * Display a listing of the resource.
         *
         * @param  Request  $request
         *
         * @return Application|\Illuminate\Contracts\View\Factory|View
         */
        public function index(Request $request)
        {
            $roles = Role::orderBy('id', 'DESC')->paginate(5);

            return view('role::index', compact('roles'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|\Illuminate\Contracts\View\Factory|View
         */
        public function create()
        {
            $permission = Permission::get();

            return view('role::create', compact('permission'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  Store  $request
         *
         * @return RedirectResponse
         */
        public function store(Store $request): RedirectResponse
        {
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));

            return redirect()->route('roles.index')
                             ->with('success', 'Role created successfully');
        }

        /**
         * Display the specified resource.
         *
         * @param  Role  $role
         *
         * @return Application|\Illuminate\Contracts\View\Factory|View
         */
        public function show(Role $role)
        {
            $rolePermissions = Permission::join(
                "role_has_permissions",
                "role_has_permissions.permission_id",
                "=",
                "permissions.id"
            )
                                         ->where("role_has_permissions.role_id", $role->id)
                                         ->get();

            return view('role::show', compact('role', 'rolePermissions'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  Role  $role
         *
         * @return Application|\Illuminate\Contracts\View\Factory|View
         */
        public function edit(Role $role)
        {
            $permission      = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
                                 ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                                 ->all();

            return view('role::edit', compact('role', 'permission', 'rolePermissions'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  Update  $request
         * @param  Role  $role
         *
         * @return RedirectResponse
         */
        public function update(Update $request, Role $role): RedirectResponse
        {
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));

            return redirect()->route('roles.index')
                             ->with('success', 'Role updated successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  Role  $role
         *
         * @return RedirectResponse
         */
        public function destroy(Role $role): RedirectResponse
        {
            DB::table("roles")->where('id', $role->id)->delete();

            return redirect()->route('roles.index')
                             ->with('success', 'Role deleted successfully');
        }
    }