<?php
namespace frontend\components;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class RankingWidget extends Widget
{
	public $items;
	public $type;

	public function init()
	{
		parent::init();
	}
	
	public function run()
	{
		$itemString='';
//		$fontStyle=array("6"=>"danger",
//				"5"=>"info",
//				"4"=>"warning",
//				"3"=>"primary",
//				"2"=>"success",
//		);
        switch ($this->type){
            case 'time':
                $className = 'time';
                break;
            case 'score':
                $className = 'score';
                break;
            default:
                $className = 'score';
                break;
        }
		
		foreach ($this->items as $key => $item)
		{

			//$url = Yii::$app->urlManager->createUrl(['post/index','PostSearch[tags]'=>$tag]);
            $itemString.= '<a href="'.$item->detail.'" alt="'.$item->name .'" title="'. $item->name .'" target="_blank" class="list-group-item">'.$item->name.'<span class="badge '.$className.'" >'.(($className == 'score') ? $item->count : date('Y-m-d',$item->update_time)).'</span></a>';
//            $itemString.='<a href="'.$url.'">'.
//					' <h'.$weight.' style="display:inline-block;"><span class="label label-'
//					.$fontStyle[$weight].'">'.$tag.'</span></h'.$weight.'></a>';
		}
		//sleep(3);
		return $itemString;
		
	}
	
	
	
	
	
	
	
	
	
}