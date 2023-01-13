<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\Employee\StoreRequest;
use App\Models\Employee;
use App\Models\Store;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

use function PHPUnit\Framework\isNull;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use RegistersUsers;
    private Builder $model;

    public function __construct()
    {
        $this->middleware('auth');
        $this->model = (new Employee())->query();
    }


    public function index()
    {
        $users = User::get();
        $stores = Store::get();
        $roles = Role::get();
        if (Auth::user()->hasRole("Admin")) {
            $store = Auth::user()->employee->store;
            $employees = $store->employees;
            $users = array();
            foreach ($employees as $employee) {
                if ($employee->user->hasRole('SupperAdmin')) {
                    continue;
                } else {
                    $users[] = $employee->user;
                }
            }
        }
        // dd($users);
        return view('Employees.index', [
            'stores' => $stores,
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::get();
        return view('Employees.add', [
            'stores' => $stores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keys =  ['_token', 'password_confirmation', 'finish'];
        Employee::create($request->except($keys));
        return redirect()->route('employee.index')->with('message', 'Lưu thành công');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($employee)
    {
        $user = User::query()->where('id', $employee)->first();
        // dd($user->getAttributes());
        return $user->getAttributes();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $user)
    {
        $data = $request->all();
        // dd($data);
        $user =  User::query()->where('id', $user)->first();
        $employee = $user->employee;

        if (!isset($employee->id)) {
            $employee = Employee::create(
                [
                    'name' => $data['name'],
                    'store_id' => $data['store_id'],
                    'user_id' => $user->id,
                    'email' => $data['email'],
                ]
            );
        } else {;
            $employee->update(
                [
                    'name' => $data['name'],
                    'store_id' => $data['store_id'],
                    'email' => $data['email'],
                ]
            );
        }
        if (Auth::user()->hasRole('SupperAdmin')) {
            $user->roles()->detach();
            $user->assignRole([$data['role_id']]);
        } else {
            if ($user->hasRole(['SupperAdmin', 'Admin'])) {
                return redirect(route('employee.index'));
            }
            $user->roles()->detach();
            $user->assignRole(['3']);
        }
        return redirect(route('employee.index'))->with('message', 'Lưu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::find($user);
        $employee = $user->employee;
        if (isset($employee))
            $employee->delete();
        $user->delete();
        return redirect(route('employee.index'))->with('message', 'Xóa thành công');
    }
}
