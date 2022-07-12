<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientListRequest;
use App\Http\Requests\StoreClientListRequest;
use App\Http\Requests\UpdateClientListRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientLists.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientLists.create');
    }

    public function store(StoreClientListRequest $request)
    {
        $clientList = ClientList::create($request->all());

        return redirect()->route('admin.client-lists.index');
    }

    public function edit(ClientList $clientList)
    {
        abort_if(Gate::denies('client_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientLists.edit', compact('clientList'));
    }

    public function update(UpdateClientListRequest $request, ClientList $clientList)
    {
        $clientList->update($request->all());

        return redirect()->route('admin.client-lists.index');
    }

    public function show(ClientList $clientList)
    {
        abort_if(Gate::denies('client_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientLists.show', compact('clientList'));
    }

    public function destroy(ClientList $clientList)
    {
        abort_if(Gate::denies('client_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientList->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientListRequest $request)
    {
        ClientList::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
