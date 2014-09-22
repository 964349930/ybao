<?php
/**
* 用户控制器
*/
class UsersAction extends AdminAction
{
/**
* core
*/
public function core()
{
    $usersList = D('Behavior')->select();
    $this->assign('list', $usersList);
    $this->display();
}
/**
* ls
*/
public function ls()
    {
        $usersList = D('Users')->select();
        
        $this->assign('list', $usersList);
        $this->display();
    }

    /**
     * info
     */
    public function info()
    {
        $usersObj = D('Users');
        if(empty($_POST)){
            $id = $this->_get('id');
            if(!empty($id)){
                $info = $usersObj->where('id='.$id)->find();
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
            $usersObj->add($data);
        }else{
            $usersObj->save($data);
        }
        $this->success('操作成功');
    }

    public function Del(){
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
        if (D('Users') -> where($arrMap) ->delete()) {
            $this ->success('删除成功');
        }else{
            $this ->error('删除失败');
        }
    }
}