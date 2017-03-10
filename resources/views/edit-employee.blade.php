<?php
use App\Employee;

$eid = $eid;
$employee = Employee::find($eid);
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class = "col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
                <div class="panel-heading text-center">
                    Edit Employee : {{$employee->name}}
                </div>
                <div class="panel-body">
                @if(Session::has('success'))
                    <div class="success-message">
                        {{Session::get('success')}}
                    </div>
                @endif
                  
                @if (count($errors) > 0)
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
                @endif  

                <?php

                echo Form::open(array('url' => 'edit-employee/submit', 'method' => 'POST', 'role' => 'form'));
                    echo Form::hidden('employee_id',$employee->id);
                    echo '<div class = "form-group">'.Form::label('Name : ');
                    echo Form::text('name',$employee->name,array('placeholder'=>'Enter Name', 'class' => 'form-control'));
                    echo '</div>';

                    echo '<div class = "form-group">'.Form::label('Username : ');
                    echo Form::text('username',$employee->username,array('placeholder'=>'Enter Username', 'class' => 'form-control'));
                    echo '</div>';
                     
                    echo '<div class = "form-group">'.Form::label('Address : ');
                    echo Form::text('address',$employee->address,array('placeholder'=>'Enter Address', 'class' => 'form-control'));
                    echo '</div>';
                     
                    echo '<div class = "form-group">'.Form::label('Mobile : ');
                    echo Form::text('mobile',$employee->mobile,array('placeholder'=>'Enter Mobile', 'class' => 'form-control'));
                    echo '</div>';
                     
                    echo '<div class = "form-group">'.Form::label('Email : ');
                    echo Form::text('email',$employee->email,array('placeholder'=>'Enter Email', 'class' => 'form-control'));
                    echo '</div>';
                     
                    echo '<div class = "form-group">'.Form::label('Salary : ');
                    echo Form::text('salary',$employee->salary,array('placeholder'=>'Enter Salary', 'class' => 'form-control'));
                    echo '</div>';

                    echo Form::label('Date Of Joinning : ').'<div class = "form-group input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>';
                    echo Form::text('dateOfJoinning', date('d-m-Y',strtotime($employee->dateOfJoinning)),array('placeholder'=>'Enter Date Of Joinning', 'class' => 'form-control'));
                    echo '</div>';
                     
                    echo '<div class = "form-group">'.Form::label('Choose Role : ');
                    echo Form::select('role', array('' => 'Select Role','Admin' => 'Admin','Developer' => 'Developer','Designer' => 'Designer','HR' => 'HR'), $employee->role, array('class' => 'form-control'));
                    echo '</div>';

                     

                    echo '<div class = "form-group text-center">'.Form::button('<i class="glyphicon glyphicon-leaf"></i> Update',array('type' => 'submit','class' => 'btn btn-large btn-success'));
                    echo '</div>';
                echo Form::close();
                ?>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection