<?php

namespace App\Repositories;

use App\Models\Contact;

//TODO       :::     HANYA UNTUK PROSES CRUD SAJA     :::

class ContactRepository
{
    //*      ::    Bussines logic for get list data    ::

    public function getAll()
    {
        $contact = Contact::orderBy('name')
                        ->where('active', 1)
                        ->where('number', 'LIKE', '+%')
                        ->get()
                        ->map(function ($contact) {
                            return $this->format($contact);
                        });
        
        return $contact;
    }

    //*      ::    Bussines logic for get by id    ::

    public function getById($id)
    {
        $contact = Contact::where('id', $id)->firstOrFail();

        return $this->format($contact);
    }

    public function format($contact)
    {
        return [
            'contact_id' => $contact->id,
            'name' => $contact->name,
            'number' => $contact->number,
            'status' => $contact->active ? 'active' : 'inactive'
        ];
    }
}