<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * 状態定義
     */
    const STATUS = [
        1 => ['label' => '貸出可能', 'class' => 'label-primary'],
        2 => ['label' => '貸出中', 'class' => 'label-success'],
        3 => ['label' => '延滞中', 'class' => 'label-danger'],
    ];

    /**
     * 状態のラベル
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if(!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    /**
     * 状態を表すHTMLクラス
     * @return string
     */
    public function getStatusClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if(!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    /**
     * 整形した期限日
     * @return string
     */
    public function getFormattedDueDateAttribute()
    {
        $due_date = $this->attributes['due_date'];
        
        // 定義していなければ空白を返す
        if(!isset($due_date)) {
            return "";
        }
        return Carbon::createFromFormat('Y-m-d', $due_date)
            ->format('Y/m/d');
    }
}
