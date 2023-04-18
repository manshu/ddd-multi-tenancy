<?php

namespace Gurulabs\Http\Authentication\Controllers;

use Illuminate\Http\Request;
use Gurulabs\Domain\Tenants\Tenant;

use Illuminate\Support\Facades\Hash;
use Gurulabs\App\Controllers\Controller;
use Gurulabs\Http\Authentication\Requests\TenantRegistrationRequest;

class RegisteredTenantController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(TenantRegistrationRequest $request)
    {
        $tenant = Tenant::create($request->validated());
        $tenant->createDomain(['domain' => $request->domain]);

        return redirect(tenant_route($tenant->domains->first()->domain, 'tenant.login'));
    }
}
