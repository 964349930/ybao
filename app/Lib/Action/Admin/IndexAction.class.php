<?php
class IndexAction extends AdminAction
{
    public function index()
    {
        $this->assign('channel', $this->_getChannel());
        $this->assign('menu',    $this->_getMenu());
        $this->display();
    }

    public function main()
    {
        echo 'hello';
        $this->display();
    }

    protected function _getChannel() {
        return array(
            'index'   => '我的首页',
        );
    }

    protected function _getMenu() {
        $menu = array();
        $menu['index'] = array(
            '网站信息' => array(
                '设置信息' => U('Admin/Setting/set'),
                '修改密码' => U('Admin/Setting/pwd'),
            ),
            '文章管理' => array(
                '文章管理' => U('Admin/Article/ls'),
            ),
        );
        return $menu;
    }
}