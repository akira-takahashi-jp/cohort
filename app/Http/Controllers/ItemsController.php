<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Services\RetentionSummarizer;
use Illuminate\Http\Request;

class ItemsController extends Controller {

	protected $item;

	public function __construct(Item $item){
		$this->item = $item;
	}

	public function getShow($id){
		$item = $this->item->find($id);
		return view('items.show', compact('item'));
	}

	public function getCreate(){
		return view('items.create', ['item' => $this->item]);
	}

	public function postCreate(Request $request, $projectId){
		$this->item->fill($request->all());
		$this->item->project_id = $projectId;
		$this->item->save();
		return redirect("projects/show/{$projectId}");
	}

	public function getEdit($id){
		$item = $this->item->find($id);
		return view('items.edit', compact('item'));
	}

	public function postEdit(Request $request, $id){
		$item = $this->item->find($id);
		$item->fill($request->all())->save();
		return redirect("projects/show/{$item->project_id}");
	}

	public function postDelete($id){

	}

	public function getReport(Request $request, $id){

		$item = $this->item->find($id);
		$userGroups = null;
		if($request->get('from_date') && $request->get('to_date') && $request->get('retention_loop')){
			$retentionSummarizer = new RetentionSummarizer($item);
			$userGroups = $retentionSummarizer->getUserGroups($request->get('from_date'), $request->get('to_date'), $request->get('retention_loop'));
			//print_r($userGroups[0]->retentionDatas);
			//exit;
		}
		return view('items.report', compact('item', 'request', 'userGroups'));
	}

}
