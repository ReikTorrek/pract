<?php
require_once ('../framework/Component.php');
class ComponentAuthorAvatar extends Component{

    public function render()
    {
        $id = $this->data['id'];
        $pic = $this->data['pic'];
        return "<a href='author_page.php?id=$id'> <img src='../assets/$pic' alt=''></a>";
    }
}