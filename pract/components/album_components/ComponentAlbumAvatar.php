<?php
require_once ('../framework/Component.php');
class ComponentAlbumAvatar extends Component{

    public function render()
    {
        $id = $this->data['id'];
        $pic = $this->data['pic'];
        $name = $this->data['name'];
        return "<a href='album_page.php?id=$id'> <img src='../assets/$pic' alt=''></a>";
    }
}