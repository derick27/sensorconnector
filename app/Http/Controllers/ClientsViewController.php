<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class ClientsViewController extends Controller
{
 public function getClients(){ // function return all clients from database
 	$clients = DB::select('select * from clients');
 	return view('about',['clients'=>$clients]);
 }
 public function getNom(){
 	$prenoms = DB::select('select prenom,nom from clients');
 	return view ('welcome',['prenoms'=>$prenoms],['noms'=>$prenoms]);
 }

 public function getCapteur(){
 	$capteurs =DB::select('select macAdresse from logs_actuel');
 	return view('welcome',['capteurs'=>$capteurs]);
 }
}
