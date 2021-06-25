<?php


namespace App\Http\Controllers;


class StudentController
{
     function create (){
        return view('admin.student.create');
}
    function view (){
        return view('admin.student.view');
}
    function update (){
        return view('admin.student.updateList');
}
    function Delete (){
        return view('admin.student.Delete');
    }
    function getList (){
        return view('admin.student.getList');
    }
    function getById(){
        return view('admin.student.getById');
    }
}
