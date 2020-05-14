<?php

namespace App\Http\Controllers;

use App\Evenement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Evenement::with('participants')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$ ne marche pas ? user_id et lieu_id reste NULL
        evenement = [
            'user_id' => 12,
            'lieu_id' => $request->lieu,
            'name'=> $request->name,
            'description'=> $request->description,
            'date' => $request->date,
        ];
        Evenement::create($evenement);*/
        $evenement = new Evenement;
        $evenement->name = $request->name;
        $evenement->description = $request->description;
        $evenement->date = $request->date;
        $evenement->user_id = Auth::user()->id;
        $evenement->lieu_id = $request->lieu;
        $evenement->save();
        return $evenement;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evenement $evenement)
    {
        $participants = User::join('evenement_user', 'evenement_user.user_id', '=', 'users.id')
                            ->where('evenement_user.evenement_id', '=', $evenement->id)->get();
        $response = [
            'evenement' => $evenement,
            'participants' => $participants
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evenement $evenement)
    {
        $evenement->update($request->all)();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
    }

    /**
     * Ajoute un participant à lévenement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addParticipant(Evenement $evenement)
    {
        $evenement->participants()->attach(Auth::user()->id);
    }

    /**
     * Ajoute un participant à lévenement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteParticipant(Evenement $evenement)
    {
        $evenement->participants()->detach(Auth::user()->id);
    }

}
