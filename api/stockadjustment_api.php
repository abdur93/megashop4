<?php
class StockAdjustmentApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["stock_adjustments"=>StockAdjustment::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["stock_adjustments"=>StockAdjustment::pagination($page,$perpage),"total_records"=>StockAdjustment::count()]);
	}
	function find($data){
		echo json_encode(["stockadjustment"=>StockAdjustment::find($data["id"])]);
	}
	function delete($data){
		StockAdjustment::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$stockadjustment=new StockAdjustment();
		$stockadjustment->user_id=$data["user_id"];
		$stockadjustment->remark=$data["remark"];
		$stockadjustment->adjustment_type_id=$data["adjustment_type_id"];
		$stockadjustment->werehouse_id=$data["werehouse_id"];

		$stockadjustment->save();
		echo json_encode(["success" => "yes"]);
	}
	/*"cmbWarehouse":warehouse_id,
                  "txtAdjustmentDate":adjustment_date,                 
                  "cmbAdjustmentType":adjustment_type,
                  "txtRemark":remark,                  
                  "txtProducts":products */
	function update($data,$file=[]){
		$stockadjustment=new StockAdjustment();
		$stockadjustment->id=$data["id"];
		$stockadjustment->user_id=$data["user_id"];
		$stockadjustment->remark=$data["remark"];
		$stockadjustment->adjustment_type_id=$data["adjustment_type_id"];
		$stockadjustment->werehouse_id=$data["werehouse_id"];

		$stockadjustment->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
