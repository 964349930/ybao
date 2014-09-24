<?php
/**
 * 模版控制器
 */
class GoodsAction extends AdminAction
{

    /**
     * 机构详情
     */
    public function order()
    {
        $goodsList = D('Circles') ->select();
        $this->assign('list',$goodsList);
        $this->display();
    }
    /**
     * 产品详情
     */
    public function product()
    {
        $goodsList = D('Goods')->select();
        $this->assign('list', $goodsList);
        $this->display();
    }

    /**
     * 产品添加
     */
    public function info()
    {
        $goodsObj = D('Goods');
        if(empty($_POST)){
            $id = $this->_get('id');
            if(!empty($id)){
                $info = $goodsObj->where('id='.$id)->find();
                $this->assign('info', $info);
            }
            $this->display();
            exit;
        }
        $data = $this->_post();
        $id = $this->_post('id');
        if(empty($id)){
            $goodsObj->add($data);
        }else{
            $goodsObj->save($data);
        }
        $this->success('操作成功');
    }

    /**
    *删除
    */
    public function del(){
        $delIds = array();
        $postIds = $this-> _post('id');
        if(!empty($postIds)){
            $delIds = $postIds;
        }
        $getId = intval($this -> _get('id'));
        if (!empty($getId)) {
            $delIds[] = $getId;
        }
        if (empty($delIds)) {
            $this ->error('请确定你要删除的数据');
        }
        $arrMap['id'] = array('in',$delIds);
        if (D('Goods') -> where($arrMap) ->delete()) {
            $this ->success('删除成功');
        }else{
            //print_r(D('Tpl')->getLastSQL());exit;
            $this ->error('删除失败');
        }
    }
}
