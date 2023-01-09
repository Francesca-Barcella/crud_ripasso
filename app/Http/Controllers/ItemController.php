<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderByDesc('id')->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        /* ORIGINE */
        /* $data = [
            'name' => $request['name'],
            'image' => $request['image'],
            'price' => $request['price'],
            'description' => $request['description']
        ];
        Item::create($data); */

        /* dd per vedere se classe Request importata correttamente*/
        //dd($request->all());
        /* 1° METODO - 1° step - validation backend - inserisco le regole di validazione nello store del PageController */
        /* $val_data = $request -> validate([
            'name' => 'required|min:10|max:50',
            'image' => 'nullable|max:255',
            //capire come gestire i numeri per il price
            'description' => 'nullable|max:1000',
        ]); */
        /* 2° METODO - 1° step - validation backend - richiamo le regole tramite validation e i campi qui sopra li trasporto nella function validation */
        $val_data = $this->validation($request->all());

        /* 1° METODO - 2° step - validation backend - posso generare l'istanza sfruttando la variabile $val_dat ed il metodo create - salvando il tutto dentro la variabile $item*/
        $item = Item::create($val_data);
        return to_route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {

        /*   $val_data = $request -> validate([
            'name' => 'required|min:10|max:50',
            'image' => 'nullable|max:255',
            'description' => 'required|max:1000',
        ]); */

        /* $data = [
            'name' => $request['name'],
            'image' => $request['image'],
            'price' => $request['price'],
            'description' => $request['description']
        ];*/

        $val_data = $this->validation($request->all());
        $item->update($val_data);
        return to_route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return to_route('items.index');
    }

    /* 2° METODO DI VALIDAZIONE - con validator::make */
    private function validation($data)
    {
        //Validator::make($data, $rules, $message)
        $validator = Validator::make($data, [
            //questi dati e le regole li ho recuperati dallo store sopra
            'name' => 'required|min:10|max:50',
            'image' => 'nullable|max:255',
            'description' => 'nullable|max:1000',
        ], [
            //qui posso mettere i messaggi personalizzati
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve essere di minimo :min caratteri',
            'name.max' => 'Il nome deve essere di massimo :max caratteri',
            'image.max' => 'l\'immagine può contenere massimo max: caratteri',
            'description.max' => 'la descrizione può contenere massimo max: caratteri',
        ])->validate();
        return $validator;
    }
}
