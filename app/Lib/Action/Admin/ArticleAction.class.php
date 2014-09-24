<?php
/**
 * 模版控制器
 */
class ArticleAction extends AdminAction
{

    /**
     *客户经理订单
     */
    public function manager()
    {
        $articList = D('Orders') ->select();
        $this->assign('list',$articList);
        $this->display();
    }
    /**
    *客户经理订单删除
    */
     public function mandel(){
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
        if (D('Orders') -> where($arrMap) ->delete()) {
            $this ->success('删除成功');
        }else{
            $this ->error('删除失败');
        }
    }

    /**
     * 机构订单
     */
    public function organic()
    {
        $articList =D('Orders') ->select();
        $this->assign('list',$articList);
        $this->display();
    }
    /**
    *机构订单删除
    */
     public function orgdel(){
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
        if (D('Orders') -> where($arrMap) ->delete()) {
            $this ->success('删除成功');
        }else{
            $this ->error('删除失败');
        }
    }
    /**
     * 用户订单
     */
    public function ls()
    {
        $articleList = D('Orders')->select();
        $this->assign('list', $articleList);
        $this->display();
    }

    /**
     * 用户订单添加
     */
    public function info()
    {
        $orderObj = D('Orders');
        if(empty($_POST)){
            $id = $this->_get('id');
            if(!empty($id)){
                $info = $orderObj->where('id='.$id)->find();
                $this->assign('info', $info);
            }
            $this->display();
            exit;
        }
        $data = $this->_post();
        $data['time_modify'] = time();
        $id = $this->_post('id');
        if(empty($id)){
            $data['time_add'] = time();
            $orderObj->add($data);
        }else{
            $orderObj->save($data);
        }   
        $this->success('操作成功');
    }
    /**
    *用户订单删除
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
        if (D('Orders') -> where($arrMap) ->delete()) {
            $this ->success('删除成功');
        }else{
            $this ->error('删除失败');
        }
    }
}
