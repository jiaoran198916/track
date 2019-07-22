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

        switch ($this->type){
            case 'time':
                $val = 'time';
                break;
            case 'score':
                $val = 'score';
                break;
            default:
                $val = 'score';
                break;
        }
		
		foreach ($this->items as $key => $item)
		{

            $itemString.= '<a href="'.$item->detail.'" alt="'.$item->name .'" title="'. $item->name .'" target="_blank" class="list-group-item">'.$item->name.'<span class="badge" >'.(($val == 'score') ? $item->count : date('m-d',$item->create_time)).'</span></a>';

		}

		return $itemString;
		
	}
	
	
	
	
	
	
	
	
	
}