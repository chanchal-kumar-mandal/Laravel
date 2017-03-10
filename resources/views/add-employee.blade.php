@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class = "col-md-4 col-md-offset-4">
            <div class="panel panel-info">
               <div class="panel-heading text-center">
                  Add Employee
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
                echo Form::open(array('url' => 'add-employee/submit', 'method' => 'POST', 'role' => 'form'));
                     echo '<div class = "form-group">'.Form::label('Name : ');
                     echo Form::text('name','',array('placeholder'=>'Enter Name', 'class' => 'form-control'));
                     echo '</div>';

                     echo '<div class = "form-group">'.Form::label('Username : ');
                     echo Form::text('username','',array('placeholder'=>'Enter Username', 'class' => 'form-control'));
                     echo '</div>';

                     echo '<div class = "form-group">'.Form::label('Password : ');
                     echo Form::password('password',array('placeholder'=>'Enter Password', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Address : ');
                     echo Form::text('address','',array('placeholder'=>'Enter Address', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Mobile : ');
                     echo Form::text('mobile','',array('placeholder'=>'Enter Mobile', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Email : ');
                     echo Form::text('email','',array('placeholder'=>'Enter Email', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Salary : ');
                     echo Form::text('salary','',array('placeholder'=>'Enter Salary', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo Form::label('Date Of Joinning : ').'<div class = "form-group input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>';
                     echo Form::text('dateOfJoinning','',array('placeholder'=>'Enter Date Of Joinning', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Choose Role : ');
                     echo Form::select('role', array('' => 'Select Role','Admin' => 'Admin','Developer' => 'Developer','Designer' => 'Designer','HR' => 'HR'), '', array('class' => 'form-control'));
                     echo '</div>';

                     

                     echo '<div class = "form-group text-center">'.Form::button('<i class="glyphicon glyphicon-leaf"></i> Save',array('type' => 'submit','class' => 'btn btn-large btn-success'));
                     echo " ";
                     echo Form::button('<i class="glyphicon glyphicon-refresh"></i> Refresh',array('type' => 'reset','class' => 'btn btn-large btn-primary'));
                     echo '</div>';
                echo Form::close();
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection