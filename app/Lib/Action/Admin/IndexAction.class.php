<?php
/**

 * 首页

 * @version 

 */

    class IndexAction extends AdminAction{


    //框架页

    public function index() {

        C('SHOW_PAGE_TRACE', false);

        $this->assign('channel', $this->_getChannel());

        $this->assign('menu',    $this->_getMenu());

        $this->display();

    }

    /**

     * 首页

     */
    public function main() {

        echo '<h2>这里是后台首页</h2>';

        $this->display();

    }

    /**

     * 头部菜单

     */

    protected function _getChannel() {

        return array(

            'index'   => '首页',

        );

    }
     /**

     * 左侧菜单

     */

    protected function _getMenu() {

        $menu = array();

        //注意顺序！！



        // 后台管理首页

        $menu['index'] = array(

            '系统管理' => array(
                '网站内容' => U('Admin/Setting/set'),
                '修改密码' => U('Admin/Setting/pwd'),

            ),

            '订单管理' => array(
                '用户订单' => U('Admin/Article/ls'),
                '机构订单' => U('Admin/Article/organic'),
                '客户经理订单' => U('Admin/Article/manager'),
            ),
            '机构管理' => array(
                '产品详情' => U('Admin/Goods/product'),
                '机构详情' => U('Admin/Goods/order'),
                
            ),
            '用户管理' => array(
                '用户列表'=>U('Admin/Users/ls'),
            )
        );

        return $menu;

    }

}