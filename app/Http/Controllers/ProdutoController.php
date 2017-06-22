<?php 

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

use estoque\Produto;

class ProdutoController extends Controller {

	public function lista(){

		$produtos = Produto::all();

		return view('produto.listagem')->with('produtos', $produtos);
	}

	public function mostra() {

		$id = Request::route('id');
		$resposta = Produto::find($id);
		
		if(empty($resposta)) {
			return 'Este produto não existe.';
		}

		return view('produto.detalhes')->with('p', $resposta);
	}

	public function novo() {
		return view('produto.formulario');
	}

	public function adiciona() {
		Produto::create(Request::all());
				
		return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
	}

	public function todos() {
		$produtos = DB::select('select * from produtos');

		return response()->json($produtos);
	}

	public function remove($id){
	  $produto = Produto::find($id);
	  $produto->delete();
	  return redirect()->action('ProdutoController@lista');
	}
}