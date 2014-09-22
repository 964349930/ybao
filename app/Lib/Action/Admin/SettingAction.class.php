<?php

/**

 * 后台-全局控制器

 * @version 2013-08-28

 */

class SettingAction extends AdminAction {


    /**

     * 页面：修改密码

     */


    public function pwd()

    {

        if(empty($_POST)){
            $this->display();
            exit;
        }
        $userObj = D('Users');

        $yid = trim($this->_post('yid'));

        $id = trim($this->_post('id'));

        $oldpass = trim($this->_post('oldpass'));

        $newpass = trim($this->_post('newpass'));

        $repass = trim($this->_post('repass'));



        if (empty($oldpass)) {

            $this->error('旧密码不能为空');

        }

        if (empty($newpass)) {

            $this->error('新密码不能为空');

        }

        if ($newpass != $repass) {

            $this->error('两次密码输入不一致');

        }



	    //旧密码

	    $password = $userObj->where('id='.$_SESSION['yid'])->getField('password');

	    if ($password != md5($oldpass)) {

            $this->error('旧密码不正确');

        }



        //更新密码

        $update = array(

            'password' => md5($newpass),

        );

       
        
        $userObj->where('id='.$_SESSION['yid'])->save($update);


        $this->success('密码修改成功');
        
    }


}

