<?php

function htmlBtn($url,$id,$color='info',$icon='edit'){

        $btn = "<a href='".route($url,$id)."' title='".($icon=='edit' ? 'Edit' : 'View')."' class='btn btn-".$color." btn-sm'><i class='fa fa-".$icon."'></i></a>";
        return $btn;
    }
function htmDeleteBtn($url,$id){
            $btn= Form::open(['method' => 'DELETE','route' => [$url, $id],'style'=>'display:inline']);
            $btn.= "<button class='btn btn-danger btn-sm'  title='Delete'  type='submit' onclick='rowDetele(event)' ><i class='fa fa-trash'></i></button>";
            $btn.= Form::close();
            return  $btn;
    }
?>