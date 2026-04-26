<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        Gate::authorize('viewAny', User::class);

        $users = User::applyFilters(
            $request,
            ['name', 'email'], // searchable columns
            ['id', 'name', 'email', 'role', 'created_at'] // sortable columns
        )->paginate(5)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        Gate::authorize('create', User::class);

        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        Gate::authorize('create', User::class);
        User::create($request->validated());

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user): View
    {
        Gate::authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        Gate::authorize('update', $user);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        Gate::authorize('update', $user);
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        Gate::authorize('delete', $user);

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
