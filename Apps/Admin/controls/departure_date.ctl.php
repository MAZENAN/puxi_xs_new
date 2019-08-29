<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of departure_date
 *
 * @author wj008
 */
class DepartureDateController extends SmcmsController {

    //put your code here
    function update() {
        $campid = IGet('campid');
        if (!empty($campid)) {
            $row = DB::getone('select * from @pf_departure_date where campid=? and start>=curdate() order by start asc limit 0,1', [$campid]);
            if ($row == null) {
                $row = DB::getone('select * from @pf_departure_date where campid=? order by start desc limit 0,1', [$campid]);
            }
            if ($row != null) {
                DB::update('@pf_global_camp', ['departure_time' => $row['start']], $campid);
            }
        }
    }

    public function beforeSaveModel($model) {
        $this->update();
    }

    public function deleteAction() {
        $model = Model($this->ModelName);
        $model->delete($this->id);
        $this->update();
        $this->success('删除数据成功');
    }

}
