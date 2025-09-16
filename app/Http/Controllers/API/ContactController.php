<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int) $request->get('per_page', 10);
        $search = $request->get('search');

        $query = Contact::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nombre','like',"%{$search}%")
                  ->orWhere('apellidos','like',"%{$search}%")
                  ->orWhere('documento','like',"%{$search}%")
                  ->orWhere('email','like',"%{$search}%")
                  ->orWhere('telefono','like',"%{$search}%");
            });
        }

        $contacts = $query->orderBy('created_at','desc')->paginate($perPage);

        return ContactResource::collection($contacts)
            ->additional(['meta' => [
                'total' => $contacts->total(),
                'per_page' => $contacts->perPage(),
                'current_page' => $contacts->currentPage(),
                'last_page' => $contacts->lastPage(),
            ]]);
    }

    public function store(StoreContactRequest $request)
    {
        DB::beginTransaction();
        try {
            $contact = Contact::create($request->validated());
            DB::commit();
            return (new ContactResource($contact))->response()->setStatusCode(201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error creando contacto.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Contact $contact)
    {
        return new ContactResource($contact);
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        DB::beginTransaction();
        try {
            $contact->update($request->validated());
            DB::commit();
            return new ContactResource($contact);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error actualizando contacto.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return response()->json(['message' => 'Contacto eliminado correctamente.'], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error eliminando contacto.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
